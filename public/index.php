<?php

include '../vendor/autoload.php';

$kirby = new Kirby([
    'roots' => [
        'index'    => __DIR__,
        'base'     => $base    = dirname(__DIR__),
        'content'  => $base . '/content',
        'site'     => $base . '/site',
        'storage'  => $storage = $base . '/storage',
        'accounts' => $storage . '/accounts',
        'license'  => $storage . '/.license',
        'logs'     => $storage . '/logs',
        'cache'    => $storage . '/cache',
        'media'    => $storage . '/media', // NOTE: needs symlink /public/media to /storage/media
        'sessions' => $storage . '/sessions',
    ]
]);

// create symlink if needed
$symlink = __DIR__ . '/media';
if (! file_exists($symlink)) {
    symlink($kirby->roots()->media(), $symlink);
}

echo $kirby->render();