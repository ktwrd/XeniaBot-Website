<?php

if (isset($_REQUEST['i']))
{
    $guideId = basename($_REQUEST['i']);
    $content = retriveGuideContent($guideId);
    
    if ($content == null) {
        header('Location: /guide/index');
    } else {
        $r = getTextBetweenTags(strval($content), "h1");
        if (count($r) > 0) {
            $smarty->assign('title', $r[0] . ' - Xenia Bot Guide');
        }
        $smarty->assign('guideContent', $content);
        $smarty->assign('guideId', $guideId);
    }
} else {
    header('Location: /guide/index');
}