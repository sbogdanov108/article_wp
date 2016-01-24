<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 21.01.16
 * Time: 10:27
 */
get_header()
?>
<div class="container">

  <div class="blog-header">
    <h1 class="blog-title">The Bootstrap Blog</h1>
    <p class="lead blog-description">Пример шаблона для создания блога с помощью Bootstrap</p>
  </div>

  <div class="row">

    <div class="col-sm-8 blog-main">

      <? if ( have_posts() ) : ?>

        <? while ( have_posts() ) : the_post() ?>
          <? get_template_part( 'content', get_post_format() ) ?>
        <? endwhile ?>

      <? else : ?>
        <? get_template_part( 'content', 'none' ) ?>
      <? endif ?>

      <? /** @var WP_Query $wp_query */
      if( $wp_query->max_num_pages > 1 ) : ?>
        <nav>
          <ul class="pager">
            <li><a href="#">Previous</a></li>
            <li><a href="#">Next</a></li>
          </ul>
        </nav>
      <? endif ?>

    </div><!-- /.blog-main -->

    <? get_sidebar() ?>

  </div><!-- /.row -->

</div><!-- /.container -->

<? get_footer() ?>