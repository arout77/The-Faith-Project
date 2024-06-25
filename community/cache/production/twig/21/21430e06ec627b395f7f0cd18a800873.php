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

/* posting_pm_layout.html */
class __TwigTemplate_20eea55c3d9e609c6ccb0db3c0091285 extends \Twig\Template
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
        $this->loadTemplate("ucp_header.html", "posting_pm_layout.html", 1)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 2
        echo "
";
        // line 3
        if (($context["S_DRAFT_LOADED"] ?? null)) {
            // line 4
            echo "\t<div class=\"panel\">
\t\t<div class=\"inner\">

\t\t<h3>";
            // line 7
            echo $this->extensions['phpbb\template\twig\extension']->lang("INFORMATION");
            echo "</h3>
\t\t<p>";
            // line 8
            echo $this->extensions['phpbb\template\twig\extension']->lang("DRAFT_LOADED_PM");
            echo "</p>

\t\t</div>
\t</div>
";
        }
        // line 13
        echo "
";
        // line 14
        if (($context["S_SHOW_DRAFTS"] ?? null)) {
            $location = "drafts.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->loadTemplate("drafts.html", "posting_pm_layout.html", 14)->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
        }
        // line 15
        echo "
";
        // line 16
        if (($context["S_DISPLAY_PREVIEW"] ?? null)) {
            $location = "posting_preview.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->loadTemplate("posting_preview.html", "posting_pm_layout.html", 16)->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
        }
        // line 17
        echo "
<h2 class=\"posting-title\">";
        // line 18
        echo $this->extensions['phpbb\template\twig\extension']->lang("TITLE");
        echo "</h2>

<div class=\"panel\" id=\"pmheader-postingbox\">
\t<div class=\"inner\">
\t";
        // line 22
        // line 23
        echo "\t";
        $location = "posting_pm_header.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("posting_pm_header.html", "posting_pm_layout.html", 23)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 24
        echo "\t";
        // line 25
        echo "\t</div>
</div>

<div class=\"panel\" id=\"postingbox\">
\t<div class=\"inner\">

\t";
        // line 31
        $value = 1;
        $context['definition']->set('EXTRA_POSTING_OPTIONS', $value);
        // line 32
        echo "\t";
        $location = "posting_editor.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("posting_editor.html", "posting_pm_layout.html", 32)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 33
        echo "
\t</div>
</div>

";
        // line 37
        if ((($context["S_SHOW_ATTACH_BOX"] ?? null) && ($context["FILTERS"] ?? null))) {
            $location = "posting_attach_body.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->loadTemplate("posting_attach_body.html", "posting_pm_layout.html", 37)->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
        }
        // line 38
        echo "
";
        // line 39
        if (($context["S_DISPLAY_REVIEW"] ?? null)) {
            $location = "posting_topic_review.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->loadTemplate("posting_topic_review.html", "posting_pm_layout.html", 39)->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
        }
        // line 40
        echo "
";
        // line 41
        if (($context["S_DISPLAY_HISTORY"] ?? null)) {
            $location = "ucp_pm_history.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->loadTemplate("ucp_pm_history.html", "posting_pm_layout.html", 41)->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
        }
        // line 42
        echo "
";
        // line 43
        $location = "ucp_footer.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("ucp_footer.html", "posting_pm_layout.html", 43)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
    }

    public function getTemplateName()
    {
        return "posting_pm_layout.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  212 => 43,  209 => 42,  195 => 41,  192 => 40,  178 => 39,  175 => 38,  161 => 37,  155 => 33,  142 => 32,  139 => 31,  131 => 25,  129 => 24,  116 => 23,  115 => 22,  108 => 18,  105 => 17,  91 => 16,  88 => 15,  74 => 14,  71 => 13,  63 => 8,  59 => 7,  54 => 4,  52 => 3,  49 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "posting_pm_layout.html", "");
    }
}
