<?php

/* FrameworkBundle:Exception:trace.html.twig */
class __TwigTemplate_41339282abf2e2dd15881c4ebc4bc3ef extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        if ($this->getAttribute($this->getContext($context, 'trace'), "function", array(), "any", false)) {
            // line 2
            echo "    at 
    <strong>
        <abbr title=\"";
            // line 4
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'trace'), "class", array(), "any", false), "html");
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'trace'), "short_class", array(), "any", false), "html");
            echo "</abbr>
        ";
            // line 5
            echo twig_escape_filter($this->env, ($this->getAttribute($this->getContext($context, 'trace'), "type", array(), "any", false) . $this->getAttribute($this->getContext($context, 'trace'), "function", array(), "any", false)), "html");
            echo "
    </strong> 
    (";
            // line 7
            echo $this->env->getExtension('templating')->formatArgs($this->getAttribute($this->getContext($context, 'trace'), "args", array(), "any", false));
            echo ")
    <br />
";
        }
        // line 10
        echo "
";
        // line 11
        if (((null !== $this->getAttribute($this->getContext($context, 'trace'), "file", array(), "any", true)) && (null !== $this->getAttribute($this->getContext($context, 'trace'), "line", array(), "any", true)))) {
            // line 12
            echo "    in ";
            echo $this->env->getExtension('templating')->formatFile($this->getAttribute($this->getContext($context, 'trace'), "file", array(), "any", false), $this->getAttribute($this->getContext($context, 'trace'), "line", array(), "any", false));
            echo "&nbsp;
    ";
            // line 13
            ob_start();
            // line 14
            echo "    <a href=\"#\" onclick=\"toggle('trace_";
            echo twig_escape_filter($this->env, (($this->getContext($context, 'prefix') . "_") . $this->getContext($context, 'i')), "html");
            echo "'); switchIcons('icon_";
            echo twig_escape_filter($this->env, (($this->getContext($context, 'prefix') . "_") . $this->getContext($context, 'i')), "html");
            echo "_open', 'icon_";
            echo twig_escape_filter($this->env, (($this->getContext($context, 'prefix') . "_") . $this->getContext($context, 'i')), "html");
            echo "_close'); return false;\">
        <img class=\"toggle\" id=\"icon_";
            // line 15
            echo twig_escape_filter($this->env, (($this->getContext($context, 'prefix') . "_") . $this->getContext($context, 'i')), "html");
            echo "_close\" alt=\"-\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('templating')->getAssetUrl("bundles/framework/images/blue_picto_less.gif"), "html");
            echo "\" style=\"visibility: ";
            echo (((0 == $this->getContext($context, 'i'))) ? ("display") : ("hidden"));
            echo "\" />
        <img class=\"toggle\" id=\"icon_";
            // line 16
            echo twig_escape_filter($this->env, (($this->getContext($context, 'prefix') . "_") . $this->getContext($context, 'i')), "html");
            echo "_open\" alt=\"+\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('templating')->getAssetUrl("bundles/framework/images/blue_picto_more.gif"), "html");
            echo "\" style=\"visibility: ";
            echo (((0 == $this->getContext($context, 'i'))) ? ("hidden") : ("display"));
            echo "; margin-left: -18px\" />
    </a>
    ";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            // line 19
            echo "    <div id=\"trace_";
            echo twig_escape_filter($this->env, (($this->getContext($context, 'prefix') . "_") . $this->getContext($context, 'i')), "html");
            echo "\" style=\"display: ";
            echo (((0 == $this->getContext($context, 'i'))) ? ("block") : ("none"));
            echo "\" class=\"trace\">
        ";
            // line 20
            echo $this->env->getExtension('templating')->fileExcerpt($this->getAttribute($this->getContext($context, 'trace'), "file", array(), "any", false), $this->getAttribute($this->getContext($context, 'trace'), "line", array(), "any", false));
            echo "
    </div>
";
        }
    }

    public function getTemplateName()
    {
        return "FrameworkBundle:Exception:trace.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
