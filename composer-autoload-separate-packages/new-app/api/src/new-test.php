<?php declare(strict_types=1);

use Acme\NewApp\SharedCode\Utils;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$utils = new Utils('composer-autoload-separate-packages shared utils from new app');

echo $utils->output, PHP_EOL;