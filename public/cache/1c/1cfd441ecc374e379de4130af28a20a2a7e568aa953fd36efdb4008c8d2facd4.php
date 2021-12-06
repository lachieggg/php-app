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
class __TwigTemplate_0592b09b4578b36b3892c53a9362acb42a65ce54270533201636e469805c922f extends Template
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
<html>
\t<meta charset='utf8'>
\t</meta>

\t<head>
\t\t<link rel='stylesheet' type='text/css' href='css/app.css'/>
\t</head>
\t<script type=\"module\" src=\"./js/main.js\"></script>
\t<body class='index-body'>
\t\t<b>Welcome to my corner of the Internet.</b>
\t\t<br>
\t\t<hr>

\t\tThis is a place to express and integrate knowledge across different subjects that are interesting to me.
\t\t<br>
\t\t<br>
\t\t<br>

\t\t<img id='home-img'/>

\t\t<br>
\t\t<br>
\t\t<br>

\t</body>
</html>


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
        return array (  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "home/home.twig", "/var/www/resources/views/home/home.twig");
    }
}
