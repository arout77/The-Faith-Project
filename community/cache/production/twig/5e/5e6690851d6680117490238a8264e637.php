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

/* report_body.html */
class __TwigTemplate_7e68f9954e7c60974bc7c28f61515af4 extends \Twig\Template
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
        $this->loadTemplate("overall_header.html", "report_body.html", 1)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 2
        echo "
<h2 class=\"titlespace\">";
        // line 3
        if (($context["S_REPORT_POST"] ?? null)) {
            echo $this->extensions['phpbb\template\twig\extension']->lang("REPORT_POST");
        } else {
            echo $this->extensions['phpbb\template\twig\extension']->lang("REPORT_MESSAGE");
        }
        echo "</h2>

<form method=\"post\" action=\"";
        // line 5
        echo ($context["S_REPORT_ACTION"] ?? null);
        echo "\" id=\"report\">
<div class=\"panel\">
\t<div class=\"inner\">

\t<div class=\"content\">
\t\t<p>";
        // line 10
        if (($context["S_REPORT_POST"] ?? null)) {
            echo $this->extensions['phpbb\template\twig\extension']->lang("REPORT_POST_EXPLAIN");
        } else {
            echo $this->extensions['phpbb\template\twig\extension']->lang("REPORT_MESSAGE_EXPLAIN");
        }
        echo "</p>

\t\t<fieldset>
\t\t";
        // line 13
        if (($context["ERROR"] ?? null)) {
            echo "<dl><dd class=\"error\">";
            echo ($context["ERROR"] ?? null);
            echo "</dd></dl>";
        }
        // line 14
        echo "\t\t<dl class=\"fields2\">
\t\t\t<dt><label for=\"reason_id\">";
        // line 15
        echo $this->extensions['phpbb\template\twig\extension']->lang("REASON");
        echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
        echo "</label></dt>
\t\t\t<dd><select name=\"reason_id\" id=\"reason_id\" class=\"full\">";
        // line 16
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "reason", [], "any", false, false, false, 16));
        foreach ($context['_seq'] as $context["_key"] => $context["reason"]) {
            echo "<option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["reason"], "ID", [], "any", false, false, false, 16);
            echo "\"";
            if (twig_get_attribute($this->env, $this->source, $context["reason"], "S_SELECTED", [], "any", false, false, false, 16)) {
                echo " selected=\"selected\"";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["reason"], "DESCRIPTION", [], "any", false, false, false, 16);
            echo "</option>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['reason'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "</select></dd>
\t\t</dl>
\t\t";
        // line 18
        if (($context["S_CAN_NOTIFY"] ?? null)) {
            // line 19
            echo "\t\t\t<dl class=\"fields2\">
\t\t\t\t<dt><label for=\"notify1\">";
            // line 20
            echo $this->extensions['phpbb\template\twig\extension']->lang("REPORT_NOTIFY");
            echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
            echo "</label><br /><span>";
            echo $this->extensions['phpbb\template\twig\extension']->lang("REPORT_NOTIFY_EXPLAIN");
            echo "</span></dt>
\t\t\t\t<dd>
\t\t\t\t\t<label for=\"notify1\"><input type=\"radio\" name=\"notify\" id=\"notify1\" value=\"1\" ";
            // line 22
            if ( !($context["S_NOTIFY"] ?? null)) {
                echo "checked=\"checked\"";
            }
            echo " /> ";
            echo $this->extensions['phpbb\template\twig\extension']->lang("YES");
            echo "</label>
\t\t\t\t\t<label for=\"notify0\"><input type=\"radio\" name=\"notify\" id=\"notify0\" value=\"0\" ";
            // line 23
            if (($context["S_NOTIFY"] ?? null)) {
                echo "checked=\"checked\"";
            }
            echo " /> ";
            echo $this->extensions['phpbb\template\twig\extension']->lang("NO");
            echo "</label>
\t\t\t\t</dd>
\t\t\t</dl>
\t\t";
        }
        // line 27
        echo "\t\t<dl class=\"fields2\">
\t\t\t<dt><label for=\"report_text\">";
        // line 28
        echo $this->extensions['phpbb\template\twig\extension']->lang("MORE_INFO");
        echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
        echo "</label><br /><span>";
        echo $this->extensions['phpbb\template\twig\extension']->lang("CAN_LEAVE_BLANK");
        echo "</span></dt>
\t\t\t<dd><textarea name=\"report_text\" id=\"report_text\" rows=\"10\" cols=\"76\" class=\"inputbox\">";
        // line 29
        echo ($context["REPORT_TEXT"] ?? null);
        echo "</textarea></dd>
\t\t</dl>
\t\t";
        // line 31
        if (($context["CAPTCHA_TEMPLATE"] ?? null)) {
            // line 32
            echo "\t\t\t";
            $location = (("" . ($context["CAPTCHA_TEMPLATE"] ?? null)) . "");
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->loadTemplate((("" . ($context["CAPTCHA_TEMPLATE"] ?? null)) . ""), "report_body.html", 32)->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
            // line 33
            echo "\t\t";
        }
        // line 34
        echo "\t\t</fieldset>
\t</div>

\t</div>
</div>

<div class=\"panel\">
\t<div class=\"inner\">

\t<div class=\"content\">
\t\t<fieldset class=\"submit-buttons\">
\t\t\t<input type=\"submit\" name=\"submit\" class=\"button1\" value=\"";
        // line 45
        echo $this->extensions['phpbb\template\twig\extension']->lang("SUBMIT");
        echo "\" />&nbsp;
\t\t\t<input type=\"submit\" name=\"cancel\" class=\"button2\" value=\"";
        // line 46
        echo $this->extensions['phpbb\template\twig\extension']->lang("CANCEL");
        echo "\" />
\t\t\t";
        // line 47
        echo ($context["S_FORM_TOKEN"] ?? null);
        echo "
\t\t</fieldset>
\t</div>

\t</div>
</div>
</form>

";
        // line 55
        $location = "overall_footer.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("overall_footer.html", "report_body.html", 55)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
    }

    public function getTemplateName()
    {
        return "report_body.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  210 => 55,  199 => 47,  195 => 46,  191 => 45,  178 => 34,  175 => 33,  162 => 32,  160 => 31,  155 => 29,  148 => 28,  145 => 27,  134 => 23,  126 => 22,  118 => 20,  115 => 19,  113 => 18,  93 => 16,  88 => 15,  85 => 14,  79 => 13,  69 => 10,  61 => 5,  52 => 3,  49 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "report_body.html", "");
    }
}
