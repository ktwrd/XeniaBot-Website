<link href="/css/blog-card.css" rel="stylesheet" type="text/css" />

<h1>
    Blog Posts
    <a href="/blog.atom">
        <img src="https://res.kate.pet/icons/fuge-3.5.6/bonus/icons-24/feed.png" alt="rss feed" />
    </a>
</h1>
{if count($postTagArray) > 0}
    <div class="d-inline">
        <strong>Tags:</strong>
        {foreach $postTagArray as $tag}
            {if $tag['selected'] == 1}
                <a class="label label-primary" href="/p/blog?tag={$tag['value']}" style="font-weight: bold;">{$tag['text']}</a>
            {else}
                <a class="label" href="/p/blog?tag={$tag['value']}">{$tag['text']}</a>
            {/if}
        {/foreach}
        {if isset($filterTag)}
            <br/>
            <a href="/p/blog">deselect tag</a>
        {else}
        <br/>
        {/if}
        <br/>
        <div class="label label-primary">{count($postArray)} blog post{if count($postArray) != 1}s{/if}</div>
    </div>
{/if}

<div class="blog-list-cards">
    {foreach $postArray as $post}
        <div class="blog-card blog-card--2col">
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
                        <time class="ta-r" datetime="{$post['created_at_fl']}"><i class="bi bi-calendar" title="Created at"></i> {$post['created_at_f']}</time>
                    {/if}
                    {if isset($post['updated_at_f'])}
                        | <time class="ta-r" datetime="{$post['updated_at_fl']}"><i class="bi bi-pencil" title="Updated at"></i> {$post['updated_at_f']}</time>
                    {/if}
                    {if isset($post['author'])}
                    | <span class="author"><i class="bi bi-person"></i>
                        {if isset($post['author_url'])}
                             <a href="{$post['author_url']}">{$post['author']}</a>
                        {else}
                            {$post['author']}
                        {/if}
                    </span>
                    {/if}
                    {if isset($post['tags'])}
                        |
                        <div class="d-inline">
                            <i class="bi bi-tag"></i>
                            Tags
                            {foreach $post['tags'] as $t}
                                <a class="label" href="/p/blog?tag={$t[1]}">{$t[0]}</a>
                            {/foreach}
                        </div>
                    {/if}
                </div>
            </article>
        </div>
    {/foreach}
</div>
