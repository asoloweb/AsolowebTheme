<?php
/**
 * Asoloweb Custom functions
 * @subpackage Asoloweb Theme
 * @since 1.0
 */

//Rimuovo barra top-menu
add_filter("show_admin_bar", "__return_false");

//Admin CSS

function admin_style()
{
  wp_enqueue_style(
    "admin-styles",
    get_template_directory_uri() . "/css/admin.css"
  );
  wp_enqueue_style(
    "admin-blocks-styles",
    get_template_directory_uri() . "/css/blocks.css"
  );
}

add_action("admin_enqueue_scripts", "admin_style");

// MENU
function MainMenu()
{
  register_nav_menus([
    "main-menu" => __("Menu principale"),
    "main-menu-top" => __("Menu superiore"),
    "menu-mobile" => __("Menu Mobile"),
    "footer-col-1" => __("Footer Colonna 1"),
    "footer-col-2" => __("Footer Colonna 2"),
    "footer-col-3" => __("Footer Colonna 3"),
  ]);
}
add_action("init", "MainMenu");

// Funzione che rimuove UL e LI dal menu
class Description_Walker extends Walker_Nav_Menu
{
  function start_el(&$output, $item, $depth = 0, $args = [], $id = 0)
  {
    $classes = empty($item->classes) ? [] : (array) $item->classes;
    $class_names = join(
      " ",
      apply_filters("nav_menu_css_class", array_filter($classes), $item)
    );
    !empty($class_names) and
      ($class_names = ' class="' . esc_attr($class_names) . '"');
    $output .= "";
    $attributes = "";
    !empty($item->attr_title) and
      ($attributes .= ' title="' . esc_attr($item->attr_title) . '"');
    !empty($item->target) and
      ($attributes .= ' target="' . esc_attr($item->target) . '"');
    !empty($item->xfn) and
      ($attributes .= ' rel="' . esc_attr($item->xfn) . '"');
    !empty($item->url) and
      ($attributes .= ' href="' . esc_attr($item->url) . '"');
    $title = apply_filters("the_title", $item->title, $item->ID);
    $item_output =
      $args->before .
      "<a $attributes $class_names>" .
      $args->link_before .
      $title .
      "</a>" .
      $args->link_after .
      $args->after;
    $output .= apply_filters(
      "walker_nav_menu_start_el",
      $item_output,
      $item,
      $depth,
      $args
    );
  }
}

// Option page

if (function_exists("acf_add_options_page")) {
  acf_add_options_page("Opzioni");
}

/* abilito SVG*/

function cc_mime_types($mimes)
{
  $mimes["svg"] = "image/svg+xml";
  return $mimes;
}
add_filter("upload_mimes", "cc_mime_types");

// REGISTRO I VARI BLOCCHI PERSONALIZZATI
add_action("acf/init", "my_acf_init");
function my_acf_init()
{
  // check function exists
  if (function_exists("acf_register_block")) {
    // Registro il blocco Titolo Mix
    acf_register_block([
      "name" => "titolo-mix",
      "title" => __("Testo e grafica"),
      "description" => __("Blocco Titolo e immagine"),
      "render_callback" => "my_acf_block_render_callback",
      "category" => "asoloweb-blocks",
      "icon" => "align-pull-right",
      "keywords" => ["titolo"],
    ]);

    // Registro il blocco Titolo Mix
    acf_register_block([
      "name" => "titolo-mix-verticale",
      "title" => __("Testo e grafica Verticale"),
      "description" => __("Blocco Titolo e immagine"),
      "render_callback" => "my_acf_block_render_callback",
      "category" => "asoloweb-blocks",
      "icon" => "cover-image",
      "keywords" => ["titolo verticale"],
    ]);

    acf_register_block([
      "name" => "blocchetto",
      "title" => __("Blocchetto"),
      "description" => __("Blocchetti"),
      "render_callback" => "my_acf_block_render_callback",
      "category" => "asoloweb-blocks",
      "icon" => "grid-view",
      "keywords" => ["blocchetto"],
    ]);

    acf_register_block([
      "name" => "banner",
      "title" => __("Banner"),
      "description" => __("Banner"),
      "render_callback" => "my_acf_block_render_callback",
      "category" => "asoloweb-blocks",
      "icon" => "align-full-width",
      "keywords" => ["Banner"],
    ]);

    acf_register_block([
      "name" => "testo-immagine",
      "title" => __("Testo e immagine"),
      "description" => __("Testo e immagine"),
      "render_callback" => "my_acf_block_render_callback",
      "category" => "asoloweb-blocks",
      "icon" => "id",
      "keywords" => ["Testo immagine"],
    ]);
  }
}

// INDIRIZZO I BLOCCHI
function my_acf_block_render_callback($block)
{
  // convert name ("acf/testimonial") into path friendly slug ("testimonial")
  $slug = str_replace("acf/", "", $block["name"]);
  // include a template part from within the "template-parts/block" folder
  if (
    file_exists(
      get_theme_file_path("/template-parts/block/content-{$slug}.php")
    )
  ) {
    include get_theme_file_path("/template-parts/block/content-{$slug}.php");
  }
}


