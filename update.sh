#!/bin/bash
cd /var/www/xenia.kate.pet
git pull
/usr/bin/cp nginx.conf /etc/nginx/conf.d/xenia.kate.pet.conf
systemctl reload nginx