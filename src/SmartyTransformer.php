<?php

namespace PhpTransformers\PhpTransformer;

use Smarty;

/**
 * Symfony Templating Engine.
 */
class SmartyTransformer extends Transformer
{
    protected $smarty;

    /**
     * Build the Smarty engine.
     *
     * @param array $options An array of parameters used to set up the Smarty
     *                       configuration. Available configuration values include:
     *                       - cache_dir
     *                       - compile_dir
     *                       - config_dir
     *                       - plugins_dir
     *                       - template_dir
     */
    public function __construct(array $options = array())
    {
        // Create the Smarty template engine.
        $this->smarty = new Smarty();

        // Set any of the required configuration.
        if (isset($options['cache_dir'])) {
            $this->smarty->setCacheDir($options['cache_dir']);
        }
        if (isset($options['compile_dir'])) {
            $this->smarty->setCompileDir($options['compile_dir']);
        }
        if (isset($options['config_dir'])) {
            $this->smarty->setConfigDir($options['config_dir']);
        }
        if (isset($options['plugins_dir'])) {
            $this->smarty->setPluginsDir($options['plugins_dir']);
        }
        if (isset($options['template_dir'])) {
            $this->smarty->setTemplateDir($options['template_dir']);
        }
    }

    public function getName()
    {
        return 'smarty';
    }

    public function renderFile($file, array $locals = array())
    {
        return $this->fetch($file, $locals, false);
    }

    public function render($template, array $locals = array())
    {
        return $this->fetch($template, $locals, true);
    }

    protected function fetch($template, array $locals = array(), $string = false)
    {
        foreach ($locals as $key => $value) {
            $this->smarty->assign($key, $value);
        }

        // Render the template using Smarty.
        $output = $this->smarty->fetch(($string ? 'string:' : '') . $template);

        return trim($output);
    }
}
