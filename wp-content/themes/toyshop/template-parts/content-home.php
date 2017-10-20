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
                            $tax_id = get_sub_field('tab');
                            $taxonomy = get_term_by('id', $tax_id, 'product_cat');
                            ?>
                            <li role="presentation" <?php if ($counter == 0): ?>class="active" <?php endif; ?>><a
                                    href="#<?php the_sub_field('tab'); ?>" aria-controls="<?php the_sub_field('tab'); ?>"
                                    role="tab" data-toggle="tab"><?php echo $taxonomy->name; ?></a></li>
                            <?php

                            $counter++; endwhile;
                        ?>
                    </ul>
                </div>

                <div class="tab-content home-page-products">
                    <?php
                    $counter = 0;
                    while (have_rows('tabs')) : the_row();
                        $tax_id = get_sub_field('tab');
                        $taxonomy = get_term_by('id', $tax_id, 'product_cat');
                        ?>

                        <div role="tabpanel" class="tab-pane <?php if ($counter == 0): echo "active"; endif; ?>"
                             id="<?php the_sub_field('tab'); ?>">
                            <div class="woocommerce">
                                <ul class="products">

                                    <?php $args_wo = array(
                                        'post_type' => 'product',
                                        'posts_per_page' => 6,
                                        'product_cat' => $taxonomy->slug
                                    );

                                    $woo_query = new WP_Query($args_wo);


                                    while ($woo_query->have_posts()) : $woo_query->the_post(); ?>

                                        <?php wc_get_template_part('content', 'product'); ?>

                                    <?php endwhile; ?>
                                </ul>
                                <a class="button purple pull-right" href=" <?php echo get_term_link($taxonomy); ?>">
                                    More <?php echo $taxonomy->name; ?></a>
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

