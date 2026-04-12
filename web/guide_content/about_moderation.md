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
- Member Updated (currently only includes roles & permissions)
- Role Created/Edited/Deleted
- Message Edited
    * Displayed in the same format as a the `diff` command
- Message Delete
- Channel Create/Edit/Delete
- Member Voice Change
    * Joined, Left, Muted (user & server), Deafened (user & server)

The Server Logging feature can be configured via [the dashboard](https://xb.kate.pet).

To send all logging events to a channel, you can run the `/log add-event` command and select the `Fallback` option for the event.
If you add another event to a different channel, then it won't be sent to the fallback channel.

To see what channels are used for a specific event, you can run the `/log get-channels` command. To get what events are used for a channel, you can run the `/log get-channel-events` command.

Once you have configured logging, make sure that you enable it with `/log enable`.

If you want to easily bulk-update log events, then you can go to the Moderation settings in the [Xenia Dashboard](https://xb.kate.pet) for your guild/server.