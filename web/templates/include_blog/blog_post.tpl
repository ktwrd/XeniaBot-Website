<div class='blog-header'>
    <h1 field='title'>{$post['subject']}</h1>
    {if isset($post['created_at_f'])}
        <h3 field='created_at'><i class="bi bi-calendar"></i>{$post['created_at_f']}</h3>
    {/if}
    {if isset($post['updated_at_f'])}
        <h4 field='updated_at'><i class="bi bi-pencil"></i> {$post['updated_at_f']}</h4>
    {/if}
    {if count($post['tags']) > 0}
    <div class="d-inline">
        <strong>Tags:</strong>
        {foreach $post['tags'] as $tag}
            <a href="/p/blog?tag={$tag[1]}" style="font-weight: normal">{$tag[0]}</a>
        {/foreach}
    </div>
    {/if}
    {if isset($post['author'])}
        {if count($post['tags']) > 0}<br/>{/if}
        <strong>Author: </strong>
        {if isset($post['author_url'])}
            <a href="{$post['author_url']}">{$post['author']}</a>
        {else}
            {$post['author']}
        {/if}
    {/if}
</div>
<hr/>
<div class='blog-body'>
    {$post['text']}
</div>