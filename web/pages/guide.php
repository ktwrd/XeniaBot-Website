<?php

if (isset($_REQUEST['i']))
{
    $guideId = basename($_REQUEST['i']);
    $content = retriveGuideContent($guideId);
    
    $js = json_decode(file_get_contents(K_WEB_ROOT . '/guide_content/guide_list.json'), True);
    // print_r($js);
    $smarty->assign('guideList', $js);
    if ($content == null) {
        http_response_code(301);
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
    http_response_code(301);
    header('Location: /guide/index');
}