<?php

$userId = '1067393803427790929';
$permissions = '4504974285851845';

$url = 'https://discord.com/oauth2/authorize?client_id='.$userId.'&scope=bot&permissions='.$permissions;

$smarty->assign('invite_url', $url);
http_response_code(301);
header('Location: ' . $url );