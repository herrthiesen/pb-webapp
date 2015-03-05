<?php

/* BeckerWebAppBundle:Default:teleskop.html.twig */
class __TwigTemplate_75e7788ef200be1335493fc31e2b69d805a9b500e03ad6d68756bc6aea1d88da extends Twig_Template
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
        echo "    <div class=\"row\">
        <div class=\"col-xs-10 col-xs-offset-1\">
        <h1>TELESKOPARBEITSBÜHNEN</h1>
        </div>
    </div>
    
    <div class=\"row\">
        <div class=\"col-xs-10 col-xs-offset-1\">
            ";
        // line 15
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("BeckerWebAppBundle:Buehnen:getBuehnenListByKategorie", array("id" => 10)));
        // line 18
        echo "  
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "BeckerWebAppBundle:Default:teleskop.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 18,  56 => 15,  46 => 7,  43 => 6,  37 => 4,  11 => 2,);
    }
}
