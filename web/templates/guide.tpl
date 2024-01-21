{include file="header.tpl"}

<div style="min-height: 80vh">
    {if isset($guideContent)}
        {$guideContent}
    {/if}
</div>

<div style="margin-top: 3rem;">
    <a class="btn btn-sm btn-outline-light" style="margin-right: 4rem;" href="/guide/index"><< back to index</a>
    <a class="btn btn-sm btn-outline-light" href="#" onclick="history.back()"><< previous page</a>
</div>

{include file="footer.tpl"}