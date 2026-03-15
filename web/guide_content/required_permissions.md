# Required Permissions

When inviting Xenia to your server, there's a few permissions that are required for the bot to function, and for some modules to function. This page aims to describe what permissions are required for what modules.

| Permission | Required | Used by modules |
| - | - | - |
| Manage Roles | ⚠️ | Role Preservation |
| Ban Members | ⚠️ | Server Logging, BanSync |
| Attach Files | ✔️ | **Everything** |
| Read Message History | ✔️ | **Everything** |
| Mention `@everyone`, `@here`, and All Roles | ⚠️ | BanSync |
| Send Messages | ✔️ | **Everything** |
| Use External Emojis | ✔️ | **Everything** |
| Bypass Slowmode | ✔️ | **Everything** |
| Add Reactions | ✔️ | **Everything** |
| Send Messages in Threads | ✔️ | **Everything** |
| Embed Links | ✔️ | **Everything** |
| View Audit Log | ⚠️ | Server Logging, BanSync |

## Per-module breakdown
The following are tables that include a per-module breakdown of what permissions are required.

### Moderation

| Permission | Required | Notes |
| - | - | - |
| Moderate Members | Optional | Required to use any moderation commands (i.e: `/mute`, etc...) |
| Manage Messages | Optional | Required to use moderation commands for deleting messages (i.e: `/purge`) |

### Server Logging

| Permission | Required | Notes |
| - | - | - |
| View Audit Log | ✔️ |  |
| Send Messages | ✔️ | Required in all logging channels. |
| Ban Members | ✔️ | Required to get ban information. |

### Role Preservation

| Permission | Required | Notes |
| - | - | - |
| Manage Roles | ✔️ | Required to update user roles when they re-join your guild. |
| Send Messages | ✔️ | Only in the log channel used for Role Preservation. |

### BanSync

| Permission | Required | Notes |
| - | - | - |
| Ban Members | ✔️ | Required to see ban information, and to receive member ban events. |
| View Audit Log | ✔️ | Used to figure out who banned a member |
| Send Messages | ✔️ | Required for BanSync notifications, only in the BanSync Log Channel. |
| Mention `@everyone`, `@here`, and All Roles | ✔️ | Required for BanSync notifications, only in the BanSync Log Channel. |
