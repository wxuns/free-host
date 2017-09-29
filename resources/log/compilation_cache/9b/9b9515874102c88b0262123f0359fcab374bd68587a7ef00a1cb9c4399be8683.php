<?php

/* index.html */
class __TwigTemplate_b26e926c4ff8355779465fec52748f7876be0eab7497e22f49e77933bbd8f53f extends Twig_Template
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
        // line 1
        echo "<!doctype html>
<html lang=\"en\">
    <head>
        <meta charset=\"utf-8\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">

        <title>wxuns framework</title>

        <!-- Fonts -->
        <link href='http://cdn.webfont.youziku.com/webfonts/nomal/108099/45410/59c87fc2f629d81384b84ee2.css' rel='stylesheet' type='text/css' />

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family:'HoangYen11d5c5c58ba1a643';
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class=\"flex-center position-ref full-height\">
            <div class=\"content\">
                <div class=\"title m-b-md\">
                    wxuns
                </div>
            </div>
        </div>
    </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "index.html";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "index.html", "D:\\item\\frame\\public\\index.html");
    }
}
