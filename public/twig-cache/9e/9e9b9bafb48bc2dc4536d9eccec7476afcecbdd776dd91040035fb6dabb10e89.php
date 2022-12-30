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

/* templates/app.twig */
class __TwigTemplate_23af0d442ae01c50aab84d485fe914d22a361be152dfe864e7bd669de4e8dcac extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
    <head>
        <meta charset=\"UTF-8\">

        <link rel=\"stylesheet\" href=\"css/app.css\">

        <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.css\" 
            integrity=\"sha512-HdXbv8lyOND1Ueuy0orIopVhFwlzWycyfSG9YvFR88TgiiMUkSmh/tezmCjv36wtzTJk3QK3hnBiVt6BJBnqUQ==\" 
            crossorigin=\"anonymous\" referrerpolicy=\"no-referrer\" />
    </head>
    <body>

        ";
        // line 14
        $this->loadTemplate("templates/partials/navigation.twig", "templates/app.twig", 14)->display($context);
        // line 15
        echo "        
        <div class=\"container\">
            ";
        // line 17
        $this->loadTemplate("templates/partials/flash.twig", "templates/app.twig", 17)->display($context);
        // line 18
        echo "            ";
        $this->displayBlock('content', $context, $blocks);
        // line 20
        echo "        </div>

        <script type=\"module\" src=\"js/generated/home.js\"></script>

        <script src=\"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js\" 
            integrity=\"sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==\" 
            crossorigin=\"anonymous\">
        </script>  

        <script src=\"https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.min.js\" 
            integrity=\"sha512-UR25UO94eTnCVwjbXozyeVd6ZqpaAE9naiEUBK/A+QDbfSTQFhPGj5lOR6d8tsgbBk84Ggb5A3EkjsOgPRPcKA==\" 
            crossorigin=\"anonymous\" referrerpolicy=\"no-referrer\">
        </script>
    </body>
</html>
";
    }

    // line 18
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 19
        echo "            ";
    }

    public function getTemplateName()
    {
        return "templates/app.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  87 => 19,  83 => 18,  64 => 20,  61 => 18,  59 => 17,  55 => 15,  53 => 14,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "templates/app.twig", "/var/www/resources/views/templates/app.twig");
    }
}
