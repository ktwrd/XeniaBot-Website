{include file="header.tpl" title="$postTitle" description={$post['description']}}
{if $showPostListing}
    {include file="include_blog/blog_list.tpl" postArray=$postArray filterTag=$filterTag postTagArray=$postTagArray}
{else}
    {include file="include_blog/blog_post.tpl" postHideState=$postHideState post=$post}
    <hr/>
    <a href="#" style="padding-bottom: 3rem" onclick="history.back()" class="go-back"><< go back</a>
{/if}
{include file="footer.tpl"}