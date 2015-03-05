<?php

/* ::impressum.html.twig */
class __TwigTemplate_a64a3022529c6a5865dbbbdc80bc488dec10bcddf751fc0bbc2b449b78c1e51e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("base.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo "Impressum
";
    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
        // line 8
        echo "<p>Responcible for this website (§ 5 TMG, § 55 RfStV):</p>
<p>Fake Fakerson</p>
<p>123 Fakestreet</p>
<p>Fakestown - USA</p>
";
    }

    public function getTemplateName()
    {
        return "::impressum.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 8,  45 => 7,  40 => 4,  37 => 3,  11 => 1,);
    }
}
