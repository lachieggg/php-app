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

/* home/thinkers.twig */
class __TwigTemplate_b2fed1f45ad91df4e55f2cf46e74377439d0e95223d3b7b3b4fafa39ccd7d252 extends Template
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
        $this->parent = $this->loadTemplate("templates/app.twig", "home/thinkers.twig", 1);
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

<body class='index-body' id='main-body'>
\t<div>
\t\t<b>Welcome to my corner of the Internet.</b>
        <hr>

        Here is a list of my favourite thinkers.
        <br>

        <hr>
        <b>Psychology</b>:
        <hr>
        Jordan Peterson
        <br>
        Norman Doidge
        <br>
        Dan Siegel
        <br>
        Jonathon Haidt
        <br>
        Robert Sapolsky
        <br>
        Sukie Baxter
        <br>
        Bessel Van der Kolk
        <br>
        Peter Levine
        <br>
        Stanley Rosenberg
        <br>
        Stephen Porges
        <br>
        Gabor Maté
        <br>
        Johann Hari
        <br>
        Carl Jung
        <br>
        Alan Watts
        <br>
        Terrence McKenna
        <br>
        Ken Wilber

        <hr>
        <b>Business & Finance:</b>
        <hr>
        Sam Bankman-Fried
        <br>
        Ray Dalio
        <br>
        Satyajit Das
        <br>
        Andrew Lo
        <br>
        Benjamin Cowen
        <br>
        Nicholas Merten
        <br>
        Elon Musk
        <br>
        Peter Thiel
        <br>
        Gary Vaynerchuk
        <br>

        <hr>
        <b>Technology</b>:
        <hr>
        Jack Dorsey
        <br>
        Elon Musk
        <br>
        Mike Cannon-Brookes
        <br>
        Ray Kurzweil
        <br>
        Linus Torvalds
        <br>
        Andreas Antonopoulos
        <br>
        Edward Snowden
        <br>
        Cal Newport
        <br>
        Jaron Lanier
        <br>
        Eric Raymond
        <br>
        Ben Goertzel
        <br>
        Christopher Wylie
        <br>
        Chamath Palihapitiya
            
        <hr>
        <b>Science</b>:
        <hr>
        Albert Einstein
        <br>
        Stephen Hawking
        <br>
        Isaac Newton
        <br>
\t</div>
</body>


";
    }

    public function getTemplateName()
    {
        return "home/thinkers.twig";
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
        return new Source("", "home/thinkers.twig", "/var/www/resources/views/home/thinkers.twig");
    }
}
