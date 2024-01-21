# About Role Preservation
The Role Preservation module is another main feature of Xenia, it's pretty simple and I was shocked that no other major bot had this implemented.

Xenia will store what roles a member has every hour and when a member got a role added or removed from them.

<div class="row align-items-start mt-4">
    <div class="col is-half is-full-mobile">
        If that member leaves the server, and joins back in the future, Xenia will attempt to grant all roles back to that user.<br/>
        <br/>
        This will be logged in the "Member Join" when setting up your Logging System.<br/>
        <br/>
        When Xenia fails to add roles back to a member, it will notify the moderators in the "Member Join" channel (as mentioned above.)
    </div>
    <div class="col is-half is-full-mobile">
        <img src="https://res.kate.pet/upload/2a484eaa354e/Discord_2QqwLufnH3.png" class="guide-img" />
    </div>
</div>


