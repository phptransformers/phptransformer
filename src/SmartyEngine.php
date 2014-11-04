<?php

namespace RobLoach\Consolidate;

use Smarty;

/**
 * Symfony Templating Engine.
 */
class SmartyEngine implements EngineInterface
{
    /**
     * The Smarty template engine instance.
     */
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

    /**
     * Renders a template.
     *
     * @param string $name       A template name or a TemplateReferenceInterface instance
     * @param array  $parameters An array of parameters to pass to the template
     *
     * @return string The evaluated template as a string
     *
     * @api
     */
    public function render($template, array $parameters = array())
    {
        foreach ($parameters as $key => $value) {
            $this->smarty->assign($key, $value);
        }

        // Render the template using Smarty.
        $output = $this->smarty->fetch('string:' . $template);

        return trim($output);
    }
}
