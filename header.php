<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 23.01.16
 * Time: 13:54
 */
?>
<!DOCTYPE html>
<html <? language_attributes() ?>>
<head>
  <meta charset="<? bloginfo( 'charset' ) ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="description" content="">
  <meta name="author" content="">
  <!--  <link rel="icon" href="../../favicon.ico">-->

  <title>Шаблон для примеров</title>

  <?php wp_head(); ?>
</head>

<body>

<div class="blog-masthead">
  <div class="container">
    <?
    wp_nav_menu( [
      'theme_location' => 'header_menu',
      'container'      => 'nav',
      'container_class'=> 'blog-nav',
      'items_wrap' => '%3$s',
      'link_class' => 'blog-nav-item',
      'walker'         => new Header_Menu_Walker()
    ] );
    ?>
  </div>
</div>
