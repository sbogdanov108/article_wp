<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 23.01.16
 * Time: 14:04
 */
?>
<div class="col-sm-3 col-sm-offset-1 blog-sidebar">
  <? if ( is_active_sidebar( 'aside' ) ) : ?>
    <? dynamic_sidebar( 'aside' ) ?>
  <? else : ?>
    <p>Здесь будут виджеты, например Архив постов, Категории и т.п.</p>
  <? endif ?>
</div><!-- /.blog-sidebar -->
