<?php
/**
 * Search & Filter Pro
 *
 * Sample Results Template
 *
 * @package   Search_Filter
 * @author    Ross Morsali
 * @link      http://www.designsandcode.com/
 * @copyright 2014 Designs & Code
 *
 * Note: these templates are not full page templates, rather
 * just an encaspulation of the your results loop which should
 * be inserted in to other pages by using a shortcode - think
 * of it as a template part
 *
 * This template is an absolute base example showing you what
 * you can do, for more customisation see the WordPress docs
 * and using template tags -
 *
 * http://codex.wordpress.org/Template_Tags
 *
 */

if ( $query->have_posts() )
{

    ?>
    <div class="posts-found-wrapper count-post-on-filter">
        <p class="woocommerce-result-count">
            <?php
            $paged    = max( 1, $query->get( 'paged' ) );
            $per_page = $query->get( 'posts_per_page' );
            $total    = $query->found_posts;
            $first    = ( $per_page * $paged ) - $per_page + 1;
            $last     = min( $total, $query->get( 'posts_per_page' ) * $paged );

            if ( $total <= $per_page || -1 === $per_page ) {
                printf( _n( 'Enige resultaat', 'Alle %d resultaten', $total, 'woocommerce' ), $total );
            } else {
                printf( _nx( 'Enige resultaat', 'Resultaat %1$d&ndash;%2$d van de %3$d resultaten wordt getoond', $total, '%1$d = first, %2$d = last, %3$d = total', 'woocommerce' ), $first, $last, $total );
            }
            ?>
        </p>
    </div>
    <ul class="products filter-product-list-wrapper clearfix">
        <?php

        while ($query->have_posts())
        {
            $query->the_post();
            wc_get_template_part( 'content', 'product' );
        }
        ?>
    </ul>

    <div class="clearfix">
        <div class="nav-links woocommerce-pagination">
            <?php
            $big = 999999999; // need an unlikely integer

            echo paginate_links( array(
                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'current' => max( 1, $query->query['paged'] ),
                'total' => $query->max_num_pages,
                'prev_text'          => __('<i class="fa fa-angle-double-left" aria-hidden="true"></i>'),
                'next_text'          => __('<i class="fa fa-angle-double-right" aria-hidden="true"></i>')
            ) );
            ?>
        </div>
    </div>
    <?php
}
else
{
get_template_part( 'template-parts/content', 'none' );

//    echo "Geen resultaten gevonden.";
}
?>