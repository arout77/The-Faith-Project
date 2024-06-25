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

/* posting_preview.html */
class __TwigTemplate_bfb949aeca936878b8eeaa7beda91f6d extends \Twig\Template
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
        echo "<div class=\"post ";
        if (($context["S_PRIVMSGS"] ?? null)) {
            echo "pm";
        } else {
            echo "bg2";
        }
        echo "\" id=\"preview\">
\t<div class=\"inner\">

";
        // line 4
        if (($context["S_HAS_POLL_OPTIONS"] ?? null)) {
            // line 5
            echo "\t<div class=\"content\">
\t\t<h2>";
            // line 6
            echo $this->extensions['phpbb\template\twig\extension']->lang("PREVIEW");
            echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
            echo " ";
            echo ($context["POLL_QUESTION"] ?? null);
            echo "</h2>
\t\t<p class=\"author\">";
            // line 7
            if (($context["L_POLL_LENGTH"] ?? null)) {
                echo $this->extensions['phpbb\template\twig\extension']->lang("POLL_LENGTH");
                echo "<br />";
            }
            echo $this->extensions['phpbb\template\twig\extension']->lang("MAX_VOTES");
            echo "</p>

\t\t<fieldset class=\"polls\">
\t\t";
            // line 10
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "poll_option", [], "any", false, false, false, 10));
            foreach ($context['_seq'] as $context["_key"] => $context["poll_option"]) {
                // line 11
                echo "\t\t\t<dl>
\t\t\t\t<dt><label for=\"vote_";
                // line 12
                echo twig_get_attribute($this->env, $this->source, $context["poll_option"], "POLL_OPTION_ID", [], "any", false, false, false, 12);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["poll_option"], "POLL_OPTION_CAPTION", [], "any", false, false, false, 12);
                echo "</label></dt>
\t\t\t\t<dd style=\"width: auto;\">";
                // line 13
                if (($context["S_IS_MULTI_CHOICE"] ?? null)) {
                    echo "<input type=\"checkbox\" name=\"vote_id[]\" id=\"vote_";
                    echo twig_get_attribute($this->env, $this->source, $context["poll_option"], "POLL_OPTION_ID", [], "any", false, false, false, 13);
                    echo "\" value=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["poll_option"], "POLL_OPTION_ID", [], "any", false, false, false, 13);
                    echo "\"";
                    if (twig_get_attribute($this->env, $this->source, $context["poll_option"], "POLL_OPTION_VOTED", [], "any", false, false, false, 13)) {
                        echo " checked=\"checked\"";
                    }
                    echo " />";
                } else {
                    echo "<input type=\"radio\" name=\"vote_id[]\" id=\"vote_";
                    echo twig_get_attribute($this->env, $this->source, $context["poll_option"], "POLL_OPTION_ID", [], "any", false, false, false, 13);
                    echo "\" value=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["poll_option"], "POLL_OPTION_ID", [], "any", false, false, false, 13);
                    echo "\"";
                    if (twig_get_attribute($this->env, $this->source, $context["poll_option"], "POLL_OPTION_VOTED", [], "any", false, false, false, 13)) {
                        echo " checked=\"checked\"";
                    }
                    echo " />";
                }
                echo "</dd>
\t\t\t</dl>
\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['poll_option'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 16
            echo "\t\t</fieldset>
\t</div>

\t</div>
</div>

<div class=\"post bg2\">
\t<div class=\"inner\">

";
        }
        // line 26
        echo "
";
        // line 27
        // line 28
        echo "
\t<div class=\"postbody\">
\t\t<h3>";
        // line 30
        echo $this->extensions['phpbb\template\twig\extension']->lang("PREVIEW");
        echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
        echo " ";
        echo ($context["PREVIEW_SUBJECT"] ?? null);
        echo "</h3>

\t\t<div class=\"content\">";
        // line 32
        echo ($context["PREVIEW_MESSAGE"] ?? null);
        echo "</div>

\t\t";
        // line 34
        // line 35
        echo "
\t\t";
        // line 36
        if (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "attachment", [], "any", false, false, false, 36))) {
            // line 37
            echo "\t\t<dl class=\"attachbox\">
\t\t\t<dt>";
            // line 38
            echo $this->extensions['phpbb\template\twig\extension']->lang("ATTACHMENTS");
            echo "</dt>
\t\t\t";
            // line 39
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "attachment", [], "any", false, false, false, 39));
            foreach ($context['_seq'] as $context["_key"] => $context["attachment"]) {
                // line 40
                echo "\t\t\t<dd>";
                echo twig_get_attribute($this->env, $this->source, $context["attachment"], "DISPLAY_ATTACHMENT", [], "any", false, false, false, 40);
                echo "</dd>
\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attachment'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 42
            echo "\t\t</dl>
\t\t";
        }
        // line 44
        echo "
\t\t";
        // line 45
        if (($context["PREVIEW_SIGNATURE"] ?? null)) {
            echo "<div class=\"signature\">";
            echo ($context["PREVIEW_SIGNATURE"] ?? null);
            echo "</div>";
        }
        // line 46
        echo "\t</div>

\t</div>
</div>

<hr />
";
    }

    public function getTemplateName()
    {
        return "posting_preview.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  184 => 46,  178 => 45,  175 => 44,  171 => 42,  162 => 40,  158 => 39,  154 => 38,  151 => 37,  149 => 36,  146 => 35,  145 => 34,  140 => 32,  132 => 30,  128 => 28,  127 => 27,  124 => 26,  112 => 16,  83 => 13,  77 => 12,  74 => 11,  70 => 10,  60 => 7,  53 => 6,  50 => 5,  48 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "posting_preview.html", "");
    }
}
