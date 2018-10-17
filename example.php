<?php

use Zend\Code\Generator\ClassGenerator;
use Zend\Code\Generator\DocBlockGenerator;
use Zend\Code\Generator\MethodGenerator;
use Zend\Code\Generator\ParameterGenerator;

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

$param = new ParameterGenerator('test', 'string');


$method = new MethodGenerator(
    'test',
    [$param],
    MethodGenerator::FLAG_PRIVATE
);

$foo->setName('Foo')
    ->setDocblock($docblock)
    ->addMethodFromGenerator($method)
;

echo $foo->generate();
