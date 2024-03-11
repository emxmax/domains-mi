<?php
/**
 * Created by Sublime Text 2.
 * User: thanhhiep992
 * Date: 12/08/15
 * Time: 10:20 AM
 */
if(!function_exists('s7upf_set_theme_config')){
    function s7upf_set_theme_config(){
        global $s7upf_dir,$s7upf_config;
        /**************************************** BEGIN ****************************************/
        $s7upf_dir = get_template_directory_uri() . '/7upframe';
        $s7upf_config = array();
        $s7upf_config['dir'] = $s7upf_dir;
        $s7upf_config['css_url'] = $s7upf_dir . '/assets/css/';
        $s7upf_config['js_url'] = $s7upf_dir . '/assets/js/';
        $s7upf_config['bootstrap_ver'] = '3';
        $s7upf_config['nav_menu'] = array(
            'primary' => esc_html__( 'Primary Navigation', 'skincare' ),
        );
        $s7upf_config['mega_menu'] = '1';
        $s7upf_config['sidebars']=array(
            array(
                'name'              => esc_html__( 'Blog Sidebar', 'skincare' ),
                'id'                => 'blog-sidebar',
                'description'       => esc_html__( 'Widgets in this area will be shown on all blog page.', 'skincare'),
                'before_title'      => '<h3 class="widget-title">',
                'after_title'       => '</h3>',
                'before_widget'     => '<div id="%1$s" class="sidebar-widget widget %2$s">',
                'after_widget'      => '</div>',
            )
        );
        if(class_exists("woocommerce")){
            $s7upf_config['sidebars'][] = array(
                'name'              => esc_html__( 'Woocommerce Sidebar', 'skincare' ),
                'id'                => 'woocommerce-sidebar',
                'description'       => esc_html__( 'Widgets in this area will be shown on all woocommerce page.', 'skincare'),
                'before_title'      => '<h3 class="widget-title">',
                'after_title'       => '</h3>',
                'before_widget'     => '<div id="%1$s" class="sidebar-widget widget %2$s">',
                'after_widget'      => '</div>',
            );
        }
        $s7upf_config['import_config'] = array(
                'demo_url'                  => 'http://7uptheme.com/wordpress/framework2',
                'homepage_default'          => 'Home',
                'blogpage_default'          => 'Blog',
                'menu_replace'              => 'Main Menu',
                'menu_locations'            => array("Main Menu" => "primary"),
                'set_woocommerce_page'      => 1
            );
        $s7upf_config['import_theme_option'] = 'YToxMDc6e3M6MTc6InM3dXBmX2hlYWRlcl9wYWdlIjtzOjQ6IjEwMDciO3M6MTc6InM3dXBmX2Zvb3Rlcl9wYWdlIjtzOjI6IjEzIjtzOjE0OiJzN3VwZl80MDRfcGFnZSI7czowOiIiO3M6MjA6InM3dXBmXzQwNF9wYWdlX3N0eWxlIjtzOjA6IiI7czoxODoiYmVmb3JlX2FwcGVuZF9wYWdlIjtzOjA6IiI7czoxNzoiYWZ0ZXJfYXBwZW5kX3BhZ2UiO3M6MDoiIjtzOjIwOiJzN3VwZl9zaG93X2JyZWFkcnVtYiI7czozOiJvZmYiO3M6MTk6InM3dXBmX2JnX2JyZWFkY3J1bWIiO3M6MDoiIjtzOjE1OiJicmVhZGNydW1iX3RleHQiO3M6MDoiIjtzOjIxOiJicmVhZGNydW1iX3RleHRfaG92ZXIiO3M6MDoiIjtzOjEyOiJzaG93X3ByZWxvYWQiO3M6Mjoib24iO3M6MTA6InByZWxvYWRfYmciO3M6MDoiIjtzOjEzOiJwcmVsb2FkX3N0eWxlIjtzOjA6IiI7czoxMToicHJlbG9hZF9pbWciO3M6MDoiIjtzOjE0OiJzN3VwZl9pY29uX2xpYiI7czoxMToibGluZWF3ZXNvbWUiO3M6MTU6InNob3dfc2Nyb2xsX3RvcCI7czoyOiJvbiI7czoxMToic2hvd19lbnZhdG8iO3M6Mjoib24iO3M6MTE6ImxpbmtfZW52YXRvIjtzOjc0OiJodHRwczovL3RoZW1lZm9yZXN0Lm5ldC9pdGVtL3NraW5jYXJlLXdvb2NvbW1lcmNlLXdvcmRwcmVzcy10aGVtZS8yMzQ5MTU4NyI7czoyNjoic2hvd193aXNobGlzdF9ub3RpZmljYXRpb24iO3M6Mjoib24iO3M6MTQ6InNob3dfdG9vX3BhbmVsIjtzOjM6Im9mZiI7czoxNToidG9vbF9wYW5lbF9wYWdlIjtzOjA6IiI7czoxMjoic2Vzc2lvbl9wYWdlIjtzOjM6Im9mZiI7czo3OiJib2R5X2JnIjtzOjA6IiI7czoxMDoibWFpbl9jb2xvciI7czowOiIiO3M6MTY6InM3dXBmX3BhZ2Vfc3R5bGUiO3M6MDoiIjtzOjE1OiJjb250YWluZXJfd2lkdGgiO3M6MDoiIjtzOjExOiJtYXBfYXBpX2tleSI7czozOToiQUl6YVN5QUhzbEJpd2EwYjJ1THlnbTYySnZfZm9YUHFkcmFJNnQ0IjtzOjE3OiJwb3N0X3NpbmdsZV9zaGFyZSI7YToxOntpOjI7czo3OiJwcm9kdWN0Ijt9czoyMjoicG9zdF9zaW5nbGVfc2hhcmVfbGlzdCI7YTo1OntpOjA7YTozOntzOjU6InRpdGxlIjtzOjA6IiI7czo2OiJzb2NpYWwiO3M6ODoiZmFjZWJvb2siO3M6NjoibnVtYmVyIjtzOjM6Im9mZiI7fWk6MTthOjM6e3M6NToidGl0bGUiO3M6MDoiIjtzOjY6InNvY2lhbCI7czo3OiJ0d2l0dGVyIjtzOjY6Im51bWJlciI7czozOiJvZmYiO31pOjI7YTozOntzOjU6InRpdGxlIjtzOjA6IiI7czo2OiJzb2NpYWwiO3M6NjoiZ29vZ2xlIjtzOjY6Im51bWJlciI7czozOiJvZmYiO31pOjM7YTozOntzOjU6InRpdGxlIjtzOjA6IiI7czo2OiJzb2NpYWwiO3M6OToicGludGVyZXN0IjtzOjY6Im51bWJlciI7czozOiJvZmYiO31pOjQ7YTozOntzOjU6InRpdGxlIjtzOjA6IiI7czo2OiJzb2NpYWwiO3M6ODoibGlua2VkaW4iO3M6NjoibnVtYmVyIjtzOjM6Im9mZiI7fX1zOjIxOiJkaXNhYmxlX3ZlcmlmeV9ub3RpY2UiO3M6Mzoib2ZmIjtzOjEzOiJzdl9tZW51X2NvbG9yIjtzOjA6IiI7czoxOToic3ZfbWVudV9jb2xvcl9ob3ZlciI7czowOiIiO3M6MjA6InN2X21lbnVfY29sb3JfYWN0aXZlIjtzOjA6IiI7czoxODoiYmxvZ19kZWZhdWx0X3N0eWxlIjtzOjQ6Imxpc3QiO3M6MTg6ImJlZm9yZV9hcHBlbmRfcG9zdCI7czozOiI2MDgiO3M6MTc6ImFmdGVyX2FwcGVuZF9wb3N0IjtzOjA6IiI7czoyNzoiczd1cGZfc2lkZWJhcl9wb3NpdGlvbl9ibG9nIjtzOjU6InJpZ2h0IjtzOjE4OiJzN3VwZl9zaWRlYmFyX2Jsb2ciO3M6MTI6ImJsb2ctc2lkZWJhciI7czoxMDoiYmxvZ19zdHlsZSI7czowOiIiO3M6MTQ6InBvc3RfbGlzdF9zaXplIjtzOjA6IiI7czoyMDoicG9zdF9saXN0X2l0ZW1fc3R5bGUiO3M6MDoiIjtzOjE2OiJwb3N0X2dyaWRfY29sdW1uIjtzOjE6IjMiO3M6MTQ6InBvc3RfZ3JpZF9zaXplIjtzOjA6IiI7czoxNzoicG9zdF9ncmlkX2V4Y2VycHQiO3M6MjoiODAiO3M6MjA6InBvc3RfZ3JpZF9pdGVtX3N0eWxlIjtzOjA6IiI7czoxNDoicG9zdF9ncmlkX3R5cGUiO3M6MDoiIjtzOjI3OiJzN3VwZl9zaWRlYmFyX3Bvc2l0aW9uX3Bvc3QiO3M6Mjoibm8iO3M6MTg6InM3dXBmX3NpZGViYXJfcG9zdCI7czowOiIiO3M6MTM6ImJlZm9yZV9hcHBlbmQiO3M6MzoiNjM3IjtzOjEyOiJhZnRlcl9hcHBlbmQiO3M6MDoiIjtzOjIxOiJwb3N0X3NpbmdsZV90aHVtYm5haWwiO3M6Mzoib2ZmIjtzOjE2OiJwb3N0X3NpbmdsZV9zaXplIjtzOjA6IiI7czoxNzoicG9zdF9zaW5nbGVfc21hbGwiO3M6Mjoib24iO3M6MTY6InBvc3Rfc2luZ2xlX3RhZ3MiO3M6Mjoib24iO3M6MTk6InBvc3Rfc2luZ2xlX3JlbGF0ZWQiO3M6Mjoib24iO3M6MjU6InBvc3Rfc2luZ2xlX3JlbGF0ZWRfdGl0bGUiO3M6MDoiIjtzOjI2OiJwb3N0X3NpbmdsZV9yZWxhdGVkX251bWJlciI7czoxOiI1IjtzOjI0OiJwb3N0X3NpbmdsZV9yZWxhdGVkX3NpemUiO3M6NzoiMzcweDIxMCI7czoyNDoicG9zdF9zaW5nbGVfcmVsYXRlZF9pdGVtIjtzOjk6IjA6MSw1NjA6MiI7czozMDoicG9zdF9zaW5nbGVfcmVsYXRlZF9pdGVtX3N0eWxlIjtzOjA6IiI7czoyNzoiczd1cGZfc2lkZWJhcl9wb3NpdGlvbl9wYWdlIjtzOjI6Im5vIjtzOjE4OiJzN3VwZl9zaWRlYmFyX3BhZ2UiO3M6MDoiIjtzOjM1OiJzN3VwZl9zaWRlYmFyX3Bvc2l0aW9uX3BhZ2VfYXJjaGl2ZSI7czo1OiJyaWdodCI7czoyNjoiczd1cGZfc2lkZWJhcl9wYWdlX2FyY2hpdmUiO3M6MTI6ImJsb2ctc2lkZWJhciI7czozNDoiczd1cGZfc2lkZWJhcl9wb3NpdGlvbl9wYWdlX3NlYXJjaCI7czoyOiJubyI7czoyNToiczd1cGZfc2lkZWJhcl9wYWdlX3NlYXJjaCI7czowOiIiO3M6MTc6InM3dXBmX2FkZF9zaWRlYmFyIjthOjE6e2k6MDthOjI6e3M6NToidGl0bGUiO3M6MTU6IlByb2R1Y3QgU2lkZWJhciI7czoyMDoid2lkZ2V0X3RpdGxlX2hlYWRpbmciO3M6MjoiaDMiO319czoxMjoiZ29vZ2xlX2ZvbnRzIjthOjE6e2k6MDthOjE6e3M6NjoiZmFtaWx5IjtzOjA6IiI7fX1zOjI2OiJzN3VwZl9zaWRlYmFyX3Bvc2l0aW9uX3dvbyI7czo1OiJyaWdodCI7czoxNzoiczd1cGZfc2lkZWJhcl93b28iO3M6MTk6Indvb2NvbW1lcmNlLXNpZGViYXIiO3M6MTg6InNob3BfZGVmYXVsdF9zdHlsZSI7czo0OiJsaXN0IjtzOjE2OiJzaG9wX2dhcF9wcm9kdWN0IjtzOjA6IiI7czoxNToid29vX3Nob3BfbnVtYmVyIjtzOjE6IjYiO3M6MTU6InN2X3NldF90aW1lX3dvbyI7czowOiIiO3M6MTA6InNob3Bfc3R5bGUiO3M6MDoiIjtzOjk6InNob3BfYWpheCI7czozOiJvZmYiO3M6MjA6InNob3BfdGh1bWJfYW5pbWF0aW9uIjtzOjEwOiJmYWRlLXRodW1iIjtzOjE4OiJzaG9wX251bWJlcl9maWx0ZXIiO3M6Mjoib24iO3M6MTY6InNob3BfdHlwZV9maWx0ZXIiO3M6Mjoib24iO3M6MTQ6InNob3BfbGlzdF9zaXplIjtzOjA6IiI7czoyMDoic2hvcF9saXN0X2l0ZW1fc3R5bGUiO3M6MDoiIjtzOjE0OiJzaG9wX2dyaWRfc2l6ZSI7czowOiIiO3M6MjA6InNob3BfZ3JpZF9pdGVtX3N0eWxlIjtzOjA6IiI7czoxNDoic2hvcF9ncmlkX3R5cGUiO3M6MDoiIjtzOjE1OiJjYXJ0X3BhZ2Vfc3R5bGUiO3M6Njoic3R5bGUyIjtzOjE5OiJjaGVja291dF9wYWdlX3N0eWxlIjtzOjY6InN0eWxlMiI7czoyMToiczd1cGZfaGVhZGVyX3BhZ2Vfd29vIjtzOjA6IiI7czoyMToiczd1cGZfZm9vdGVyX3BhZ2Vfd29vIjtzOjA6IiI7czoxNzoiYmVmb3JlX2FwcGVuZF93b28iO3M6MzoiNjU5IjtzOjE2OiJhZnRlcl9hcHBlbmRfd29vIjtzOjA6IiI7czoyMjoiYnJhbmRfdGF4b25vbXlfcHJvZHVjdCI7czoyOiJvbiI7czozMDoic3Zfc2lkZWJhcl9wb3NpdGlvbl93b29fc2luZ2xlIjtzOjI6Im5vIjtzOjIxOiJzdl9zaWRlYmFyX3dvb19zaW5nbGUiO3M6MTU6InByb2R1Y3Qtc2lkZWJhciI7czoxODoicHJvZHVjdF9pbWFnZV96b29tIjtzOjExOiJ6b29tLXN0eWxlMyI7czoxODoicHJvZHVjdF90YWJfZGV0YWlsIjtzOjA6IiI7czoxMjoic2hvd19leGNlcnB0IjtzOjI6Im9uIjtzOjExOiJzaG93X2xhdGVzdCI7czozOiJvZmYiO3M6MTE6InNob3dfdXBzZWxsIjtzOjM6Im9mZiI7czoxMjoic2hvd19yZWxhdGVkIjtzOjI6Im9uIjtzOjE4OiJzaG93X3NpbmdsZV9udW1iZXIiO3M6MToiNiI7czoxNjoic2hvd19zaW5nbGVfc2l6ZSI7czo3OiIyNzB4MjcwIjtzOjE5OiJzaG93X3NpbmdsZV9pdGVtcmVzIjtzOjIyOiIwOjEsNDgwOjIsOTkwOjMsMTIwMDo0IjtzOjIyOiJzaG93X3NpbmdsZV9pdGVtX3N0eWxlIjtzOjY6ImNpcmNsZSI7czoyNDoiYmVmb3JlX2FwcGVuZF93b29fc2luZ2xlIjtzOjM6IjY1OSI7czoxNzoiYmVmb3JlX2FwcGVuZF90YWIiO3M6MDoiIjtzOjE2OiJhZnRlcl9hcHBlbmRfdGFiIjtzOjA6IiI7czoyMzoiYWZ0ZXJfYXBwZW5kX3dvb19zaW5nbGUiO3M6MDoiIjt9';
        $s7upf_config['import_widget'] = '{"blog-sidebar":{"s7upf_listpostswidget-2":{"title":"Latest Post","posts_per_page":"4","category":"0","order":"desc","order_by":"none"},"s7upf_info_author-2":{"title":"Author","image":"636","size":"370x370","name":"Link Khanh Nguyen","url":"#","desc":"Enjoy your own time in the bath after a rough day, with fragrance and breathing exercises.","pinterest":"https:\/\/www.pinterest.com\/","google":"https:\/\/plus.google.com\/","twitter":"https:\/\/twitter.com\/","vimeo":"https:\/\/vimeo.com\/","youtube":"https:\/\/www.youtube.com\/"},"categories-2":{"title":"Categories","count":1,"hierarchical":0,"dropdown":0},"s7upf_video_popup-3":{"title":"Featured Video","image":"635","size":"370x260","link":"https:\/\/www.youtube.com\/watch?v=dqOsYjKtrZI"},"tag_cloud-2":{"title":"Tags","count":0,"taxonomy":"post_tag"},"media_gallery-2":{"title":"Galleries","columns":4,"size":"medium","link_type":"post","orderby_random":true,"ids":[89,90,91,92,93,94,95,96]}},"woocommerce-sidebar":{"s7upf_category_fillter-2":{"title":"Categories","category":["base-makeup","eyeshadow","lipstick","mascara","point-makeup","skincare"]},"s7upf_video_popup-4":{"title":"Featured Video","image":"635","size":"370x260","link":"https:\/\/www.youtube.com\/watch?v=dqOsYjKtrZI"},"s7upf_attribute_filter-2":{"title":"Color","attribute":"color"},"s7upf_brand_fillter-2":{"title":"Brands","brand":["buzz-feed","ellen","essence","refinery","rhea","wendy"]},"media_image-2":{"url":"http:\/\/7uptheme.com\/wordpress\/skincare\/wp-content\/uploads\/2018\/12\/eye.jpg","title":"","size":"full","caption":"","alt":"","link_type":"custom","link_url":"http:\/\/7uptheme.com\/wordpress\/skincare\/shop\/?product_cat=eyeshadow","image_classes":"","link_classes":"","link_rel":"","image_title":""}},"product-sidebar":{"s7upf_list_products-2":{"title":"top review","number":"4","product_type":"mostview"},"s7upf_video_popup-5":{"title":"featured video","image":"635","size":"370x260","link":"https:\/\/www.youtube.com\/watch?v=dqOsYjKtrZI"}}}';
        $s7upf_config['import_category'] = '{"base-makeup":{"thumbnail":"0","parent":""},"body-care":{"thumbnail":"0","parent":""},"eyeshadow":{"thumbnail":"0","parent":""},"lips":{"thumbnail":"0","parent":""},"lipstick":{"thumbnail":"0","parent":""},"lotion":{"thumbnail":"0","parent":""},"mascara":{"thumbnail":"0","parent":""},"medicated":{"thumbnail":"0","parent":""},"nail":{"thumbnail":"0","parent":""},"point-makeup":{"thumbnail":"0","parent":""},"powder":{"thumbnail":"0","parent":""},"skincare":{"thumbnail":"0","parent":""}}';

        /**************************************** PLUGINS ****************************************/

        $s7upf_config['require-plugin-begin'] = array(
            array(
                'name'      => esc_html__( '7up Core', 'skincare'),
                'slug'      => '7up-core',
                'required'  => true,
                'source'    =>get_template_directory().'/plugins/7up-core.zip',
                'version'   => '1.2',
            ),
        );

        $s7upf_config['require-plugin'] = array(
            array(
                'name'      => esc_html__( '7up Core', 'skincare'),
                'slug'      => '7up-core',
                'required'  => true,
                'source'    =>get_template_directory().'/plugins/7up-core.zip',
                'version'   => '1.2',
            ),
            array(
                'name'      => esc_html__( 'WpBakery Page Builder', 'skincare'),
                'slug'      => 'js_composer',
                'required'  => true,
                'source'    => get_template_directory().'/plugins/js_composer.zip',
                'version'   => '6.0',
            ),
            array(
                'name'      => esc_html__( 'WooCommerce', 'skincare'),
                'slug'      => 'woocommerce',
                'required'  => true,
            ),
            array(
                'name'      => esc_html__( 'Contact Form 7', 'skincare'),
                'slug'      => 'contact-form-7',
                'required'  => false,
            ),
            array(
                'name'      => esc_html__('MailChimp for WordPress Lite','skincare'),
                'slug'      => 'mailchimp-for-wp',
                'required'  => false,
            ),
            array(
                'name'      => esc_html__('Yith Woocommerce Compare','skincare'),
                'slug'      => 'yith-woocommerce-compare',
                'required'  => false,
            ),
            array(
                'name'      => esc_html__('Yith Woocommerce Wishlist','skincare'),
                'slug'      => 'yith-woocommerce-wishlist',
                'required'  => false,
            ),
        );

		/**************************************** PLUGINS ****************************************/
        $s7upf_config['theme-option'] = array(
            'sections' => array(
                array(
                    'id'    => 'option_basic',
                    'title' => '<i class="fa fa-cog"></i>'.esc_html__(' Basic Settings', 'skincare')
                ),
                array(
                    'id'    => 'option_menu',
                    'title' => '<i class="fa fa-align-justify"></i>'.esc_html__(' Menu Settings', 'skincare')
                ),
                array(
                    'id'    => 'blog_post',
                    'title' => '<i class="fa fa-bold"></i>'.esc_html__(' Blog & Post', 'skincare')
                ),
                array(
                    'id'    => 'option_layout',
                    'title' => '<i class="fa fa-columns"></i>'.esc_html__(' Layout Settings', 'skincare')
                ),
                array(
                    'id'    => 'option_typography',
                    'title' => '<i class="fa fa-font"></i>'.esc_html__(' Typography', 'skincare')
                )
            ),
            'settings' => array(
                /*----------------Begin Basic --------------------*/
                array(
                    'id'          => 'tab_general_theme',
                    'type'        => 'tab',
                    'section'     => 'option_basic',
                    'label'       => esc_html__('General','skincare')
                ),
                array(
                    'id'          => 's7upf_header_page',
                    'label'       => esc_html__( 'Header Page', 'skincare' ),
                    'desc'        => esc_html__( 'Include Header content. Go to Header in admin menu to edit/create header content. Note this value default for all pages of your site, If have any page/single page display other content pehaps you are set specific header for it', 'skincare' ),
                    'type'        => 'select',
                    'section'     => 'option_basic',
                    'choices'     => s7upf_list_post_type('s7upf_header')
                ),
                array(
                    'id'          => 's7upf_footer_page',
                    'label'       => esc_html__( 'Footer Page', 'skincare' ),
                    'desc'        => esc_html__( 'Include Footer content. Go to Footer in admin menu to edit/create footer content.  Note this value default for all pages of your site, If have any page/single page display other content pehaps you are set specific footer for it', 'skincare' ),
                    'type'        => 'select',
                    'section'     => 'option_basic',
                    'choices'     => s7upf_list_post_type('s7upf_footer')
                ),
                array(
                    'id'          => 's7upf_404_page',
                    'label'       => esc_html__( '404 Page', 'skincare' ),
                    'desc'        => esc_html__( 'Include page to 404 page', 'skincare' ),
                    'type'        => 'select',
                    'section'     => 'option_basic',
                    'choices'     => s7upf_list_post_type('s7upf_mega_item')
                ),
                array(
                    'id'          => 's7upf_404_page_style',
                    'label'       => esc_html__( '404 Style', 'skincare' ),
                    'desc'        => esc_html__( 'Choose a style to display.', 'skincare' ),
                    'type'        => 'select',
                    'section'     => 'option_basic',
                    'choices'     => array(
                        array(
                            'value' => '',
                            'label' => esc_html__('Default','skincare'),
                        ),
                        array(
                            'value' => 'full-width',
                            'label' => esc_html__('FullWidth','skincare'),
                        ),
                    ),
                    'condition'   => 's7upf_404_page:not()',
                ),                                
                array(
                    'id'          => 'before_append_page',
                    'label'       => esc_html__('Append content before page(default)','skincare'),
                    'type'        => 'select',
                    'section'     => 'option_basic',
                    'choices'     => s7upf_list_post_type('s7upf_mega_item'),
                    'desc'        => esc_html__('Choose a mega page content append to before main content of page with template default.','skincare'),
                ),
                array(
                    'id'          => 'after_append_page',
                    'label'       => esc_html__('Append content after page(default)','skincare'),
                    'type'        => 'select',
                    'section'     => 'option_basic',
                    'choices'     => s7upf_list_post_type('s7upf_mega_item'),
                    'desc'        => esc_html__('Choose a mega page content append to after main content of page with template default.','skincare'),
                ),
                array(
                    'id'        => 'tab_breadcrumb',
                    'type'      => 'tab',
                    'section'   => 'option_basic',
                    'label'     => esc_html__('Breadcumb','skincare')
                ),
                array(
                    'id'        => 's7upf_show_breadrumb',
                    'label'     => esc_html__('Show BreadCrumb', 'skincare'),
                    'desc'      => esc_html__('This allow you to show or hide BreadCrumb', 'skincare'),
                    'type'      => 'on-off',
                    'section'   => 'option_basic',
                    'std'       => 'on'
                ),
                array(
                    'id'          => 's7upf_bg_breadcrumb',
                    'label'       => esc_html__('Background Breadcrumb','skincare'),
                    'type'        => 'background',
                    'section'     => 'option_basic',
                    'condition'   => 's7upf_show_breadrumb:is(on)',
                    'desc'        => esc_html__( 'Custom background for breadcrumb.', 'skincare' ),
                ),
                array(
                    'id'          => 'breadcrumb_text',
                    'label'       => esc_html__('Breadcrumb text','skincare'),
                    'type'        => 'typography',
                    'section'     => 'option_basic',
                    'condition'   => 's7upf_show_breadrumb:is(on)',
                    'desc'        => esc_html__( 'Custom font in breadcrumb.', 'skincare' ),
                ),
                array(
                    'id'          => 'breadcrumb_text_hover',
                    'label'       => esc_html__('Breadcrumb text hover','skincare'),
                    'type'        => 'typography',
                    'section'     => 'option_basic',
                    'condition'   => 's7upf_show_breadrumb:is(on)',
                    'desc'        => esc_html__( 'Custom font when you hover in text of breadcrumb.', 'skincare' ),
                ),
                array(
                    'id'        => 'tab_preload',
                    'type'      => 'tab',
                    'section'   => 'option_basic',
                    'label'     => esc_html__('Preload','skincare')
                ),
                array(
                    'id'        => 'show_preload',
                    'label'     => esc_html__('Show Preload', 'skincare'),
                    'desc'      => esc_html__('This allow you to show or hide preload', 'skincare'),
                    'type'      => 'on-off',
                    'section'   => 'option_basic',
                    'std'       => 'off'
                ),
                array(
                    'id'          => 'preload_bg',
                    'label'       => esc_html__('Background','skincare'),
                    'type'        => 'colorpicker-opacity',
                    'section'     => 'option_basic',
                    'desc'        => esc_html__( 'Change default body background.', 'skincare' ),
                    'condition'   => 'show_preload:is(on)',
                ),
                array(
                    'id'          => 'preload_style',
                    'label'       => esc_html__('Preload Style','skincare'),
                    'type'        => 'select',
                    'std'         => '',
                    'section'     => 'option_basic',
                    'choices'     => array(
                        array(
                            'label' =>  esc_html__('Style 1','skincare'),
                            'value' =>  '',
                        ),
                        array(
                            'label' =>  esc_html__('Style 2','skincare'),
                            'value' =>  'style2'
                        ),
                        array(
                            'label' =>  esc_html__('Style 3','skincare'),
                            'value' =>  'style3'
                        ),
                        array(
                            'label' =>  esc_html__('Style 4','skincare'),
                            'value' =>  'style4'
                        ),
                        array(
                            'label' =>  esc_html__('Style 5','skincare'),
                            'value' =>  'style5'
                        ),
                        array(
                            'label' =>  esc_html__('Style 6','skincare'),
                            'value' =>  'style6'
                        ),
                        array(
                            'label' =>  esc_html__('Style 7','skincare'),
                            'value' =>  'style7'
                        ),
                        array(
                            'label' =>  esc_html__('Custom image','skincare'),
                            'value' =>  'custom-image'
                        ),
                    ),
                    'desc'        => esc_html__( 'Choose default style for your site.', 'skincare' ),
                    'condition'   => 'show_preload:is(on)',
                ),
                array(
                    'id'          => 'preload_img',
                    'label'       => esc_html__('Preload Image','skincare'),
                    'type'        => 'upload',
                    'section'     => 'option_basic',
                    'desc'        => esc_html__( 'Choose a image to display as preload.', 'skincare' ),
                    'condition'   => 'show_preload:is(on),preload_style:is(custom-image)',
                ),
                array(
                    'id'        => 'tab_other',
                    'type'      => 'tab',
                    'section'   => 'option_basic',
                    'label'     => esc_html__('Other','skincare')
                ),
                array(
                    'id'          => 's7upf_icon_lib',
                    'label'       => esc_html__('Default icon','skincare'),
                    'type'        => 'select',
                    'std'         => 'lineawesome',
                    'section'     => 'option_basic',
                    'choices'     => array(
                        array(
                            'label' =>  esc_html__('Line Awesome','skincare'),
                            'value' =>  'lineawesome'
                        ),
                        array(
                            'label' =>  esc_html__('Font Awesome','skincare'),
                            'value' =>  'fontawesome',
                        ),
                        array(
                            'label' =>  esc_html__('Open Iconic','skincare'),
                            'value' =>  'openiconic'
                        ),
                        array(
                            'label' =>  esc_html__('Typicons','skincare'),
                            'value' =>  'typicons'
                        ),
                        array(
                            'label' =>  esc_html__('Entypo','skincare'),
                            'value' =>  'entypo'
                        ),
                        array(
                            'label' =>  esc_html__('Linecons','skincare'),
                            'value' =>  'linecons'
                        ),
                        array(
                            'label' =>  esc_html__('Mono Social','skincare'),
                            'value' =>  'monosocial'
                        ),
                        array(
                            'label' =>  esc_html__('Material','skincare'),
                            'value' =>  'material'
                        ),
                    ),
                    'desc'        => esc_html__( 'Choose default style for pages.', 'skincare' ),
                ),
                array(
                    'id'        => 'show_scroll_top',
                    'label'     => esc_html__('Show scroll top button', 'skincare'),
                    'desc'      => esc_html__('This allow you to show or hide scroll top button', 'skincare'),
                    'type'      => 'on-off',
                    'section'   => 'option_basic',
                    'std'       => 'off'
                ),
                array(
                    'id'        => 'show_envato',
                    'label'     => esc_html__('Show Envato Button', 'skincare'),
                    'type'      => 'on-off',
                    'section'   => 'option_basic',
                    'std'       => 'off'
                ),
				array(
                    'id'          => 'link_envato',
                    'label'       => esc_html__('Link Buy On Envato','skincare'),
                    'type'        => 'text',
                    'section'     => 'option_basic',
					'condition'   => 'show_envato:is(on)',
                ), 
                array(
                    'id'        => 'show_wishlist_notification',
                    'label'     => esc_html__('Show wishlist notification', 'skincare'),
                    'desc'      => esc_html__('This allow you to show or hide wishlist notification when add to wishlist.', 'skincare'),
                    'type'      => 'on-off',
                    'section'   => 'option_basic',
                    'std'       => 'off'
                ),
                array(
                    'id'        => 'show_too_panel',
                    'label'     => esc_html__('Show tool panel', 'skincare'),
                    'desc'      => esc_html__('This allow you to show or hide tool panel.', 'skincare'),
                    'type'      => 'on-off',
                    'section'   => 'option_basic',
                    'std'       => 'off'
                ),
                array(
                    'id'          => 'tool_panel_page',
                    'label'       => esc_html__( 'Choose tool panel page', 'skincare' ),
                    'desc'        => esc_html__( 'Choose a mega page to display.', 'skincare' ),
                    'type'        => 'select',
                    'section'     => 'option_basic',
                    'choices'     => s7upf_list_post_type('s7upf_mega_item'),
                    'condition'   => 'show_too_panel:is(on)',
                ),
                array(
                    'id'        => 'session_page',
                    'label'     => esc_html__('Session page', 'skincare'),
                    'desc'      => esc_html__('Enable session page to auto load header,footer,main color in other pages.', 'skincare'),
                    'type'      => 'on-off',
                    'section'   => 'option_basic',
                    'std'       => 'off'
                ),
                array(
                    'id'          => 'body_bg',
                    'label'       => esc_html__('Body Background','skincare'),
                    'type'        => 'colorpicker-opacity',
                    'section'     => 'option_basic',
                    'desc'        => esc_html__( 'Change default body background.', 'skincare' ),
                ),
                array(
                    'id'          => 'main_color',
                    'label'       => esc_html__('Main color','skincare'),
                    'type'        => 'colorpicker-opacity',
                    'section'     => 'option_basic',
                    'desc'        => esc_html__( 'Change main color of your site.', 'skincare' ),
                ),
                array(
                    'id'          => 's7upf_page_style',
                    'label'       => esc_html__('Page Style','skincare'),
                    'type'        => 'select',
                    'std'         => '',
                    'section'     => 'option_basic',
                    'choices'     => array(
                        array(
                            'label' =>  esc_html__('Default','skincare'),
                            'value' =>  '',
                        ),
                        array(
                            'label' =>  esc_html__('Page boxed','skincare'),
                            'value' =>  'page-content-box'
                        ),
                    ),
                    'desc'        => esc_html__( 'Choose default style for pages.', 'skincare' ),
                ),
                array(
                    'id'          => 'container_width',
                    'label'       => esc_html__('Custom container width(px)','skincare'),
                    'type'        => 'text',
                    'section'     => 'option_basic',
                    'desc'        => esc_html__( 'You can custom width of container on your site. Default is 1200px.', 'skincare' ),
                ), 
                array(
                    'id'          => 'map_api_key',
                    'label'       => esc_html__('Map API key','skincare'),
                    'type'        => 'text',
                    'section'     => 'option_basic',
                    'std'         => '',// ex: AIzaSyBX2IiEBg-0lQKQQ6wk6sWRGQnWI7iogf0
                    'desc'        => esc_html__( 'Enter your Map API key to display your location on google maps element.', 'skincare' ).' </br><a target="_blank" href="//developers.google.com/maps/documentation/javascript/get-api-key">Get API</a>',
                ),
                array(
                    'id'          => 'post_single_share',
                    'label'       => esc_html__('Show share box','skincare'),
                    'type'        => 'checkbox',
                    'section'     => 'option_basic',
                    'choices'     => array(
                        array(
                            'label' =>  esc_html__('Post','skincare'),
                            'value' =>  'post',
                        ),
                        array(
                            'label' =>  esc_html__('Page','skincare'),
                            'value' =>  'page',
                        ),
                        array(
                            'label' =>  esc_html__('Product','skincare'),
                            'value' =>  'product'
                        ),
                    ),
                    'desc'        => esc_html__( 'You can show/hide share box on post, page, product pages. ', 'skincare' ),
                ),
                array(
                    'id'          => 'post_single_share_list',
                    'label'       => esc_html__('Add custom share box','skincare'),
                    'type'        => 'list-item',
                    'section'     => 'option_basic',
                    'std'         => '',
                    'settings'    => array( 
                        array(
                            'id'          => 'social',
                            'label'       => esc_html__('Social','skincare'),
                            'type'        => 'select',
                            'std'        => 'h3',
                            'choices'     => array(
                                array(
                                    'value'=>'total',
                                    'label'=>esc_html__('Total share','skincare'),
                                ),
                                array(
                                    'value'=>'facebook',
                                    'label'=>esc_html__('Facebook','skincare'),
                                ),
                                array(
                                    'value'=>'twitter',
                                    'label'=>esc_html__('Twitter','skincare'),
                                ),
                                array(
                                    'value'=>'google',
                                    'label'=>esc_html__('Google plus','skincare'),
                                ),
                                array(
                                    'value'=>'pinterest',
                                    'label'=>esc_html__('Pinterest','skincare'),
                                ),
                                array(
                                    'value'=>'linkedin',
                                    'label'=>esc_html__('Linkedin','skincare'),
                                ),
                                array(
                                    'value'=>'tumblr',
                                    'label'=>esc_html__('Tumblr','skincare'),
                                ),
                                array(
                                    'value'=>'envelope',
                                    'label'=>esc_html__('Mail','skincare'),
                                ),
                            )
                        ),
                        array(
                            'id'          => 'number',
                            'label'       => esc_html__('Show number','skincare'),
                            'type'        => 'on-off',
                            'std'         => 'on',                            
                        ),
                    ),
                ),
                array(
                    'id'          => 'disable_verify_notice',
                    'label'       => esc_html__('Disable Verify Menu','skincare'),
                    'type'        => 'on-off',
                    'std'         => 'off',
                    'section'     => 'option_basic',
                ),
                /*----------------End Basic ----------------------*/

                /*----------------Begin Menu --------------------*/
                array(
                    'id'          => 'sv_menu_color',
                    'label'       => esc_html__('Menu style','skincare'),
                    'type'        => 'typography',
                    'section'     => 'option_menu',
                ),
                array(
                    'id'          => 'sv_menu_color_hover',
                    'label'       => esc_html__('Hover color','skincare'),
                    'desc'        => esc_html__('Choose color','skincare'),
                    'type'        => 'colorpicker-opacity',
                    'section'     => 'option_menu',
                ),
                array(
                    'id'          => 'sv_menu_color_active',
                    'label'       => esc_html__('Background Hover color','skincare'),
                    'desc'        => esc_html__('Choose color','skincare'),
                    'type'        => 'colorpicker-opacity',
                    'section'     => 'option_menu',
                ),
                /*----------------End Menu ----------------------*/
                
                /*----------------Begin Blog + Post --------------------*/
                array(
                    'id'        => 'tab_blog_general',
                    'type'      => 'tab',
                    'section'   => 'blog_post',
                    'label'     => esc_html__('General','skincare')
                ),       
				array(
                    'id'          => 'blog_default_style',
                    'label'       => esc_html__('Default style','skincare'),
                    'type'        => 'select',
                    'section'     => 'blog_post',
                    'desc'        =>esc_html__('Choose a style to active display','skincare'),
                    'choices'     => array(
                        array(
                            'value'=>'list',
                            'label'=>esc_html__('List','skincare'),
                        ),
                        array(
                            'value'=>'grid',
                            'label'=>esc_html__('Grid','skincare'),
                        )
                    )
                ),
                array(
                    'id'          => 'before_append_post',
                    'label'       => esc_html__('Append content before blog/archive page','skincare'),
                    'type'        => 'select',
                    'section'     => 'blog_post',
                    'choices'     => s7upf_list_post_type('s7upf_mega_item'),
                    'desc'        => esc_html__('Choose a mega page content append to before main content of post/blog/archive page.','skincare'),
                ),
                array(
                    'id'          => 'after_append_post',
                    'label'       => esc_html__('Append content after blog/archive page','skincare'),
                    'type'        => 'select',
                    'section'     => 'blog_post',
                    'choices'     => s7upf_list_post_type('s7upf_mega_item'),
                    'desc'        => esc_html__('Choose a mega page content append to after main content of post/blog/archive page.','skincare'),
                ),
                array(
                    'id'          => 's7upf_sidebar_position_blog',
                    'label'       => esc_html__('Sidebar Blog','skincare'),
                    'type'        => 'select',
                    'section'     => 'blog_post',
                    'desc'=>esc_html__('Set sidebar position for your blog page. Left, Right, or No sidebar.','skincare'),
                    'choices'     => array(
                        array(
                            'value'=>'no',
                            'label'=>esc_html__('No Sidebar','skincare'),
                        ),
                        array(
                            'value'=>'left',
                            'label'=>esc_html__('Left','skincare'),
                        ),
                        array(
                            'value'=>'right',
                            'label'=>esc_html__('Right','skincare'),
                        )
                    )
                ),
                array(
                    'id'          => 's7upf_sidebar_blog',
                    'label'       => esc_html__('Sidebar select display in blog','skincare'),
                    'type'        => 'sidebar-select',
                    'section'     => 'blog_post',
                    'condition'   => 's7upf_sidebar_position_blog:not(no)',
                    'desc'        => esc_html__('Choose a sidebar to display.','skincare'),
                ),
                
                array(
                    'id'          => 'blog_style',
                    'label'       => esc_html__('Blog pagination','skincare'),
                    'type'        => 'select',
                    'section'     => 'blog_post',
                    'desc'        =>esc_html__('Choose a style to active display','skincare'),
                    'choices'     => array(
                        array(
                            'value'=>'',
                            'label'=>esc_html__('Default','skincare'),
                        ),
                        array(
                            'value'=>'load-more',
                            'label'=>esc_html__('Load more','skincare'),
                        )
                    )
                ),
                
                 //Tab list
                array(
                    'id'        => 'tab_blog_list',
                    'type'      => 'tab',
                    'section'   => 'blog_post',
                    'label'     => esc_html__('List Settings','skincare')
                ),
                array(
                    'id'          => 'post_list_size',
                    'label'       => esc_html__('Custom list thumbnail size','skincare'),
                    'type'        => 'text',
                    'section'     => 'blog_post',
                    'desc'        => esc_html__('Enter size thumbnail to crop. [width]x[height]. Example is 300x300.','skincare')
                ),
                array(
                    'id'          => 'post_list_item_style',
                    'label'       => esc_html__('List item style','skincare'),
                    'type'        => 'select',
                    'section'     => 'blog_post',
                    'desc'=>esc_html__('Choose a style to active display','skincare'),
                    'choices'     => s7upf_get_post_list_style('option')
                ),
                //Tab grid
                array(
                    'id'        => 'tab_blog_grid',
                    'type'      => 'tab',
                    'section'   => 'blog_post',
                    'label'     => esc_html__('Grid Settings','skincare')
                ),
                array(
                    'id'          => 'post_grid_column',
                    'label'       => esc_html__('Grid column','skincare'),
                    'type'        => 'select',
                    'section'     => 'blog_post',
                    'std'         => '3',
                    'desc'=>esc_html__('Choose a style to active display','skincare'),
                    'choices'     => array(
                        array(
                            'value'=>'2',
                            'label'=>esc_html__('2 column','skincare'),
                        ),
                        array(
                            'value'=>'3',
                            'label'=>esc_html__('3 column','skincare'),
                        ),
                        array(
                            'value'=>'4',
                            'label'=>esc_html__('4 column','skincare'),
                        ),
                        array(
                            'value'=>'5',
                            'label'=>esc_html__('5 column','skincare'),
                        ),
                        array(
                            'value'=>'6',
                            'label'=>esc_html__('6 column','skincare'),
                        )
                    )
                ),
                array(
                    'id'          => 'post_grid_size',
                    'label'       => esc_html__('Custom grid thumbnail size','skincare'),
                    'type'        => 'text',
                    'section'     => 'blog_post',
                    'desc'        => esc_html__('Enter size thumbnail to crop. [width]x[height]. Example is 300x300.','skincare')
                ),
                array(
                    'id'          => 'post_grid_excerpt',
                    'label'       => esc_html__('Grid Sub string excerpt','skincare'),
                    'type'        => 'text',
                    'section'     => 'blog_post',
                    'std'         => '80',
                    'desc'        => esc_html__('Enter number of character want to get from excerpt content. Default is 0(hidden). Example is 80. Note: This value only apply for items style can be show excerpt.','skincare')
                ),
                array(
                    'id'          => 'post_grid_item_style',
                    'label'       => esc_html__('Grid item style','skincare'),
                    'type'        => 'select',
                    'section'     => 'blog_post',
                    'desc'        =>esc_html__('Choose a style to active display','skincare'),
                    'choices'     => s7upf_get_post_style('option')
                ),
                array(
                    'id'          => 'post_grid_type',
                    'label'       => esc_html__('Grid display','skincare'),
                    'type'        => 'select',
                    'section'     => 'blog_post',
                    'desc'        =>esc_html__('Choose a style to active display','skincare'),
                    'choices'     => array(
                        array(
                            'value'=>'',
                            'label'=>esc_html__('Default','skincare'),
                        ),
                        array(
                            'value'=>'list-masonry',
                            'label'=>esc_html__('Masonry','skincare'),
                        )
                    )
                ),
                //Post detail
                array(
                    'id'        => 'tab_blog_post_detail',
                    'type'      => 'tab',
                    'section'   => 'blog_post',
                    'label'     => esc_html__('Post detail Settings','skincare')
                ),
                array(
                    'id'          => 's7upf_sidebar_position_post',
                    'label'       => esc_html__('Sidebar Single Post','skincare'),
                    'type'        => 'select',
                    'section'     => 'blog_post',
                    'desc'        => esc_html__('Set sidebar position for your post detail page. Left, Right, or No sidebar.','skincare'),
                    'choices'     => array(
                        array(
                            'value'=>'no',
                            'label'=>esc_html__('No Sidebar','skincare'),
                        ),
                        array(
                            'value'=>'left',
                            'label'=>esc_html__('Left','skincare'),
                        ),
                        array(
                            'value'=>'right',
                            'label'=>esc_html__('Right','skincare'),
                        )
                    )
                ),
                array(
                    'id'          => 's7upf_sidebar_post',
                    'label'       => esc_html__('Sidebar select display in single post','skincare'),
                    'type'        => 'sidebar-select',
                    'section'     => 'blog_post',
                    'condition'   => 's7upf_sidebar_position_post:not(no)',                    
                    'desc'        => esc_html__('Choose a sidebar to display.','skincare'),
                ),
				array(
                    'id'          => 'before_append',
                    'label'       => esc_html__('Append content before product page','skincare'),
                    'type'        => 'select',
                    'section'     => 'blog_post',
                    'choices'     => s7upf_list_post_type('s7upf_mega_item'),
                    'desc'        => esc_html__('Choose a mega page content append to before main content of post single.','skincare'),
                ),
                array(
                    'id'          => 'after_append',
                    'label'       => esc_html__('Append content after product page','skincare'),
                    'type'        => 'select',
                    'section'     => 'blog_post',
                    'choices'     => s7upf_list_post_type('s7upf_mega_item'),
                    'desc'        => esc_html__('Choose a mega page content append to after main content of post single.','skincare'),
                ),
                array(
                    'id'          => 'post_single_thumbnail',
                    'label'       => esc_html__('Show thumbnail/media','skincare'),
                    'desc'        => 'Show/hide thumbnail image, gallery, media on post detail.',
                    'type'        => 'on-off',
                    'section'     => 'blog_post',
                    'std'         => 'on',
                ),                
                array(
                    'id'          => 'post_single_size',
                    'label'       => esc_html__('Custom single image size','skincare'),
                    'type'        => 'text',
                    'section'     => 'blog_post',
                    'desc'        => esc_html__('Enter size thumbnail to crop. [width]x[height]. Example is 300x300.','skincare'),
                    'condition'   => 'post_single_thumbnail:is(on)',
                ),
                array(
                    'id'          => 'post_single_small',
                    'label'       => esc_html__('Small Content Post','skincare'),
                    'desc'        => 'Set post content small on sideabar none.',
                    'type'        => 'on-off',
                    'section'     => 'blog_post',
                    'std'         => 'off',
                ),
                array(
                    'id'          => 'post_single_tags',
                    'label'       => esc_html__('Show tags post','skincare'),
                    'desc'        => 'Show/hide tags on the post detail.',
                    'type'        => 'on-off',
                    'section'     => 'blog_post',
                    'std'         => 'on',
                ),
                // Related section
                array(
                    'id'          => 'post_single_related',
                    'label'       => esc_html__('Show related post','skincare'),
                    'desc'        => 'Show/hide related post on the post detail.',
                    'type'        => 'on-off',
                    'section'     => 'blog_post',
                    'std'         => 'on',
                ),
                array(
                    'id'          => 'post_single_related_title',
                    'label'       => esc_html__('Related title','skincare'),
                    'desc'        => 'Enter title of related section.',
                    'type'        => 'text',
                    'section'     => 'blog_post',
                    'condition'   => 'post_single_related:is(on)',
                ),
                array(
                    'id'          => 'post_single_related_number',
                    'label'       => esc_html__('Related number post','skincare'),
                    'desc'        => 'Enter number of related post to display.',
                    'type'        => 'text',
                    'section'     => 'blog_post',
                    'condition'   => 'post_single_related:is(on)',
                ),
				array(
                    'id'          => 'post_single_related_size',
                    'label'       => esc_html__('Custom single image size','skincare'),
                    'type'        => 'text',
                    'section'     => 'blog_post',
                    'desc'        => esc_html__('Enter size thumbnail to crop. [width]x[height]. Example is 300x300.','skincare'),
                    'condition'   => 'post_single_related:is(on)',
                ),
                array(
                    'id'          => 'post_single_related_item',
                    'label'       => esc_html__('Related custom number item responsive','skincare'),
                    'desc'        => 'Enter item for screen width(px) format is width:value and separate values by ",". Example is 0:2,600:3,1000:4. Default is auto.',
                    'type'        => 'text',
                    'section'     => 'blog_post',
                    'condition'   => 'post_single_related:is(on)',
                ),
                array(
                    'id'          => 'post_single_related_item_style',
                    'label'       => esc_html__('Related item style','skincare'),
                    'type'        => 'select',
                    'section'     => 'blog_post',
                    'desc'        =>esc_html__('Choose a style to active display','skincare'),
                    'choices'     => s7upf_get_post_style('option'),
                    'condition'   => 'post_single_related:is(on)',
                ),
                // End related

                /*----------------End Blog + Post ----------------------*/

                /*----------------Begin Layout --------------------*/
                array(
                    'id'          => 's7upf_sidebar_position_page',
                    'label'       => esc_html__('Sidebar Page','skincare'),
                    'type'        => 'select',
                    'section'     => 'option_layout',
                    'desc'        => esc_html__('Set sidebar position for your default page. Left, Right, or No sidebar.','skincare'),
                    'choices'     => array(
                        array(
                            'value'=>'no',
                            'label'=>esc_html__('No Sidebar','skincare'),
                        ),
                        array(
                            'value'=>'left',
                            'label'=>esc_html__('Left','skincare'),
                        ),
                        array(
                            'value'=>'right',
                            'label'=>esc_html__('Right','skincare'),
                        )
                    )
                ),
                array(
                    'id'          => 's7upf_sidebar_page',
                    'label'       => esc_html__('Sidebar select display in page','skincare'),
                    'type'        => 'sidebar-select',
                    'section'     => 'option_layout',
                    'condition'   => 's7upf_sidebar_position_page:not(no)',                    
                    'desc'        => esc_html__('Choose a sidebar to display.','skincare'),
                ),
                /****end page****/
                array(
                    'id'          => 's7upf_sidebar_position_page_archive',
                    'label'       => esc_html__('Sidebar Position on Page Archives:','skincare'),
                    'type'        => 'select',
                    'section'     => 'option_layout',
                    'desc'        => esc_html__('Set sidebar position for your archives page(category/tag/author page...). Left, Right, or No sidebar.','skincare'),
                    'choices'     => array(
                        array(
                            'value'=>'no',
                            'label'=>esc_html__('No Sidebar','skincare'),
                        ),
                        array(
                            'value'=>'left',
                            'label'=>esc_html__('Left','skincare'),
                        ),
                        array(
                            'value'=>'right',
                            'label'=>esc_html__('Right','skincare'),
                        )
                    )
                ),
                array(
                    'id'          => 's7upf_sidebar_page_archive',
                    'label'       => esc_html__('Sidebar select display in page Archives','skincare'),
                    'type'        => 'sidebar-select',
                    'section'     => 'option_layout',
                    'condition'   => 's7upf_sidebar_position_page_archive:not(no)',
                    'desc'        => esc_html__('Choose a sidebar to display.','skincare'),
                ),
                array(
                    'id'          => 's7upf_sidebar_position_page_search',
                    'label'       => esc_html__('Sidebar Position on search page:','skincare'),
                    'type'        => 'select',
                    'section'     => 'option_layout',
                    'desc'        => esc_html__('Set sidebar position for your search page. Left, Right, or No sidebar.','skincare'),
                    'choices'     => array(
                        array(
                            'value'=>'no',
                            'label'=>esc_html__('No Sidebar','skincare'),
                        ),
                        array(
                            'value'=>'left',
                            'label'=>esc_html__('Left','skincare'),
                        ),
                        array(
                            'value'=>'right',
                            'label'=>esc_html__('Right','skincare'),
                        )
                    )
                ),
                array(
                    'id'          => 's7upf_sidebar_page_search',
                    'label'       => esc_html__('Sidebar select display in page Archives','skincare'),
                    'type'        => 'sidebar-select',
                    'section'     => 'option_layout',
                    'condition'   => 's7upf_sidebar_position_page_search:not(no)',
                    'desc'        => esc_html__('Choose a sidebar to display.','skincare'),
                ),
                // END                
                array(
                    'id'          => 's7upf_add_sidebar',
                    'label'       => esc_html__('Add SideBar','skincare'),
                    'type'        => 'list-item',
                    'section'     => 'option_layout',
                    'std'         => '',
                    'settings'    => array( 
                        array(
                            'id'          => 'widget_title_heading',
                            'label'       => esc_html__('Choose heading title widget','skincare'),
                            'type'        => 'select',
                            'std'        => 'h3',
                            'choices'     => array(
                                array(
                                    'value'=>'h1',
                                    'label'=>esc_html__('H1','skincare'),
                                ),
                                array(
                                    'value'=>'h2',
                                    'label'=>esc_html__('H2','skincare'),
                                ),
                                array(
                                    'value'=>'h3',
                                    'label'=>esc_html__('H3','skincare'),
                                ),
                                array(
                                    'value'=>'h4',
                                    'label'=>esc_html__('H4','skincare'),
                                ),
                                array(
                                    'value'=>'h5',
                                    'label'=>esc_html__('H5','skincare'),
                                ),
                                array(
                                    'value'=>'h6',
                                    'label'=>esc_html__('H6','skincare'),
                                ),
                            )
                        ),
                    ),
                ),
                /*----------------End Layout ----------------------*/

                /*----------------Begin Blog ----------------------*/       
                

                /*----------------End BLOG----------------------*/

                /*----------------Begin Typography ----------------------*/
                array(
                    'id'          => 's7upf_custom_typography',
                    'label'       => esc_html__('Add Settings','skincare'),
                    'type'        => 'list-item',
                    'section'     => 'option_typography',
                    'std'         => '',
                    'settings'    => array(
                        array(
                            'id'          => 'typo_area',
                            'label'       => esc_html__('Choose Area to style','skincare'),
                            'type'        => 'select',
                            'std'        => 'main',
                            'choices'     => array(
                                array(
                                    'value'=>'body',
                                    'label'=>esc_html__('Body','skincare'),
                                ),
                                array(
                                    'value'=>'header',
                                    'label'=>esc_html__('Header','skincare'),
                                ),
                                array(
                                    'value'=>'main',
                                    'label'=>esc_html__('Main Content','skincare'),
                                ),
                                array(
                                    'value'=>'widget',
                                    'label'=>esc_html__('Widget','skincare'),
                                ),
                                array(
                                    'value'=>'footer',
                                    'label'=>esc_html__('Footer','skincare'),
                                ),
                            )
                        ),
                        array(
                            'id'          => 'typo_heading',
                            'label'       => esc_html__('Choose heading Area','skincare'),
                            'type'        => 'select',
                            'std'        => '',
                            'choices'     => array(
                                array(
                                    'value'=>'',
                                    'label'=>esc_html__('All','skincare'),
                                ),
                                array(
                                    'value'=>'h1',
                                    'label'=>esc_html__('H1','skincare'),
                                ),
                                array(
                                    'value'=>'h2',
                                    'label'=>esc_html__('H2','skincare'),
                                ),
                                array(
                                    'value'=>'h3',
                                    'label'=>esc_html__('H3','skincare'),
                                ),
                                array(
                                    'value'=>'h4',
                                    'label'=>esc_html__('H4','skincare'),
                                ),
                                array(
                                    'value'=>'h5',
                                    'label'=>esc_html__('H5','skincare'),
                                ),
                                array(
                                    'value'=>'h6',
                                    'label'=>esc_html__('H6','skincare'),
                                ),
                                array(
                                    'value'=>'a',
                                    'label'=>esc_html__('a','skincare'),
                                ),
                                array(
                                    'value'=>'p',
                                    'label'=>esc_html__('p','skincare'),
                                ),
                                array(
                                    'value'=>'span',
                                    'label'=>esc_html__('span','skincare'),
                                ),
                                array(
                                    'value'=>'i',
                                    'label'=>esc_html__('i','skincare'),
                                ),
                                array(
                                    'value'=>'quote',
                                    'label'=>esc_html__('quote','skincare'),
                                ),
                            )
                        ),
                        array(
                            'id'          => 'typography_style',
                            'label'       => esc_html__('Add Style','skincare'),
                            'type'        => 'typography',
                            'section'     => 'option_typography',
                        ),
                    ),
                ),        
                array(
                    'id'          => 'google_fonts',
                    'label'       => esc_html__('Add Google Fonts','skincare'),
                    'type'        => 'google-fonts',
                    'section'     => 'option_typography',
                ),
                /*----------------End Typography ----------------------*/
            )
        );
        if(class_exists( 'WooCommerce' )){
            // Add woo sections
            $woo_sections = array(
                array(
                    'id' => 'option_woo',
                    'title' => '<i class="fa fa-shopping-cart"></i>'.esc_html__(' Shop Settings', 'skincare')
                ),
                array(
                    'id' => 'option_product',
                    'title' => '<i class="fa fa-th-large"></i>'.esc_html__(' Product Settings', 'skincare')
                )
            );
            $s7upf_config['theme-option']['sections'] = array_merge($s7upf_config['theme-option']['sections'],$woo_sections);
            // End add sections

            // Add woo setting
            $woo_settings = array(                
                array(
                    'id'        => 'tab_shop_general',
                    'type'      => 'tab',
                    'section'   => 'option_woo',
                    'label'     => esc_html__('General','skincare')
                ),
                array(
                    'id'          => 's7upf_sidebar_position_woo',
                    'label'       => esc_html__('Sidebar Position WooCommerce page','skincare'),
                    'type'        => 'select',
                    'section'     => 'option_woo',
                    'desc'        => esc_html__('Set sidebar position for your woocommerce page(Shop, Checkout, Cart, My Account, Product category/tag/taxonomy page...). Left, Right, or No sidebar.','skincare'),
                    'choices'     => array(
                        array(
                            'value'=>'no',
                            'label'=>esc_html__('No Sidebar','skincare'),
                        ),
                        array(
                            'value'=>'left',
                            'label'=>esc_html__('Left','skincare'),
                        ),
                        array(
                            'value'=>'right',
                            'label'=>esc_html__('Right','skincare'),
                        )
                    )
                ),
                array(
                    'id'          => 's7upf_sidebar_woo',
                    'label'       => esc_html__('Sidebar select WooCommerce page','skincare'),
                    'type'        => 'sidebar-select',
                    'section'     => 'option_woo',
                    'condition'   => 's7upf_sidebar_position_woo:not(no)',
                    'desc'        => esc_html__('Choose one style of sidebar for WooCommerce page','skincare'),

                ),
                array(
                    'id'          => 'shop_default_style',
                    'label'       => esc_html__('Default style','skincare'),
                    'type'        => 'select',
                    'section'     => 'option_woo',
                    'desc'=>esc_html__('Choose a style to active display','skincare'),
                    'choices'     => array(                        
                        array(
                            'value'=>'list',
                            'label'=>esc_html__('List','skincare'),
                        ),
                        array(
                            'value'=>'grid-2-col',
                            'label'=>esc_html__('Grid 2 Column','skincare'),
                        ),
                        array(
                            'value'=>'grid-3-col',
                            'label'=>esc_html__('Grid 3 Column','skincare'),
                        ),
                        array(
                            'value'=>'grid-4-col',
                            'label'=>esc_html__('Grid 4 Column','skincare'),
                        ),
                    )
                ),
                array(
                    'id'          => 'shop_gap_product',
                    'label'       => esc_html__('Gap Products','skincare'),
                    'type'        => 'select',
                    'section'     => 'option_woo',
                    'desc'=>esc_html__('Choose space. The space between the items on the shop page.','skincare'),
                    'choices'     => array(                        
                        array(
                            'value'=>'',
                            'label'=>esc_html__('Default','skincare'),
                        ),
                        array(
                            'value'=>'gap-0',
                            'label'=>esc_html__('0','skincare'),
                        ),
                        array(
                            'value'=>'gap-5',
                            'label'=>esc_html__('5px','skincare'),
                        ),
                        array(
                            'value'=>'gap-10',
                            'label'=>esc_html__('10px','skincare'),
                        ),
                        array(
                            'value'=>'gap-15',
                            'label'=>esc_html__('15px','skincare'),
                        ),
                        array(
                            'value'=>'gap-20',
                            'label'=>esc_html__('20px','skincare'),
                        ),
                        array(
                            'value'=>'gap-30',
                            'label'=>esc_html__('30px','skincare'),
                        ),
                        array(
                            'value'=>'gap-40',
                            'label'=>esc_html__('40px','skincare'),
                        ),
                        array(
                            'value'=>'gap-50',
                            'label'=>esc_html__('50px','skincare'),
                        ),

                    )
                ),
                array(
                    'id'          => 'woo_shop_number',
                    'label'       => esc_html__('Product Number','skincare'),
                    'type'        => 'text',
                    'section'     => 'option_woo',
                    'std'         => '12',
                    'desc'        => esc_html__('Enter number product to display per page. Default is 12.','skincare')
                ),
                array(
                    'id'          => 'sv_set_time_woo',
                    'label'       => esc_html__('Product new in(days)','skincare'),
                    'type'        => 'text',
                    'section'     => 'option_woo',
                    'desc'        => esc_html__('Enter number to set time for product is new. Unit day. Default is 30.','skincare')
                ),
                array(
                    'id'          => 'shop_style',
                    'label'       => esc_html__('Shop pagination','skincare'),
                    'type'        => 'select',
                    'section'     => 'option_woo',
                    'desc'=>esc_html__('Choose a style to active display','skincare'),
                    'choices'     => array(
                        array(
                            'value'=>'',
                            'label'=>esc_html__('Default','skincare'),
                        ),
                        array(
                            'value'=>'load-more',
                            'label'=>esc_html__('Load more','skincare'),
                        )
                    )
                ),
                array(
                    'id'          => 'shop_ajax',
                    'label'       => esc_html__('Shop ajax','skincare'),
                    'type'        => 'on-off',
                    'section'     => 'option_woo',
                    'std'         => 'off',
                    'desc'        => esc_html__('Enable ajax process for your shop page.','skincare'),
                ),
                array(
                    'id'          => 'shop_thumb_animation',
                    'label'       => esc_html__('Thumbnail animation','skincare'),
                    'type'        => 'select',
                    'section'     => 'option_woo',
                    'desc'        => esc_html__('Choose a animation.','skincare'),
                    'choices'     => s7upf_get_product_thumb_animation('option')
                ),
                array(
                    'id'          => 'shop_number_filter',
                    'label'       => esc_html__('Show number filter','skincare'),
                    'desc'        => 'Show/hide number filter on shop page.',
                    'type'        => 'on-off',
                    'section'     => 'option_woo',
                    'std'         => 'on',
                ),
                array(
                    'id'          => 'shop_number_filter_list',
                    'label'       => esc_html__('Add list number filter','skincare'),
                    'type'        => 'list-item',
                    'section'     => 'option_woo',
                    'desc'        => esc_html__('Add custom list number to filter on the shop page.','skincare'),
                    'settings'    => array( 
                        array(
                            'id'          => 'number',
                            'label'       => esc_html__('Number','skincare'),
                            'type'        => 'text',                            
                        ),
                    ),
                    'condition'   => 'blog_number_filter:not(off)',
                ),
                array(
                    'id'          => 'shop_type_filter',
                    'label'       => esc_html__('Show type filter','skincare'),
                    'desc'        => 'Show/hide type filter(list/grid) on shop page.',
                    'type'        => 'on-off',
                    'section'     => 'option_woo',
                    'std'         => 'on',
                ),
                //Tab list
                array(
                    'id'        => 'tab_shop_list',
                    'type'      => 'tab',
                    'section'   => 'option_woo',
                    'label'     => esc_html__('List Settings','skincare')
                ),

                array(
                    'id'          => 'shop_list_size',
                    'label'       => esc_html__('Custom list thumbnail size','skincare'),
                    'type'        => 'text',
                    'section'     => 'option_woo',
                    'desc'        => esc_html__('Enter size thumbnail to crop. [width]x[height]. Example is 300x300.','skincare')
                ),
                array(
                    'id'          => 'shop_list_item_style',
                    'label'       => esc_html__('List item style','skincare'),
                    'type'        => 'select',
                    'section'     => 'option_woo',
                    'desc'        => esc_html__('Choose a style to active display','skincare'),
                    'choices'     => s7upf_get_product_list_style('option')
                ),
                //Tab grid
                array(
                    'id'        => 'tab_shop_grid',
                    'type'      => 'tab',
                    'section'   => 'option_woo',
                    'label'     => esc_html__('Grid Settings','skincare')
                ),
                array(
                    'id'          => 'shop_grid_size',
                    'label'       => esc_html__('Custom grid thumbnail size','skincare'),
                    'type'        => 'text',
                    'section'     => 'option_woo',
                    'desc'        => esc_html__('Enter size thumbnail to crop. [width]x[height]. Example is 300x300.','skincare')
                ),
                array(
                    'id'          => 'shop_grid_item_style',
                    'label'       => esc_html__('Grid item style','skincare'),
                    'type'        => 'select',
                    'section'     => 'option_woo',
                    'desc'        => esc_html__('Choose a style to active display','skincare'),
                    'choices'     => s7upf_get_product_style('option')
                ),
                array(
                    'id'          => 'shop_grid_type',
                    'label'       => esc_html__('Grid display','skincare'),
                    'type'        => 'select',
                    'section'     => 'option_woo',
                    'desc'        => esc_html__('Choose a style to active display','skincare'),
                    'choices'     => array(
                        array(
                            'value'=>'',
                            'label'=>esc_html__('Default','skincare'),
                        ),
                        array(
                            'value'=>'list-masonry',
                            'label'=>esc_html__('Masonry','skincare'),
                        )
                    )
                ),
                array(
                    'id'        => 'tab_shop_advanced',
                    'type'      => 'tab',
                    'section'   => 'option_woo',
                    'label'     => esc_html__('Advanced','skincare')
                ),
                array(
                    'id'          => 'cart_page_style',
                    'label'       => esc_html__('Cart display','skincare'),
                    'type'        => 'select',
                    'section'     => 'option_woo',
                    'desc'        => esc_html__('Choose a style to active display','skincare'),
                    'choices'     => array(
                        array(
                            'value'=>'',
                            'label'=>esc_html__('Default','skincare'),
                        ),
                        array(
                            'value'=>'style2',
                            'label'=>esc_html__('Style 2','skincare'),
                        )
                    )
                ),
                array(
                    'id'          => 'checkout_page_style',
                    'label'       => esc_html__('Checkout display','skincare'),
                    'type'        => 'select',
                    'section'     => 'option_woo',
                    'desc'        => esc_html__('Choose a style to active display','skincare'),
                    'choices'     => array(
                        array(
                            'value'=>'',
                            'label'=>esc_html__('Default','skincare'),
                        ),
                        array(
                            'value'=>'style2',
                            'label'=>esc_html__('Style 2','skincare'),
                        )
                    )
                ),
                array(
                    'id'          => 's7upf_header_page_woo',
                    'label'       => esc_html__( 'Header Woocommerce Page', 'skincare' ),
                    'desc'        => esc_html__( 'Include Header content. Go to Header in admin menu to edit/create header content. Note this value default for all pages of your site, If have any page/single page display other content pehaps you are set specific header for it', 'skincare' ),
                    'type'        => 'select',
                    'section'     => 'option_woo',
                    'choices'     => s7upf_list_post_type('s7upf_header')
                ),
                array(
                    'id'          => 's7upf_footer_page_woo',
                    'label'       => esc_html__( 'Footer Woocommerce Page', 'skincare' ),
                    'desc'        => esc_html__( 'Include Footer content. Go to Footer in admin menu to edit/create footer content.  Note this value default for all pages of your site, If have any page/single page display other content pehaps you are set specific footer for it', 'skincare' ),
                    'type'        => 'select',
                    'section'     => 'option_woo',
                    'choices'     => s7upf_list_post_type('s7upf_footer')
                ),
                array(
                    'id'          => 'before_append_woo',
                    'label'       => esc_html__('Append content before Woocommerce page','skincare'),
                    'type'        => 'select',
                    'section'     => 'option_woo',
                    'choices'     => s7upf_list_post_type('s7upf_mega_item'),
                    'desc'        => esc_html__('Choose a mega page content append to before main content of page/post.','skincare'),
                ),
                array(
                    'id'          => 'after_append_woo',
                    'label'       => esc_html__('Append content after Woocommerce page','skincare'),
                    'type'        => 'select',
                    'section'     => 'option_woo',
                    'choices'     => s7upf_list_post_type('s7upf_mega_item'),
                    'desc'        => esc_html__('Choose a mega page content append to after main content of page/post.','skincare'),
                ),
                // END Shop config
                array(
                    'id'        => 'tab_product_general',
                    'type'      => 'tab',
                    'section'   => 'option_product',
                    'label'     => esc_html__('General','skincare')
                ),
				array(
                    'id'          => 'brand_taxonomy_product',
                    'label'       => esc_html__('Add Product Brand','skincare'),
                    'type'        => 'on-off',
                    'section'     => 'option_product',
                    'std'         => 'off'
                ), 
                array(
                    'id'          => 'sv_sidebar_position_woo_single',
                    'label'       => esc_html__('Sidebar Position WooCommerce Single','skincare'),
                    'type'        => 'select',
                    'section'     => 'option_product',
                    'desc'        => esc_html__('Left, or Right, or Center','skincare'),
                    'std'         => 'no',
                    'choices'     => array(
                        array(
                            'value'=>'no',
                            'label'=>esc_html__('No Sidebar','skincare'),
                        ),
                        array(
                            'value'=>'left',
                            'label'=>esc_html__('Left','skincare'),
                        ),
                        array(
                            'value'=>'right',
                            'label'=>esc_html__('Right','skincare'),
                        ),
                    )
                ),
                array(
                    'id'          => 'sv_sidebar_woo_single',
                    'label'       => esc_html__('Sidebar select WooCommerce Single','skincare'),
                    'type'        => 'sidebar-select',
                    'section'     => 'option_product',
                    'condition'   => 'sv_sidebar_position_woo_single:not(no)',
                    'desc'        => esc_html__('Choose one style of sidebar for WooCommerce page','skincare'),
                ),
                array(
                    'id'          => 'product_image_zoom',
                    'label'       => esc_html__('Image zoom','skincare'),
                    'type'        => 'select',
                    'section'     => 'option_product',
                    'desc'        => esc_html__('Choose a style to display','skincare'),
                    'choices'     => array(
                        array(
                            'value'=>'',
                            'label'=>esc_html__('None','skincare'),
                        ),
                        array(
                            'value'=>'zoom-style1',
                            'label'=>esc_html__('Zoom 1','skincare'),
                        ),
                        array(
                            'value'=>'zoom-style2',
                            'label'=>esc_html__('Zoom 2','skincare'),
                        ),
                        array(
                            'value'=>'zoom-style3',
                            'label'=>esc_html__('Zoom 3','skincare'),
                        ),
                        array(
                            'value'=>'zoom-style4',
                            'label'=>esc_html__('Zoom 4','skincare'),
                        )
                    )
                ),
                array(
                    'id'          => 'product_tab_detail',
                    'label'       => esc_html__('Product tab style','skincare'),
                    'type'        => 'select',
                    'section'     => 'option_product',
                    'desc'        => esc_html__('Choose a style to display','skincare'),
                    'choices'     => array(
                        array(
                            'value'=> '',
                            'label'=> esc_html__("Normal", 'skincare'),
                        ),
                        array(
                            'value'=> 'detail-tab-accordion',
                            'label'=> esc_html__("Accordion", 'skincare'),
                        ),
                    )
                ),
                array(
                    'id'          => 'show_excerpt',
                    'label'       => esc_html__('Show Excerpt','skincare'),
                    'type'        => 'on-off',
                    'section'     => 'option_product',
                    'std'         => 'on'
                ),
                array(
                    'id'        => 'tab_product_extra',
                    'type'      => 'tab',
                    'section'   => 'option_product',
                    'label'     => esc_html__('Extra display','skincare')
                ),               
                array(
                    'id'          => 'show_latest',
                    'label'       => esc_html__('Show latest products','skincare'),
                    'type'        => 'on-off',
                    'section'     => 'option_product',
                    'std'         => 'on'
                ),
                array(
                    'id'          => 'show_upsell',
                    'label'       => esc_html__('Show upsell products','skincare'),
                    'type'        => 'on-off',
                    'section'     => 'option_product',
                    'std'         => 'on'
                ),
                array(
                    'id'          => 'show_related',
                    'label'       => esc_html__('Show related products','skincare'),
                    'type'        => 'on-off',
                    'section'     => 'option_product',
                    'std'         => 'on'
                ),
                array(
                    'id'          => 'show_single_number',
                    'label'       => esc_html__('Show Single Number','skincare'),
                    'type'        => 'numeric-slider',
                    'min_max_step'=> '1,100,1',
                    'section'     => 'option_product',
                    'std'         => '6'
                ),
                array(
                    'id'          => 'show_single_size',
                    'label'       => esc_html__('Show Single Size','skincare'),
                    'type'        => 'text',
                    'section'     => 'option_product',
                    'desc'        => esc_html__('Custom size for related,upsell products. Enter size thumbnail to crop. [width]x[height]. Example is 300x300.','skincare'),
                ),
                array(
                    'id'          => 'show_single_itemres',
                    'label'       => esc_html__('Custom item devices','skincare'),
                    'type'        => 'text',
                    'section'     => 'option_product',
                    'desc'        => esc_html__('Enter item for screen width(px) format is width:value and separate values by ",". Example is 0:2,600:3,1000:4. Default is auto.','skincare'),
                ),
                array(
                    'id'          => 'show_single_item_style',
                    'label'       => esc_html__('Single item style','skincare'),
                    'type'        => 'select',
                    'section'     => 'option_product',
                    'desc'        => esc_html__('Choose a style to active display','skincare'),
                    'choices'     => s7upf_get_product_style('option')
                ),
                array(
                    'id'        => 'tab_product_advanced',
                    'type'      => 'tab',
                    'section'   => 'option_product',
                    'label'     => esc_html__('Advanced','skincare')
                ),
                array(
                    'id'          => 'before_append_woo_single',
                    'label'       => esc_html__('Append content before product page','skincare'),
                    'type'        => 'select',
                    'section'     => 'option_product',
                    'choices'     => s7upf_list_post_type('s7upf_mega_item'),
                    'desc'        => esc_html__('Choose a mega page content append to before main content of page/post.','skincare'),
                ),
                array(
                    'id'          => 'before_append_tab',
                    'label'       => esc_html__('Append content before product tab','skincare'),
                    'type'        => 'select',
                    'section'     => 'option_product',
                    'choices'     => s7upf_list_post_type('s7upf_mega_item'),
                    'desc'        => esc_html__('Choose a mega page content append to before product tab.','skincare'),
                ),
                array(
                    'id'          => 'after_append_tab',
                    'label'       => esc_html__('Append content after product tab','skincare'),
                    'type'        => 'select',
                    'section'     => 'option_product',
                    'choices'     => s7upf_list_post_type('s7upf_mega_item'),
                    'desc'        => esc_html__('Choose a mega page content append to before product tab.','skincare'),
                ),
                array(
                    'id'          => 'after_append_woo_single',
                    'label'       => esc_html__('Append content after product page','skincare'),
                    'type'        => 'select',
                    'section'     => 'option_product',
                    'choices'     => s7upf_list_post_type('s7upf_mega_item'),
                    'desc'        => esc_html__('Choose a mega page content append to after main content of page/post.','skincare'),
                ),
            );
            $s7upf_config['theme-option']['settings'] = array_merge($s7upf_config['theme-option']['settings'],$woo_settings);
            // End add settings
        }
    }
}
s7upf_set_theme_config();