<?php

use Zend\Code\Generator\ClassGenerator;
use Zend\Code\Generator\DocBlockGenerator;

require './vendor/autoload.php';

$foo = new ClassGenerator();

$docblock = new DocBlockGenerator(
    'Sample generated class',
    'This is a class generated with Zend\Code\Generator.',
    [
        [
            'name'        => 'version',
            'description' => '$Rev:$',
        ],
        [
            'name'        => 'license',
            'description' => 'New BSD',
        ],
    ]
);

$foo->setName('Foo')
    ->setDocblock($docblock);

echo $foo->generate();
