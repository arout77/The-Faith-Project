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

/* confirm_body.html */
class __TwigTemplate_e738fcc78b93460e437d453a62c70c6a extends \Twig\Template
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
        if (($context["S_AJAX_REQUEST"] ?? null)) {
            // line 2
            echo "\t<form action=\"";
            echo ($context["S_CONFIRM_ACTION"] ?? null);
            echo "\" method=\"post\">
\t\t<h3>";
            // line 3
            echo ($context["MESSAGE_TITLE"] ?? null);
            echo "</h3>
\t\t<p>";
            // line 4
            echo ($context["MESSAGE_TEXT"] ?? null);
            echo "</p>

\t\t<fieldset class=\"submit-buttons\">
\t\t\t<input type=\"button\" name=\"confirm\" value=\"";
            // line 7
            echo $this->extensions['phpbb\template\twig\extension']->lang("YES");
            echo "\" class=\"button2\" />&nbsp;
\t\t\t<input type=\"button\" name=\"cancel\" value=\"";
            // line 8
            echo $this->extensions['phpbb\template\twig\extension']->lang("NO");
            echo "\" class=\"button2\" />
\t\t</fieldset>
\t</form>

";
        } else {
            // line 13
            echo "
";
            // line 14
            $location = "overall_header.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->loadTemplate("overall_header.html", "confirm_body.html", 14)->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
            // line 15
            echo "
<form id=\"confirm\" action=\"";
            // line 16
            echo ($context["S_CONFIRM_ACTION"] ?? null);
            echo "\" method=\"post\">
<div class=\"panel\">
\t<div class=\"inner\">

\t<h2 class=\"message-title\">";
            // line 20
            echo ($context["MESSAGE_TITLE"] ?? null);
            echo "</h2>
\t<p>";
            // line 21
            echo ($context["MESSAGE_TEXT"] ?? null);
            echo "</p>

\t<fieldset class=\"submit-buttons\">
\t\t";
            // line 24
            echo ($context["S_HIDDEN_FIELDS"] ?? null);
            echo "
\t\t<input type=\"submit\" name=\"confirm\" value=\"";
            // line 25
            echo $this->extensions['phpbb\template\twig\extension']->lang("YES");
            echo "\" class=\"button2\" />&nbsp;
\t\t<input type=\"submit\" name=\"cancel\" value=\"";
            // line 26
            echo $this->extensions['phpbb\template\twig\extension']->lang("NO");
            echo "\" class=\"button2\" />
\t</fieldset>

\t</div>
</div>
</form>

";
            // line 33
            $location = "overall_footer.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->loadTemplate("overall_footer.html", "confirm_body.html", 33)->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
            // line 34
            echo "
";
        }
    }

    public function getTemplateName()
    {
        return "confirm_body.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  131 => 34,  119 => 33,  109 => 26,  105 => 25,  101 => 24,  95 => 21,  91 => 20,  84 => 16,  81 => 15,  69 => 14,  66 => 13,  58 => 8,  54 => 7,  48 => 4,  44 => 3,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "confirm_body.html", "");
    }
}
