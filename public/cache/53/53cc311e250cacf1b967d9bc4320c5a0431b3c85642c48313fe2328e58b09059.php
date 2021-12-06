<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* templates/partials/flash.twig */
class __TwigTemplate_8513871d83c0cd76798b37a3e80879770a8b4c4b33a2c5fcb3b15d157e10279d extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        if (twig_get_attribute($this->env, $this->source, ($context["flash"] ?? null), "getMessage", [0 => "info"], "method", false, false, false, 1)) {
            // line 2
            echo "    <div class=\"alert alert-info\">
        ";
            // line 3
            echo twig_escape_filter($this->env, twig_first($this->env, twig_get_attribute($this->env, $this->source, ($context["flash"] ?? null), "getMessage", [0 => "info"], "method", false, false, false, 3)), "html", null, true);
            echo "
    </div>
";
        }
        // line 6
        echo "
";
        // line 7
        if (twig_get_attribute($this->env, $this->source, ($context["flash"] ?? null), "getMessage", [0 => "error"], "method", false, false, false, 7)) {
            // line 8
            echo "    <div class=\"alert alert-danger\">
        ";
            // line 9
            echo twig_escape_filter($this->env, twig_first($this->env, twig_get_attribute($this->env, $this->source, ($context["flash"] ?? null), "getMessage", [0 => "error"], "method", false, false, false, 9)), "html", null, true);
            echo "
    </div>
";
        }
    }

    public function getTemplateName()
    {
        return "templates/partials/flash.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 9,  53 => 8,  51 => 7,  48 => 6,  42 => 3,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "templates/partials/flash.twig", "/var/www/resources/views/templates/partials/flash.twig");
    }
}
