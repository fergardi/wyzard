#!/bin/bash
#by @fergardi

while getopts "ubdisfcthrlpe" opt; do
    case $opt in
        u)
            echo "Composer install/selfupdate..."
            if [ ! -f ./composer.phar ];
            then
                curl -sS https://getcomposer.org/installer | php
            else
                php composer.phar selfupdate -v --profile
            fi
            echo "OK"
            echo "Composer install & update..."
            php composer.phar update -v --profile --optimize-autoloader
            echo "OK"
            ;;
        b)
            echo "Bower install & update..."
            bower update --allow-root
            echo "OK"
            ;;
        d)
            echo "Assetic dump..."
            php app/console assets-version:increment --env=prod
            php app/console assetic:dump --env=prod --no-debug --verbose
            echo "OK"
            ;;
        i)
            echo "Assets install..."
            php app/console assets:install web --symlink --verbose
            echo "OK"
            ;;
        s)
            echo "Schema drop y schema create..."
            php app/console doctrine:schema:drop --force
            php app/console doctrine:schema:create
            echo "OK"
            ;;
        f)
            echo "Fixtures load..."
            php app/console doctrine:fixtures:load --append
            echo "OK"
            ;;
        c)
            echo "Cache clear..."
            rm -rf cache/*
            php app/console cache:clear --env=dev --no-warmup
            php app/console cache:clear --env=prod
            echo "OK"
            ;;
        t)
            echo "PHPUnit tests..."
            phpunit -c app
            echo "OK"
            ;;
        e)
            echo "LetsEncrypt certificate generation/renewal..."
            echo "./letsencrypt-auto --agree-dev-preview --server https://acme-v01.api.letsencrypt.org/directory certonly -d wyzard.es -d www.wyzard.es -v"
            echo "letsencryt renew"
            echo "OK"
            ;;
        p)
            echo "Fixing permissions and ownerwhip of current directory recursively..."
            chmod -R g+w $(pwd)
            chown -R www-data:www-data $(pwd)
	        chown -R http:http $(pwd)
            chown -R Fernando:wheel $(pwd)
            echo "OK"
            ;;
        h)
            echo "Usage: ./script [-u][-b][-d][-i][-s][-f][-c][-t][-h][-r][-p][-e]"
            echo "Additional options:"
            echo -e "\t [-u] => composer install/self[u]pdate"
            echo -e "\t [-b] => [b]ower install & update"
            echo -e "\t [-d] => assetic:[d]ump"
            echo -e "\t [-i] => assets:[i]nstall"
            echo -e "\t [-s] => doctrine:[s]chema:drop & :create"
            echo -e "\t [-f] => doctrine:[f]ixtures:load"
            echo -e "\t [-c] => cache:[c]lear"
            echo -e "\t [-t] => phpunit [t]ests"
            echo -e "\t [-l] => [p]ermissions fix"
            echo -e "\t [-e] => lets[e]ncrypt pem and crt certificates"
            echo -e "\t [-h] => [h]elp"
            ;;
        *)
            echo "Invalid option. See correct usage with [-h]."
            ;;
    esac
done
