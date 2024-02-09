<?php
@define('K_WEB_ROOT', dirname(__FILE__));

if (!headers_sent())
    header('Content-type: text/html; charset=UTF-8');

date_default_timezone_set('Australia/Perth');

global $smarty;
global $config;
$config = array();
require_once(K_WEB_ROOT . '/include.config.default.php');
if (file_exists(K_WEB_ROOT . '/include.config.php'))
{
    require_once(K_WEB_ROOT . '/include.config.php');
}
require_once(K_WEB_ROOT . '/include.markdown.php');
require_once(K_WEB_ROOT . '/include.functions.php');

if (!isset($skipWebsite))
{
    if (!isset($smarty))
        $smarty = createSmarty();

    $base_domain = (isset($config) ? $config['server_name'] : 'xenia.kate.pet');
    $smarty->assign('DOMAIN', $base_domain);

    $DOMAIN = 'http://' . $base_domain;
}
?>