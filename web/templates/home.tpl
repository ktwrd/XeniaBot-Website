{include file="header.tpl"}

<h2>The Discord Bot that's Full of features,<br/>
but done right.</h2>
<div class="row align-items-start">
    <div class="col is-half is-full-mobile">
        <div class="lead">
            Many discord bot's are full of features but are never implemented fully, or are extremely broken. Xenia is not one of those bots.<br/>
            Declutter your server list and remove unnecessary Discord Bots that you don't trust.<br/>
        </div>
        <div class="lead mt-3">
            We know we have a small userbase, but you've got to start somewhere. Try it today, and read the <a href="/p/guide">Getting Started Guide</a> if you'd like to understand how some features work.<br/>
        </div>
    </div>
    <div class="col is-half is-full-mobile ps-4">
    </div>
</div>

<div class="mt-3">
    <div class="d-inline-flex">
        <a class="btn btn-primary btn-lg m-1" href="/p/invite">Invite Xenia</a>
        <a class="btn btn-secondary btn-lg m-1" href="/guide/modules">Features</a>
    </div>
    <br/>
    <a class="btn btn-dark btn-lg m-1" href="/p/blog">Blog</a>
    <a class="btn btn-dark btn-lg m-1" href="https://xb.kate.pet">Dashboard</a>
</div>
<div class="row align-items-start pt-2">
    <div class="col is-half is-full-mobile">
        <h2>New Blog Posts</h3>
        <div class="lead">Some of the latest blog posts released by the development team. <a href="/p/blog">See all blog posts.</a></div>
    </div>
    <div class="col is-half is-full-mobile">
        <div class="blog-list-cards pt-4 homepage-blog">
            {foreach $newBlogPosts as $post}
                <div class="blog-card homepage-blog blog-card--2col">
                    <article class="blog-card__box block">
                        <h1>
                            <a href="/blog/{$post['id']}">{$post['subject']}</a>
                            {if $post['is_new']} <img src="https://res.kate.pet/icons/fuge-3.5.6/icons/new-text.png" /> {/if}
                        </h1>
                        <div class="entry-content">
                            {$post['description']}
                        </div>
                        <div class="entry-meta tar" style="display: block">
                            {if isset($post['created_at_f'])}
                                <time class="ta-r" datetime="{$post['created_at_fl']}">{$post['created_at_f']}</time>
                            {/if}
                            {if isset($post['updated_at_f'])}
                                <br/>
                                <time class="ta-r" datetime="{$post['updated_at_fl']}">Updated: {$post['updated_at_f']}</time>
                            {/if}
                        </div>
                    </article>
                </div>
            {/foreach}
        </div>
    </div>
</div>
<link href="/css/blog-card.css" rel="stylesheet" type="text/css" />
<!--
<h2 id="demo" style="padding-top: 3rem">Demos</h2>
Note: This is not a complete list of all modules, you can find this by seeing the <a href="/guide/modules">Module List</a>
<div class="row align-items-start mt-4">
    <div class="col is-half is-full-mobile">
        <h3>Confession System</h3>
        <div class="lead">
            Real anonymous confessions. No commands or text-based commands are used, which means that moderators can't see who made a confession.
        </div>
    </div>
    <div class="col is-half is-full-mobile">
        <img
            class="demo-img"
            src="https://res.kate.pet/upload/03bcb777-911d-4774-9454-523b3b238267/DiscordCanary_S5Wm6jtwOd.gif" />
    </div>
</div>
-->


{include file="footer.tpl"}