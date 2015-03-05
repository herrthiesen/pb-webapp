<?php

/* BeckerWebAppBundle:Default:index.html.twig */
class __TwigTemplate_beb2c2bbada87bec46844fbcd6907437229338c664e3da1e26fb2c8b485056ed extends Twig_Template
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
        <h1>ARBEITSBÜHNEN</h1>
        </div>
    </div>
    
    <div class=\"row\">
        <div class=\"col-xs-10 col-xs-offset-1\">
            <div class=\"col-xs-3\">
                <a href=\"../lkw\" onclick=\"OpenLink(this); return false\"><img src=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("lib/img/LKW.png"), "html", null, true);
        echo "\" height=\"120px\" /></a>
            </div>
            <div class=\"col-xs-3\">
                <a href=\"../gelenk\" onclick=\"OpenLink(this); return false\"><img src=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("lib/img/Gelenk.png"), "html", null, true);
        echo "\" height=\"120px\" /></a>
            </div>      
            <div class=\"col-xs-3\">
                <a href=\"../teleskop\" onclick=\"OpenLink(this); return false\"><img src=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("lib/img/Teleskop.png"), "html", null, true);
        echo "\" height=\"120px\" /></a>
            </div>   
            <div class=\"col-xs-3\">
                <a href=\"../scheren\" onclick=\"OpenLink(this); return false\"><img src=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("lib/img/Schere.png"), "html", null, true);
        echo "\" height=\"120px\" /></a>
            </div>     
            <div class=\"col-xs-3\">
                <a href=\"../anhaenger\" onclick=\"OpenLink(this); return false\"><img src=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("lib/img/Anhaenger.png"), "html", null, true);
        echo "\" height=\"120px\" /></a>
            </div>  
            <div class=\"col-xs-3\">
                <a href=\"../mast\" onclick=\"OpenLink(this); return false\"><img src=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("lib/img/Mast.png"), "html", null, true);
        echo "\" height=\"120px\" /></a>
            </div>     
            <div class=\"col-xs-3\">
                <a href=\"../lift\" onclick=\"OpenLink(this); return false\"><img src=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("lib/img/Personenlift.png"), "html", null, true);
        echo "\" height=\"120px\" /></a>
            </div>     
            <div class=\"col-xs-3\">
                <a href=\"../ketten\" onclick=\"OpenLink(this); return false\"><img src=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("lib/img/Raupe.png"), "html", null, true);
        echo "\" height=\"120px\" /></a>
            </div>               
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "BeckerWebAppBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  99 => 37,  93 => 34,  87 => 31,  81 => 28,  75 => 25,  69 => 22,  63 => 19,  57 => 16,  46 => 7,  43 => 6,  37 => 4,  11 => 2,);
    }
}
