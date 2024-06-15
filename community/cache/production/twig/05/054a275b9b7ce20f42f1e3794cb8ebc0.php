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

/* index_body.html */
class __TwigTemplate_e681c2d03bba3ed776169042ad5809f7 extends \Twig\Template
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
        $this->loadTemplate("overall_header.html", "index_body.html", 1)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 2
        echo "
";
        // line 3
        // line 4
        echo "
";
        // line 5
        // line 6
        echo "
";
        // line 7
        $location = "forumlist_body.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("forumlist_body.html", "index_body.html", 7)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 8
        echo "
";
        // line 9
        // line 10
        echo "
<div class=\"forabg\">
\t<div class=\"inner\">
\t<ul class=\"topiclist\">
\t\t<li class=\"header\">
\t\t\t<dl class=\"row-item\">
\t\t\t\t<dt><div class=\"list-inner\">";
        // line 16
        echo $this->extensions['phpbb\template\twig\extension']->lang("INFORMATION");
        echo "</div></dt>
\t\t\t</dl>
\t\t</li>
\t</ul>
\t<ul class=\"topiclist forums stats zebra-list\">
\t
\t\t";
        // line 22
        if (( !($context["S_USER_LOGGED_IN"] ?? null) &&  !($context["S_IS_BOT"] ?? null))) {
            // line 23
            echo "\t\t\t<li class=\"row\">
\t\t\t\t<div class=\"stat-block login-register\">
\t\t\t\t\t<form method=\"post\" action=\"";
            // line 25
            echo ($context["S_LOGIN_ACTION"] ?? null);
            echo "\">
\t\t\t\t\t<h3><i class=\"icon fa-fw fa-sign-in\"></i> <a href=\"";
            // line 26
            echo ($context["U_LOGIN_LOGOUT"] ?? null);
            echo "\">";
            echo $this->extensions['phpbb\template\twig\extension']->lang("LOGIN_LOGOUT");
            echo "</a>";
            if (($context["S_REGISTER_ENABLED"] ?? null)) {
                echo " &bull; <a href=\"";
                echo ($context["U_REGISTER"] ?? null);
                echo "\">";
                echo $this->extensions['phpbb\template\twig\extension']->lang("REGISTER");
                echo "</a>";
            }
            echo "</h3>
\t\t\t\t\t\t<fieldset class=\"quick-login\">
\t\t\t\t\t\t\t<label for=\"username\"><span>";
            // line 28
            echo $this->extensions['phpbb\template\twig\extension']->lang("USERNAME");
            echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
            echo "</span> <input type=\"text\" tabindex=\"1\" name=\"username\" id=\"username\" size=\"10\" class=\"inputbox\" title=\"";
            echo $this->extensions['phpbb\template\twig\extension']->lang("USERNAME");
            echo "\" /></label>
\t\t\t\t\t\t\t<label for=\"password\"><span>";
            // line 29
            echo $this->extensions['phpbb\template\twig\extension']->lang("PASSWORD");
            echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
            echo "</span> <input type=\"password\" tabindex=\"2\" name=\"password\" id=\"password\" size=\"10\" class=\"inputbox\" title=\"";
            echo $this->extensions['phpbb\template\twig\extension']->lang("PASSWORD");
            echo "\" autocomplete=\"off\" /></label>
\t\t\t\t\t\t\t";
            // line 30
            if (($context["U_SEND_PASSWORD"] ?? null)) {
                // line 31
                echo "\t\t\t\t\t\t\t\t<a href=\"";
                echo ($context["U_SEND_PASSWORD"] ?? null);
                echo "\">";
                echo $this->extensions['phpbb\template\twig\extension']->lang("FORGOT_PASS");
                echo "</a>
\t\t\t\t\t\t\t";
            }
            // line 33
            echo "\t\t\t\t\t\t\t";
            if (($context["S_AUTOLOGIN_ENABLED"] ?? null)) {
                // line 34
                echo "\t\t\t\t\t\t\t\t<span class=\"responsive-hide\">|</span> <label for=\"autologin\">";
                echo $this->extensions['phpbb\template\twig\extension']->lang("LOG_ME_IN");
                echo " <input type=\"checkbox\" tabindex=\"4\" name=\"autologin\" id=\"autologin\" /></label>
\t\t\t\t\t\t\t";
            }
            // line 36
            echo "\t\t\t\t\t\t\t<input type=\"submit\" tabindex=\"5\" name=\"login\" value=\"";
            echo $this->extensions['phpbb\template\twig\extension']->lang("LOGIN");
            echo "\" class=\"button2\" />
\t\t\t\t\t\t\t";
            // line 37
            echo ($context["S_LOGIN_REDIRECT"] ?? null);
            echo "
\t\t\t\t\t\t\t";
            // line 38
            echo ($context["S_FORM_TOKEN_LOGIN"] ?? null);
            echo "
\t\t\t\t\t\t</fieldset>
\t\t\t\t\t</form>
\t\t\t\t</div>
\t\t\t</li>
\t\t";
        }
        // line 44
        echo "
\t\t";
        // line 45
        // line 46
        echo "
\t\t";
        // line 47
        if (($context["S_DISPLAY_ONLINE_LIST"] ?? null)) {
            // line 48
            echo "\t\t\t<li class=\"row\">
\t\t\t\t<div class=\"stat-block online-list\">
\t\t\t\t\t";
            // line 50
            if (($context["U_VIEWONLINE"] ?? null)) {
                echo "<h3><i class=\"icon fa-fw fa-users\"></i> <a href=\"";
                echo ($context["U_VIEWONLINE"] ?? null);
                echo "\">";
                echo $this->extensions['phpbb\template\twig\extension']->lang("WHO_IS_ONLINE");
                echo "</a></h3>";
            } else {
                echo "<h3><i class=\"icon fa-fw fa-users\"></i> ";
                echo $this->extensions['phpbb\template\twig\extension']->lang("WHO_IS_ONLINE");
                echo "</h3>";
            }
            // line 51
            echo "\t\t\t\t\t<p>
\t\t\t\t\t\t";
            // line 52
            // line 53
            echo "\t\t\t\t\t\t";
            echo ($context["TOTAL_USERS_ONLINE"] ?? null);
            echo " (";
            echo $this->extensions['phpbb\template\twig\extension']->lang("ONLINE_EXPLAIN");
            echo ")<br />";
            echo ($context["RECORD_USERS"] ?? null);
            echo "<br />
\t\t\t\t\t\t";
            // line 54
            if (($context["U_VIEWONLINE"] ?? null)) {
                // line 55
                echo "\t\t\t\t\t\t\t\t<br />";
                echo ($context["LOGGED_IN_USER_LIST"] ?? null);
                echo "
\t\t\t\t\t\t\t\t";
                // line 56
                if (($context["LEGEND"] ?? null)) {
                    echo "<br /><em>";
                    echo $this->extensions['phpbb\template\twig\extension']->lang("LEGEND");
                    echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
                    echo " ";
                    echo ($context["LEGEND"] ?? null);
                    echo "</em>";
                }
                // line 57
                echo "\t\t\t\t\t\t";
            }
            // line 58
            echo "\t\t\t\t\t\t";
            // line 59
            echo "\t\t\t\t\t</p>
\t\t\t\t</div>
\t\t\t</li>
\t\t";
        }
        // line 63
        echo "\t\t
\t\t";
        // line 64
        // line 65
        echo "
\t\t";
        // line 66
        if (($context["S_DISPLAY_BIRTHDAY_LIST"] ?? null)) {
            // line 67
            echo "\t\t\t<li class=\"row\">
\t\t\t\t<div class=\"stat-block birthday-list\">
\t\t\t\t\t<h3><i class=\"icon fa-fw fa-birthday-cake\"></i> ";
            // line 69
            echo $this->extensions['phpbb\template\twig\extension']->lang("BIRTHDAYS");
            echo "</h3>
\t\t\t\t\t<p>
\t\t\t\t\t\t";
            // line 71
            // line 72
            echo "\t\t\t\t\t\t";
            if (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "birthdays", [], "any", false, false, false, 72))) {
                echo $this->extensions['phpbb\template\twig\extension']->lang("CONGRATULATIONS");
                echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
                echo " <strong>";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "birthdays", [], "any", false, false, false, 72));
                foreach ($context['_seq'] as $context["_key"] => $context["birthdays"]) {
                    echo twig_get_attribute($this->env, $this->source, $context["birthdays"], "USERNAME", [], "any", false, false, false, 72);
                    if ((twig_get_attribute($this->env, $this->source, $context["birthdays"], "AGE", [], "any", false, false, false, 72) !== "")) {
                        echo " (";
                        echo twig_get_attribute($this->env, $this->source, $context["birthdays"], "AGE", [], "any", false, false, false, 72);
                        echo ")";
                    }
                    if ( !twig_get_attribute($this->env, $this->source, $context["birthdays"], "S_LAST_ROW", [], "any", false, false, false, 72)) {
                        echo ", ";
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['birthdays'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                echo "</strong>";
            } else {
                echo $this->extensions['phpbb\template\twig\extension']->lang("NO_BIRTHDAYS");
            }
            // line 73
            echo "\t\t\t\t\t\t";
            // line 74
            echo "\t\t\t\t\t</p>
\t\t\t\t</div>
\t\t\t</li>
\t\t";
        }
        // line 78
        echo "
\t\t";
        // line 79
        if (($context["NEWEST_USER"] ?? null)) {
            // line 80
            echo "\t\t\t<li class=\"row\">
\t\t\t\t<div class=\"stat-block statistics\">
\t\t\t\t\t<h3><i class=\"icon fa-fw fa-bar-chart\"></i> ";
            // line 82
            echo $this->extensions['phpbb\template\twig\extension']->lang("STATISTICS");
            echo "</h3>
\t\t\t\t\t<p>
\t\t\t\t\t\t";
            // line 84
            // line 85
            echo "\t\t\t\t\t\t";
            echo ($context["TOTAL_POSTS"] ?? null);
            echo " &bull; ";
            echo ($context["TOTAL_TOPICS"] ?? null);
            echo " &bull; ";
            echo ($context["TOTAL_USERS"] ?? null);
            echo " &bull; ";
            echo ($context["NEWEST_USER"] ?? null);
            echo "
\t\t\t\t\t\t";
            // line 86
            // line 87
            echo "\t\t\t\t\t</p>
\t\t\t\t</div>
\t\t\t</li>
\t\t";
        }
        // line 91
        echo "
\t\t";
        // line 92
        // line 93
        echo "
\t</ul>
\t</div>
</div>

";
        // line 98
        $location = "overall_footer.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("overall_footer.html", "index_body.html", 98)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
    }

    public function getTemplateName()
    {
        return "index_body.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  331 => 98,  324 => 93,  323 => 92,  320 => 91,  314 => 87,  313 => 86,  302 => 85,  301 => 84,  296 => 82,  292 => 80,  290 => 79,  287 => 78,  281 => 74,  279 => 73,  253 => 72,  252 => 71,  247 => 69,  243 => 67,  241 => 66,  238 => 65,  237 => 64,  234 => 63,  228 => 59,  226 => 58,  223 => 57,  214 => 56,  209 => 55,  207 => 54,  198 => 53,  197 => 52,  194 => 51,  182 => 50,  178 => 48,  176 => 47,  173 => 46,  172 => 45,  169 => 44,  160 => 38,  156 => 37,  151 => 36,  145 => 34,  142 => 33,  134 => 31,  132 => 30,  125 => 29,  118 => 28,  103 => 26,  99 => 25,  95 => 23,  93 => 22,  84 => 16,  76 => 10,  75 => 9,  72 => 8,  60 => 7,  57 => 6,  56 => 5,  53 => 4,  52 => 3,  49 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "index_body.html", "");
    }
}
