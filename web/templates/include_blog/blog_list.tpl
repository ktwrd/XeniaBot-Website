<link href="/css/blog-card.css" rel="stylesheet" type="text/css" />

<h1>
    Blog Posts
    <a href="/p/blog_rss">
        <img src="https://res.kate.pet/icons/fuge-3.5.6/bonus/icons-24/feed.png" alt="rss feed" />
    </a>
</h1>
{if count($postTagArray) > 0}
    <div class="d-inline">
        <strong>Tags:</strong>
        {foreach $postTagArray as $tag}
            {if isset($filterTag) && strtolower($filterTag) == strtolower($tag)}
                <a href="/p/blog?tag={strtolower($tag)}" style="font-weight: bold;">{$tag}</a>
            {else}
                <a href="/p/blog?tag={strtolower($tag)}">{$tag}</a>
            {/if}
        {/foreach}
        {if isset($filterTag)}
            <br/>
            <a href="/p/blog">deselect tag</a>
        {/if}
    </div>
{/if}

<div class="blog-list-cards">
    {foreach $postArray as $post}
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
