<?php
header("Content-Type: text/plain");
foreach (getAllBlogPosts() as $b)
{
    echo "https://xenia.kate.pet/blog/" . $b['id'] . "\n";
}

$filenameExclude = array(
    'sitemap'
);
foreach (scandir(K_WEB_ROOT . "/pages/") as $p)
{
    if (str_ends_with($p, '.php')) {
        $pn = pathinfo($p)['filename'];
        if (!in_array($pn, $filenameExclude)) {
            echo "https://xenia.kate.pet/p/" . $pn . "\n";
        }
    }
}

foreach (scandir(K_WEB_ROOT . "/guide_content/") as $p) {
    if (str_ends_with($p, '.md')) {
        $pn = pathinfo($p)['filename'];
        echo "https://xenia.kate.pet/guide/" . $pn . "\n";
    }
}