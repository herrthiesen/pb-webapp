<?php

/* base.html.twig */
class __TwigTemplate_bc96b5f2f249020a4bd8e24321ddf3d471fdcef12f976ba30c958adb211e7e04 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"utf-8\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
        <meta name=\"apple-mobile-web-app-capable\" content=\"yes\"/>
        <meta name=\"apple-mobile-web-app-status-bar-style\" content=\"black\" />
        <meta name=\"viewport\" content=\"width=device-width\" />
        <link rel=\"apple-touch-icon-precomposed\" sizes=\"144x144\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("lib/img/PB-orange.png"), "html", null, true);
        echo "\">
        <link rel=\"apple-touch-icon-precomposed\" sizes=\"114x114\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("lib/img/PB-orange.png"), "html", null, true);
        echo "\">
        <link rel=\"apple-touch-icon-precomposed\" sizes=\"72x72\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("lib/img/PB-orange.png"), "html", null, true);
        echo "\">
        <link rel=\"apple-touch-icon-precomposed\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("lib/img/PB.png"), "html", null, true);
        echo "\">
        
        
        
        <title>";
        // line 16
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 17
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 22
        echo "   
            
        
        <link href=\"css/style.css\" rel=\"stylesheet\">
        <script type=\"text/javascript\">
        function OpenLink(theLink){
            window.location.href = theLink.href;
        }
        </script>
        
    </head>
    <body>
        <nav class=\"navbar navbar-inverse\">
            <div class=\"container-fluid\">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class=\"navbar-header\">
                <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#bs-example-navbar-collapse-1\">
                  <span class=\"sr-only\">Toggle navigation</span>
                  <span class=\"icon-bar\"></span>
                  <span class=\"icon-bar\"></span>
                  <span class=\"icon-bar\"></span>
                </button>
                <a class=\"navbar-brand\" href=\"../index\" onclick=\"OpenLink(this); return false\"><img src=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("lib/img/PB.png"), "html", null, true);
        echo "\" height=\"25px\"></a>
              </div>

              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">
                <ul class=\"nav navbar-nav\">
                  <li ><a href=\"../index\" onclick=\"OpenLink(this); return false\">START <span class=\"sr-only\">(current)</span></a></li>
                  <li><a href=\"../eintragen\">EINTRAGEN</a></li>        
                </ul>
                <form class=\"navbar-form navbar-left\" role=\"search\" method=\"post\" action=\"/BECKER-WEBAPP/web/app_dev.php/search/\">
                  <div class=\"input-group\">
                      <input type=\"text\" class=\"form-control\" placeholder=\"Suche nach...\" name=\"term\" id=\"term\">     
                      <span class=\"input-group-btn\">
                      <button class=\"btn btn-default\" type=\"submit\"><i class=\"glyphicon glyphicon-search\"></i></button>
                      </span>
                  </div>
                </form>      
              </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
          </nav>    
       

        <div id=\"content\">
            ";
        // line 67
        $this->displayBlock('body', $context, $blocks);
        // line 68
        echo "        </div>
    </body>
</html>
";
    }

    // line 16
    public function block_title($context, array $blocks = array())
    {
        echo "Welcome!";
    }

    // line 17
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 18
        echo "        
        <link rel=\"stylesheet\" href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("lib/bootstrap/css/bootstrap.css"), "html", null, true);
        echo "\">
        <link rel=\"stylesheet\" href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("lib/css/style.css"), "html", null, true);
        echo "\">
        ";
    }

    // line 67
    public function block_body($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  138 => 67,  132 => 20,  128 => 19,  125 => 18,  122 => 17,  116 => 16,  109 => 68,  107 => 67,  81 => 44,  57 => 22,  55 => 17,  51 => 16,  44 => 12,  40 => 11,  36 => 10,  32 => 9,  22 => 1,);
    }
}
