<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/include.php');

print_r($_REQUEST);

if (isset($_REQUEST['tag'])) {
    $smarty->assign('filterTag', $_REQUEST['tag']);
}

$postHideState = 1;
$showPostListing = False;


if (isset($_REQUEST['i']))
{
    $postContent = retrieveBlogPost(basename($_REQUEST['i']));
    if ($postContent == null)
    {
        header('Location: /p/blog');
    }
    else
    {
        $postHideState = isset($postContent['hide_state']) ? $postContent['hide_state'] : 2;
        $smarty->assign('post', $postContent);
        $smarty->assign('postTitle', $postContent['subject'] . ' - Xenia Bot Blog');
        $smarty->assign('postDescription', $postContent['description']);
    }

    if (displayBlogPostToUser($postContent))
    {
        $smarty->assign('title', $postContent['subject'] . ' - Xenia Bot Blog');
        $smarty->assign('description', $postContent['description']);
    }
}
else
{
    $showPostListing = True;
    $postArray = getAllBlogPosts();
    $postTagArray = array();
    foreach ($postArray as $p) {
        foreach ($p['tags'] as $t) {
            array_push($postTagArray, $t);
        }
    }
    $postTagArray = array_unique($postTagArray);
    $smarty->assign('postTagArray', $postTagArray);
    $smarty->assign('postArray', $postArray);
    $smarty->assign('title', 'Xenia Bot Blog');
    $smarty->assign('description', '');
}

$smarty->assign('postHideState', $postHideState);
$smarty->assign('showPostListing', $showPostListing);

?>