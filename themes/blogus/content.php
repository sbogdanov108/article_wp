<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 23.01.16
 * Time: 15:07
 */
?>
<div class="blog-post">
  <h2 class="blog-post-title">
    <? the_title() ?>
  </h2>
  <p class="blog-post-meta">
    <? the_date( 'F d, Y' ) ?> &mdash; <a href="#"><? the_author() ?></a>
  </p>

  <? $content = get_the_content() ?>
  <? if( is_single() ) : ?>
      <? the_content() ?>
  <? else : ?>
    <?= wp_trim_words( $content, 80 ) ?>
    <br>
    <a href="<?= get_permalink() ?>">Продолжить чтение...</a>
  <? endif ?>
</div>
