<?php
/* Smarty version 3.1.31, created on 2017-10-09 22:39:28
  from "D:\item\frame\public\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59db8a208a1212_05973846',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5ace161af1969970a2eea6052a976e603b1c863e' => 
    array (
      0 => 'D:\\item\\frame\\public\\index.html',
      1 => 1507559967,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59db8a208a1212_05973846 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>wxuns framework</title>

        <!-- Fonts -->
        <link href='http://cdn.webfont.youziku.com/webfonts/nomal/108099/28818/59c892e9f629d81384b84eee.css' rel='stylesheet' type='text/css' />
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: rgb(214, 77, 49);
                font-family:'againstmyselfd5ca728661a643';
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
            .m-atc {
            	font-style:normal;
            	font-size:30px;
            }
            .links{
            	font-family:微软雅黑;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    <?php echo $_smarty_tpl->tpl_vars['name']->value;?>

                </div>
                <div class="links">
                    <a href="http://wxuns.cn/docs">Documentation</a>
                    <a href="">OSChina</a>
                    <a href="">Packagist</a>
                    <a href="">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
<?php }
}
