<?php

//menus
register_nav_menus( array(
  'header' => 'Header Navigation',
));

add_theme_support( 'post-thumbnails' );

add_filter( 'nav_menu_css_class', 'additional_active_item_classes', 10, 2 );

function additional_active_item_classes($classes = array(), $menu_item = false){

  if(in_array('current-menu-item', $menu_item->classes)){
    $classes[] = 'active';
  }

  return $classes;
}

