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

/* home/gallery.twig */
class __TwigTemplate_78f2635810c75a89d38c8c5e4f4026c32b191051892766149b6affd69eaab70f extends Template
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
        $this->parent = $this->loadTemplate("templates/app.twig", "home/gallery.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "
<head>
\t<title>Contact</title>
\t<link rel='stylesheet' type='text/css' href='css/app.css'/>
\t<script type=\"module\" src=\"./js/gallery.js\"></script>
</head>

<body class='index-body'>
\t<div>
\t\t<b>Welcome to my corner of the Internet.</b>
        <hr>

        <br>
        <br>
\t</div>
</body>


";
    }

    public function getTemplateName()
    {
        return "home/gallery.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "home/gallery.twig", "/var/www/resources/views/home/gallery.twig");
    }
}
