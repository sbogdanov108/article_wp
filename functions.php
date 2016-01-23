<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 21.01.16
 * Time: 11:27
 */

function blogus_scripts()
{
  //  css

  wp_enqueue_style( 'blogus-bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css' );
  wp_enqueue_style( 'blogus-style', get_stylesheet_uri(), [ 'blogus-bootstrap-css' ] );

  //  js

  wp_enqueue_script( 'blogus-jquery',
    get_template_directory_uri() . 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js',
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