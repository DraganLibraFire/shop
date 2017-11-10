<aside class="home-category-wrapper">
<!--    <h4 class="widget-title">--><?php //_e('SALE','shop') ?><!--</h4>-->
    <?php
    if( have_rows('category_sidebar') ):
        while ( have_rows('category_sidebar') ) : the_row();
            $category = get_sub_field('category');
            $title = get_sub_field('category_title');
            ?>
            <div class="custom-title-category">
                <?php echo $title;  ?>
            </div>
            <ul class="home-sidebar-list-cayegory">
                <?php
                    foreach($category as $item){
                       ?>
                        <li>
                            <a href="<?php echo get_term_link($item->term_id) ?>"><?php echo str_replace('-',' ', $item->name) ?></a>
                        </li>
                        <?php
                    }
                ?>
            </ul>
            <?php
        endwhile;
    else :
    endif;
    ?>
</aside>