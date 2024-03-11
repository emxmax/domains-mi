<?php
/**
 * Created by Sublime Text 2.
 * User: thanhhiep992
 * Date: 12/08/15
 * Time: 10:20 AM
 */

add_action('admin_init', 's7upf_custom_meta_boxes');
if(!function_exists('s7upf_custom_meta_boxes')){
    function s7upf_custom_meta_boxes(){
        //Format content
        $format_metabox = array(
            'id'        => 'block_format_content',
            'title'     => esc_html__('Format Settings', 'skincare'),
            'desc'      => '',
            'pages'     => array('post'),
            'context'   => 'normal',
            'priority'  => 'high',
            'fields'    => array(                
                array(
                    'id'        => 'format_image',
                    'label'     => esc_html__('Upload Image', 'skincare'),
                    'type'      => 'upload',
                    'desc'      => esc_html__('Choose image from media.','skincare'),
                ),
                array(
                    'id'        => 'format_gallery',
                    'label'     => esc_html__('Add Gallery', 'skincare'),
                    'type'      => 'Gallery',
                    'desc'      => esc_html__('Choose images from media.','skincare'),
                ),
                array(
                    'id'        => 'format_media',
                    'label'     => esc_html__('Link Media', 'skincare'),
                    'type'      => 'text',
                    'desc'      => esc_html__('Enter media url(Youtube, Vimeo, SoundCloud ...).','skincare'),
                )
            ),
        );
        //Post Setting
        $post_setting = array(
            'id'        => 's7upf_post_setting',
            'title'     => esc_html__('Post Settings', 'skincare'),
            'desc'      => '',
            'pages'     => array('post'),
            'context'   => 'normal',
            'priority'  => 'low',
            'fields'    => array(                
                array(
                    'id'          => 'post_single_thumbnail',
                    'label'       => esc_html__('Show thumbnail/media','skincare'),
                    'desc'        => 'Show/hide thumbnail image, gallery, media on post detail.',
					'type'        => 'select',
                    'choices'     => array(
                        array(
                            'label'=>esc_html__('--Select--','skincare'),
                            'value'=>'',
                        ),
                        array(
                            'label'=>esc_html__('On','skincare'),
                            'value'=>'on'
                        ),
                        array(
                            'label'=>esc_html__('Off','skincare'),
                            'value'=>'off'
                        ),
                    ), 
                ),           
				array(
                    'id'          => 'post_single_small',
                    'label'       => esc_html__('Small Content Post','skincare'),
                    'desc'        => 'Set post content small on sideabar none.',
                    'type'        => 'select',
                    'choices'     => array(
                        array(
                            'label'=>esc_html__('--Select--','skincare'),
                            'value'=>'',
                        ),
                        array(
                            'label'=>esc_html__('On','skincare'),
                            'value'=>'on'
                        ),
                        array(
                            'label'=>esc_html__('Off','skincare'),
                            'value'=>'off'
                        ),
                    ), 
                ),	
				array(
                    'id'          => 'post_single_related_item',
                    'label'       => esc_html__('Custom item devices','skincare'),
                    'type'        => 'text',
                    'desc'        => esc_html__('Enter item for screen width(px) format is width:value and separate values by ",". Example is 0:2,600:3,1000:4. Default is auto.','skincare'),
                ),
            ),
        );
        // SideBar
        $page_settings = array(
            'id'        => 's7upf_sidebar_option',
            'title'     => esc_html__('Page Settings','skincare'),
            'pages'     => array( 'page','post','product'),
            'context'   => 'normal',
            'priority'  => 'low',
            'fields'    => array(
                // General tab
                array(
                    'id'        => 'page_general',
                    'type'      => 'tab',
                    'label'     => esc_html__('General Settings','skincare')
                ),
                array(
                    'id'        => 's7upf_header_page',
                    'label'     => esc_html__('Choose page header','skincare'),
                    'type'      => 'select',
                    'choices'   => s7upf_list_post_type('s7upf_header'),
                    'desc'      => esc_html__('Include Header content. Go to Header page in admin menu to edit/create header content. Default is value of Theme Option.','skincare'),
                ),
                array(
                    'id'         => 's7upf_footer_page',
                    'label'      => esc_html__('Choose page footer','skincare'),
                    'type'       => 'select',
                    'choices'    => s7upf_list_post_type('s7upf_footer'),
                    'desc'       => esc_html__('Include Footer content. Go to Footer page in admin menu to edit/create footer content. Default is value of Theme Option.','skincare'),
                ),
                array(
                    'id'         => 's7upf_sidebar_position',
                    'label'      => esc_html__('Sidebar position ','skincare'),
                    'type'       => 'select',
                    'choices'    => array(
                        array(
                            'label' => esc_html__('--Select--','skincare'),
                            'value' => '',
                        ),
                        array(
                            'label' => esc_html__('No Sidebar','skincare'),
                            'value' => 'no'
                        ),
                        array(
                            'label' => esc_html__('Left sidebar','skincare'),
                            'value' => 'left'
                        ),
                        array(
                            'label' => esc_html__('Right sidebar','skincare'),
                            'value' => 'right'
                        ),
                    ),
                    'desc'      => esc_html__('Choose sidebar position for current page/post(Left,Right or No Sidebar).','skincare'),
                ),
                array(
                    'id'        => 's7upf_select_sidebar',
                    'label'     => esc_html__('Selects sidebar','skincare'),
                    'type'      => 'sidebar-select',
                    'condition' => 's7upf_sidebar_position:not(no),s7upf_sidebar_position:not()',
                    'desc'      => esc_html__('Choose a sidebar to display.','skincare'),
                ),
                array(
                    'id'          => 'before_append',
                    'label'       => esc_html__('Append content before','skincare'),
                    'type'        => 'select',
                    'choices'     => s7upf_list_post_type('s7upf_mega_item'),
                    'desc'        => esc_html__('Choose a mega page content append to before main content of page/post.','skincare'),
                ),
                array(
                    'id'          => 'after_append',
                    'label'       => esc_html__('Append content after','skincare'),
                    'type'        => 'select',
                    'choices'     => s7upf_list_post_type('s7upf_mega_item'),
                    'desc'        => esc_html__('Choose a mega page content append to after main content of page/post.','skincare'),
                ),
                array(
                    'id'          => 'show_title_page',
                    'label'       => esc_html__('Show title', 'skincare'),
                    'type'        => 'on-off',
                    'std'         => 'on',
                    'desc'        => esc_html__('Show/hide title of page.','skincare'),
                ),
                array(
                    'id' => 'post_single_page_share',
                    'label' => esc_html__('Show Share Box', 'skincare'),
                    'type' => 'select',
                    'std'   => '',
                    'choices'     => array(
                        array(
                            'label'=>esc_html__('--Theme Option--','skincare'),
                            'value'=>'',
                        ),
                        array(
                            'label'=>esc_html__('On','skincare'),
                            'value'=>'on'
                        ),
                        array(
                            'label'=>esc_html__('Off','skincare'),
                            'value'=>'off'
                        ),
                    ),
                    'desc'        => esc_html__( 'You can show/hide share box independent on this page. ', 'skincare' ),
                ),
                // End general tab
                // Custom color
                array(
                    'id'        => 'page_color',
                    'type'      => 'tab',
                    'label'     => esc_html__('Custom color','skincare')
                ),
                array(
                    'id'          => 'body_bg',
                    'label'       => esc_html__('Body Background','skincare'),
                    'type'        => 'colorpicker-opacity',
                    'desc'        => esc_html__( 'Change body background of page.', 'skincare' ),
                ),
                array(
                    'id'          => 'main_color',
                    'label'       => esc_html__('Main color','skincare'),
                    'type'        => 'colorpicker-opacity',
                    'desc'        => esc_html__( 'Change main color of this page.', 'skincare' ),
                ),
                // End Custom color
                // Display & Style tab
                array(
                    'id'        => 'page_layout',
                    'type'      => 'tab',
                    'label'     => esc_html__('Display & Style','skincare')
                ),
                array(
                    'id'          => 's7upf_page_style',
                    'label'       => esc_html__('Page Style','skincare'),
                    'type'        => 'select',
                    'std'         => '',
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
                    'desc'        => esc_html__( 'Choose default style for page.', 'skincare' ),
                ),
                array(
                    'id'          => 'container_width',
                    'label'       => esc_html__('Custom container width(px)','skincare'),
                    'type'        => 'text',
                    'desc'        => esc_html__( 'You can custom width of page container. Default is 1200px.', 'skincare' ),
                ),                
                
                // End Display & Style tab               
            )
        );
        
        $product_settings = array(
            'id' => 'block_product_settings',
            'title' => esc_html__('Product Settings', 'skincare'),
            'desc' => '',
            'pages' => array('product'),
            'context' => 'normal',
            'priority' => 'low',
            'fields' => array(    
                // Begin Product Settings
                array(
                    'id'        => 'block_product_custom_tab',
                    'type'      => 'tab',
                    'label'     => esc_html__('General Settings','skincare')
                ),             
                array(
                    'id'          => 'before_append_tab',
                    'label'       => esc_html__('Append content before product tab','skincare'),
                    'type'        => 'select',
                    'choices'     => s7upf_list_post_type('s7upf_mega_item'),
                    'desc'        => esc_html__('Choose a mega page content append to before product tab.','skincare'),
                ),
                array(
                    'id'          => 'after_append_tab',
                    'label'       => esc_html__('Append content after product tab','skincare'),
                    'type'        => 'select',
                    'choices'     => s7upf_list_post_type('s7upf_mega_item'),
                    'desc'        => esc_html__('Choose a mega page content append to before product tab.','skincare'),
                ),
                array(
                    'id'          => 's7upf_product_tab_data',
                    'label'       => esc_html__('Add Custom Tab','skincare'),
                    'type'        => 'list-item',
                    'settings'    => array(
                        array(
                            'id' => 'tab_content',
                            'label' => esc_html__('Content', 'skincare'),
                            'type' => 'textarea',
                        ),
                        array(
                            'id'            => 'priority',
                            'label'         => esc_html__('Priority (Default 40)', 'skincare'),
                            'type'          => 'numeric-slider',
                            'min_max_step'  => '1,50,1',
                            'std'           => '40',
                            'desc'          => esc_html__('Choose priority value to re-order custom tab position.','skincare'),
                        ),
                    )
                ),
				array(
                    'id'          => 's7upf_product_video',
                    'label'       => esc_html__('Product Video','skincare'),
                    'type'        => 'text',
                    'desc'        => esc_html__('Add video link(Youtube/Vimeo) for product','skincare'),
                ),
				array(
                    'id'          => 'show_single_itemres',
                    'label'       => esc_html__('Custom item devices','skincare'),
                    'type'        => 'text',
                    'desc'        => esc_html__('Enter item for screen width(px) format is width:value and separate values by ",". Example is 0:2,600:3,1000:4. Default is auto.','skincare'),
                ),
				//Style Setting 
				array(
                    'id'        => 'block_product_style',
                    'type'      => 'tab',
                    'label'     => esc_html__('Product Style','skincare')
                ), 
				array(
                    'id'          => 's7upf_detail_info_style',
                    'label'       => esc_html__('Product Layout','skincare'),
                    'type'        => 'select',
                    'std'         => '',
                    'choices'     => array(
                        array(
                            'label' =>  esc_html__('Default','skincare'),
                            'value' =>  '',
                        ),
                        array(
                            'label' =>  esc_html__('Sticky Info','skincare'),
                            'value' =>  'info-sticky'
                        ),
                        array(
                            'label' =>  esc_html__('Grid Gallery','skincare'),
                            'value' =>  'grid-gallery'
                        ),
                    ),
                    'desc'        => esc_html__( 'Select Product Layout.', 'skincare' ),
                ), 
				array(
                    'id'          => 'product_image_zoom',
                    'label'       => esc_html__('Product Zoom Style','skincare'),
					'desc'        => esc_html__( 'Select Zoom Style.', 'skincare' ),
                    'type'        => 'select',
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
                    'label'       => esc_html__('Product Tab Style','skincare'),
                    'type'        => 'select',
                    'choices'     => array(                                                    
                        array(
                            'value'=> '',
                            'label'=> esc_html__("Normal", 'skincare'),
                        ),
                        array(
                            'value'=> 'accordion',
                            'label'=> esc_html__("Accordion", 'skincare'),
                        ),
                    )
                ),
				array(
                    'id'          => 's7upf_product_sticky_addcart',
                    'label'       => esc_html__('Sticky Add to Cart','skincare'),
                    'type'        => 'on-off',
					'std'         => 'off',
                ),  
            ),
        );
        $product_type = array(
            'id' => 'product_trendding',
            'title' => esc_html__('Product Type', 'skincare'),
            'desc' => '',
            'pages' => array('product'),
            'context' => 'side',
            'priority' => 'low',
            'fields' => array(                
                array(
                    'id'    => 'trending_product',
                    'label' => esc_html__('Product Trending', 'skincare'),
                    'type'        => 'on-off',
                    'std'         => 'off',
                    'desc'        => esc_html__( 'Set trending for current product.', 'skincare' ),
                ),
                array(
                    'id'    => 'product_thumb_hover',
                    'label' => esc_html__('Product hover image', 'skincare'),
                    'type'  => 'upload',
                    'desc'        => esc_html__( 'Product thumbnail 2. Some hover animation of thumbnail show back image. Default return main product thumbnail.', 'skincare' ),
                ),
            ),
        );
        if (function_exists('ot_register_meta_box')){
            ot_register_meta_box($format_metabox);
            ot_register_meta_box($post_setting);
            ot_register_meta_box($page_settings);
            ot_register_meta_box($product_settings);
            ot_register_meta_box($product_type);
        }
    }
}
?>