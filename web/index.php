<?php
require 'vendor/autoload.php';

$time = explode(' ', microtime());
$begintime = $time[1] + $time[0];

global $smarty;
global $config;

// parse target page
if (isset($_REQUEST['p']) && !isset($pageName)) {
    $pageName = basename($_REQUEST['p']);
}
if (!isset($pageName) || strlen($pageName) == 0) {
    $pageName = 'home';
}


require_once($_SERVER['DOCUMENT_ROOT'] . '/include.php');

if ($config['show_errors']) {
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
}

$smarty->assign('pageName', $pageName);
$smarty->assign('year', date('Y'));

$templateName = $pageName;

try
{
    if (file_exists(K_WEB_ROOT . "/pages/$pageName.php"))
        include(K_WEB_ROOT . "/pages/$pageName.php");
    
    if (file_exists(K_WEB_ROOT . "/templates/$templateName.tpl"))
    {
        if (isset($_META))
        {
            $smarty->assign('_META', $_META);
        }
        // handle custom stuff for blogs
        if (str_starts_with($templateName, 'blog'))
        {

            if (isset($postContent))
            {
                if ($postContent['hide_state'] == 0 || $postContent['hide_state'] == 2)
                {
                    $smarty->assign('title', $postContent['subject'] . ' - Xenia Bot Blog');
                    if (isset($postContent['description']))
                    {
                        $smarty->assign('description', $postContent['description']);
                    }
                    else
                    {
                        $smarty->assign('description', '');
                    }
                    $smarty->display("$templateName.tpl");
                }
                else
                {
                    $smarty->display("not_found.tpl");
                }
            }
            else
            {
                $smarty->display("$templateName.tpl");
            }
        }
        else
        {
            $smarty->display("$templateName.tpl");
        }

        $time = explode(' ', microtime());
        $endtime = $time[1] + $time[0];
        if ($config['show_gen_time'])
        {
            echo "Generated in " . round(($endtime-$begintime)*1000,1) . "ms";
        }
    }
    else
    {
        $smarty->display("not_found.tpl");
    }
}
catch (Exception $ex)
{
    echo "<!-- $ex -->";
    $smarty->assign('error', $pageName);
    $smarty->assign('exception', $ex);
    $smarty->display("error.tpl");
}

?>
