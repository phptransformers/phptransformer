<?php

namespace PhpTransformers\PhpTransformer\Test\Fixtures;


use PhpTransformers\PhpTransformer\Transformer;

class StrReplaceTransformer extends Transformer
{
    public function render($template, array $options = array())
    {
        uksort($options, function($a, $b) {
            return strlen($a) - strlen($b);
        });

        return trim(str_replace(array_keys($options), array_values($options), $template));
    }

    public function getName()
    {
        return 'test';
    }


}