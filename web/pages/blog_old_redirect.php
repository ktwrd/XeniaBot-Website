<?php

http_response_code(301);
if (isset($_REQUEST['i']))
{
    header('Location: /blog/' . basename($_REQUEST['i']));
}
else
{
    header('Location: /p/blog');
}