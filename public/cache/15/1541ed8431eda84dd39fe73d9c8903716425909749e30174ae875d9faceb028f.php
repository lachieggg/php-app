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

/* home/contact.twig */
class __TwigTemplate_aa9dea613c53393006bc0b13bb727027cfcbc0eba0da0684bd755d3a014efd63 extends Template
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
        $this->parent = $this->loadTemplate("templates/app.twig", "home/contact.twig", 1);
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
</head>

<body class='index-body'>
\t<div>
\t\t<b>Welcome to my corner of the Internet.</b>
\t\t<hr>
\t\tYou are welcome to contact me.
\t\t<br>
\t\t<br>
\t\tMy email address is <b><a href=\"mailto:grant.lachlan.j@gmail.com\">grant.lachlan.j@gmail.com</a></b>
\t\t<br>
\t\t<br>
\t\t<br>
\t</div>
</body>

";
    }

    public function getTemplateName()
    {
        return "home/contact.twig";
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
        return new Source("", "home/contact.twig", "/var/www/resources/views/home/contact.twig");
    }
}
