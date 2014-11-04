<?php

namespace RobLoach\Consolidate;

use Twig_Loader_Array;
use Twig_Environment;

class TwigEngine implements EngineInterface
{
    protected $twig;
    protected $loader;

    /**
     * Build the Twig engine.
     *
     * @param array $options
     */
    public function __construct($twig = null, $loader = null, array $options = array())
    {
        $this->loader = $loader ?: new Twig_Loader_Array(array());
        $this->twig = $twig ?: new Twig_Environment($this->loader, $options);
    }

    public function getName()
    {
        return 'twig';
    }

    public function render($template, array $options = array())
    {
        $name = md5($template);
        if (!$this->loader->exists($name)) {
            $this->loader->setTemplate($name, $template);
        }
        $template = $this->twig->loadTemplate($name);

        return trim($template->render($options));
    }
}
