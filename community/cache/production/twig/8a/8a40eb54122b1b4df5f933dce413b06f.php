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

/* posting_pm_header.html */
class __TwigTemplate_0f93ed5e9a804549cbc2a6fbf182e944 extends \Twig\Template
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
        echo "<fieldset class=\"fields1\">
\t";
        // line 2
        if ( !($context["S_SHOW_DRAFTS"] ?? null)) {
            // line 3
            echo "
\t\t";
            // line 4
            if (($context["S_GROUP_OPTIONS"] ?? null)) {
                // line 5
                echo "\t\t\t<div class=\"column2\">
\t\t\t\t<label for=\"group_list\"><strong>";
                // line 6
                echo $this->extensions['phpbb\template\twig\extension']->lang("TO_ADD_GROUPS");
                echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
                echo "</strong></label><br />
\t\t\t\t<select name=\"group_list[]\" id=\"group_list\" multiple=\"multiple\" size=\"3\" class=\"inputbox\">";
                // line 7
                echo ($context["S_GROUP_OPTIONS"] ?? null);
                echo "</select><br />
\t\t\t</div>
\t\t";
            }
            // line 10
            echo "\t\t";
            if (($context["S_ALLOW_MASS_PM"] ?? null)) {
                // line 11
                echo "\t\t<div class=\"column1\">
\t\t\t";
                // line 12
                if ( !($context["S_EDIT_POST"] ?? null)) {
                    // line 13
                    echo "\t\t\t<dl class=\"pmlist\">
\t\t\t\t<dt><label><strong>";
                    // line 14
                    echo $this->extensions['phpbb\template\twig\extension']->lang("TO_ADD_MASS");
                    echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
                    echo "</strong><textarea id=\"username_list\" name=\"username_list\" class=\"inputbox\" cols=\"50\" rows=\"2\" tabindex=\"1\"></textarea></label></dt>
\t\t\t\t<dd class=\"recipients\">
\t\t\t\t<input type=\"submit\" name=\"add_to\" value=\"";
                    // line 16
                    echo $this->extensions['phpbb\template\twig\extension']->lang("ADD");
                    echo "\" class=\"button2\" tabindex=\"1\" />
\t\t\t\t<input type=\"submit\" name=\"add_bcc\" value=\"";
                    // line 17
                    echo $this->extensions['phpbb\template\twig\extension']->lang("ADD_BCC");
                    echo "\" class=\"button2\" tabindex=\"1\" />
\t\t\t\t";
                    // line 18
                    // line 19
                    echo "\t\t\t\t<span><a href=\"";
                    echo ($context["U_FIND_USERNAME"] ?? null);
                    echo "\" onclick=\"find_username(this.href); return false;\">";
                    echo $this->extensions['phpbb\template\twig\extension']->lang("FIND_USERNAME");
                    echo "</a></span>
\t\t\t\t";
                    // line 20
                    // line 21
                    echo "\t\t\t\t</dd>
\t\t\t</dl>
\t\t\t";
                }
                // line 24
                echo "\t\t</div>
\t\t";
                // line 25
                if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "to_recipient", [], "any", false, false, false, 25)) || twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "bcc_recipient", [], "any", false, false, false, 25)))) {
                    echo "<hr />";
                }
                // line 26
                echo "\t\t<div class=\"column1\">
\t\t\t";
                // line 27
                if (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "to_recipient", [], "any", false, false, false, 27))) {
                    // line 28
                    echo "\t\t\t\t<dl>
\t\t\t\t\t<dt><label>";
                    // line 29
                    echo $this->extensions['phpbb\template\twig\extension']->lang("TO_MASS");
                    echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
                    echo "</label></dt>
\t\t\t\t\t<dd class=\"recipients\">
\t\t\t\t\t<ul class=\"recipients\">
\t\t\t\t\t\t";
                    // line 32
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "to_recipient", [], "any", false, false, false, 32));
                    foreach ($context['_seq'] as $context["_key"] => $context["to_recipient"]) {
                        // line 33
                        echo "\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t";
                        // line 34
                        if ( !($context["S_EDIT_POST"] ?? null)) {
                            echo "<input type=\"submit\" name=\"remove_";
                            echo twig_get_attribute($this->env, $this->source, $context["to_recipient"], "TYPE", [], "any", false, false, false, 34);
                            echo "[";
                            echo twig_get_attribute($this->env, $this->source, $context["to_recipient"], "UG_ID", [], "any", false, false, false, 34);
                            echo "]\" value=\"x\" class=\"button2\" />";
                        }
                        // line 35
                        echo "\t\t\t\t\t\t\t";
                        if (twig_get_attribute($this->env, $this->source, $context["to_recipient"], "IS_GROUP", [], "any", false, false, false, 35)) {
                            echo "<a href=\"";
                            echo twig_get_attribute($this->env, $this->source, $context["to_recipient"], "U_VIEW", [], "any", false, false, false, 35);
                            echo "\" style=\"color: ";
                            echo twig_get_attribute($this->env, $this->source, $context["to_recipient"], "COLOUR", [], "any", false, false, false, 35);
                            echo "\"><strong>";
                            echo twig_get_attribute($this->env, $this->source, $context["to_recipient"], "NAME", [], "any", false, false, false, 35);
                            echo "</strong></a>";
                        } else {
                            echo twig_get_attribute($this->env, $this->source, $context["to_recipient"], "NAME_FULL", [], "any", false, false, false, 35);
                        }
                        // line 36
                        echo "\t\t\t\t\t\t</li>
\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['to_recipient'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 38
                    echo "\t\t\t\t\t</ul>
\t\t\t\t\t</dd>
\t\t\t\t</dl>
\t\t\t";
                }
                // line 42
                echo "\t\t</div>
\t\t\t";
                // line 43
                if (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "bcc_recipient", [], "any", false, false, false, 43))) {
                    // line 44
                    echo "\t\t\t<div class=\"column2\">
\t\t\t\t<dl>
\t\t\t\t\t<dt><label>";
                    // line 46
                    echo $this->extensions['phpbb\template\twig\extension']->lang("BCC");
                    echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
                    echo "</label></dt>
\t\t\t\t\t<dd class=\"recipients\">
\t\t\t\t\t<ul class=\"recipients\">
\t\t\t\t\t\t";
                    // line 49
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "bcc_recipient", [], "any", false, false, false, 49));
                    foreach ($context['_seq'] as $context["_key"] => $context["bcc_recipient"]) {
                        // line 50
                        echo "\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t";
                        // line 51
                        if ( !($context["S_EDIT_POST"] ?? null)) {
                            echo "<input type=\"submit\" name=\"remove_";
                            echo twig_get_attribute($this->env, $this->source, $context["bcc_recipient"], "TYPE", [], "any", false, false, false, 51);
                            echo "[";
                            echo twig_get_attribute($this->env, $this->source, $context["bcc_recipient"], "UG_ID", [], "any", false, false, false, 51);
                            echo "]\" value=\"x\" class=\"button2\" />";
                        }
                        // line 52
                        echo "\t\t\t\t\t\t\t";
                        if (twig_get_attribute($this->env, $this->source, $context["bcc_recipient"], "IS_GROUP", [], "any", false, false, false, 52)) {
                            echo "<a href=\"";
                            echo twig_get_attribute($this->env, $this->source, $context["bcc_recipient"], "U_VIEW", [], "any", false, false, false, 52);
                            echo "\" style=\"color: ";
                            echo twig_get_attribute($this->env, $this->source, $context["bcc_recipient"], "COLOUR", [], "any", false, false, false, 52);
                            echo "\"><strong>";
                            echo twig_get_attribute($this->env, $this->source, $context["bcc_recipient"], "NAME", [], "any", false, false, false, 52);
                            echo "</strong></a>";
                        } else {
                            echo twig_get_attribute($this->env, $this->source, $context["bcc_recipient"], "NAME_FULL", [], "any", false, false, false, 52);
                        }
                        // line 53
                        echo "\t\t\t\t\t\t</li>
\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['bcc_recipient'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 55
                    echo "\t\t\t\t\t</ul>
\t\t\t\t\t</dd>
\t\t\t\t</dl>
\t\t\t</div>
\t\t\t";
                }
                // line 60
                echo "\t\t";
            } else {
                // line 61
                echo "\t\t<div class=\"column1\">
\t\t\t<dl>
\t\t\t\t<dt><label for=\"username_list\">";
                // line 63
                echo $this->extensions['phpbb\template\twig\extension']->lang("TO_ADD");
                echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
                echo "</label>";
                if ( !($context["S_EDIT_POST"] ?? null)) {
                    echo "<br /><span><a href=\"";
                    echo ($context["U_FIND_USERNAME"] ?? null);
                    echo "\" onclick=\"find_username(this.href); return false\">";
                    echo $this->extensions['phpbb\template\twig\extension']->lang("FIND_USERNAME");
                    echo "</a></span>";
                }
                echo "</dt>
\t\t\t\t";
                // line 64
                if ( !($context["S_EDIT_POST"] ?? null)) {
                    // line 65
                    echo "\t\t\t\t<dd><input class=\"inputbox\" type=\"text\" name=\"username_list\" id=\"username_list\" size=\"20\" value=\"\" /> <input type=\"submit\" name=\"add_to\" value=\"";
                    echo $this->extensions['phpbb\template\twig\extension']->lang("ADD");
                    echo "\" class=\"button2\" /></dd>
\t\t\t\t";
                }
                // line 67
                echo "\t\t\t\t";
                if (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "to_recipient", [], "any", false, false, false, 67))) {
                    // line 68
                    echo "\t\t\t\t\t<dd class=\"recipients\">
\t\t\t\t\t\t<ul class=\"recipients\">
\t\t\t\t\t\t\t";
                    // line 70
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "to_recipient", [], "any", false, false, false, 70));
                    foreach ($context['_seq'] as $context["_key"] => $context["to_recipient"]) {
                        // line 71
                        echo "\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t";
                        // line 72
                        if (twig_get_attribute($this->env, $this->source, $context["to_recipient"], "IS_GROUP", [], "any", false, false, false, 72)) {
                            echo "<a href=\"";
                            echo twig_get_attribute($this->env, $this->source, $context["to_recipient"], "U_VIEW", [], "any", false, false, false, 72);
                            echo "\"><strong>";
                            echo twig_get_attribute($this->env, $this->source, $context["to_recipient"], "NAME", [], "any", false, false, false, 72);
                            echo "</strong></a>";
                        } else {
                            echo twig_get_attribute($this->env, $this->source, $context["to_recipient"], "NAME_FULL", [], "any", false, false, false, 72);
                        }
                        echo "&nbsp;
\t\t\t\t\t\t\t\t";
                        // line 73
                        if ( !($context["S_EDIT_POST"] ?? null)) {
                            echo "<input type=\"submit\" name=\"remove_";
                            echo twig_get_attribute($this->env, $this->source, $context["to_recipient"], "TYPE", [], "any", false, false, false, 73);
                            echo "[";
                            echo twig_get_attribute($this->env, $this->source, $context["to_recipient"], "UG_ID", [], "any", false, false, false, 73);
                            echo "]\" value=\"x\" class=\"button2\" />";
                        }
                        // line 74
                        echo "\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['to_recipient'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 76
                    echo "\t\t\t\t\t\t</ul>
\t\t\t\t\t</dd>
\t\t\t\t";
                }
                // line 79
                echo "\t\t\t</dl>
\t\t</div>
\t\t";
            }
            // line 82
            echo "
\t";
        }
        // line 84
        echo "\t</fieldset>
";
    }

    public function getTemplateName()
    {
        return "posting_pm_header.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  304 => 84,  300 => 82,  295 => 79,  290 => 76,  283 => 74,  275 => 73,  263 => 72,  260 => 71,  256 => 70,  252 => 68,  249 => 67,  243 => 65,  241 => 64,  228 => 63,  224 => 61,  221 => 60,  214 => 55,  207 => 53,  194 => 52,  186 => 51,  183 => 50,  179 => 49,  172 => 46,  168 => 44,  166 => 43,  163 => 42,  157 => 38,  150 => 36,  137 => 35,  129 => 34,  126 => 33,  122 => 32,  115 => 29,  112 => 28,  110 => 27,  107 => 26,  103 => 25,  100 => 24,  95 => 21,  94 => 20,  87 => 19,  86 => 18,  82 => 17,  78 => 16,  72 => 14,  69 => 13,  67 => 12,  64 => 11,  61 => 10,  55 => 7,  50 => 6,  47 => 5,  45 => 4,  42 => 3,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "posting_pm_header.html", "");
    }
}
