<?php



add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' ); 

function register_theme_menus() {
    
    register_nav_menus(
        array(
            'primary-menu' => _( 'Header Menu' ),
            'printegration-menu' => _( 'Printegration Menu' ),
            'projects-menu' => _( 'Projects Menu' ),
            'footer-menu'  =>  _( 'Footer Menu' )
        )
    );
   
}
add_action( 'init', 'register_theme_menus' );



function wppr_theme_styles() {

	wp_enqueue_style( 'foundation_css', get_template_directory_uri(). '/css/foundation.min.css' );
        
        wp_enqueue_style( 'normalize_css', get_template_directory_uri(). '/css/normalize.css' );
        
        wp_enqueue_style( 'slick_css', get_template_directory_uri(). '/slick/slick.css' );
        
        wp_enqueue_style( 'slick_theme_css', get_template_directory_uri(). '/slick/slick-theme.css' );

        wp_enqueue_style( 'main_css', get_template_directory_uri(). '/style.css' );
}  
add_action( 'wp_enqueue_scripts', 'wppr_theme_styles' );




function wppr_theme_js() {
    
    wp_deregister_script( 'jquery' );
    
    wp_register_script( 'jquery', get_template_directory_uri().'/js/vendor/jquery.js', '', '', false );
    
    wp_enqueue_script( 'modernizr_js', get_template_directory_uri() . '/js/vendor/modernizr.js', '', '', false );
    
    
    
}
add_action( 'wp_enqueue_scripts', 'wppr_theme_js' );





function wppr_foundation_js() {
    
    wp_enqueue_script( 'foundation_js', get_template_directory_uri() . '/js/foundation.min.js', array('jquery'), '', true );
    
    wp_enqueue_script( 'offcanvas_js', get_template_directory_uri() . '/js/foundation/foundation.offcanvas.js', array('jquery'), '', true );
    
    wp_enqueue_script( 'slick_js', get_template_directory_uri() . '/slick/slick.min.js', array('jquery'), '', true );
    
    wp_enqueue_script( 'main_js', get_template_directory_uri() . '/js/app.js', array('jquery', 'foundation_js'), '', true );
}

add_action( 'wp_enqueue_scripts', 'wppr_foundation_js' );





/**
 * 
 * this code is to extend the functionality of the menu walker.
 * 
 * **/

class pr_walker_nav_menu extends Walker_Nav_Menu {
	/**
	 * What the class handles.
	 *
	 * @see Walker::$tree_type
	 * @since 3.0.0
	 * @var string
	 */
	public $tree_type = array( 'post_type', 'taxonomy', 'custom' );

	/**
	 * Database fields to use.
	 *
	 * @see Walker::$db_fields
	 * @since 3.0.0
	 * @todo Decouple this.
	 * @var array
	 */
	public $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );

	/**
	 * Starts the list before the elements are added.
	 *
	 * @see Walker::start_lvl()
	 *
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int    $depth  Depth of menu item. Used for padding.
	 * @param array  $args   An array of arguments. @see wp_nav_menu()
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"sub-menu\">\n";
	}

	/**
	 * Ends the list of after the elements are added.
	 *
	 * @see Walker::end_lvl()
	 *
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int    $depth  Depth of menu item. Used for padding.
	 * @param array  $args   An array of arguments. @see wp_nav_menu()
	 */
	public function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul>\n";
	}

	/**
	 * Start the element output.
	 *
	 * @see Walker::start_el()
	 *
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item   Menu item data object.
	 * @param int    $depth  Depth of menu item. Used for padding.
	 * @param array  $args   An array of arguments. @see wp_nav_menu()
	 * @param int    $id     Current item ID.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		/**
		 * Filter the CSS class(es) applied to a menu item's list item element.
		 *
		 * @since 3.0.0
		 * @since 4.1.0 The `$depth` parameter was added.
		 *
		 * @param array  $classes The CSS classes that are applied to the menu item's `<li>` element.
		 * @param object $item    The current menu item.
		 * @param array  $args    An array of {@see wp_nav_menu()} arguments.
		 * @param int    $depth   Depth of menu item. Used for padding.
		 */
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		/**
		 * Filter the ID applied to a menu item's list item element.
		 *
		 * @since 3.0.1
		 * @since 4.1.0 The `$depth` parameter was added.
		 *
		 * @param string $menu_id The ID that is applied to the menu item's `<li>` element.
		 * @param object $item    The current menu item.
		 * @param array  $args    An array of {@see wp_nav_menu()} arguments.
		 * @param int    $depth   Depth of menu item. Used for padding.
		 */
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $class_names .'>';

		$atts = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
		$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
		$atts['href']   = ! empty( $item->url )        ? $item->url        : '';

		/**
		 * Filter the HTML attributes applied to a menu item's anchor element.
		 *
		 * @since 3.6.0
		 * @since 4.1.0 The `$depth` parameter was added.
		 *
		 * @param array $atts {
		 *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
		 *
		 *     @type string $title  Title attribute.
		 *     @type string $target Target attribute.
		 *     @type string $rel    The rel attribute.
		 *     @type string $href   The href attribute.
		 * }
		 * @param object $item  The current menu item.
		 * @param array  $args  An array of {@see wp_nav_menu()} arguments.
		 * @param int    $depth Depth of menu item. Used for padding.
		 */
		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .' class="button">';
		/** This filter is documented in wp-includes/post-template.php */
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		/**
		 * Filter a menu item's starting output.
		 *
		 * The menu item's starting output only includes `$args->before`, the opening `<a>`,
		 * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
		 * no filter for modifying the opening and closing `<li>` for a menu item.
		 *
		 * @since 3.0.0
		 *
		 * @param string $item_output The menu item's starting HTML output.
		 * @param object $item        Menu item data object.
		 * @param int    $depth       Depth of menu item. Used for padding.
		 * @param array  $args        An array of {@see wp_nav_menu()} arguments.
		 */
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	/**
	 * Ends the element output, if needed.
	 *
	 * @see Walker::end_el()
	 *
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item   Page data object. Not used.
	 * @param int    $depth  Depth of page. Not Used.
	 * @param array  $args   An array of arguments. @see wp_nav_menu()
	 */
	public function end_el( &$output, $item, $depth = 0, $args = array() ) {
		$output .= "</li>\n";
	}

} // Walker_Nav_Menu







// function to create an array of related profile terms
function get_related_project_terms($post_id, $post_type){
    //get all terms associated with this post. We expect to find 1 term 
    //associated with each post, except for the pr_intercomponent type. 
        $terms = get_the_terms($post_id, 'project-data-type');
        
//        print_r($terms);
        
        
        
        if($post_type == 'project-part'){
            
            if($terms) {
                foreach($terms as $term ){
                    $term_array[] = $term->parent;
                }
            }
            
            
        }else{
            
            if($terms) {
                foreach($terms as $term ){
                    $term_array[] = $term->term_id;
                }
            }
        }
        
        
return $term_array;
}                
                            

              
              





// function to create an array of related profile terms
function get_related_printegration_terms($post_id, $post_type){
    //get all terms associated with this post. We expect to find 1 term 
    //associated with each post, except for the pr_intercomponent type. 
        $terms = get_the_terms($post_id, 'printegration-data-type');
        
        //print_r($terms);
        
        if($terms) {
            foreach($terms as $term ){
                
        // If the post type is pr_unit, take post's parent term instead
                if($post_type == 'pr_unit'){
                    $term_array[] = $term->parent; 
        //In the pr_intercomponent case, we expect to find multiple terms associated
        //with each post. Typically term set includes 2 standard set profile terms and 
        //one intercomponent term.We want to remove the intercomponent term, since
        //it will be redundant. We check for intercomponent term by comparing it's
        //parent term value. We know intercomponent is 87.
                }elseif($post_type == 'pr_intercomponent'){
                    if ($term->parent == 87) {
                        unset($term);
                    }   
                    $term_array[] = $term->term_id;
                }
                    $term_array[] = $term->term_id;
            }
               
        }
               
               
                 return $term_array;
              }
                    
 
?>