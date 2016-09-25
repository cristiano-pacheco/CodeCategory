<?php

require __DIR__ . '/../vendor/autoload.php';

$loader = new Composer\Autoload\ClassLoader();

$loader->addPsr4('CodePress\\CodePost\\', __DIR__. '/../../codepost/src/CodePost');

$loader->register();