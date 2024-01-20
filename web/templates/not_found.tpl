{include file="header.tpl" title="uh oh! - Xenia Bot" description="404, page not found ;w;"}

<div class="center">
    {if isset($pageName)}
        {if $pageName == 'blog'}
            <h1>Blog post not found</h1>
            <a href="/p/blog"><< go back</a>
        {elseif $pageName == 'guide'}
            <h1>Guide not found</h1>
            <a href="/p/guide"><< go back</a>
        {else}
            <h1>Page not found</h1>
            <a href="/"><< go home</a>
        {/if}
    {else}
        <h1>Page not found</h1>
        <a href="/"><< go home</a>
    {/if}
</div>