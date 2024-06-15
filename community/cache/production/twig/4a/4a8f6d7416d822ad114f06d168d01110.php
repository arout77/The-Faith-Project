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

/* login_body_oauth.html */
class __TwigTemplate_cfe2fe8212ceb18d19f0a8e23b104f23 extends \Twig\Template
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
        echo "<br>
<div class=\"content\">
\t";
        // line 3
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($context["oauth"]);
        foreach ($context['_seq'] as $context["_key"] => $context["oauth"]) {
            // line 4
            echo "\t\t<a href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["oauth"], "REDIRECT_URL", [], "any", false, false, false, 4);
            echo "\" class=\"button2\">";
            echo twig_get_attribute($this->env, $this->source, $context["oauth"], "SERVICE_NAME", [], "any", false, false, false, 4);
            echo "</a>
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['oauth'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 6
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "login_body_oauth.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 6,  45 => 4,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "login_body_oauth.html", "");
    }
}
