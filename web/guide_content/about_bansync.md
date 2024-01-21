# About BanSync
BanSync is one of the primary features of Xenia Bot. It's intended purpose is to warn other server moderators about dangerous and/or problematic people that may cause issues in your server.

## How does it work?

<div class="row align-items-start mt-4">
    <div class="col is-half is-full-mobile">
        Once you have requested BanSync to be enabled on your server (and it's been approved by our review team), all of the members that are banned in your server will be uploaded to Xenia's Database. When this happens Xenia will store in each ban record; who was banned, why they were banned, what server they were banned in, and when they were banned.<br/>
        <br/>
        Once this is recorded in Xenia's database, it will notify the moderators in all servers that Xenia shares with that banned user, but only if that server has the BanSync feature enabled.
    </div>
    <div class="col is-half is-full-mobile">
        <img src="https://res.kate.pet/upload/ea474f3b3581/member_ban_flowchart.drawio.png" class="guide-img" />
    </div>
</div>

## How do I get access?
To get access to BanSync, your server must fill the following criteria;
- Older than 6mo
- At least 35 members

If your server doesn't meet those, requirements then it will not be allowed to have BanSync enabled on it.

If your server *does* meet those requirements, then you can set the BanSync log channel with `/bansync setchannel` or [via the dashboard](https://xb.kate.pet). After you've set the log channel (and Xenia can access it), you can request BanSync with the `/bansync request` command.

You will be notified about the outcome of your BanSync request in the log channel you set above.

If you wish, you can also follow this same process via the [Xenia Dashboard](https://xb.kate.pet).
1. Navigate to your server settings.
2. Select the "Moderation" tab.
3. Set your Log Channel under the "Ban Sync" card.
4. Request the Ban Sync feature by clicking on the "Request" button.