# Xenia Bot Website

Landing page for [Xenia Bot](https://github.com/ktwrd/XeniaBot)

## Setup development environment
For a development environment you must have the following installed
- nginx
- PHP 8.x
    - php-fpm
    - composer ([see](https://getcomposer.org/download/))

Make sure that you run `composer install` in the `web` folder.

## Deploying changes
To deploy your changes, use the `update.sh` script. This assumes that the production environment is cloned in `/var/www/xenia.kate.pet/`.

The script will do the following
- Pull in `/var/www/xenia.kate.pet`
- Copy `nginx.conf` to `/etc/nginx/conf.d/xenia.kate.pet.conf`
- Reload nginx

## Importing nginx conf from devenv
If you wish to update `nginx.conf` from your local beta/dev env, then run the `pull-conf.py` script.

It assumes the following;
- Your beta config is at `/etc/nginx/conf.d/xenia-beta.kate.pet.conf`
- Your beta domain is `xenia-beta.kate.pet`
- Your prod domain is `xenia.kate.pet`

## Creating blog posts
If you wish to create a blog post, use the `create_blog_post.py` script. It will ask you the following

- Post Id
    - Filename/Id of the post, it will be at `/blog/<id>` where `id` is what you provided.
- Subject (Title) of the blog post
- Hide state
    - `0` to show to public, `1` to disable, `2` to not show in list.
- Timestamp
    - When the post was created at, will default to the current timestamp
- Author name (optional)
    - Display name of the author, doesn't really matter
- Author email (optional)
    - Email address of the author
- Author website (optional)
- Tags (optional, comma seperated)