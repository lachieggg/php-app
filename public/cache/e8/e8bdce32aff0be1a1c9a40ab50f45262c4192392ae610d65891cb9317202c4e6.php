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

/* templates/partials/navigation.twig */
class __TwigTemplate_7f9551a4e3a381723e6ef7891b6c6ef4758dc9f739fb5e92fba308f986f6effa extends Template
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
        echo "<nav class=\"navbar navbar-inverse navbar-fixed-top\">
    <div class=\"container\">
        <div class=\"navbar-header\">
            <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#navbar\" aria-expanded=\"false\" aria-controls=\"navbar\">
                <span class=\"sr-only\">Toggle navigation</span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
            </button>
            <a class=\"navbar-brand\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("home"), "html", null, true);
        echo "\">lachiegrant.io</a>
        </div>
        <div id=\"navbar\" class=\"collapse navbar-collapse\">
            <ul class=\"nav navbar-nav\">
                <li><a href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("blog"), "html", null, true);
        echo "\">Blog</a></li>
                <li><a href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("contact"), "html", null, true);
        echo "\">Contact</a></li>
                <li><a href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("home.thinkers"), "html", null, true);
        echo "\">Thinkers</a></li>
                <li><a href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("home.gallery"), "html", null, true);
        echo "\">Gallery</a></li>
                <li><a href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("home.github"), "html", null, true);
        echo "\" target=\"_blank\">GitHub</a></li>

                ";
        // line 20
        if (twig_get_attribute($this->env, $this->source, ($context["auth"] ?? null), "check", [], "any", false, false, false, 20)) {
            // line 21
            echo "                    <li><a href=\"";
            echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("blog.admin"), "html", null, true);
            echo "\"><b>Blog Admin</b></a></li>
                    <li><a href=\"";
            // line 22
            echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("gallery.admin"), "html", null, true);
            echo "\"><b>Gallery Admin</b></a></li>
                ";
        }
        // line 24
        echo "
            </ul>

            <ul class=\"nav navbar-nav navbar-right\">
                ";
        // line 28
        if (twig_get_attribute($this->env, $this->source, ($context["auth"] ?? null), "check", [], "any", false, false, false, 28)) {
            // line 29
            echo "                    <li class=\"dropdown\">
                        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">";
            // line 30
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["auth"] ?? null), "user", [], "any", false, false, false, 30), "name", [], "any", false, false, false, 30), "html", null, true);
            echo " <span class=\"caret\"></span></a>
                        <ul class=\"dropdown-menu\">
                            <!--
                            <li><a href=\"";
            // line 33
            echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("auth.password.change"), "html", null, true);
            echo "\">Change password</a></li>
                            -->
                            <li><a href=\"";
            // line 35
            echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("auth.sign-out"), "html", null, true);
            echo "\">Sign out</a></li>
                        </ul>
                    </li>
                ";
        } else {
            // line 39
            echo "                    <li><a href=\"";
            echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("auth.sign-up"), "html", null, true);
            echo "\">Sign up</a></li>
                    <li><a href=\"";
            // line 40
            echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("auth.sign-in"), "html", null, true);
            echo "\">Sign in</a></li>
                ";
        }
        // line 42
        echo "            </ul>

        </div>
    </div>
</nav>
";
    }

    public function getTemplateName()
    {
        return "templates/partials/navigation.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  127 => 42,  122 => 40,  117 => 39,  110 => 35,  105 => 33,  99 => 30,  96 => 29,  94 => 28,  88 => 24,  83 => 22,  78 => 21,  76 => 20,  71 => 18,  67 => 17,  63 => 16,  59 => 15,  55 => 14,  48 => 10,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "templates/partials/navigation.twig", "/var/www/resources/views/templates/partials/navigation.twig");
    }
}
