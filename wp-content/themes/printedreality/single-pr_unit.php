<?php

get_header();

$queried_object = get_queried_object();

//var_dump( $queried_object );

$associated_printegration_terms = \get_related_printegration_terms($queried_object->ID, $queried_object->post_type);

set_query_var( 'associated_printegration_terms', $associated_printegration_terms );

get_template_part('content', 'single-printegration-nav');

?>

            <section class="main-section">
                <div class="row">
                    <div class="small-11 small-centered columns end">
                <!-- content goes here -->


                        <div class="row">
                            <div class="small-12 columns">

                                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                        <?php the_content(); ?>
                                <?php endwhile;
                                endif;
                                wp_reset_postdata(); 
                                ?>

                            </div>
                        </div>
<?php

//define parameters for a new WP_Query.
//find all profiles associated with main loop post's term
$nested_pr_unit_args = array(
    'posts_per_page' => -1,
    'post_type' => 'pr_unit',
    'tax_query' => array(
        array(
            'taxonomy' => 'printegration-data-type',
            'field' => 'term id',
            'terms' => $associated_printegration_terms,
        ),
    ),
    'order' => 'ASC',
    'orderby' => 'menu_order',
    //make sure main loop post does not appear in this new loop
    'post__not_in' => array(
        0 => $queried_object->ID
    ),
);

//initiate new WP_Query
$nested_pr_unit_query = new WP_Query($nested_pr_unit_args);

if ($nested_pr_unit_query->have_posts()) : 
?>

                        <div class="row">
                            <div class="large-12 columns">

                                    <div class="row">
                                        <div class="large-12 columns">
                                            <h2>Compatible Parts</h2>
                                            <hr>
                                        </div>
                                    </div>            




                                    <div class="row">
                                        <div class="large-12 columns">
                                            <ul class="small-block-grid-1">


                                                <?php while ($nested_pr_unit_query->have_posts()) : $nested_pr_unit_query->the_post(); ?>
                                                        <li>
                                                            <div class="row">
                                                                <div class="small-8 columns">


                                                                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

                                                                    <?php the_excerpt(); ?>
                                                                </div>

                                                                <div class="large-4 columns">
                                                                    <?php the_post_thumbnail('small'); ?>
                                                                </div>

                                                            </div>
                                                        </li>

                                                        <?php
                                                    endwhile;
                                                    ?>

                                            </ul>
                                        </div>
                                    </div>

                            </div>                
                        </div>
<?php
endif; 
wp_reset_postdata();
?>
                    </div>
                </div>
            </section>



            <a class="exit-off-canvas"></a>

        </div>
    </div>



</div>


<?php
get_footer();
?>