<?php

namespace App\Blocks;

use Zend\Code\Generator\MethodGenerator;
use Zend\Code\Generator\ParameterGenerator;
use Zend\Code\Generator\ClassGenerator;
use Zend\Code\Generator\PropertyGenerator;
use Zend\Code\Generator\DocBlockGenerator;

class ClassHelper
{
    public static function propertyGenerator(string $name, string $type, ClassGenerator $class): void
    {
        $docblock = new DocBlockGenerator(
            '',
            '',
            [
                [
                    'name'        => 'var',
                    'description' => $type,
                ],
            ]
        );
        $property = new PropertyGenerator($name, null, PropertyGenerator::FLAG_PRIVATE);
        $property->setDocBlock($docblock);
        $property->omitDefaultValue();

        $class->addPropertyFromGenerator($property);
    }

    public static function createClass(string $className)
    {
        // $docblock = new DocBlockGenerator(
        //     'Sample generated class',
        //     'This is a class generated with Zend\Code\Generator.',
        //     [
        //         [
        //             'name'        => 'version',
        //             'description' => '$Rev:$',
        //         ],
        //         [
        //             'name'        => 'license',
        //             'description' => 'New BSD',
        //         ],
        //     ]
        // );
        $class = new ClassGenerator($className);

        return $class;
    }

    public static function createGetter(string $name, string $type, ClassGenerator $class): void
    {
        self::propertyGenerator($name, $type, $class);

        $body = sprintf("return \$this->%s;\n", $name);

        $method = new MethodGenerator(
            sprintf('get%s', ucwords($name)),
            [],
            MethodGenerator::FLAG_PRIVATE
        );
        $method->setBody($body);

        $class->addMethodFromGenerator($method);
    }

    public static function createSetter(string $name, string $type, ClassGenerator $class): void
    {
        $body = sprintf("return \$this->%s;\n", $name);

        $method = new MethodGenerator(
            'getTest',
            [$param = new ParameterGenerator($name, $type)],
            MethodGenerator::FLAG_PRIVATE
        );
        $method->setBody($body);
        
        $class->addMethodFromGenerator($method);
    }
}
