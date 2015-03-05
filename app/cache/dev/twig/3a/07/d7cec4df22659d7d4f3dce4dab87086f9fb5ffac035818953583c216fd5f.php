<?php

/* :arbeitsbuehnen:arbeitsbuehnen.html.twig */
class __TwigTemplate_3a07d7cec4df22659d7d4f3dce4dab87086f9fb5ffac035818953583c216fd5f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        echo "    <ul>
    ";
        // line 3
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["buehnen"]) ? $context["buehnen"] : $this->getContext($context, "buehnen")));
        foreach ($context['_seq'] as $context["_key"] => $context["buehne"]) {
            // line 4
            echo "        <li>";
            echo twig_escape_filter($this->env, $this->getAttribute($context["buehne"], "name", array()), "html", null, true);
            echo "</li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['buehne'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 6
        echo "    </ul>";
    }

    public function getTemplateName()
    {
        return ":arbeitsbuehnen:arbeitsbuehnen.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  35 => 6,  26 => 4,  22 => 3,  19 => 2,);
    }
}
