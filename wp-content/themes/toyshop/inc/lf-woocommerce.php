<?php
/**
 * Product Categories Widget
 *
 * @author   Automattic
 * @category Widgets
 * @package  WooCommerce/Widgets
 * @version  2.3.0
 */

function wc_register_widgets_lf() {
    register_widget( 'WC_Widget_Product_Categories_LF' );
}
add_action( 'widgets_init', 'wc_register_widgets_lf' );

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * WC_Product_Cat_List_Walker class
 *
 * @extends 	Walker
 * @class 		WC_Product_Cat_Dropdown_Walker
 * @version		2.3.0
 * @package		WooCommerce/Classes/Walkers
 * @author 		WooThemes
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if ( ! class_exists( 'WC_Product_Cat_List_Walker_LF', false ) ) :

    class WC_Product_Cat_List_Walker_LF extends Walker {

        /**
         * What the class handles.
         *
         * @var string
         */
        public $tree_type = 'product_cat';

        /**
         * DB fields to use.
         *
         * @var array
         */
        public $db_fields = array(
            'parent' => 'parent',
            'id'     => 'term_id',
            'slug'   => 'slug',
        );

        /**
         * Starts the list before the elements are added.
         *
         * @see Walker::start_lvl()
         * @since 2.1.0
         *
         * @param string $output Passed by reference. Used to append additional content.
         * @param int $depth Depth of category. Used for tab indentation.
         * @param array $args Will only append content if style argument value is 'list'.
         */
        public function start_lvl( &$output, $depth = 0, $args = array() ) {
            if ( 'list' != $args['style'] ) {
                return;
            }

            $indent = str_repeat( "\t", $depth );
            $output .= "$indent<ul class='children'>\n";
        }

        /**
         * Ends the list of after the elements are added.
         *
         * @see Walker::end_lvl()
         * @since 2.1.0
         *
         * @param string $output Passed by reference. Used to append additional content.
         * @param int $depth Depth of category. Used for tab indentation.
         * @param array $args Will only append content if style argument value is 'list'.
         */
        public function end_lvl( &$output, $depth = 0, $args = array() ) {
            if ( 'list' != $args['style'] ) {
                return;
            }

            $indent = str_repeat( "\t", $depth );
            $output .= "$indent</ul>\n";
        }

        /**
         * Start the element output.
         *
         * @see Walker::start_el()
         * @since 2.1.0
         *
         * @param string $output Passed by reference. Used to append additional content.
         * @param object $cat
         * @param int $depth Depth of category in reference to parents.
         * @param array $args
         * @param integer $current_object_id
         */
        public function start_el( &$output, $cat, $depth = 0, $args = array(), $current_object_id = 0 ) {
            $output .= '<li class="'. $cat->name .' cat-item cat-item-' . $cat->term_id;

            if ( $args['current_category'] == $cat->term_id ) {
                $output .= ' current-cat';
            }

            if ( $args['has_children'] && $args['hierarchical'] && ( empty( $args['max_depth'] ) || $args['max_depth'] > $depth + 1 ) ) {
                $output .= ' cat-parent';
            }

            if ( $args['current_category_ancestors'] && $args['current_category'] && in_array( $cat->term_id, $args['current_category_ancestors'] ) ) {
                $output .= ' current-cat-parent';
            }

            $output .= '"><a href="' . get_term_link( (int) $cat->term_id, $this->tree_type ) . '">' . _x( ucfirst(str_replace("-", " ", $cat->name)), 'product category name', 'woocommerce' ) . '</a>';

//            if ( $args['show_count'] ) {
//                $output .= ' <span class="count">(' . $cat->count . ')</span>';
//            }
        }

        /**
         * Ends the element output, if needed.
         *
         * @see Walker::end_el()
         * @since 2.1.0
         *
         * @param string $output Passed by reference. Used to append additional content.
         * @param object $cat
         * @param int $depth Depth of category. Not used.
         * @param array $args Only uses 'list' for whether should append to output.
         */
        public function end_el( &$output, $cat, $depth = 0, $args = array() ) {
            $output .= "</li>\n";
        }

        /**
         * Traverse elements to create list from elements.
         *
         * Display one element if the element doesn't have any children otherwise,
         * display the element and its children. Will only traverse up to the max.
         * depth and no ignore elements under that depth. It is possible to set the.
         * max depth to include all depths, see walk() method.
         *
         * This method shouldn't be called directly, use the walk() method instead.
         *
         * @since 2.5.0
         *
         * @param object $element Data object
         * @param array $children_elements List of elements to continue traversing.
         * @param int $max_depth Max depth to traverse.
         * @param int $depth Depth of current element.
         * @param array $args
         * @param string $output Passed by reference. Used to append additional content.
         * @return null Null on failure with no changes to parameters.
         */
        public function display_element( $element, &$children_elements, $max_depth, $depth = 0, $args, &$output ) {
            if ( ! $element || ( 0 === $element->count && ! empty( $args[0]['hide_empty'] ) ) ) {
                return;
            }
            parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
        }
    }

endif;


/**
 * Product categories widget class.
 *
 * @extends WC_Widget
 */
class WC_Widget_Product_Categories_LF extends WC_Widget {

    /**
     * Category ancestors.
     *
     * @var array
     */
    public $cat_ancestors;

    /**
     * Current Category.
     *
     * @var bool
     */
    public $current_cat;

    /**
     * Constructor.
     */
    public function __construct() {
        $this->widget_cssclass    = 'woocommerce widget_product_categories';
        $this->widget_description = __( 'A list or dropdown of product categories.', 'woocommerce' );
        $this->widget_id          = 'woocommerce_product_categories_lf';
        $this->widget_name        = __( 'Product Categories LF', 'woocommerce' );
        $this->settings           = array(
            'title'  => array(
                'type'  => 'text',
                'std'   => __( 'Product categories ADADAS', 'woocommerce' ),
                'label' => __( 'Title', 'woocommerce' ),
            ),
            'orderby' => array(
                'type'  => 'select',
                'std'   => 'name',
                'label' => __( 'Order by', 'woocommerce' ),
                'options' => array(
                    'order' => __( 'Category order', 'woocommerce' ),
                    'name'  => __( 'Name', 'woocommerce' ),
                ),
            ),
            'dropdown' => array(
                'type'  => 'checkbox',
                'std'   => 0,
                'label' => __( 'Show as dropdown', 'woocommerce' ),
            ),
            'count' => array(
                'type'  => 'checkbox',
                'std'   => 0,
                'label' => __( 'Show product counts', 'woocommerce' ),
            ),
            'hierarchical' => array(
                'type'  => 'checkbox',
                'std'   => 1,
                'label' => __( 'Show hierarchy', 'woocommerce' ),
            ),
            'show_children_only' => array(
                'type'  => 'checkbox',
                'std'   => 0,
                'label' => __( 'Only show children of the current category', 'woocommerce' ),
            ),
            'hide_empty' => array(
                'type'  => 'checkbox',
                'std'   => 0,
                'label' => __( 'Hide empty categories', 'woocommerce' ),
            ),
            'max_depth'  => array(
                'type'  => 'text',
                'std'   => '',
                'label' => __( 'Maximum depth', 'woocommerce' ),
            ),
        );

        parent::__construct();
    }

    /**
     * Output widget.
     *
     * @see WP_Widget
     * @param array $args     Widget arguments.
     * @param array $instance Widget instance.
     */
    public function widget( $args, $instance ) {
        global $wp_query, $post;

        $count              = isset( $instance['count'] ) ? $instance['count'] : $this->settings['count']['std'];
        $hierarchical       = isset( $instance['hierarchical'] ) ? $instance['hierarchical'] : $this->settings['hierarchical']['std'];
        $show_children_only = isset( $instance['show_children_only'] ) ? $instance['show_children_only'] : $this->settings['show_children_only']['std'];
        $dropdown           = isset( $instance['dropdown'] ) ? $instance['dropdown'] : $this->settings['dropdown']['std'];
        $orderby            = isset( $instance['orderby'] ) ? $instance['orderby'] : $this->settings['orderby']['std'];
        $hide_empty         = isset( $instance['hide_empty'] ) ? $instance['hide_empty'] : $this->settings['hide_empty']['std'];
        $dropdown_args      = array(
            'hide_empty' => $hide_empty,
        );
        $list_args          = array(
            'show_count'   => $count,
            'hierarchical' => $hierarchical,
            'taxonomy'     => 'product_cat',
            'hide_empty'   => $hide_empty,
        );
        $max_depth          = absint( isset( $instance['max_depth'] ) ? $instance['max_depth'] : $this->settings['max_depth']['std'] );

        $list_args['menu_order'] = false;
        $dropdown_args['depth']  = $max_depth;
        $list_args['depth']      = $max_depth;

        if ( 'order' === $orderby ) {
            $list_args['menu_order'] = 'asc';
        } else {
            $list_args['orderby']    = 'title';
        }

        $this->current_cat   = false;
        $this->cat_ancestors = array();

        if ( is_tax( 'product_cat' ) ) {
            $this->current_cat   = $wp_query->queried_object;
            $this->cat_ancestors = get_ancestors( $this->current_cat->term_id, 'product_cat' );

        } elseif ( is_singular( 'product' ) ) {
            $product_category = wc_get_product_terms( $post->ID, 'product_cat', apply_filters( 'woocommerce_product_categories_widget_product_terms_args', array(
                'orderby' => 'parent',
            ) ) );

            if ( ! empty( $product_category ) ) {
                $this->current_cat   = end( $product_category );
                $this->cat_ancestors = get_ancestors( $this->current_cat->term_id, 'product_cat' );
            }
        }

        // Show Siblings and Children Only.
        if ( $show_children_only && $this->current_cat ) {
            if ( $hierarchical ) {
                $include = array_merge(
                    $this->cat_ancestors,
                    array( $this->current_cat->term_id ),
                    get_terms(
                        'product_cat',
                        array(
                            'fields'       => 'ids',
                            'parent'       => 0,
                            'hierarchical' => true,
                            'hide_empty'   => false,
                        )
                    ),
                    get_terms(
                        'product_cat',
                        array(
                            'fields'       => 'ids',
                            'parent'       => $this->current_cat->term_id,
                            'hierarchical' => true,
                            'hide_empty'   => false,
                        )
                    )
                );
                // Gather siblings of ancestors.
                if ( $this->cat_ancestors ) {
                    foreach ( $this->cat_ancestors as $ancestor ) {
                        $include = array_merge( $include, get_terms(
                            'product_cat',
                            array(
                                'fields'       => 'ids',
                                'parent'       => $ancestor,
                                'hierarchical' => false,
                                'hide_empty'   => false,
                            )
                        ) );
                    }
                }
            } else {
                // Direct children.
                $include = get_terms(
                    'product_cat',
                    array(
                        'fields'       => 'ids',
                        'parent'       => $this->current_cat->term_id,
                        'hierarchical' => true,
                        'hide_empty'   => false,
                    )
                );
            } // End if().

            $list_args['include']     = implode( ',', $include );
            $dropdown_args['include'] = $list_args['include'];

            if ( empty( $include ) ) {
                return;
            }
        } elseif ( $show_children_only ) {
            $dropdown_args['depth']        = 1;
            $dropdown_args['child_of']     = 0;
            $dropdown_args['hierarchical'] = 1;
            $list_args['depth']            = 1;
            $list_args['child_of']         = 0;
            $list_args['hierarchical']     = 1;
        } // End if().

        $this->widget_start( $args, $instance );

        if ( $dropdown ) {
            wc_product_dropdown_categories( apply_filters( 'woocommerce_product_categories_widget_dropdown_args', wp_parse_args( $dropdown_args, array(
                'show_count'         => $count,
                'hierarchical'       => $hierarchical,
                'show_uncategorized' => 0,
                'orderby'            => $orderby,
                'selected'           => $this->current_cat ? $this->current_cat->slug : '',
            ) ) ) );
            wc_enqueue_js( "
				jQuery( '.dropdown_product_cat' ).change( function() {
					if ( jQuery(this).val() != '' ) {
						var this_page = '';
						var home_url  = '" . esc_js( home_url( '/' ) ) . "';
						if ( home_url.indexOf( '?' ) > 0 ) {
							this_page = home_url + '&product_cat=' + jQuery(this).val();
						} else {
							this_page = home_url + '?product_cat=' + jQuery(this).val();
						}
						location.href = this_page;
					}
				});
			" );
        } else {

            $list_args['walker']                     = new WC_Product_Cat_List_Walker_LF;
            $list_args['title_li']                   = '';
            $list_args['pad_counts']                 = 1;
            $list_args['show_option_none']           = __( 'No product categories exist.', 'woocommerce' );
            $list_args['current_category']           = ( $this->current_cat ) ? $this->current_cat->term_id : '';
            $list_args['current_category_ancestors'] = $this->cat_ancestors;
            $list_args['max_depth']                  = $max_depth;

            echo '<ul class="product-categories">';

            wp_list_categories( apply_filters( 'woocommerce_product_categories_widget_args', $list_args ) );

            echo '</ul>';
        } // End if().

        $this->widget_end( $args );
    }
}
