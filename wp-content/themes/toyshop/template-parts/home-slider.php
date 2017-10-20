<div class="slider-home-wrapper">
    <div class="slick-slider-init">
        <?php

        // check if the repeater field has rows of data
        if( have_rows('slides') ):

            // loop through the rows of data
            while ( have_rows('slides') ) : the_row(); ?>

                <div class="single-slide">
                    <?php $slider_image = get_sub_field('slider_image'); ?>
<!--                    <img  src="--><?php //echo $slider_image['url'] ?><!--" alt="--><?php //echo $slider_image['alt']?><!--" title="--><?php //echo $slider_image['title']?><!--">-->
                    <div class="slider-content" style="background-image: url('<?php echo $slider_image['url'] ?>'); background-size: cover">
                        <div class="display-table-full">
                            <div class="display-table-cell-middle">
                                <div class="slider-text-wrapper">
                                    <?php the_sub_field('slider_text');?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endwhile;
        endif;

        ?>
    </div>
</div>
<div class="banner-wrapper">
    <div class="row">


    <?php

    // check if the repeater field has rows of data
    if( have_rows('banners') ):

        // loop through the rows of data
        $i = 1;
        while ( have_rows('banners') ) : the_row(); ?>

            <div class="col-md-6">
                <?php
                    $slider_image = get_sub_field('banner_image');
                    $banner_bg_color = get_sub_field('banner_background_color');
                    $banner_button_color = get_sub_field('banner_button_color');
                    $banner_side = get_sub_field('banner_side') ? 'pull-right' : 'pull-left';
                    $banner_image_side = get_sub_field('banner_side') ? 'pull-left' : 'pull-right';
                ?>

                <div class="clearfix slider-content slider-content-<?php echo $i; ?>" style=" background-color: <?php echo $banner_bg_color ?>;">
                    <style>
                        .slider-content-<?php echo $i; ?> a{
                            background-color: <?php echo $banner_button_color?>;
                            border: 1px solid <?php echo $banner_button_color?>;
                        }
                        .slider-content-<?php echo $i; ?> a:hover{
                            color: <?php echo $banner_button_color?>;
                        }
                    </style>
                    <div class="col-sm-4 banner-image <?php echo $banner_image_side?>">
                        <img src="<?php echo $slider_image['url'] ?>" alt="">
                    </div>
                    <div class="col-sm-8 banner-text <?php echo $banner_side?>">
                        <?php the_sub_field('banner_content');?>
                    </div>
                </div>
            </div>

        <?php
        $i++;
        endwhile;


    endif;

    ?>
    </div>
</div>