<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/include.php');

$filterTag = NULL;
if (isset($_REQUEST['tag'])) {
    $filterTag = $_REQUEST['tag'];
}
$smarty->assign('filterTag', $filterTag);

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
        $smarty->assign('post_json', json_encode($postContent));
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
    $postArrayR = getAllBlogPosts();
    $postTagArray = array();
    $seenTags = array();
    foreach ($postArrayR as $p) {
        foreach ($p['tags'] as $t) {
            if (in_array($t[1], $seenTags)) continue;
            array_push($seenTags, $t[1]);
            array_push($postTagArray, [
                'value' => $t[1],
                'text' => $t[0],
                'selected' => $filterTag == NULL ? -1
                    : (strtolower($filterTag) == $t[1] ? 1 : 0)
            ]);
        }
    }
    $smarty->assign('postTagArray', $postTagArray);

    $postArray = array();
    foreach ($postArrayR as $post) {
        if (isset($filterTag) && !doesPostHaveTag($post, $filterTag)) {
            if (!doesPostHaveTag($post, $filterTag)) {
                continue;
            }
        }
        array_push($postArray, $post);
    }
    $smarty->assign('postArray', $postArray);
    $smarty->assign('title', $config['blog_title_suffix']);
    $smarty->assign('description', '');
}

$smarty->assign('postHideState', $postHideState);
$smarty->assign('showPostListing', $showPostListing);

?>