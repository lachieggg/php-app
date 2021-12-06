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

/* auth/sign-in.twig */
class __TwigTemplate_fe734ec2f327abd5bc0fcbddae446b9d3e8af5288e6b59fc8202873a53f96a38 extends Template
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
        $this->parent = $this->loadTemplate("templates/app.twig", "auth/sign-in.twig", 1);
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
                <div class=\"panel-heading\">Sign in</div>
                <div class=\"panel-body\">
                    <form id='sign-in-form' action=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("auth.sign-in"), "html", null, true);
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
        echo ((twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "password", [], "any", false, false, false, 25)) ? (" has-error") : (""));
        echo "\">
                            <label for=\"password\">Password</label>
                            <input type=\"password\" name=\"password\" id=\"password\" class=\"form-control\">
                            ";
        // line 28
        if (twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "password", [], "any", false, false, false, 28)) {
            // line 29
            echo "                                <span class=\"help-block\">";
            echo twig_escape_filter($this->env, twig_first($this->env, twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "password", [], "any", false, false, false, 29)), "html", null, true);
            echo "</span>
                            ";
        }
        // line 31
        echo "                        </div>
                        <button type=\"submit\" class=\"btn btn-default\">Sign in</button>

                        ";
        // line 34
        echo twig_get_attribute($this->env, $this->source, ($context["csrf"] ?? null), "field", [], "any", false, false, false, 34);
        echo "
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>
";
    }

    public function getTemplateName()
    {
        return "auth/sign-in.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  108 => 34,  103 => 31,  97 => 29,  95 => 28,  89 => 25,  86 => 24,  80 => 22,  78 => 21,  74 => 20,  69 => 18,  65 => 17,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "auth/sign-in.twig", "/var/www/resources/views/auth/sign-in.twig");
    }
}
