{include file="header.tpl" title="{$postTitle|default:"Xenia Bot Blog"}" description={$post['description']}}
{if $showPostListing}
    {include file="include_blog/blog_list.tpl" postArray=$postArray filterTag=$filterTag postTagArray=$postTagArray}
{else}
    {include file="include_blog/blog_post.tpl" postHideState=$postHideState post=$post}
    <hr/>
    <a class="btn btn-sm btn-dark" href="#" style="margin-bottom: 3rem" onclick="history.back()" class="go-back"><< go back</a>
{/if}
{include file="footer.tpl"}
