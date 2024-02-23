# About BanSync
BanSync is one of the primary features of Xenia Bot. It's intended purpose is to warn other server moderators about dangerous and/or problematic people that may cause issues in your server.

{#how-does-it-work}
## How does it work?

<div class="row align-items-start mt-4">
    <div class="col is-half is-full-mobile">
        Once you have requested BanSync to be enabled on your server (and it's been approved by our review team), all of the members that are banned in your server will be uploaded to Xenia's Database. When this happens Xenia will store in each ban record; who was banned, why they were banned, what server they were banned in, and when they were banned.<br/>
        <br/>
        Once this is recorded in Xenia's database, it will notify the moderators in all servers that Xenia shares with that banned user, but only if that server has the BanSync feature enabled.
    </div>
    <div class="col is-half is-full-mobile">
        <img src="https://res.kate.pet/upload/ea474f3b3581/member_ban_flowchart.drawio.png" class="guide-img p-1" style="background: #212121" />
    </div>
</div>

{#how-do-i-tell-if-someone-has-an-existing-record}
## How do I tell if someone has an existing record?
If you wish to see who in your server has existing records, then you can access that information via the Dashboard.

<div class="row align-items-start mt-4">
    <div class="col is-half is-full-mobile">
        Once you have logged in, follow these steps;<br/>
        <ol>
            <li>Select "Manage Servers" on the homepage or the "Servers" link in the navbar.</li>
            <li>Select the server that you wish to see existing records for</li>
            <li>Click on the "View" button in the Moderation card.</li>
            <li>Under the "Ban Sync" card, click on the button that says "See Mutual Records".</li>
        </ol>
        If you cannot see the "See Mutual Records" button, then your server does not have Ban Sync enabled on it (see <a href="#how-do-i-get-access">How do I get access</a>)
    </div>
    <div class="col is-half is-full-mobile">
        <video controls autoplay loop class="guide-img">
            <source src="https://res.kate.pet/upload/eecd8b602ff4/firefox_eqEJUXpMpb.mp4" type="video/mp4" />
        </video>
    </div>
</div>


{#how-do-i-get-access}
## How do I get access?
To get access to BanSync, your server must fill the following criteria;
- Older than 6mo
- At least 35 members

If your server doesn't meet those, requirements then it will not be allowed to have BanSync enabled on it.

If your server *does* meet those requirements, then you can set the BanSync log channel with `/bansync setchannel` or [via the dashboard](https://xb.kate.pet). After you've set the log channel (and Xenia can access it), you can request BanSync with the `/bansync request` command.

You will be notified about the outcome of your BanSync request in the log channel you set above.

<div class="row align-items-start mt-4">
    <div class="col is-half is-full-mobile">
        If you wish, you can also follow this same process via the <a href="https://xb.kate.pet">Xenia Dashboard</a>.<br/>
        <ol>
            <li>Navigate to your server settings.</li>
            <li>Select the "View" button in the Moderation card.</li>
            <li>Set your Log Channel under the "Ban Sync" card.</li>
            <li>Request the Ban Sync feature by clicking on the "Request" button.</li>
        </ol>
    </div>
    <div class="col is-half is-full-mobile">
        <video controls autoplay loop class="guide-img">
            <source src="https://res.kate.pet/upload/be7576c2b21b/firefox_UZI9l4NDr3.mp4" type="video/mp4" />
        </video>
    </div>
</div>