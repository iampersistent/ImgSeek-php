<?php

$loader = @include __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/fixtures/CurlTestClient.php';
require_once __DIR__ . '/fixtures/ImgSeekTestGateway.php';
require_once __DIR__ . '/fixtures/PersistenceTestGateway.php';

if (!$loader) {
    die(<<<'EOT'
You must set up the project dependencies, run the following commands:
wget http://getcomposer.org/composer.phar
php composer.phar install
EOT
    );
}