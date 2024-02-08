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
        <a class="btn btn-info btn-lg m-1" href="https://xb.kate.pet">Dashboard</a>
    </div>
    <br/>
    <a class="btn btn-dark btn-lg m-1" href="/p/blog">Blog</a>
</div>
<div class="row align-items-start pt-2">
    <div class="col is-half is-full-mobile">
        <h2>New Blog Posts</h3>
        <div class="lead">Some of the latest blog posts released by the development team. <a href="/p/blog">See all blog posts.</a></div>
    </div>
    <div class="col is-half is-full-mobile">
        <div class="blog-list-cards pt-4">
            {foreach $newBlogPosts as $post}
                {if isset($filterTag) && !doesPostHaveTag($post, $filterTag)}
                    {continue}
                {/if}
                <div class="blog-card blog-card--2col">
                    <article class="blog-card__box block">
                        <h1>
                            <a href="/blog/{$post['id']}">{$post['subject']}</a>
                            {if isNewBlogPost($post)} <img src="https://res.kate.pet/icons/fuge-3.5.6/icons/new-text.png" /> {/if}
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
<style>
.blog-list-cards {
    display: flex;
    flex-wrap: wrap;
}
.blog-card {
    display: flex;
    width: 100%;
}
.blog-card__box {    
    padding: .875rem;
    color: #fff;
    background-color: #1e1e1e;

    border: 1px solid #666666;
    display: flex;
    flex-direction: column;
    width: 100%;
    margin: 0;
    border-width: 0 0 1px;
}
.blog-card__box h1 {
    font-size: 1.25rem;
    margin-top: 0;
    margin-bottom: calc(0.5rem * (1/2));
    font-weight: 600;
}
.blog-card__box .entry-meta {
    font-size: .875rem;
    margin-top: calc(1rem * (1/2));
}
</style>

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


{include file="footer.tpl"}