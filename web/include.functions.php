<?php
use Smarty\Smarty;
require_once(K_WEB_ROOT . '/include.markdown.php');
use voku\helper\HtmlDomParser;

function createSmarty()
{
    $smarty = new Smarty();
    $smarty->setTemplateDir(K_WEB_ROOT . '/templates');
    $smarty->setCompileDir('/tmp/smarty_compile');
    $smarty->setCacheDir('/tmp/smarty_cache');

    return $smarty;
}
function isNewBlogPost($post)
{
	$weekAgo = strtotime('-1 week');
	return $post['created_at'] > $weekAgo;
}
function getGuideContent($guideId)
{
    if (isset($guideId) && strlen($guideId) > 0)
    {
        $guideId = basename($guideId);
        $location = K_WEB_ROOT . "/guide_content/$guideId.md";
        if (!file_exists($location))
        {
            return null;
        }
        $text = formatMarkdown(file_get_contents($location), MDF_DEFAULT | MDF_EXT_TOC);
        return $text;
    }
    return null;
}
function displayBlogPostToUser($post)
{
    if (isset($post) && $post != null)
    {
        if (isset($post['hide_state']))
        {
            return $post['hide_state'] == 0 || $post['hide_state'] == 2;
        }
    }
    return false;
}
function getTextBetweenTags($string, $tagname) {
    // Create DOM from string
    $html = HtmlDomParser::str_get_html($string);

    $titles = array();
    // Find all tags 
    foreach($html->find($tagname) as $element) {
        $titles[] = $element->plaintext;
    }
    return $titles;
}
require_once(K_WEB_ROOT . '/include.blog.php');
