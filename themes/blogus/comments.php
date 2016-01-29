<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 24.01.16
 * Time: 13:04
 */

/*
 * Если данный пост защищен паролем через админку и
 * пользователь еще не ввел пароль, тогда мы не
 * будем загружать комментарии
*/
if ( post_password_required() )
{
  return;
}
?>
<? /* Выводим комментарии только в том случае, если они есть */ ?>
<?php if ( have_comments() ) : ?>
<div class="row comments">
  <div class="col-md-12">
    <h3>
      <? /* Получаем кол-во комментариев */ ?>
      <?= get_comments_number() ?>
      <? /* Получаем корректное окончание слова, в зависимосто от кол-ва комментариев. Функцию end_of_word помещаем в файл functions.php */ ?>
      <?= get_end_of_word( get_comments_number() ) ?>
    </h3>
  </div>

  <div class="col-md-12" id="comments">
    <? /* Выводим все комментарии */ ?>
    <? wp_list_comments( [
      'style'    => 'div',
      'type' => 'comment',
    ] ) ?>
  </div>
</div>
<? endif ?>

<div class="row comment-form" id="respond">
  <div class="col-md-12">
    <h3><? comment_form_title( 'Оставить комментарий', 'Оставить комментарий для %s' ) ?></h3>

    <div id="cancel-comment-reply">
      <small>
        <? /* Получаем ссылку для отмены ответа на комментарий */ ?>
        <?= get_cancel_comment_reply_link() ?>
      </small>
    </div>

    <form class="form-horizontal" action="<?= get_option( 'siteurl' ) ?>/wp-comments-post.php" method="post" id="form-comment">

      <? /* Этот блок будет отрабатоваться только для зарегистрированного пользователя */ ?>
      <? if ( is_user_logged_in() ) : ?>
        <p>Вы вошли как <a href="<?= get_option( 'siteurl' ) ?>/wp-admin/profile.php"><?= $user_identity ?></a>.
          <? /* Получаем ссылка для выхода из аккаунта */ ?>
          <a href="<?= wp_logout_url( get_permalink() ) ?>" title="Выйти из аккаунта">Выход</a>
        </p>
      <? else : ?>
        <div class="form-group">
          <label for="author" class="col-xs-3 col-sm-12 col-md-3 control-label">Имя
            <span class="star">*</span>
          </label>

          <div class="col-xs-9 col-sm-12 col-md-9">
            <input type="text" class="form-control" name="author" id="author" value="<?= esc_attr( $comment_author ) ?>" tabindex="1" aria-required="true" />
          </div>
        </div>

        <div class="form-group">
          <label for="email" class="col-xs-3 col-sm-12 col-md-3 control-label">E-mail (не публикуется)
            <span class="star">*</span>
          </label>

          <div class="col-xs-9 col-sm-12 col-md-9">
            <input type="text" class="form-control" name="email" id="email" value="<?= esc_attr( $comment_author_email ) ?>" tabindex="2"/>
          </div>
        </div>

        <div class="form-group">
          <label for="url" class="col-xs-3 col-sm-12 col-md-3 control-label">Сайт</label>

          <div class="col-xs-9 col-sm-12 col-md-9">
            <input type="text" class="form-control" name="url" id="url" value="<?= esc_attr( $comment_author_url ) ?>" tabindex="3"/>
          </div>
        </div>
      <? endif ?>

      <div class="form-group">
        <div class="col-sm-12">
          <textarea class="form-control" name="comment" id="comment" tabindex="4" placeholder="Комментарий..."></textarea>

          <span class="help-block">
            <small>Вы можете использовать следующие HTML-теги:<br/><code><?= allowed_tags() ?></code></small>
          </span>
        </div>
      </div>

      <div class="help-block help-required">
        <span class="star">*</span> Обязательно к заполнению
      </div>

      <div class="form-group">
        <div class="col-sm-12">
          <button type="submit" class="btn btn-default" id="submit" tabindex="5">Отправить</button>
          <? /* Генерирум необходимую служебную информацию для работы движка wordpress */ ?>
          <? comment_id_fields() ?>
        </div>
      </div>
    </form>
  </div>
</div>

