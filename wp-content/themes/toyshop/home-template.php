<?php
/**
 * Template Name: Home
 */

get_header(); ?>
<div class="row">

    <div id="primary" class="content-area ">
        <main id="main" class="site-main col-md-10 pull-right" role="main">

            <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'template-parts/home', 'slider' ); ?>
                <?php get_template_part( 'template-parts/content', 'home' ); ?>


            <?php endwhile; // End of the loop. ?>

        </main><!-- #main -->
        <?php get_sidebar(); ?>
    </div><!-- #primary -->
</div>
</div>
<?php while ( have_posts() ) : the_post(); ?>
<div class="home-over-ons-wrapper">
    <div class="container">
    <div class="col-md-3">
        <?php $the_ons_image = get_field('logo');?>
        <img src="<?php echo $the_ons_image['url']?>" alt="<?php $the_ons_image['alt']?>" title="<?php $the_ons_image['title']?>">
    </div>
        <div class="col-md-9">
            <?php the_field('over_ons_text');?>
        </div>
    </div>
</div>
<?php endwhile; // End of the loop. ?>

<div class="container">


<?php get_footer(); ?>
