<?php

namespace PhpTransformers\PhpTransformer\Test;

use PhpTransformers\PhpTransformer\TransformerInterface;

/**
 * Generic Unit test for PhpTransformer and transformers
 */
class TransformerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test of the function ->renderFile
     *
     * @dataProvider engineProvider
     * @param string $name Transformer short name / identifier
     * @param string $className The transformer class name
     * @param string $fqcn The transformer Full Qualifier Class Name
     */
    public function testRenderFile($name, $className, $fqcn)
    {
        if ($name === 'dwoo' && extension_loaded('apc') && ini_get('apc.enabled') && !function_exists('apc_delete_file')) {
            self::markTestSkipped('The function "apc_delete_file" is required by Dwoo');
        }

        $class = $fqcn;

        if (!class_exists($class)) {
            self::markTestSkipped('Renderer "'.$className.'" not installed');
        }

        /** @var TransformerInterface $engine */
        $engine = new $class();
        $template = __DIR__."/Fixtures/$className.$name";
        $locals = array(
            'name' => 'Linus',
        );
        $actual = $engine->renderFile($template, $locals);
        self::assertEquals('Hello, Linus!', $actual);
    }

    /**
     * Test of the function ->render
     *
     * @dataProvider engineProvider
     * @param string $name Transformer short name / identifier
     * @param string $className The transformer class name
     * @param string $fqcn The transformer Full Qualifier Class Name
     */
    public function testRender($name, $className, $fqcn)
    {
        if ($name === 'dwoo' && extension_loaded('apc') && ini_get('apc.enabled') && !function_exists('apc_delete_file')) {
            self::markTestSkipped('The function "apc_delete_file" is required by Dwoo');
        }

        $class = $fqcn;

        if (!class_exists($class)) {
            self::markTestSkipped('Renderer "'.$className.'" not installed');
        }

        /** @var TransformerInterface $engine */
        $engine = new $class();
        $template = file_get_contents(__DIR__."/Fixtures/$className.$name");
        $locals = array(
            'name' => 'Linus',
        );
        $actual = $engine->render($template, $locals);
        self::assertEquals('Hello, Linus!', $actual);
    }

    /**
     * Test of the function ->getName
     *
     * @dataProvider engineProvider
     * @param string $name Transformer short name / identifier
     * @param string $className The transformer class name
     * @param string $fqcn The transformer Full Qualifier Class Name
     */
    public function testGetName($name, $className, $fqcn)
    {
        $class = $fqcn;

        if (!class_exists($class)) {
            self::markTestSkipped('Renderer "'.$className.'" not installed');
        }

        /** @var TransformerInterface $engine */
        $engine = new $class();
        self::assertEquals($name, $engine->getName());
    }

    /**
     * The main data provider of the unit test.
     * Return an array with the short name / identifier, the class name and the FQCN of multiple transformers
     *
     * @return array
     */
    public function engineProvider()
    {
        $engines = array();

        $engines[] = array('test', 'StrReplaceTransformer', 'PhpTransformers\\PhpTransformer\\Test\\Fixtures\\StrReplaceTransformer');
        $engines[] = array('smarty', 'SmartyTransformer', 'PhpTransformers\\Smarty\\SmartyTransformer');
        $engines[] = array('twig', 'TwigTransformer', 'PhpTransformers\\Twig\\TwigTransformer');
        $engines[] = array('latte', 'LatteTransformer', 'PhpTransformers\\Latte\\LatteTransformer');
        $engines[] = array('plates', 'PlatesTransformer', 'PhpTransformers\\Plates\\PlatesTransformer');
        $engines[] = array('blade', 'BladeTransformer', 'PhpTransformers\\Blade\\BladeTransformer');
        $engines[] = array('string-template', 'StringTemplateTransformer', 'PhpTransformers\\StringTemplate\\StringTemplateTransformer');
        $engines[] = array('text-template', 'TextTemplateTransformer', 'PhpTransformers\\TextTemplate\\TextTemplateTransformer');
        $engines[] = array('mustache', 'MustacheTransformer', 'PhpTransformers\\Mustache\\MustacheTransformer');
        $engines[] = array('phptal', 'PHPTALTransformer', 'PhpTransformers\\PHPTAL\\PHPTALTransformer');
        $engines[] = array('dwoo', 'DwooTransformer', 'PhpTransformers\\Dwoo\\DwooTransformer');

        return $engines;
    }
}
