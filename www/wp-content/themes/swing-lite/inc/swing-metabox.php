<?php
	/** Swing Lite Metaboxes **/

	add_action('add_meta_boxes', 'swing_lite_add_metabox' );
	if( !function_exists( 'swing_lite_add_metabox' ) ) {
		function swing_lite_add_metabox() {
			add_meta_box(
				'swing_lite_lite_sidebar',
				esc_html__( 'Sidebar Layout', 'swing-lite' ),
				'swing_lite_sidebar_layout',
				'page',
				'normal',
				'high'
			);
		}
	}

	function swing_lite_sidebar_layout(){
        global $post;
        $swing_lite_page_layouts = array(
    	    'no-sidebar' => array(
    	        'value' => 'no-sidebar',
    	        'label' => esc_html__( 'No sidebar', 'swing-lite' ),
    	        'thumbnail' => get_template_directory_uri() . '/assets/images/no-sidebar.png',
    	    ),
    	    'right-sidebar' => array(
    	        'value'     => 'right-sidebar',
    	        'label'     => esc_html__( 'Right Sidebar', 'swing-lite' ),
    	        'thumbnail' => get_template_directory_uri() . '/assets/images/right-sidebar.png',
    	    ), 
    	);
        wp_nonce_field( basename( __FILE__ ), 'swing_lite_page_layout_nonce' );
    
        $swing_lite_page_layout = get_post_meta( $post->ID, 'swing_lite_page_layout', true );
    	$swing_lite_page_layout = $swing_lite_page_layout ? $swing_lite_page_layout : 'no-sidebar';
        ?>
        
        <div class="page-meta-layouts">
        	<p><?php esc_html_e( 'Choose a Sidebar Layout for the page', 'swing-lite' ); ?></p>
            <?php foreach( $swing_lite_page_layouts as $layout ) : ?>
            	<?php
            		$span_class = '';
            		$span_class = ( $swing_lite_page_layout == $layout['value'] ) ? 'active' : '';
            	?>
            	<span data-layout="<?php echo esc_attr($layout['value']); ?>" class="<?php echo esc_attr($span_class); ?>">
            		<img src="<?php echo esc_url($layout['thumbnail']); ?>">
            	</span>
            <?php endforeach; ?>
    
            <input type="hidden" id="swing_lite_page_layout" name="swing_lite_page_layout" value="<?php echo esc_attr($swing_lite_page_layout); ?>">
        </div>
    	<?php
    }

    function swing_lite_save_sidebar_layout( $post_id ) {
	    global $post; 
	    $sidebars = array('no-sidebar', 'right-sidebar');
	    // Verify the nonce before proceeding.
	    if ( !isset( $_POST[ 'swing_lite_page_layout_nonce' ] ) || !wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST[ 'swing_lite_page_layout_nonce' ] ) ), basename( __FILE__ ) ) ) {
	        return;
	    }

	    // Stop WP from clearing custom fields on autosave
	    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE){
	        return;
	    }

	    if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type']) {  
	        if (!current_user_can( 'edit_page', $post_id ) )  
	        return $post_id;  
	    }
	    $swing_lite_page_layout = isset( $_POST['swing_lite_page_layout'] ) ? sanitize_text_field( wp_unslash($_POST['swing_lite_page_layout']) ) : 'no-sidebar';

	    if( in_array( $swing_lite_page_layout, $sidebars) ) {
        	update_post_meta($post_id, 'swing_lite_page_layout', $swing_lite_page_layout);  
	    }
	}
	add_action('save_post', 'swing_lite_save_sidebar_layout' );