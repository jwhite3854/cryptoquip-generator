<?php

spl_autoload_register(function ($class_name) {
    include  __DIR__ . '/../src/' . $class_name . '.php';
});

$meta_title = 'Cheezoid::Crypto';
$meta_canonical_url = '';
$meta_site_name = 'Cheezoid::Crypto';

$view_file = 'app/views/index.php';

$javascripts = '';