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

/* auth/private.twig */
class __TwigTemplate_30ea559822bc18d7a477b0821b57ab9facc9913858cf5e31aaf3da76dd3b731d extends Template
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
        $this->parent = $this->loadTemplate("templates/app.twig", "auth/private.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "
<head>
\t<link rel='stylesheet' type='text/css' href='css/app.css'/>
</head>
<body class='index-body'>
\t<script src =\"./jquery/jquery.min.js\"></script>
\t<script type=\"module\" src=\"./js/main.js\"></script>
\t\t<b>Welcome to my corner of the Internet.</b>
\t\t<hr>
\t\tThis page is currently in development or marked as private.
\t\t<br>
\t\t<br>
\t\t<br>

\t\t<img id='home-img'/>

\t\t<br>
\t\t<br>
\t\t<br>

</body>

";
    }

    public function getTemplateName()
    {
        return "auth/private.twig";
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
        return new Source("", "auth/private.twig", "/var/www/resources/views/auth/private.twig");
    }
}
