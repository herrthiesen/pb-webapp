<?php

/* :arbeitsbuehnen:buehnenKategorie.html.twig */
class __TwigTemplate_cead9fea0f393545c99a75c9b7be5b148d533b42ee87e3df6c19df02ca511e24 extends Twig_Template
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
        echo "    

    ";
        // line 4
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["buehnen"]) ? $context["buehnen"] : $this->getContext($context, "buehnen")));
        foreach ($context['_seq'] as $context["_key"] => $context["buehne"]) {
            echo "        
        <div class=\"media\">
            <div class=\"media-left\">
                <a href=\"#\">
                    <img class=\"media-object\" src=\"/BECKER-WEBAPP/web/uploads/img/";
            // line 8
            echo twig_escape_filter($this->env, $this->getAttribute($context["buehne"], "img", array()), "html", null, true);
            echo ".jpg\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["buehne"], "name", array()), "html", null, true);
            echo "\" width=\"150px\">
                </a>
            </div>
            <div class=\"media-body\">
                <h4 class=\"media-heading\">";
            // line 12
            echo twig_escape_filter($this->env, $this->getAttribute($context["buehne"], "name", array()), "html", null, true);
            echo "<small>";
            echo twig_escape_filter($this->env, $this->getAttribute($context["buehne"], "hersteller", array()), "html", null, true);
            echo "</small></h4>
                <p><strong>Arbeitshöhe:</strong> ";
            // line 13
            echo twig_escape_filter($this->env, $this->getAttribute($context["buehne"], "ahoehe", array()), "html", null, true);
            echo " m</p>
                <p><strong>Korblast:</strong> ";
            // line 14
            echo twig_escape_filter($this->env, $this->getAttribute($context["buehne"], "korblast", array()), "html", null, true);
            echo " kg</p>
                <p><strong>Seitl. Weitreiche:</strong> ";
            // line 15
            echo twig_escape_filter($this->env, $this->getAttribute($context["buehne"], "reichweite", array()), "html", null, true);
            echo " m</p>
                <p><strong>Abstützbreite:</strong> ";
            // line 16
            echo twig_escape_filter($this->env, $this->getAttribute($context["buehne"], "stuetzbreite", array()), "html", null, true);
            echo " m</p>
                <p> <span class=\"label label-primary\">";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute($context["buehne"], "tag1", array()), "html", null, true);
            echo "</span>
                    <span class=\"label label-success\">";
            // line 18
            echo twig_escape_filter($this->env, $this->getAttribute($context["buehne"], "tag2", array()), "html", null, true);
            echo "</span>
                    <span class=\"label label-warning\">";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute($context["buehne"], "tag3", array()), "html", null, true);
            echo "</span></p>
            </div>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['buehne'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        echo "    
    ";
    }

    public function getTemplateName()
    {
        return ":arbeitsbuehnen:buehnenKategorie.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  81 => 23,  71 => 19,  67 => 18,  63 => 17,  59 => 16,  55 => 15,  51 => 14,  47 => 13,  41 => 12,  32 => 8,  23 => 4,  19 => 2,);
    }
}
