<?php

use Zend\Code\Generator\ClassGenerator;
use Zend\Code\Generator\DocBlockGenerator;
use Zend\Code\Generator\MethodGenerator;
use Zend\Code\Generator\ParameterGenerator;
use Zend\Code\Generator\BodyGenerator;
use App\Blocks\ClassHelper;

require './vendor/autoload.php';

$foo = ClassHelper::createClass('Foo');

ClassHelper::createGetter('name', 'string', $foo);
ClassHelper::createGetter('buffer', 'string', $foo);

echo $foo->generate();
