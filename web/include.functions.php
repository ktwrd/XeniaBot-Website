<?php
require_once(K_WEB_ROOT . '/include.markdown.php');
use voku\helper\HtmlDomParser;

function isNewBlogPost($post)
{
	$weekAgo = strtotime('-1 week');
	return $post['created_at'] > $weekAgo;
}
function createSmarty()
{
    require_once(K_WEB_ROOT . '/smarty/libs/Smarty.class.php');

    $smarty = new Smarty();
    $smarty->setTemplateDir(K_WEB_ROOT . '/templates');
    $smarty->setCompileDir('/tmp/smarty_compile');
    $smarty->cache_dir = "/tmp/smarty_cache";

    return $smarty;
}
function retriveGuideContent($guideId)
{
    if (isset($guideId) && strlen($guideId) > 0)
    {
        $guideId = basename($guideId);
        $location = K_WEB_ROOT . "/guide_content/$guideId.md";
        if (!file_exists($location))
        {
            return null;
        }
        $text = formatMarkdown(file_get_contents($location));
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
function retrieveBlogPost($postId)
{
    $post = array();
    if ($postId != null)
    {
        $postId = basename($postId);
        include(K_WEB_ROOT . "/blog_posts/$postId.php");
        if ($generate_blog_post != null)
        {
            $res = $generate_blog_post;

            $post['text'] = formatMarkdown(file_get_contents(K_WEB_ROOT. "/blog_posts/$postId.md"));
            $post['subject'] = $res['subject'];
            $post['description'] = isset($res['description']) ? $res['description'] : "";
            $post['created_at'] = $res['created_at'];
            $post['tags'] = array();
            if (isset($res['tags'])) {
                $post['tags'] = $res['tags'];
            }
            if (isset($res['updated_at']))
            {
                $post['updated_at'] = $res['updated_at'];
            }
            // 0: show
            // 1: pretend it doesn't exist
            // 2: hide in listing
            $post['hide_state'] = isset($res['hide_state']) ? $res['hide_state'] : 0;
            if (isset($post['created_at']))
            {
                $post['created_at_f'] = date('F j, Y', $post['created_at']);
                $post['created_at_fl'] = date('c', $post['created_at']);
            }
            if (isset($post['updated_at']))
            {
                $post['updated_at_f'] = date('F j, Y', $post['updated_at']);
                $post['updated_at_fl'] = date('c', $post['updated_at']);
            }

            if (isset($res['meta']))
            {
                if (isset($_META))
                {
                    // concat post meta before current meta to override things
                    $_META = array_merge($res['meta'], $_META);
                }
                else
                {
                    $_META = $res['meta'];
                }
            }
        }
    }
    return $post;
}

function getAllBlogPosts()
{
    $files = scandir(K_WEB_ROOT . "/blog_posts/");
    $result = array();
    foreach ($files as $f)
    {
        if (str_ends_with($f, '.php'))
        {
            $pn = preg_replace('/\.\w+$/', '', $f);
            $p = retrieveBlogPost($pn);
            if ($p != null)
            {
                $pm = array_merge($p,
                array(
                    'id' => $pn
                ));
                array_push($result, $pm);
            }
        }
    }
    usort( $result, function( $a, $b )
    {
        if ( $a['created_at'] === $b['created_at'] ) return 0;
        if ( strpos( $b['created_at'], '0000' ) !== false ) return 1;
        return ( $a['created_at'] < $b['created_at'] ) ? 1 : -1;
    });
    return $result;
}

function doesPostHaveTag($post, $filterTag) {
    if (!isset($filterTag) || strlen($filterTag) < 1) {
        return True;
    }

    $state = False;
    foreach ($post['tags'] as $tag) {
        if (strtolower($tag) == strtolower($filterTag)) {
            $state = True;
            break;
        }
    }
    return $state;
}
