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

/* auth/sign-up.twig */
class __TwigTemplate_dc2443e9bf938772b1a59c1d9cd0b44e40c7c6e1d670855715e5754a431a9a6a extends Template
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
        $this->parent = $this->loadTemplate("templates/app.twig", "auth/sign-up.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<body id='sign-in-body' class='index-body'>
    <br>
    <br>
\t<div id='login-welcome-div'>
      <img id='welcome-img' src=\"images/owl.jpg\"></img>
    </div>
    <br>
    <br>
    <div class=\"row\">
        <div class=\"col-md-6 col-md-offset-3\">
            <div class=\"panel panel-default\">
                <div class=\"panel-heading\">Sign up</div>
                <div class=\"panel-body\">
                    <form id='sign-up-form' action=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("auth.sign-up"), "html", null, true);
        echo "\" method=\"post\" autocomplete=\"off\">
                        <div class=\"form-group";
        // line 18
        echo ((twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "email", [], "any", false, false, false, 18)) ? (" has-error") : (""));
        echo "\">
                            <label for=\"email\">Email</label>
                            <input type=\"email\" name=\"email\" id=\"email\" placeholder=\"you@domain.com\" class=\"form-control\" value=\"";
        // line 20
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["old"] ?? null), "email", [], "any", false, false, false, 20), "html", null, true);
        echo "\">
                            ";
        // line 21
        if (twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "email", [], "any", false, false, false, 21)) {
            // line 22
            echo "                                <span class=\"help-block\">";
            echo twig_escape_filter($this->env, twig_first($this->env, twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "email", [], "any", false, false, false, 22)), "html", null, true);
            echo "</span>
                            ";
        }
        // line 24
        echo "                        </div>
                        <div class=\"form-group";
        // line 25
        echo ((twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "name", [], "any", false, false, false, 25)) ? (" has-error") : (""));
        echo "\">
                            <label for=\"first_name\">Name</label>
                            <input type=\"text\" name=\"name\" id=\"name\" class=\"form-control\" value=\"";
        // line 27
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["old"] ?? null), "name", [], "any", false, false, false, 27), "html", null, true);
        echo "\">
                            ";
        // line 28
        if (twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "name", [], "any", false, false, false, 28)) {
            // line 29
            echo "                                <span class=\"help-block\">";
            echo twig_escape_filter($this->env, twig_first($this->env, twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "name", [], "any", false, false, false, 29)), "html", null, true);
            echo "</span>
                            ";
        }
        // line 31
        echo "                        </div>
                        <div class=\"form-group";
        // line 32
        echo ((twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "password", [], "any", false, false, false, 32)) ? (" has-error") : (""));
        echo "\">
                            <label for=\"password\">Password</label>
                            <input type=\"password\" name=\"password\" id=\"password\" class=\"form-control\">
                            ";
        // line 35
        if (twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "password", [], "any", false, false, false, 35)) {
            // line 36
            echo "                                <span class=\"help-block\">";
            echo twig_escape_filter($this->env, twig_first($this->env, twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "password", [], "any", false, false, false, 36)), "html", null, true);
            echo "</span>
                            ";
        }
        // line 38
        echo "                        </div>
                        <div class=\"form-group";
        // line 39
        echo ((twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "password", [], "any", false, false, false, 39)) ? (" has-error") : (""));
        echo "\">
                            <label for=\"password\">Re-enter password</label>
                            <input type=\"password\" name=\"password_confirmation\" id=\"password_confirmation\" class=\"form-control\">
                            ";
        // line 42
        if (twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "password_confirmation", [], "any", false, false, false, 42)) {
            // line 43
            echo "                                <span class=\"help-block\">";
            echo twig_escape_filter($this->env, twig_first($this->env, twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "password_confirmation", [], "any", false, false, false, 43)), "html", null, true);
            echo "</span>
                            ";
        }
        // line 45
        echo "                        </div>
                        <button type=\"submit\" class=\"btn btn-default\">Sign up</button>

                        ";
        // line 48
        echo twig_get_attribute($this->env, $this->source, ($context["csrf"] ?? null), "field", [], "any", false, false, false, 48);
        echo "
                    </form>
                </div>
            </div>
\t\t\t<br>
            
            <br>
        </div>
    </div>
</body>
";
    }

    public function getTemplateName()
    {
        return "auth/sign-up.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  145 => 48,  140 => 45,  134 => 43,  132 => 42,  126 => 39,  123 => 38,  117 => 36,  115 => 35,  109 => 32,  106 => 31,  100 => 29,  98 => 28,  94 => 27,  89 => 25,  86 => 24,  80 => 22,  78 => 21,  74 => 20,  69 => 18,  65 => 17,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "auth/sign-up.twig", "/var/www/resources/views/auth/sign-up.twig");
    }
}
