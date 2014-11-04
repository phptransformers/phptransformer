<?php

namespace RobLoach\Consolidate\tests;

class EngineTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider engineProvider
     */
    public function testRender($name, $className)
    {
        $class = 'RobLoach\\Consolidate\\' . $className;
        $engine = new $class();
        $template = file_get_contents(__DIR__ . '/Fixtures/' . $className . '.' . $name);
        $options = array(
            'name' => 'Linus',
        );
        $actual = $engine->render($template, $options);
        $this->assertEquals('Hello, Linus!', $actual);
    }

    /**
     * @dataProvider engineProvider
     */
    public function testGetName($name, $className)
    {
        $class = 'RobLoach\\Consolidate\\' . $className;
        $engine = new $class();
        $this->assertEquals($name, $engine->getName());
    }

    public function engineProvider()
    {
        $tests[] = array('smarty', 'SmartyEngine');
        $tests[] = array('twig', 'TwigEngine');

        return $tests;
    }
}
