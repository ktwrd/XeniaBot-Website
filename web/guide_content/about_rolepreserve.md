# About Role Preservation
The Role Preservation module is another main feature of Xenia, it's pretty simple and I was shocked that no other major bot had this implemented.

Xenia will store what roles a member has every hour and when a member got a role added or removed from them.

<div class="row align-items-start mt-4 mb-4">
    <div class="col is-half is-full-mobile">
        If that member leaves the server, and joins back in the future, Xenia will attempt to grant all roles back to that user.<br/>
        <br/>
        This will be logged in any channel with either the "Role Preserve" or "Member Join" log event when setting up your Logging System.<br/>
        <br/>
        When Xenia fails to add roles back to a member, it will notify the moderators in the "Member Join" channel (as mentioned above.)<br/>
        <br/>
        If you want to be notified even if restoring the roles was successful (in any way), you can add the "Role Preserve" event to any channel (or the fallback event).
    </div>
    <div class="col is-half is-full-mobile">
        <img src="/img/Discord_c2Cye4jXNo.png" class="guide-img" />
    </div>
</div>

This feature can be enabled via the `/rolepreserve enable` command, or via the dashboard. Make sure that the `xenia` role is above all the roles you would like it to give back to users when they join again.

## Role Blacklist

As of Xenia 1.17, you can ignore specific roles from being given back to a user when they re-join your guild. This feature is called the "role blacklist".

>[!NOTE]
> In previous versions of Xenia, some events will always send to a log channel for the "Member Join" event, specifically when Xenia is unable to give a role back to a user.
>
> This behavior still exists in Xenia 1.17 (and later), but it will be overridden if you add a "Role Preserve" log event to a channel.

In order for the Role Blacklist to properly work, you need to do the following:
- Configure a channel for Role Preserve log events, with `/log add-event event:RolePreserve` and select your desired log channel.
- Add a role to the blacklist with the `/rolepreserve blacklist-add` command.

If you would like to see what's in the role blacklist, you can do so with the `/rolepreserve blacklist` command, or by looking at the Role Preserve configuration via the [Web Panel](https://xb.kate.pet).

If you want to remove a role from the blacklist, you can do so with `/rolepreserve blacklist-remove`.

The Role Preserve feature is also the first module to include an audit log! Currently, the Role Preserve Audit Log is only available in the Web Panel. To easily access it, you can run the `/rolepreserve audit-log` command to get a link.

**Note:** In order for a user (yes you!) to access the role preserve blacklist commands, **you** need the "Manage Roles" permission or the "Manage Guild" permission, and Xenia needs the "Manage Roles" permission.

## Required Permissions

| Command                          | Required User Permissions (for you) | Required Bot Permissions (for Xenia) |
| -------------------------------- | ----------------------------------- | ------------------------------------ |
| `/rolepreserve enable`           | Manage Guild                        | Manage Roles                         |
| `/rolepreserve disable`          | Manage Guild                        | Manage Roles                         |
| `/rolepreserve blacklist`        | Manage Roles **OR** Manage Guild    | Manage Roles                         |
| `/rolepreserve blacklist-remove` | Manage Roles **OR** Manage Guild    | Manage Roles                         |
| `/rolepreserve blacklist-remove` | Manage Roles **OR** Manage Guild    | Manage Roles                         |

<div class="row align-items-start mt-4">
    <div class="col is-half is-full-mobile">
        If you want Xenia to properly give users back their roles, make sure that the "Xenia" role is higher in the list than any of the roles you want to be restored.<br/>
        <br/>
        In this example, Xenia will be able to give back someone the "member" role, but Xenia won't be able to give back someone the "admin" role. This is because the "member" role is higher than Xenia's highest role, and the "admin" role is higher than Xenia's highest role.<br/>
        <br/>
        For more information about how Discord's Role System works, <a href="https://support.discord.com/hc/en-us/articles/214836687-Discord-Roles-and-Permissions">you can read this support article</a>. (specifically the "Role Hierarchy System" section)
    </div>
    <div class="col is-half is-full-mobile">
        <img src="/img/firefox_5W3yWy2jvc.png" class="guide-img" />
    </div>
</div>
