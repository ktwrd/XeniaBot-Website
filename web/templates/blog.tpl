{include file="header.tpl" title="{$title|default:"Xenia Blog"}" description={$description|default:""}}
<link href="/css/blog.css" rel="stylesheet" type="text/css" />
{if $showPostListing}
    {include file="include_blog/blog_list.tpl" postArray=$postArray filterTag=$filterTag postTagArray=$postTagArray}
{else}
    {include file="include_blog/blog_post.tpl" postHideState=$postHideState post=$post}
    <hr/>
    <a class="btn btn-sm btn-dark" href="#" style="margin-bottom: 3rem" onclick="history.back()" class="go-back"><< go back</a>
{/if}
{include file="footer.tpl"}
