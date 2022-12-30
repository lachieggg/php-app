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

/* home/home.twig */
class __TwigTemplate_4d487b41a498d3bc4c14fe5c49c321e13b95d41b8ff6d035943fbb789be4fe44 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "templates/app.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("templates/app.twig", "home/home.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "

<head>
\t<title>Lachlan Grant</title>
\t<link rel=\"stylesheet\" href=\"css/tiny-slider.css\">
</head>

<body class='index-body'>

\t";
        // line 13
        if (($context["sliderMode"] ?? null)) {
            // line 14
            echo "
\t<div class=\"my-slider\">
\t\t<div><img src='images/nebula.jpg' id=\"slider1\" class=\"my-slider-images\"/></div>
\t\t<div><img id=\"slider2\" class=\"my-slider-images\"/></div>
\t\t<div><img id=\"slider3\" class=\"my-slider-images\"/></div>
\t\t<div><img id=\"slider4\" class=\"my-slider-images\"/></div>
\t\t<div><img id=\"slider5\" class=\"my-slider-images\"/></div>
\t\t<div><img id=\"slider6\" class=\"my-slider-images\"/></div>
\t</div>

\t";
        } else {
            // line 25
            echo "
\t<div>
\t\t<img class='my-slider-images' id='home-img'/>
\t</div>

\t";
        }
        // line 31
        echo "
\t<br>
\t<br>
\t<br>

\t<script type=\"module\" src=\"js/generated/home.js\"></script>

</body>

";
    }

    public function getTemplateName()
    {
        return "home/home.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 31,  76 => 25,  63 => 14,  61 => 13,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "home/home.twig", "/var/www/resources/views/home/home.twig");
    }
}
