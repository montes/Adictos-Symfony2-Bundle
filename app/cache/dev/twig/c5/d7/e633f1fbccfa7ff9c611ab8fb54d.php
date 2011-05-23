<?php

/* MontesAdictosBundle:Store:index.html.twig */
class __TwigTemplate_c5d7e633f1fbccfa7ff9c611ab8fb54d extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        echo "<div class='infoWindow'>
    So you want store ";
        // line 2
        echo twig_escape_filter($this->env, $this->getContext($context, 'store'), "html");
        echo "?
</div>
";
    }

    public function getTemplateName()
    {
        return "MontesAdictosBundle:Store:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
