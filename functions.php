<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 21.01.16
 * Time: 11:27
 */

/*
 * Подключение стилей и скриптов к шаблону
 */
function blogus_scripts()
{
  //  css

  wp_enqueue_style( 'blogus-bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css' );
  wp_enqueue_style( 'blogus-style', get_stylesheet_uri(), [ 'blogus-bootstrap-css' ] );

  //  js

  wp_enqueue_script( 'blogus-jquery',
    'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js',
    [ ],
    false, true
  );
  wp_enqueue_script( 'blogus-bootstrap-js',
    get_template_directory_uri() . '/js/bootstrap.min.js',
    [ 'blogus-jquery' ],
    false, true
  );
  wp_enqueue_script( 'blogus-ie10',
    get_template_directory_uri() . '/js/ie10-viewport-bug-workaround.js',
    [ 'blogus-bootstrap-js' ],
    false, true );

  wp_enqueue_script( 'ie9-js', 'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js' );
  wp_script_add_data( 'ie9-js', 'conditional', 'lt IE 9' );
  wp_enqueue_script( 'ie9-js2', 'https://oss.maxcdn.com/respond/1.4.2/respond.min.js' );
  wp_script_add_data( 'ie9-js2', 'conditional', 'lt IE 9' );
}

add_action( 'wp_enqueue_scripts', 'blogus_scripts' );

/*
 * Регистрация меню
 */
register_nav_menus( [
  'header_menu' => 'Меню в шапке'
] );

/*
 * Генерация меню в шапке
 */
class Header_Menu_Walker extends Walker_Nav_Menu
{
  function start_el( &$output, $item, $depth, $args )
  {
    $linkClass = esc_attr( $args->link_class );

    if( $item->current )
      $linkClass .= ' active';

    // Атрибуты элемента: class="", title="", rel="", target="" и href=""
    $attributes  = ! empty( $linkClass ) ? ' class="' . $linkClass . '"' : '';
    $attributes .= ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
    $attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
    $attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
    $attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';

    // Ссылка и околоссылочный текст
    $item_output = $args->before;
    $item_output .= '<a' . $attributes . '> ';
    $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
    $item_output .= '</a>';
    $item_output .= $args->after;

    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }

  public function end_el( &$output, $item, $depth = 0, $args = array() )
  {
    $output .= "";
  }
}

/**
 * Виджеты для боковой колонки
 */
function aside_widgets_init()
{
  register_sidebar( [
    'name'          => 'Виджеты для боковой колонки',
    'id'            => 'aside',
    'description'   => 'Добавлять сюда :)',
    'before_widget' => '<div id="%1$s" class="sidebar-module %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>'
  ] );
}

add_action( 'widgets_init', 'aside_widgets_init' );
