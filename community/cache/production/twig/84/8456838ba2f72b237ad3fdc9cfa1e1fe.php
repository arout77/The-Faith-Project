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

/* ucp_pm_viewmessage.html */
class __TwigTemplate_e96c3b30f169d0f0d2a6a8429931f050 extends \Twig\Template
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
        $location = "ucp_header.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("ucp_header.html", "ucp_pm_viewmessage.html", 1)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 2
        echo "
";
        // line 3
        $location = "ucp_pm_message_header.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("ucp_pm_message_header.html", "ucp_pm_viewmessage.html", 3)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 4
        echo "
\t</div>
</div>


";
        // line 9
        if ((($context["S_DISPLAY_HISTORY"] ?? null) && (($context["U_VIEW_PREVIOUS_HISTORY"] ?? null) || ($context["U_VIEW_NEXT_HISTORY"] ?? null)))) {
            // line 10
            echo "\t<fieldset class=\"display-options clearfix\">
\t\t";
            // line 11
            if (($context["U_VIEW_PREVIOUS_HISTORY"] ?? null)) {
                // line 12
                echo "\t\t\t<a href=\"";
                echo ($context["U_VIEW_PREVIOUS_HISTORY"] ?? null);
                echo "\" class=\"left-box arrow-";
                echo ($context["S_CONTENT_FLOW_BEGIN"] ?? null);
                echo "\">
\t\t\t\t<i class=\"icon fa-angle-";
                // line 13
                echo ($context["S_CONTENT_FLOW_BEGIN"] ?? null);
                echo " fa-fw icon-black\" aria-hidden=\"true\"></i><span>";
                echo $this->extensions['phpbb\template\twig\extension']->lang("VIEW_PREVIOUS_HISTORY");
                echo "</span>
\t\t\t</a>
\t\t";
            }
            // line 16
            echo "\t\t";
            if (($context["U_VIEW_NEXT_HISTORY"] ?? null)) {
                // line 17
                echo "\t\t\t<a href=\"";
                echo ($context["U_VIEW_NEXT_HISTORY"] ?? null);
                echo "\" class=\"right-box arrow-";
                echo ($context["S_CONTENT_FLOW_END"] ?? null);
                echo "\">
\t\t\t\t<i class=\"icon fa-angle-";
                // line 18
                echo ($context["S_CONTENT_FLOW_END"] ?? null);
                echo " fa-fw icon-black\" aria-hidden=\"true\"></i><span>";
                echo $this->extensions['phpbb\template\twig\extension']->lang("VIEW_NEXT_HISTORY");
                echo "</span>
\t\t\t</a>
\t\t";
            }
            // line 21
            echo "\t</fieldset>
";
        }
        // line 23
        echo "

<div id=\"post-";
        // line 25
        echo ($context["MESSAGE_ID"] ?? null);
        echo "\" class=\"post pm has-profile";
        if ((($context["S_POST_UNAPPROVED"] ?? null) || ($context["S_POST_REPORTED"] ?? null))) {
            echo " reported";
        }
        if (($context["S_ONLINE"] ?? null)) {
            echo " online";
        }
        echo "\">
<div class=\"inner\">

\t<dl class=\"postprofile\" id=\"profile";
        // line 28
        echo ($context["MESSAGE_ID"] ?? null);
        echo "\">
\t\t<dt class=\"";
        // line 29
        if ((($context["RANK_TITLE"] ?? null) || ($context["RANK_IMG"] ?? null))) {
            echo "has-profile-rank";
        } else {
            echo "no-profile-rank";
        }
        echo " ";
        if (($context["AUTHOR_AVATAR"] ?? null)) {
            echo "has-avatar";
        } else {
            echo "no-avatar";
        }
        echo "\">
\t\t\t<div class=\"avatar-container\">
\t\t\t\t";
        // line 31
        // line 32
        echo "\t\t\t\t";
        if (($context["AUTHOR_AVATAR"] ?? null)) {
            echo "<a href=\"";
            echo ($context["U_MESSAGE_AUTHOR"] ?? null);
            echo "\" class=\"avatar\">";
            echo ($context["AUTHOR_AVATAR"] ?? null);
            echo "</a>";
        }
        // line 33
        echo "\t\t\t\t";
        // line 34
        echo "\t\t\t</div>
\t\t\t";
        // line 35
        // line 36
        echo "\t\t\t";
        echo ($context["MESSAGE_AUTHOR_FULL"] ?? null);
        echo "
\t\t\t";
        // line 37
        // line 38
        echo "\t\t</dt>

\t\t";
        // line 40
        // line 41
        echo "\t\t";
        if ((($context["RANK_TITLE"] ?? null) || ($context["RANK_IMG"] ?? null))) {
            echo "<dd class=\"profile-rank\">";
            echo ($context["RANK_TITLE"] ?? null);
            if ((($context["RANK_TITLE"] ?? null) && ($context["RANK_IMG"] ?? null))) {
                echo "<br />";
            }
            echo ($context["RANK_IMG"] ?? null);
            echo "</dd>";
        }
        // line 42
        echo "\t\t";
        // line 43
        echo "
\t\t<dd class=\"profile-posts\"><strong>";
        // line 44
        echo $this->extensions['phpbb\template\twig\extension']->lang("POSTS");
        echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
        echo "</strong> ";
        if ((($context["U_AUTHOR_POSTS"] ?? null) != "")) {
            echo "<a href=\"";
            echo ($context["U_AUTHOR_POSTS"] ?? null);
            echo "\">";
            echo ($context["AUTHOR_POSTS"] ?? null);
            echo "</a>";
        } else {
            echo ($context["AUTHOR_POSTS"] ?? null);
        }
        echo "</dd>
\t\t";
        // line 45
        if (($context["AUTHOR_JOINED"] ?? null)) {
            echo "<dd class=\"profile-joined\"><strong>";
            echo $this->extensions['phpbb\template\twig\extension']->lang("JOINED");
            echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
            echo "</strong> ";
            echo ($context["AUTHOR_JOINED"] ?? null);
            echo "</dd>";
        }
        // line 46
        echo "
\t\t";
        // line 47
        // line 48
        echo "\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "custom_fields", [], "any", false, false, false, 48));
        foreach ($context['_seq'] as $context["_key"] => $context["custom_fields"]) {
            // line 49
            echo "\t\t\t";
            if ( !twig_get_attribute($this->env, $this->source, $context["custom_fields"], "S_PROFILE_CONTACT", [], "any", false, false, false, 49)) {
                // line 50
                echo "\t\t\t\t<dd class=\"profile-custom-field profile-";
                echo twig_get_attribute($this->env, $this->source, $context["custom_fields"], "PROFILE_FIELD_IDENT", [], "any", false, false, false, 50);
                echo "\"><strong>";
                echo twig_get_attribute($this->env, $this->source, $context["custom_fields"], "PROFILE_FIELD_NAME", [], "any", false, false, false, 50);
                echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
                echo "</strong> ";
                echo twig_get_attribute($this->env, $this->source, $context["custom_fields"], "PROFILE_FIELD_VALUE", [], "any", false, false, false, 50);
                echo "</dd>
\t\t\t";
            }
            // line 52
            echo "\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['custom_fields'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 53
        echo "\t\t";
        // line 54
        echo "
\t\t";
        // line 55
        // line 56
        echo "\t\t";
        if (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "contact", [], "any", false, false, false, 56))) {
            // line 57
            echo "\t\t\t<dd class=\"profile-contact\">
\t\t\t\t<strong>";
            // line 58
            echo $this->extensions['phpbb\template\twig\extension']->lang("CONTACT");
            echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
            echo "</strong>
\t\t\t\t<div class=\"dropdown-container dropdown-left\">
\t\t\t\t\t<a href=\"#\" class=\"dropdown-trigger\"  title=\"";
            // line 60
            echo ($context["CONTACT_USER"] ?? null);
            echo "\"><i class=\"icon fa-commenting-o fa-fw icon-lg\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
            echo ($context["CONTACT_USER"] ?? null);
            echo "</span></a>
\t\t\t\t\t<div class=\"dropdown\">
\t\t\t\t\t\t<div class=\"pointer\"><div class=\"pointer-inner\"></div></div>
\t\t\t\t\t\t<div class=\"dropdown-contents contact-icons\">
\t\t\t\t\t\t\t";
            // line 64
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "contact", [], "any", false, false, false, 64));
            foreach ($context['_seq'] as $context["_key"] => $context["contact"]) {
                // line 65
                echo "\t\t\t\t\t\t\t\t";
                $context["REMAINDER"] = (twig_get_attribute($this->env, $this->source, $context["contact"], "S_ROW_COUNT", [], "any", false, false, false, 65) % 4);
                // line 66
                echo "\t\t\t\t\t\t\t\t";
                $value = ((($context["REMAINDER"] ?? null) == 3) || (twig_get_attribute($this->env, $this->source, $context["contact"], "S_LAST_ROW", [], "any", false, false, false, 66) && (twig_get_attribute($this->env, $this->source, $context["contact"], "S_NUM_ROWS", [], "any", false, false, false, 66) < 4)));
                $context['definition']->set('S_LAST_CELL', $value);
                // line 67
                echo "\t\t\t\t\t\t\t\t";
                if ((($context["REMAINDER"] ?? null) == 0)) {
                    // line 68
                    echo "\t\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t";
                }
                // line 70
                echo "\t\t\t\t\t\t\t\t\t<a href=\"";
                if (twig_get_attribute($this->env, $this->source, $context["contact"], "U_CONTACT", [], "any", false, false, false, 70)) {
                    echo twig_get_attribute($this->env, $this->source, $context["contact"], "U_CONTACT", [], "any", false, false, false, 70);
                } else {
                    echo twig_get_attribute($this->env, $this->source, $context["contact"], "U_PROFILE_AUTHOR", [], "any", false, false, false, 70);
                }
                echo "\" title=\"";
                echo twig_get_attribute($this->env, $this->source, $context["contact"], "NAME", [], "any", false, false, false, 70);
                echo "\"";
                if (twig_get_attribute($this->env, $this->source, ($context["definition"] ?? null), "S_LAST_CELL", [], "any", false, false, false, 70)) {
                    echo " class=\"last-cell\"";
                }
                if ((twig_get_attribute($this->env, $this->source, $context["contact"], "ID", [], "any", false, false, false, 70) == "jabber")) {
                    echo " onclick=\"popup(this.href, 750, 320); return false;\"";
                }
                echo ">
\t\t\t\t\t\t\t\t\t\t<span class=\"contact-icon ";
                // line 71
                echo twig_get_attribute($this->env, $this->source, $context["contact"], "ID", [], "any", false, false, false, 71);
                echo "-icon\">";
                echo twig_get_attribute($this->env, $this->source, $context["contact"], "NAME", [], "any", false, false, false, 71);
                echo "</span>
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t";
                // line 73
                if (((($context["REMAINDER"] ?? null) == 3) || twig_get_attribute($this->env, $this->source, $context["contact"], "S_LAST_ROW", [], "any", false, false, false, 73))) {
                    // line 74
                    echo "\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
                }
                // line 76
                echo "\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['contact'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 77
            echo "\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</dd>
\t\t";
        }
        // line 82
        echo "\t\t";
        // line 83
        echo "\t</dl>

\t<div class=\"postbody\">
\t\t<h3 class=\"first\">";
        // line 86
        echo ($context["SUBJECT"] ?? null);
        echo "</h3>

\t\t";
        // line 88
        $value = (((($context["U_EDIT"] ?? null) || ($context["U_DELETE"] ?? null)) || ($context["U_REPORT"] ?? null)) || ($context["U_QUOTE"] ?? null));
        $context['definition']->set('SHOW_PM_POST_BUTTONS', $value);
        // line 89
        echo "\t\t";
        // line 90
        echo "\t\t";
        if (twig_get_attribute($this->env, $this->source, ($context["definition"] ?? null), "SHOW_PM_POST_BUTTONS", [], "any", false, false, false, 90)) {
            // line 91
            echo "\t\t<ul class=\"post-buttons\">
\t\t\t";
            // line 92
            // line 93
            echo "\t\t\t";
            if (($context["U_EDIT"] ?? null)) {
                // line 94
                echo "\t\t\t\t<li>
\t\t\t\t\t<a href=\"";
                // line 95
                echo ($context["U_EDIT"] ?? null);
                echo "\" title=\"";
                echo $this->extensions['phpbb\template\twig\extension']->lang("POST_EDIT_PM");
                echo "\" class=\"button button-icon-only\">
\t\t\t\t\t\t<i class=\"icon fa-pencil fa-fw\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
                // line 96
                echo $this->extensions['phpbb\template\twig\extension']->lang("BUTTON_EDIT");
                echo "</span>
\t\t\t\t\t</a>
\t\t\t\t</li>
\t\t\t";
            }
            // line 100
            echo "\t\t\t";
            if (($context["U_DELETE"] ?? null)) {
                // line 101
                echo "\t\t\t\t<li>
\t\t\t\t\t<a href=\"";
                // line 102
                echo ($context["U_DELETE"] ?? null);
                echo "\" title=\"";
                echo $this->extensions['phpbb\template\twig\extension']->lang("DELETE_MESSAGE");
                echo "\" class=\"button button-icon-only\">
\t\t\t\t\t\t<i class=\"icon fa-times fa-fw\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
                // line 103
                echo $this->extensions['phpbb\template\twig\extension']->lang("BUTTON_DELETE");
                echo "</span>
\t\t\t\t\t</a>
\t\t\t\t</li>
\t\t\t";
            }
            // line 107
            echo "\t\t\t";
            if (($context["U_REPORT"] ?? null)) {
                // line 108
                echo "\t\t\t\t<li>
\t\t\t\t\t<a href=\"";
                // line 109
                echo ($context["U_REPORT"] ?? null);
                echo "\" title=\"";
                echo $this->extensions['phpbb\template\twig\extension']->lang("REPORT_PM");
                echo "\" class=\"button button-icon-only\">
\t\t\t\t\t\t<i class=\"icon fa-exclamation fa-fw\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
                // line 110
                echo $this->extensions['phpbb\template\twig\extension']->lang("BUTTON_REPORT");
                echo "</span>
\t\t\t\t\t</a>
\t\t\t\t</li>
\t\t\t";
            }
            // line 114
            echo "\t\t\t";
            if (($context["U_QUOTE"] ?? null)) {
                // line 115
                echo "\t\t\t\t<li>
\t\t\t\t\t<a href=\"";
                // line 116
                echo ($context["U_QUOTE"] ?? null);
                echo "\" title=\"";
                echo $this->extensions['phpbb\template\twig\extension']->lang("POST_QUOTE_PM");
                echo "\" class=\"button button-icon-only\">
\t\t\t\t\t\t<i class=\"icon fa-quote-left fa-fw\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
                // line 117
                echo $this->extensions['phpbb\template\twig\extension']->lang("BUTTON_QUOTE");
                echo "</span>
\t\t\t\t\t</a>
\t\t\t\t</li>
\t\t\t";
            }
            // line 121
            echo "\t\t\t";
            // line 122
            echo "\t\t</ul>
\t\t";
        }
        // line 124
        echo "\t\t";
        // line 125
        echo "
\t\t<p class=\"author\">
\t\t\t<strong>";
        // line 127
        echo $this->extensions['phpbb\template\twig\extension']->lang("SENT_AT");
        echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
        echo "</strong> ";
        echo ($context["SENT_DATE"] ?? null);
        echo "
\t\t\t<br /><strong>";
        // line 128
        echo $this->extensions['phpbb\template\twig\extension']->lang("PM_FROM");
        echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
        echo "</strong> ";
        echo ($context["MESSAGE_AUTHOR_FULL"] ?? null);
        echo "
\t\t\t";
        // line 129
        if (($context["S_TO_RECIPIENT"] ?? null)) {
            echo "<br /><strong>";
            echo $this->extensions['phpbb\template\twig\extension']->lang("TO");
            echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
            echo "</strong> ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "to_recipient", [], "any", false, false, false, 129));
            foreach ($context['_seq'] as $context["_key"] => $context["to_recipient"]) {
                if (twig_get_attribute($this->env, $this->source, $context["to_recipient"], "NAME_FULL", [], "any", false, false, false, 129)) {
                    echo twig_get_attribute($this->env, $this->source, $context["to_recipient"], "NAME_FULL", [], "any", false, false, false, 129);
                } else {
                    echo "<a href=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["to_recipient"], "U_VIEW", [], "any", false, false, false, 129);
                    echo "\"";
                    if (twig_get_attribute($this->env, $this->source, $context["to_recipient"], "COLOUR", [], "any", false, false, false, 129)) {
                        echo " style=\"color:";
                        echo twig_get_attribute($this->env, $this->source, $context["to_recipient"], "COLOUR", [], "any", false, false, false, 129);
                        echo ";\"";
                    }
                    echo "><strong>";
                    echo twig_get_attribute($this->env, $this->source, $context["to_recipient"], "NAME", [], "any", false, false, false, 129);
                    echo "</strong></a>";
                }
                echo "&nbsp;";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['to_recipient'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 130
        echo "\t\t\t";
        if (($context["S_BCC_RECIPIENT"] ?? null)) {
            echo "<br /><strong>";
            echo $this->extensions['phpbb\template\twig\extension']->lang("BCC");
            echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
            echo "</strong> ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "bcc_recipient", [], "any", false, false, false, 130));
            foreach ($context['_seq'] as $context["_key"] => $context["bcc_recipient"]) {
                if (twig_get_attribute($this->env, $this->source, $context["bcc_recipient"], "NAME_FULL", [], "any", false, false, false, 130)) {
                    echo twig_get_attribute($this->env, $this->source, $context["bcc_recipient"], "NAME_FULL", [], "any", false, false, false, 130);
                } else {
                    echo "<a href=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["bcc_recipient"], "U_VIEW", [], "any", false, false, false, 130);
                    echo "\"";
                    if (twig_get_attribute($this->env, $this->source, $context["bcc_recipient"], "COLOUR", [], "any", false, false, false, 130)) {
                        echo " style=\"color:";
                        echo twig_get_attribute($this->env, $this->source, $context["bcc_recipient"], "COLOUR", [], "any", false, false, false, 130);
                        echo ";\"";
                    }
                    echo "><strong>";
                    echo twig_get_attribute($this->env, $this->source, $context["bcc_recipient"], "NAME", [], "any", false, false, false, 130);
                    echo "</strong></a>";
                }
                echo "&nbsp;";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['bcc_recipient'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 131
        echo "\t\t</p>


\t\t<div class=\"content\">";
        // line 134
        echo ($context["MESSAGE"] ?? null);
        echo "</div>

\t\t";
        // line 136
        if (($context["S_HAS_ATTACHMENTS"] ?? null)) {
            // line 137
            echo "\t\t\t<dl class=\"attachbox\">
\t\t\t\t<dt>
\t\t\t\t\t";
            // line 139
            echo $this->extensions['phpbb\template\twig\extension']->lang("ATTACHMENTS");
            echo "
\t\t\t\t</dt>
\t\t\t\t";
            // line 141
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "attachment", [], "any", false, false, false, 141));
            foreach ($context['_seq'] as $context["_key"] => $context["attachment"]) {
                // line 142
                echo "\t\t\t\t\t<dd>";
                echo twig_get_attribute($this->env, $this->source, $context["attachment"], "DISPLAY_ATTACHMENT", [], "any", false, false, false, 142);
                echo "</dd>
\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attachment'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 144
            echo "\t\t\t</dl>
\t\t";
        }
        // line 146
        echo "
\t\t";
        // line 147
        if (($context["S_DISPLAY_NOTICE"] ?? null)) {
            // line 148
            echo "\t\t\t<div class=\"post-notice error\">";
            echo $this->extensions['phpbb\template\twig\extension']->lang("DOWNLOAD_NOTICE");
            echo "</div>
\t\t";
        }
        // line 150
        echo "
\t\t";
        // line 151
        if ((($context["EDITED_MESSAGE"] ?? null) || ($context["EDIT_REASON"] ?? null))) {
            // line 152
            echo "\t\t<div class=\"notice\">";
            echo ($context["EDITED_MESSAGE"] ?? null);
            echo "
\t\t\t";
            // line 153
            if (($context["EDIT_REASON"] ?? null)) {
                echo "<br /><strong>";
                echo $this->extensions['phpbb\template\twig\extension']->lang("REASON");
                echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
                echo "</strong> <em>";
                echo ($context["EDIT_REASON"] ?? null);
                echo "</em>";
            }
            // line 154
            echo "\t\t</div>
\t\t";
        }
        // line 156
        echo "
\t\t";
        // line 157
        if (($context["SIGNATURE"] ?? null)) {
            // line 158
            echo "\t\t\t<div id=\"sig";
            echo ($context["MESSAGE_ID"] ?? null);
            echo "\" class=\"signature\">";
            echo ($context["SIGNATURE"] ?? null);
            echo "</div>
\t\t";
        }
        // line 160
        echo "\t</div>

\t<div class=\"back2top\">
\t\t<a href=\"#top\" class=\"top\" title=\"";
        // line 163
        echo $this->extensions['phpbb\template\twig\extension']->lang("BACK_TO_TOP");
        echo "\">
\t\t\t<i class=\"icon fa-chevron-circle-up fa-fw icon-gray\" aria-hidden=\"true\"></i>
\t\t\t<span class=\"sr-only\">";
        // line 165
        echo $this->extensions['phpbb\template\twig\extension']->lang("BACK_TO_TOP");
        echo "</span>
\t\t</a>
\t</div>

\t</div>
</div>

";
        // line 172
        // line 173
        if (($context["S_VIEW_MESSAGE"] ?? null)) {
            // line 174
            echo "<fieldset class=\"display-options\">

\t";
            // line 176
            if (($context["S_MARK_OPTIONS"] ?? null)) {
                echo "<label for=\"mark_option\"><select name=\"mark_option\" id=\"mark_option\">";
                echo ($context["S_MARK_OPTIONS"] ?? null);
                echo "</select></label>&nbsp;<input class=\"button2\" type=\"submit\" name=\"submit_mark\" value=\"";
                echo $this->extensions['phpbb\template\twig\extension']->lang("GO");
                echo "\" />";
            }
            // line 177
            echo "\t";
            if (($context["U_PREVIOUS_PM"] ?? null)) {
                // line 178
                echo "\t\t<a href=\"";
                echo ($context["U_PREVIOUS_PM"] ?? null);
                echo "\" class=\"left-box arrow-";
                echo ($context["S_CONTENT_FLOW_BEGIN"] ?? null);
                echo "\">
\t\t\t<i class=\"icon fa-angle-";
                // line 179
                echo ($context["S_CONTENT_FLOW_BEGIN"] ?? null);
                echo " fa-fw icon-black\" aria-hidden=\"true\"></i><span>";
                echo $this->extensions['phpbb\template\twig\extension']->lang("VIEW_PREVIOUS_PM");
                echo "</span>
\t\t</a>
\t";
            }
            // line 182
            echo "\t";
            if (($context["U_NEXT_PM"] ?? null)) {
                // line 183
                echo "\t\t<a href=\"";
                echo ($context["U_NEXT_PM"] ?? null);
                echo "\" class=\"right-box arrow-";
                echo ($context["S_CONTENT_FLOW_END"] ?? null);
                echo "\">
\t\t\t<i class=\"icon fa-angle-";
                // line 184
                echo ($context["S_CONTENT_FLOW_END"] ?? null);
                echo " fa-fw icon-black\" aria-hidden=\"true\"></i><span>";
                echo $this->extensions['phpbb\template\twig\extension']->lang("VIEW_NEXT_PM");
                echo "</span>
\t\t</a>
\t";
            }
            // line 187
            echo "\t";
            if (( !($context["S_UNREAD"] ?? null) &&  !($context["S_SPECIAL_FOLDER"] ?? null))) {
                echo "<label for=\"dest_folder\">";
                if (($context["S_VIEW_MESSAGE"] ?? null)) {
                    echo $this->extensions['phpbb\template\twig\extension']->lang("MOVE_TO_FOLDER");
                    echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
                    echo " ";
                } else {
                    echo $this->extensions['phpbb\template\twig\extension']->lang("MOVE_MARKED_TO_FOLDER");
                }
                echo " <select name=\"dest_folder\" id=\"dest_folder\">";
                echo ($context["S_TO_FOLDER_OPTIONS"] ?? null);
                echo "</select></label> <input class=\"button2\" type=\"submit\" name=\"move_pm\" value=\"";
                echo $this->extensions['phpbb\template\twig\extension']->lang("GO");
                echo "\" />";
            }
            // line 188
            echo "\t<input type=\"hidden\" name=\"marked_msg_id[]\" value=\"";
            echo ($context["MSG_ID"] ?? null);
            echo "\" />
\t<input type=\"hidden\" name=\"cur_folder_id\" value=\"";
            // line 189
            echo ($context["CUR_FOLDER_ID"] ?? null);
            echo "\" />
\t<input type=\"hidden\" name=\"p\" value=\"";
            // line 190
            echo ($context["MSG_ID"] ?? null);
            echo "\" />
</fieldset>
";
        }
        // line 193
        echo "
";
        // line 194
        $location = "ucp_pm_message_footer.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("ucp_pm_message_footer.html", "ucp_pm_viewmessage.html", 194)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 195
        echo "
";
        // line 196
        if (($context["S_DISPLAY_HISTORY"] ?? null)) {
            $location = "ucp_pm_history.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->loadTemplate("ucp_pm_history.html", "ucp_pm_viewmessage.html", 196)->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
        }
        // line 197
        echo "
";
        // line 198
        $location = "ucp_footer.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("ucp_footer.html", "ucp_pm_viewmessage.html", 198)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
    }

    public function getTemplateName()
    {
        return "ucp_pm_viewmessage.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  746 => 198,  743 => 197,  729 => 196,  726 => 195,  714 => 194,  711 => 193,  705 => 190,  701 => 189,  696 => 188,  679 => 187,  671 => 184,  664 => 183,  661 => 182,  653 => 179,  646 => 178,  643 => 177,  635 => 176,  631 => 174,  629 => 173,  628 => 172,  618 => 165,  613 => 163,  608 => 160,  600 => 158,  598 => 157,  595 => 156,  591 => 154,  582 => 153,  577 => 152,  575 => 151,  572 => 150,  566 => 148,  564 => 147,  561 => 146,  557 => 144,  548 => 142,  544 => 141,  539 => 139,  535 => 137,  533 => 136,  528 => 134,  523 => 131,  492 => 130,  462 => 129,  455 => 128,  448 => 127,  444 => 125,  442 => 124,  438 => 122,  436 => 121,  429 => 117,  423 => 116,  420 => 115,  417 => 114,  410 => 110,  404 => 109,  401 => 108,  398 => 107,  391 => 103,  385 => 102,  382 => 101,  379 => 100,  372 => 96,  366 => 95,  363 => 94,  360 => 93,  359 => 92,  356 => 91,  353 => 90,  351 => 89,  348 => 88,  343 => 86,  338 => 83,  336 => 82,  329 => 77,  323 => 76,  319 => 74,  317 => 73,  310 => 71,  292 => 70,  288 => 68,  285 => 67,  281 => 66,  278 => 65,  274 => 64,  265 => 60,  259 => 58,  256 => 57,  253 => 56,  252 => 55,  249 => 54,  247 => 53,  241 => 52,  230 => 50,  227 => 49,  222 => 48,  221 => 47,  218 => 46,  209 => 45,  194 => 44,  191 => 43,  189 => 42,  178 => 41,  177 => 40,  173 => 38,  172 => 37,  167 => 36,  166 => 35,  163 => 34,  161 => 33,  152 => 32,  151 => 31,  136 => 29,  132 => 28,  119 => 25,  115 => 23,  111 => 21,  103 => 18,  96 => 17,  93 => 16,  85 => 13,  78 => 12,  76 => 11,  73 => 10,  71 => 9,  64 => 4,  52 => 3,  49 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "ucp_pm_viewmessage.html", "");
    }
}
