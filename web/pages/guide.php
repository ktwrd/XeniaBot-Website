<?php

if (isset($_REQUEST['i']))
{
    $guideId = basename($_REQUEST['i']);
    $content = retriveGuideContent($guideId);
    if ($content == null) {
        header('Location: /guide/index');
    } else {
        $smarty->assign('guideContent', $content);
        $smarty->assign('guideId', $guideId);
    }
} else {
    header('Location: /guide/index');
}