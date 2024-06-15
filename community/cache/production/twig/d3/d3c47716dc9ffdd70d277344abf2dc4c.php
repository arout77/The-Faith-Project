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

/* @oneall_sociallogin/event/overall_header_stylesheets_after.html */
class __TwigTemplate_11a1e6d3784c0dfd65cb010ad93b078f extends \Twig\Template
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
        if (($context["OA_SOCIAL_LOGIN_EMBED_LIBRARY"] ?? null)) {
            echo " 
\t\t<!-- OneAll Social Login : http://www.oneall.com //-->
\t\t<script type=\"text/javascript\">
\t\t\t// <![CDATA[\t\t
\t\t\t\t(function () {
\t\t\t\t\tvar oa = document.createElement('script'); oa.type = 'text/javascript'; 
\t\t\t\t\toa.async = true; oa.src = '//";
            // line 7
            echo ($context["OA_SOCIAL_LOGIN_API_SUBDOMAIN"] ?? null);
            echo ".api.oneall.com/socialize/library.js';
\t\t\t\t\tvar s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(oa, s);
\t\t\t\t})();
\t\t\t// ]]>
\t\t</script>
";
        }
    }

    public function getTemplateName()
    {
        return "@oneall_sociallogin/event/overall_header_stylesheets_after.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 7,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@oneall_sociallogin/event/overall_header_stylesheets_after.html", "");
    }
}
