import os, pathlib

permission_names = {
    "MANAGE_ROLES": "Manage Roles",
    "MANAGE_CHANNELS": "Manage Channels",
    "BAN_MEMBERS": "Ban Members",
    "KICK_MEMBERS": "Kick Members",
    "MANAGE_CHANNELS": "Manage Channels",
    "MANAGE_MESSAGES": "Manage Messages",
    "ATTACH_FILES": "Attach Files",
    "READ_MESSAGE_HISTORY": "Read Message History",
    "MENTION_EVERYONE": "Mention `@everyone`, `@here`, and All Roles",
    "SEND_MESSAGES": "Send Messages",
    "USE_EXTERNAL_EMOJIS": "Use External Emojis",
    "USE_EXTERNAL_STICKERS": "Use External Stickers",
    "VIEW_GUILD_INSIGHTS": "View Guild Insights (statistics)",
    "BYPASS_SLOWMODE": "Bypass Slowmode",
    "ADD_REACTIONS": "Add Reactions",
    "SEND_MESSAGES_IN_THREADS": "Send Messages in Threads",
    "EMBED_LINKS": "Embed Links",
    "MODERATE_MEMBERS": "Moderate Members",
    "VIEW_AUDIT_LOG": "View Audit Log"
}

modules = [
    {
        "name": "Required Permissions",
        "items": [
            "SEND_MESSAGES",
            "SEND_MESSAGES_IN_THREADS",
            "ADD_REACTIONS",
            "USE_EXTERNAL_EMOJIS",
            "READ_MESSAGE_HISTORY",
            "ATTACH_FILES",
            "BYPASS_SLOWMODE",
            "EMBED_LINKS"
        ],
        "optional": [],
        "notes": {
            "BYPASS_SLOWMODE": "This is strongly recommended to not cause any errors with Xenia."
        }
    },
    {
        "name": "Moderation",
        "items": [],
        "optional": [
            "MODERATE_MEMBERS",
            "MANAGE_MESSAGES"
        ],
        "notes": {
            "MODERATE_MEMBERS": "Required to use any moderation commands (i.e: `/mute`, etc...)",
            "MANAGE_MESSAGES": "Required to use moderation commands for deleting messages (i.e: `/purge`)"
        }
    },
    {
        "name": "Server Logging",
        "items": [
            "VIEW_AUDIT_LOG",
            "READ_MESSAGE_HISTORY",
            "SEND_MESSAGES",
            "BAN_MEMBERS"
        ],
        "optional": [],
        "notes": {
            "VIEW_AUDIT_LOG": "Required to get details about any moderation actions.",
            "READ_MESSAGE_HISTORY": "Required to get messages that Xenia might've missed during server downtime.",
            "SEND_MESSAGES": "Required in all logging channels.",
            "BAN_MEMBERS": "Required to get ban information."
        }
    },
    {
        "name": "Warn System",
        "items": [
            "SEND_MESSAGES",
            "EMBED_LINKS"
        ],
        "optional": [],
        "notes": {
            "SEND_MESSAGES": "Required in log channel."
        }
    },
    {
        "name": "Role Preservation",
        "items": [
            "VIEW_AUDIT_LOG",
            "MANAGE_ROLES",
            "MODERATE_MEMBERS",
            "SEND_MESSAGES",
            "EMBED_LINKS",
            "ATTACH_FILES",
        ],
        "optional": [],
        "notes": {
            "MANAGE_ROLES": "Required to update user roles when they re-join your guild.",
            "SEND_MESSAGES": "Only in the log channel used for Role Preservation."
        }
    },
    {
        "name": "BanSync",
        "items": [
            "BAN_MEMBERS",
            "VIEW_AUDIT_LOG",
            "SEND_MESSAGES",
            "ATTACH_FILES",
            "MENTION_EVERYONE"
        ],
        "optional": [],
        "notes": {
            "BAN_MEMBERS": "**Required** to see ban information, and to receive member ban events.",
            "VIEW_AUDIT_LOG": "**REQUIRED** to figure out who banned a member.",
            "SEND_MESSAGES": "**Required** for BanSync notifications, only in the BanSync Log Channel.",
            "MENTION_EVERYONE": "**Required** for BanSync notifications, only in the BanSync Log Channel."
        }
    },
    {
        "name": "User Approval",
        "items": [
            "VIEW_AUDIT_LOG",
            "SEND_MESSAGES",
            "ATTACH_FILES",
            "EMBED_LINKS",
            "MODERATE_MEMBERS"
        ],
        "optional": [],
        "notes": {
            "SEND_MESSAGES": "**Required** in log channel and post-approval greeter channel.",
            "EMBED_LINKS": "**Required** in log channel and post-approval greeter channel.",
            "ATTACH_FILES": "**Required** in log channel.",
            "MODERATE_MEMBERS": "Used to give approved members the configured \"approved\" role."
        }
    }
]
def build_main_table():
    content = [
        '| Permission | Required | Used by modules |',
        '| - | - | - |'
    ]
    permissions = {}
    for key in permission_names.keys():
        permissions[key] = {
            'modules': [],
            'required': False,
            'notes': ''
        }
    required_any_notes = False
    for module in modules:
        if module['name'] == 'Required Permissions':
            for item in module['items']:
                permissions[item]['required'] = True
                notes = module['notes'].get(item)
                if notes is not None:
                    permissions[item]['notes'] = notes
                    if len(notes) > 0:
                        required_any_notes = True
        else:
            for item in module['items']:
                permissions[item]['modules'].append(module['name'])
    
    if required_any_notes:
        content[0] += ' Notes |'
        content[1] += ' - |'

    for key in permissions.keys():
        required_value = ''
        if permissions[key]['required']:
            required_value = '✔️'
        elif len(permissions[key]['modules']) > 0:
            required_value = '⚠️'
        else:
            continue
        
        used_by = ', '.join(permissions[key]['modules'])
        if permissions[key]['required']:
            used_by = '**Everything**'
        line = '| %s | %s | %s |' % (permission_names[key], required_value, used_by)
        if required_any_notes:
            notes = ''
            if permissions[key]['notes'] is not None and len(permissions[key]['notes']) > 0:
                notes = permissions[key]['notes']
            line += ' %s |' % notes
        content.append(line)
    return content


def build_breakdown():
    result = []
    for module in modules:
        if module['name'] == 'Required Permissions':
            continue
        result.append("### %s" % module['name'])
        result.append('')
        result.append('| Permission | Required | Notes |')
        result.append('| - | - | - |')
        permissions = []
        for item in module['items']:
            permissions.append(item)
        if module['optional'] is not None:
            for item in module['optional']:
                permissions.append(item)

        for item in permissions:
            notes = ''
            required_val = '✔️'
            if module['notes'] is not None:
                notes = module['notes'].get(item)
                if notes is None:
                    notes = ''
            if module['optional'] is not None and item in module['optional']:
                required_val = 'Optional'
            notes = notes.replace('\n', '<br>')

            r = '| %s | %s | %s |' % (permission_names[item], required_val, notes)
            result.append(r)
        result.append('')
    return result

main_table = build_main_table()
breakdown = [
    '',
    '## Per-module breakdown',
    'The following are tables that include a per-module breakdown of what permissions are required.',
    ''
]
for l in build_breakdown():
    breakdown.append(l)

result = []
for l in main_table:
    result.append(l)
for l in breakdown:
    result.append(l)

script_file_path = os.path.realpath(__file__)
template_filename = pathlib.Path(os.path.dirname(script_file_path) + '/gen_guide_required_permissions_templ.md')
output_filename = pathlib.Path(os.path.dirname(os.path.dirname(script_file_path)) + '/web/guide_content/required_permissions.md')
print(script_file_path)
print(template_filename)
print(output_filename)

with open(template_filename, 'r', encoding='utf-8') as templFile:
    templContent = str(templFile.read())
    out_content = templContent % '\n'.join(result)
    with open(output_filename, 'w', encoding='utf-8') as outFile:
        outFile.write(out_content)
