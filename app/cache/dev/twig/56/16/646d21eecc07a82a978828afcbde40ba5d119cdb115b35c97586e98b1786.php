<?php

/* BeckerWebAppBundle:Default:search.html.twig */
class __TwigTemplate_5616646d21eecc07a82a978828afcbde40ba5d119cdb115b35c97586e98b1786 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        try {
            $this->parent = $this->env->loadTemplate("::base.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(2);

            throw $e;
        }

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        echo "BECKER WEBAPP";
    }

    // line 6
    public function block_body($context, array $blocks = array())
    {
        // line 7
        echo "    ";
        if (((isset($context["term"]) ? $context["term"] : $this->getContext($context, "term")) == "")) {
            // line 8
            echo "        <div class=\"row\">
            <div class=\"col-xs-10 col-xs-offset-1\">
                <h1>ERWEITERTE SUCHE</h1>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col-xs-10 col-xs-offset-1\"> 
                ";
            // line 15
            echo             $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start');
            echo "
                    ";
            // line 16
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
            echo "
                    ";
            // line 17
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "kategorie", array()), 'row');
            echo "
                ";
            // line 18
            echo             $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_end');
            echo "
            </div>
        </div>
    ";
        } else {
            // line 22
            echo "        <div class=\"row\">
            <div class=\"col-xs-10 col-xs-offset-1\">
                <h1>SUCHERGEBNISSE</h1>
                <h4>Suchbegriff \"";
            // line 25
            echo twig_escape_filter($this->env, (isset($context["term"]) ? $context["term"] : $this->getContext($context, "term")), "html", null, true);
            echo "\"</h4>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col-xs-10 col-xs-offset-1\"> 
                ";
            // line 30
            echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("BeckerWebAppBundle:Buehnen:search", array("term" =>             // line 32
(isset($context["term"]) ? $context["term"] : $this->getContext($context, "term")))));
            // line 33
            echo "  
            </div>
        </div>
    ";
        }
        // line 37
        echo "    </div>
</div>
            
";
    }

    public function getTemplateName()
    {
        return "BeckerWebAppBundle:Default:search.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  99 => 37,  93 => 33,  91 => 32,  90 => 30,  82 => 25,  77 => 22,  70 => 18,  66 => 17,  62 => 16,  58 => 15,  49 => 8,  46 => 7,  43 => 6,  37 => 4,  11 => 2,);
    }
}
