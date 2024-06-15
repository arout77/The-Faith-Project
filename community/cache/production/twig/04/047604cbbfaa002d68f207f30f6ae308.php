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

/* @oneall_sociallogin/event/overall_header_content_before.html */
class __TwigTemplate_5dcff8d8ced9f8105d7f13226741b90e extends \Twig\Template
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
        if (($context["OA_SOCIAL_LOGIN_EMBED_SOCIAL_LOGIN"] ?? null)) {
            echo " 
\t<div class=\"panel\">
\t\t<div class=\"inner\">
\t\t\t<div class=\"content\">
\t\t\t\t";
            // line 5
            if (($context["OA_SOCIAL_LOGIN_PAGE_CAPTION"] ?? null)) {
                // line 6
                echo "\t\t\t\t\t<h2 class=\"login-title\">";
                echo ($context["OA_SOCIAL_LOGIN_PAGE_CAPTION"] ?? null);
                echo "</h2>
\t\t\t\t";
            }
            // line 8
            echo "\t\t\t\t<div class=\"oneall_social_login_providers\" id=\"oneall_social_login_overall_header_content_before\"></div>
\t\t\t\t\t<!-- OneAll Social Login : http://www.oneall.com //-->
\t\t\t\t\t<script type=\"text/javascript\">
\t\t\t\t\t\t// <![CDATA[\t\t\t\t\t            
\t\t\t\t\t\t\tvar _oneall = _oneall || [];
\t\t\t\t\t\t\t_oneall.push(['social_login', 'set_providers', ['";
            // line 13
            echo ($context["OA_SOCIAL_LOGIN_PROVIDERS"] ?? null);
            echo "']]);\t
\t\t\t\t\t\t\t_oneall.push(['social_login', 'set_callback_uri', '";
            // line 14
            echo ($context["OA_SOCIAL_LOGIN_CALLBACK_URI"] ?? null);
            echo "']);\t\t\t\t
\t\t\t\t\t\t\t_oneall.push(['social_login', 'set_custom_css_uri', ((\"https:\" == document.location.protocol) ? \"https://secure\" : \"http://public\") + '.oneallcdn.com/css/api/socialize/themes/phpbb/default.css']);
\t\t\t\t\t\t\t_oneall.push(['social_login', 'do_render_ui', 'oneall_social_login_overall_header_content_before']);
\t\t\t\t\t\t// ]]>
\t\t\t\t\t</script>\t\t
\t\t\t</div>
\t\t</div>
</div>
";
        }
    }

    public function getTemplateName()
    {
        return "@oneall_sociallogin/event/overall_header_content_before.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  63 => 14,  59 => 13,  52 => 8,  46 => 6,  44 => 5,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@oneall_sociallogin/event/overall_header_content_before.html", "");
    }
}
