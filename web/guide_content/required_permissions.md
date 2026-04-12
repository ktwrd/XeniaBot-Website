# Required Permissions

When inviting Xenia to your server, there's a few permissions that are required for the bot to function, and for some modules to function. This page aims to describe what permissions are required for what modules.

| Permission | Required | Used by modules | Notes |
| - | - | - | - |
| Manage Roles | ⚠️ | Role Preservation, User Approval |  |
| Ban Members | ⚠️ | Server Logging, BanSync |  |
| Attach Files | ✔️ | **Everything** |  |
| Read Message History | ✔️ | **Everything** |  |
| Mention `@everyone`, `@here`, and All Roles | ⚠️ | BanSync |  |
| Send Messages | ✔️ | **Everything** |  |
| Use External Emojis | ✔️ | **Everything** |  |
| Bypass Slowmode | ✔️ | **Everything** | This is strongly recommended to not cause any errors with Xenia. |
| Add Reactions | ✔️ | **Everything** |  |
| Send Messages in Threads | ✔️ | **Everything** |  |
| Embed Links | ✔️ | **Everything** |  |
| Moderate Members | ⚠️ | Role Preservation, User Approval |  |
| View Audit Log | ⚠️ | Server Logging, Role Preservation, BanSync, User Approval |  |

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
| View Audit Log | ✔️ | Required to get details about any moderation actions. ([source](https://docs.discord.com/developers/resources/audit-log)) |
| Read Message History | ✔️ | Required to get messages that Xenia might've missed during server downtime. |
| Send Messages | ✔️ | **Required in all logging channels.** |
| Embed Links | ✔️ | **Required in all logging channels.** |
| Attach Files | ✔️ | Files are attached to log messages when they're too big to fit in the log message itself.<br>**This permission is required** for Xenia to properly communicate to moderators about log events. |
| Ban Members | ✔️ | Required for Xenia to know when a member is banned. ([source](https://docs.discord.com/developers/events/gateway-events#guild-ban-add)) |

### Warn System

| Permission | Required | Notes |
| - | - | - |
| Send Messages | ✔️ | **Required** in log channel. |
| Embed Links | ✔️ | **Required** in log channel. |

### Role Preservation

| Permission | Required | Notes |
| - | - | - |
| View Audit Log | ✔️ |  |
| Manage Roles | ✔️ | Required to give users roles when they re-join. ([source](https://docs.discord.com/developers/resources/guild#add-guild-member-role)) |
| Moderate Members | ✔️ |  |
| Send Messages | ✔️ | **Required** in the log channel configured via `/log add-event MemberJoin (channel)` |
| Embed Links | ✔️ |  |
| Attach Files | ✔️ |  |

### BanSync

| Permission | Required | Notes |
| - | - | - |
| Ban Members | ✔️ | **Required** to see ban information, and to receive member ban events.<br>*Xenia will never automatically ban anyone.* |
| View Audit Log | ✔️ | **REQUIRED** to figure out who banned a member. |
| Send Messages | ✔️ | **Required** for BanSync notifications, only in the BanSync Log Channel. |
| Attach Files | ✔️ |  |
| Mention `@everyone`, `@here`, and All Roles | ✔️ | **Required** for BanSync notifications, only in the BanSync Log Channel. |

### User Approval

| Permission | Required | Notes |
| - | - | - |
| View Audit Log | ✔️ |  |
| Send Messages | ✔️ | **Required** in log channel and post-approval greeter channel. |
| Attach Files | ✔️ | **Required** in log channel. |
| Embed Links | ✔️ | **Required** in log channel and post-approval greeter channel. |
| Manage Roles | ✔️ | Used to give approved members the configured "approved" role. ([source](https://docs.discord.com/developers/resources/guild#add-guild-member-role)) |
| Moderate Members | ✔️ |  |
