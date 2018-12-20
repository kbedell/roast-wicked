#!/bin/bash
set -xe

XDEBUG_FILE=/usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

pecl install -f xdebug
docker-php-ext-enable xdebug

echo "xdebug.remote_host=$(getent hosts docker.for.mac.localhost | awk '{ print $1 }')" >> ${XDEBUG_FILE}
echo "xdebug.remote_port=9001" >> ${XDEBUG_FILE}
echo "xdebug.remote_connect_back=0" >> ${XDEBUG_FILE}
echo "xdebug.default_enable=1" >> ${XDEBUG_FILE}
echo "xdebug.remote_enable=1" >> ${XDEBUG_FILE}
echo "xdebug.remote_autostart=1" >> ${XDEBUG_FILE}
echo "xdebug.remote_handler=dbgp" >> ${XDEBUG_FILE}
# This is very helpful when something fails and you need a clue to start looking...
echo "xdebug.remote_log=\"/tmp/xdebug.log\"" >> ${XDEBUG_FILE}