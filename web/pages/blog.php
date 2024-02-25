<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/include.php');

if (isset($_REQUEST['tag'])) {
    $smarty->assign('filterTag', $_REQUEST['tag']);
} else {
    $smarty->assign('filterTag', NULL);
}

$postHideState = 1;
$showPostListing = False;


if (isset($_REQUEST['i']))
{
    $postContent = retrieveBlogPost(basename($_REQUEST['i']));
    if ($postContent == null)
    {
        http_response_code(301);
        header('Location: /p/blog');
    }
    else
    {
        $postHideState = isset($postContent['hide_state']) ? $postContent['hide_state'] : 2;
        $smarty->assign('post', $postContent);
        $subject = '';
        if (isset($postContent['subject'])) {
            $subject = $postContent['subject'];
        }
        $smarty->assign('postTitle', $subject . ' - ' . $config['blog_title_suffix']);
        $smarty->assign('postDescription', $postContent['description']);
    }

    if (displayBlogPostToUser($postContent))
    {
        if (!isset($postContent['subject'])) {
            $smarty->assign('title', $config['blog_title_suffix']);
        } else {
            $smarty->assign('title', $postContent['subject'] . ' - ' . $config['blog_title_suffix']);
        }
        $smarty->assign('description', $postContent['description']);
    }
    else
    {
        http_response_code(301);
        header('Location: /p/blog'); 
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
    $smarty->assign('title', $config['blog_title_suffix']);
    $smarty->assign('description', '');
}

$smarty->assign('postHideState', $postHideState);
$smarty->assign('showPostListing', $showPostListing);

?>