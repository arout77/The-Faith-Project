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

/* ucp_reset_password.html */
class __TwigTemplate_b52556b1631ba88b0e5763e44cefbaed extends \Twig\Template
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
        $location = "overall_header.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("overall_header.html", "ucp_reset_password.html", 1)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 2
        echo "
<form action=\"";
        // line 3
        echo ($context["U_RESET_PASSWORD_ACTION"] ?? null);
        echo "\" method=\"post\" id=\"reset_password\">

<div class=\"panel\">
\t<div class=\"inner\">

\t<div class=\"content\">
\t\t<h2>";
        // line 9
        echo $this->extensions['phpbb\template\twig\extension']->lang("RESET_PASSWORD");
        echo "</h2>

\t\t<fieldset>
\t\t";
        // line 12
        if (($context["S_IS_PASSWORD_RESET"] ?? null)) {
            // line 13
            echo "\t\t\t";
            if (($context["PASSWORD_RESET_ERRORS"] ?? null)) {
                echo "<p class=\"error\">";
                echo twig_join_filter(($context["PASSWORD_RESET_ERRORS"] ?? null), "<br>");
                echo "</p>";
            }
            // line 14
            echo "\t\t\t<dl>
\t\t\t\t<dt><label for=\"new_password\">";
            // line 15
            echo ($this->extensions['phpbb\template\twig\extension']->lang("NEW_PASSWORD") . $this->extensions['phpbb\template\twig\extension']->lang("COLON"));
            echo "</label><br /><span>";
            echo $this->extensions['phpbb\template\twig\extension']->lang("CHANGE_PASSWORD_EXPLAIN");
            echo "</span></dt>
\t\t\t\t<dd><input class=\"inputbox autowidth\" type=\"password\" name=\"new_password\" id=\"new_password\" size=\"25\" maxlength=\"255\" title=\"";
            // line 16
            echo $this->extensions['phpbb\template\twig\extension']->lang("CHANGE_PASSWORD");
            echo "\" autocomplete=\"off\" /></dd>
\t\t\t</dl>
\t\t\t<dl>
\t\t\t\t<dt><label for=\"new_password_confirm\">";
            // line 19
            echo ($this->extensions['phpbb\template\twig\extension']->lang("CONFIRM_PASSWORD") . $this->extensions['phpbb\template\twig\extension']->lang("COLON"));
            echo "</label></dt>
\t\t\t\t<dd><input class=\"inputbox autowidth\" type=\"password\" name=\"new_password_confirm\" id=\"new_password_confirm\" size=\"25\" maxlength=\"255\" title=\"";
            // line 20
            echo $this->extensions['phpbb\template\twig\extension']->lang("CONFIRM_PASSWORD");
            echo "\" autocomplete=\"off\" /></dd>
\t\t\t</dl>
\t\t";
        } else {
            // line 23
            echo "\t\t\t";
            if (($context["USERNAME_REQUIRED"] ?? null)) {
                // line 24
                echo "\t\t\t\t<p class=\"error\">";
                echo $this->extensions['phpbb\template\twig\extension']->lang("EMAIL_NOT_UNIQUE");
                echo "</p>
\t\t\t";
            }
            // line 26
            echo "\t\t\t<dl>
\t\t\t\t<dt><label for=\"email\">";
            // line 27
            echo ($this->extensions['phpbb\template\twig\extension']->lang("EMAIL_ADDRESS") . $this->extensions['phpbb\template\twig\extension']->lang("COLON"));
            echo "</label><br /><span>";
            echo $this->extensions['phpbb\template\twig\extension']->lang("EMAIL_REMIND");
            echo "</span></dt>
\t\t\t\t<dd><input class=\"inputbox autowidth\" type=\"email\" name=\"email\" id=\"email\" size=\"25\" maxlength=\"100\" value=\"";
            // line 28
            echo ($context["EMAIL"] ?? null);
            echo "\" autofocus /></dd>
\t\t\t</dl>
\t\t\t";
            // line 30
            if (($context["USERNAME_REQUIRED"] ?? null)) {
                // line 31
                echo "\t\t\t<dl>
\t\t\t\t<dt><label for=\"username\">";
                // line 32
                echo ($this->extensions['phpbb\template\twig\extension']->lang("USERNAME") . $this->extensions['phpbb\template\twig\extension']->lang("COLON"));
                echo "</label></dt>
\t\t\t\t<dd><input class=\"inputbox autowidth\" type=\"text\" name=\"username\" id=\"username\" size=\"25\" /></dd>
\t\t\t</dl>
\t\t\t";
            }
            // line 36
            echo "\t\t";
        }
        // line 37
        echo "\t\t<dl>
\t\t\t<dt>&nbsp;</dt>
\t\t\t<dd>";
        // line 39
        echo ($context["S_HIDDEN_FIELDS"] ?? null);
        echo "<input type=\"submit\" name=\"submit\" id=\"submit\" class=\"button1\" value=\"";
        echo $this->extensions['phpbb\template\twig\extension']->lang("SUBMIT");
        echo "\" tabindex=\"2\" /></dd>
\t\t</dl>
\t\t";
        // line 41
        echo ($context["S_FORM_TOKEN"] ?? null);
        echo "
\t\t</fieldset>
\t</div>

\t</div>
</div>
</form>

";
        // line 49
        $location = "overall_footer.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("overall_footer.html", "ucp_reset_password.html", 49)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
    }

    public function getTemplateName()
    {
        return "ucp_reset_password.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  161 => 49,  150 => 41,  143 => 39,  139 => 37,  136 => 36,  129 => 32,  126 => 31,  124 => 30,  119 => 28,  113 => 27,  110 => 26,  104 => 24,  101 => 23,  95 => 20,  91 => 19,  85 => 16,  79 => 15,  76 => 14,  69 => 13,  67 => 12,  61 => 9,  52 => 3,  49 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "ucp_reset_password.html", "");
    }
}
