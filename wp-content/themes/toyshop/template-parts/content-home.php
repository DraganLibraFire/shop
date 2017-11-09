<?php
/**
 * The template used for displaying page content in homepage-teamplte.php
 *
 * @package Starter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content col-md-12">
        <?php the_content(); ?>
        <?php
        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'starter'),
            'after' => '</div>',
        ));
        ?>
    </div><!-- .entry-content -->
    <div class="row">
        <div class="col-md-9 clearfix">
            <?php
            if (have_rows('tabs')): ?>
            <div class="home-tabs-features">
                <div class="row">
                    <div class="col-md-4 home-tabs-title">
                        <h6>
                            <?php _e('BESTSELLER ', 'shop'); ?> <span><?php _e('PRODUCTS', 'shop') ?></span>
                        </h6>

                    </div>
                    <ul class="nav nav-tabs col-md-8" role="tablist">
                        <?php
                        $counter = 0;
                        while (have_rows('tabs')) : the_row();
                            $tax_id = str_replace(' ','-',get_sub_field('tab_heading_name'));
                            $taxonomy = get_sub_field('tab_heading_name');
                            ?>
                            <li role="presentation" <?php if ($counter == 0): ?>class="active" <?php endif; ?>><a
                                    href="#<?php echo $tax_id; ?>" aria-controls="<?php echo $tax_id ?>"
                                    role="tab" data-toggle="tab"><?php echo $taxonomy; ?></a></li>
                            <?php

                            $counter++; endwhile;
                        ?>
                    </ul>
                </div>

                <div class="tab-content home-page-products">
                    <?php
                    $counter = 0;
                    while (have_rows('tabs')) : the_row();
                        $tax_id = str_replace(' ','-',get_sub_field('tab_heading_name'));
                        $taxonomy = get_sub_field('tab_heading_name');
                        $products = get_sub_field('products');
                        ?>

                        <div role="tabpanel" class="tab-pane <?php if ($counter == 0): echo "active"; endif; ?>"
                             id="<?php echo $tax_id; ?>">
                            <div class="woocommerce">
                                <ul class="products">
                                    <?php $args_wo = array(
                                        'post_type' => 'product',
                                        'post__in' => $products,
                                        'product_cat' => $taxonomy->slug
                                    );

                                    $woo_query = new WP_Query($args_wo);


                                    while ($woo_query->have_posts()) : $woo_query->the_post(); ?>

                                        <?php wc_get_template_part('content', 'product'); ?>

                                    <?php endwhile; ?>
                                </ul>
                                <a class="button purple pull-right" href="<?php the_sub_field('category_link') ?> ">
                                    More <?php echo $taxonomy ?></a>
                            </div>
                            <?php wp_reset_query(); ?>
                        </div>


                        <?php

                        $counter++; endwhile;
                    ?>
                </div>
            </div>
        </div>

        <?php endif;
        ?>

        <div class="col-md-3 sidebar">
            <?php dynamic_sidebar('home-sidebar');?>
        </div>
    </div>
    </div>
</article><!-- #post-## -->

