<?php
/// Fetch blog post by it's ID
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
                foreach ($res['tags'] as $tag) {
                    array_push($post['tags'], [$tag, strtolower($tag)]);
                }
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
                $post['created_at_f'] = date('F jS, Y', $post['created_at']);
                $post['created_at_fl'] = date('c', $post['created_at']);
            }
            if (isset($post['updated_at']))
            {
                $post['updated_at_f'] = date('F jS, Y', $post['updated_at']);
                $post['updated_at_fl'] = date('c', $post['updated_at']);
            }

            if (isset($res['author']) && strlen($res['author']) > 0)
            {
                $post['author'] = $res['author'];
            }
            if (isset($res['author_url']) && strlen($res['author_url']) > 0)
            {
                $post['author_url'] = $res['author_url'];
            }
            if (isset($res['author_email']) && strlen($res['author_email']) > 0)
            {
                $post['author_email'] = $res['author_email'];
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
            $post['is_new'] = isNewBlogPost($post);
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
function fetchNewBlogPosts()
{
    return array_slice(getAllBlogPosts(), 0, 3);
}

function doesPostHaveTag($post, $filterTag) {
    if (!isset($filterTag) || strlen($filterTag) < 1) {
        return True;
    }

    $state = False;
    foreach ($post['tags'] as $tag) {
        if (strtolower($tag[1]) == strtolower($filterTag)) {
            $state = True;
            break;
        }
    }
    return $state;
}