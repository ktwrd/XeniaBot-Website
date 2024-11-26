<!DOCTYPE html>
<html data-bs-theme="dark">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="{$description|default: "Another Open-Source Discord Bot"}" />
        <meta name="name" content="{$title|default: "Xenia Bot"}" />
        <meta name="theme-color" content="{$metaColor|default:"#000000"}" />
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:title" content="{$title|default:"Xenia Bot"}" />
        <meta property="og:title" content="{$title|default:"Xenia Bot"}" />
        <meta property="og:description" content="{$description|default: "Another Open-Source Discord Bot"}" />
        <meta property="og:type" content="website" />

        {if isset($_META)}
            {if isset($_META['image'])}
                <meta property="og:image" content="{$_META['image']}" />
            {/if}
        {/if}

        <link rel="icon" href="/favicon.png" type="image/png" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="/css/index.css" />
        <title>{$title|default: "Xenia Bot"}</title>
    </head>
    <body>
        <main>
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand active ps-3" href="/">Xenia</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                {if $pageName == "home"}
                                    <a class="nav-link active" href="/">Home</a>
                                {else}
                                    <a class="nav-link" href="/">Home</a>
                                {/if}
                            </li>
                            <li class="nav-item">
                                {if $pageName == "blog"}
                                    <a class="nav-link active" href="/p/blog">Blog</a>
                                {else}
                                    <a class="nav-link" href="/p/blog">Blog</a>
                                {/if}
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://xb.kate.pet">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                {if $pageName == "guide"}
                                    <a class="nav-link active" href="/p/guide">Guide</a>
                                {else}
                                    <a class="nav-link" href="/p/guide">Guide</a>
                                {/if}
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://github.com/ktwrd/xeniabot">GitHub</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            {if !isset($container) || $container == True}
            <div class="container" style="padding-top: 1rem; padding-bottom: 2rem;">
            {else}
            <div>
            {/if}