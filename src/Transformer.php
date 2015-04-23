<?php

namespace PhpTransformers\PhpTransformer;

abstract class Transformer implements TransformerInterface
{
    protected $options = array();

    public function __construct(array $options = array())
    {
        $this->options = $options;
    }

    public function getName()
    {
        return strtolower(get_class($this));
    }

    public function renderFile($file, array $locals = array())
    {
        $template = file_get_contents($file);
        return $this->render($template, $locals);
    }

    public function render($template, array $options = array())
    {
        throw new \BadFunctionCallException($this->getName() . ' missing render() implementation.');
    }
}
