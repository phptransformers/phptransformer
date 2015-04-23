<?php

namespace PhpTransformers\PhpTransformer\Test;

class TransformerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider engineProvider
     */
    public function testRenderFile($name, $className)
    {
        $class = 'PhpTransformers\\PhpTransformer\\' . $className;
        $engine = new $class();
        $template = "tests/Fixtures/$className.$name";
        $locals = array(
            'name' => 'Linus',
        );
        $actual = $engine->renderFile($template, $locals);
        $this->assertEquals('Hello, Linus!', $actual);
    }

    /**
     * @dataProvider engineProvider
     */
    public function testRender($name, $className)
    {
        $class = 'PhpTransformers\\PhpTransformer\\' . $className;
        $engine = new $class();
        $template = file_get_contents("tests/Fixtures/$className.$name");
        $locals = array(
            'name' => 'Linus',
        );
        $actual = $engine->render($template, $locals);
        $this->assertEquals('Hello, Linus!', $actual);
    }

    /**
     * @dataProvider engineProvider
     */
    public function testGetName($name, $className)
    {
        $class = 'PhpTransformers\\PhpTransformer\\' . $className;
        $engine = new $class();
        $this->assertEquals($name, $engine->getName());
    }

    public function engineProvider()
    {
        $tests[] = array('smarty', 'SmartyTransformer');
        $tests[] = array('twig', 'TwigTransformer');

        return $tests;
    }
}
