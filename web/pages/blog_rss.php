<?php
header('Content-Type: application/rss+xml');
echo "<?xml version=\"1.0\" encoding=\"utf-8\" standalone=\"yes\"?>";
?>

<rss version="2.0"
    xmlns:atom="http://www.w3.org/2005/Atom">
    <channel>
        <title>Xenia Bot Blog</title>
        <link>https://xenia.kate.pet/p/blog</link>
        <description>Recent posts by Kate</description>
        <language>en-us</language>
        <lastBuildDate><?php echo date('D, d M o H:i:s O'); ?></lastBuildDate>
        <atom:link href="https://xenia.kate.pet/blog.atom" rel="self" type="application/rss+xml" />

<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/include.php');

$blogPosts = getAllBlogPosts();
foreach ($blogPosts as $post)
{
    if ($post['hide_state'] == 0)
    {
        $postTitle = $post['subject'];
        $postId = $post['id'];
        $postPubDate = date('D, d M o H:i:s O', $post['created_at']);
        $postDesc = $post['description'];
        $rssAuthor = "";
        $rssAuthorEmail = "";
        $rssAuthorName = "";
        if (isset($post['author_email']))
        {
            $rssAuthor = "
                <author>" . $post['author_email'] . "</author>";
            $rssAuthorEmail = $post['author_email'];
        }
        if (isset($post['author']))
        {
            $rssAuthorName = $post['author'];
        }

        if (strlen($rssAuthorEmail) > 0 || strlen($rssAuthorName) > 0)
        {
            $x = "
                <author>";
            if (strlen($rssAuthorName) > 0) {
                $x = $x."
                    <name>".$rssAuthorName."</name>";
            }
            if (strlen($rssAuthorEmail) > 0) {
                $x = $x."
                    <email>".$rssAuthorEmail."</email>";
            }
            $x = $x."
                </author>";
            $rssAuthor = $x;
        }

        $postUpdStr = "";
        if (isset($post['updated_at']))
        {
            $pudst = date('D, d M o H:i:s O', $post['updated_at']);
            $postUpdStr = "
                <updated>{$pudst}</updated>";
        }
        echo
"        <item>
                <title>{$postTitle}</title>
                <link href=\"https://xenia.kate.pet/blog/{$postId}\" />
                <pubDate>{$postPubDate}</pubDate>
                <guid>https://xenia.kate.pet/blog/{$postId}</guid>
                <description>{$postDesc}</description>".$rssAuthor.$postUpdStr."
        </item>
";
    }
}
?>
    </channel>
</rss>