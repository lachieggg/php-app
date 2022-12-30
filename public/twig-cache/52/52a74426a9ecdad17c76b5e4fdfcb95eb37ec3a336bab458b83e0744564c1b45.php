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
class __TwigTemplate_906fa1f139eede3eb1b433e9523b98cf42974e68ed6fe7766d7011639b1665c6 extends Template
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
        </div>
        <div id=\"navbar\" class=\"collapse navbar-collapse\">
            <ul class=\"nav navbar-nav navigation-bar\">
                <li><a href=\"";
        // line 13
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "router", [], "any", false, false, false, 13), "path_for", [0 => "home"], "method", false, false, false, 13), "html", null, true);
        echo "\">Home</a></li>
                <li><a href=\"";
        // line 14
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "router", [], "any", false, false, false, 14), "path_for", [0 => "contact"], "method", false, false, false, 14), "html", null, true);
        echo "\">Contact</a></li>
                <li><a href=\"";
        // line 15
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "router", [], "any", false, false, false, 15), "path_for", [0 => "home.people"], "method", false, false, false, 15), "html", null, true);
        echo "\">People</a></li>
                <li><a href=\"";
        // line 16
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "router", [], "any", false, false, false, 16), "path_for", [0 => "home.consulting"], "method", false, false, false, 16), "html", null, true);
        echo "\">Consulting</a></li>
                <li><a href=\"";
        // line 17
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "router", [], "any", false, false, false, 17), "path_for", [0 => "home.blog"], "method", false, false, false, 17), "html", null, true);
        echo "\">Blog</a></li>
                <li><a href=\"";
        // line 18
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "router", [], "any", false, false, false, 18), "path_for", [0 => "home.github"], "method", false, false, false, 18), "html", null, true);
        echo "\" target=\"_blank\">GitHub</a></li>
                <li><a href=\"";
        // line 19
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "router", [], "any", false, false, false, 19), "path_for", [0 => "home.resume"], "method", false, false, false, 19), "html", null, true);
        echo "\" target=\"_blank\">CV</a></li>

                ";
        // line 21
        if (twig_get_attribute($this->env, $this->source, ($context["auth"] ?? null), "admin", [], "any", false, false, false, 21)) {
            // line 22
            echo "                    <li><a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "router", [], "any", false, false, false, 22), "path_for", [0 => "blog"], "method", false, false, false, 22), "html", null, true);
            echo "\">Blog</a></li>
                    <li><a href=\"";
            // line 23
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "router", [], "any", false, false, false, 23), "path_for", [0 => "home.gallery"], "method", false, false, false, 23), "html", null, true);
            echo "\">Gallery</a></li>
                    <li><a href=\"";
            // line 24
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "router", [], "any", false, false, false, 24), "path_for", [0 => "blog.admin"], "method", false, false, false, 24), "html", null, true);
            echo "\"> Blog Admin </a></li>
                    <li><a href=\"";
            // line 25
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "router", [], "any", false, false, false, 25), "path_for", [0 => "gallery.admin"], "method", false, false, false, 25), "html", null, true);
            echo "\"> Gallery Admin </a></li>
                ";
        }
        // line 27
        echo "
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
                            <li><a href=\"";
            // line 32
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "router", [], "any", false, false, false, 32), "path_for", [0 => "auth.sign-out"], "method", false, false, false, 32), "html", null, true);
            echo "\">Sign out</a></li>
                        </ul>
                    </li>
                ";
        } else {
            // line 36
            echo "                    <li><a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "router", [], "any", false, false, false, 36), "path_for", [0 => "auth.sign-in"], "method", false, false, false, 36), "html", null, true);
            echo "\">Login</a></li>
                ";
        }
        // line 38
        echo "
            </ul>

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
        return array (  126 => 38,  120 => 36,  113 => 32,  108 => 30,  105 => 29,  103 => 28,  100 => 27,  95 => 25,  91 => 24,  87 => 23,  82 => 22,  80 => 21,  75 => 19,  71 => 18,  67 => 17,  63 => 16,  59 => 15,  55 => 14,  51 => 13,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "templates/partials/navigation.twig", "/var/www/resources/views/templates/partials/navigation.twig");
    }
}
