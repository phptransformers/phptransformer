<?php

namespace PhpTransformers\PhpTransformer;

interface TransformerInterface
{
    public function __construct(array $options = array());
    public function getName();
    public function renderFile($file, array $locals = array());
    public function render($template, array $options = array());
}
