<?php

$userId = '1067393803427790929';
$permissions = '415471496311';

$url = 'https://discord.com/oauth2/authorize?client_id='.$userId.'&scope=bot&permissions='.$permissions;

$smarty->assign('invite_url', $url);
header('Location: ' . $url );