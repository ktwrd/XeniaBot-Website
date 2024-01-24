<?php

$newBlogPosts = fetchNewBlogPosts();
$smarty->assign('newBlogPosts', $newBlogPosts);
?>