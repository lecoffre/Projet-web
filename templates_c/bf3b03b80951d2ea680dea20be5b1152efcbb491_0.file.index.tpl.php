<?php
/* Smarty version 3.1.39, created on 2021-03-30 20:05:57
  from 'C:\xampp\htdocs\projet-web-frontend\tpl\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60636885b57e77_25713828',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bf3b03b80951d2ea680dea20be5b1152efcbb491' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projet-web-frontend\\tpl\\index.tpl',
      1 => 1617047471,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:tpl/header.tpl' => 1,
    'file:tpl/footer.tpl' => 1,
  ),
),false)) {
function content_60636885b57e77_25713828 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="fr">
  <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
      />
      <meta name="description" content="" />
      <meta name="author" content="" />

      <title><?php echo $_smarty_tpl->tpl_vars['pagename']->value;?>
</title>

      <!-- Custom fonts for this template-->
      <link
        href="vendor/fontawesome-free/css/all.min.css"
        rel="stylesheet"
        type="text/css"
      />

      <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet"
      />

      <!-- Custom styles for this template-->
      
      <!-- Plugin Noah (multi-selection)-->
      <link
        rel="stylesheet"
        href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006288/BBBootstrap/choices.min.css?version=7.0.0"
      />
      <link href="css/style.css" rel="stylesheet" />
  </head>
  <body id="page-top">
      <?php $_smarty_tpl->_subTemplateRender('file:tpl/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


      <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>


      <?php $_smarty_tpl->_subTemplateRender('file:tpl/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  </body>
</html><?php }
}
