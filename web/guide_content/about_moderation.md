# About Moderation Tools

Xenia provides a suite of Moderation tools, this includes (but isn't limited to);
- [BanSync](/guide/about_bansync)
- [Warn](/guide/about_warns)
- [Server Logging](#server-logging)
- [Role Preserve](/guide/about_rolepreserve)

{#server-logging}
## Server Logging
Just like many other bots, Xenia has the ability to log events in the server. This includes;
- Member Joined
  * This also shows the invite they came from and who invited them.
- Member Leave
- Member Banned
- Member Kicked
- Message Edited
    * Displayed in the same format as a the `diff` command
- Message Delete
    * Note: In the future this will also save the attachments in the message.
- Channel Delete
- Channel Edit
- Channel Create
- Member Voice Change
    * Joined, Left, Muted (user & server), Deafened (user & server)

The Server Logging feature can be configured via [the dashboard](https://xb.kate.pet) and with the `/log setchannel` command.