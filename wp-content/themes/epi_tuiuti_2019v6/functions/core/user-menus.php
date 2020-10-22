<?php

/*
 *  MENUS QUE SOMEM PARA O CLIENTE
 */

$user_id = get_current_user_id();

if ($user_id != 1) {

function remove_menus(){
  remove_menu_page( 'themes.php' ); //Appearance - aparência
  remove_menu_page( 'edit-comments.php' ); //Comments - comentários
  remove_menu_page( 'plugins.php' ); //Plugins
	remove_menu_page( 'edit.php?post_type=banner' ); //Post Type Banners
	//remove_menu_page( 'edit.php?post_type=servicos' ); //Post Type Serviços
	//remove_menu_page( 'edit.php?post_type=aparelhos' ); //Post Type Aparelhos
  remove_menu_page( 'tools.php' ); //Tools - ferramentas
  remove_menu_page( 'options-general.php' ); //Settings - configurações
	remove_menu_page( 'site-migration-export' ); //WP Migration Plugin
	remove_menu_page( 'edit.php?post_type=acf-field-group' ); //ACF
	remove_menu_page( 'seo' ); //SEO Tags
	remove_menu_page( 'wpseo_dashboard' ); //YOAST SEO
	remove_menu_page( 'post_template_setting' ); //Posts Templates
	//remove_menu_page( 'CF7DBPluginSubmissions' ); //Contact Form DB

  /*
   * Criar Menu no admin para Gerenciamento dos Menus
   */
    add_menu_page(
        __( 'Menus', 'textdomain' ),
        'Menus',
        'manage_options',
        'nav-menus.php',
        '',
        'dashicons-menu',
        6
    );
}
 add_action( 'admin_menu', 'remove_menus', 9999 );
} else {}