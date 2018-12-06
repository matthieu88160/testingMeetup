#! /bin/bash

apt-get update
apt-get install -y autoconf build-essential wget
wget http://xdebug.org/files/xdebug-2.6.1.tgz
tar -xvzf xdebug-2.6.1.tgz
cd xdebug-2.6.1
phpize
./configure
make
cp modules/xdebug.so /usr/local/lib/php/extensions/no-debug-non-zts-20170718
echo 'zend_extension = /usr/local/lib/php/extensions/no-debug-non-zts-20170718/xdebug.so' >> /usr/local/etc/php/php.ini
