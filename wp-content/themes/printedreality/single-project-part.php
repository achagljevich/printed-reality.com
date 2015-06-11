<?php

get_header();

$queried_object = get_queried_object();

//var_dump( $queried_object );

$associated_printegration_terms = \get_related_printegration_terms($queried_object->ID, $queried_object->post_type);

$associated_project_terms = \get_related_project_terms($queried_object->ID, $queried_object->post_type);



get_template_part('content', 'single-project-nav');

?>




<section class="main-section">
                <div class="row">
                    <div class="small-11 small-centered columns end">
                <!-- content goes here -->


                <div class="row">
                    <div class="small-12 columns">

                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                
                            <div class="row">
                                <div class="small-12 medium-6 columns">
                            
                                    <img src="<?php the_field('parts_photo'); ?>" />
                                    
                                </div>
                                
                                <div class="small-12 medium-6 columns">
                            
                                    <p><?php the_field(part_description); ?></p>
                                    
                                </div>
                                
                            </div>
                            
                            
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
$nested_project_part_args = array(
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

$nested_project_part_args_2 = array(
    'posts_per_page' => -1,
    'post_type' => 'project-part',
    'tax_query' => array(
        array(
            'taxonomy' => 'project-data-type',
            'field' => 'term id',
            'terms' => $associated_project_terms,
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
$nested_project_part_query = new WP_Query($nested_project_part_args);
if ($nested_project_part_query->have_posts()) : 
?>

        <div class="row">
            <div class="large-11 large-centered columns">

                    <div class="row">
                        <div class="large-12 columns">
                            <h2>Built With Printegration</h2>
                            <hr>
                        </div>
                    </div>            




                    <div class="row">
                        <div class="large-12 columns">
                            <div class="project-part-slider-1">


                                <?php while ($nested_project_part_query->have_posts()) : $nested_project_part_query->the_post(); ?>
                                        <div>
                                            <div class="row">
                                                <div class="small-8 columns">


                                                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

                                                    <?php the_excerpt(); ?>
                                                </div>

                                                <div class="large-4 columns">
                                                    <?php the_post_thumbnail('small'); ?>
                                                </div>

                                            </div>
                                        </div>

                                        <?php
                                    endwhile;
                                    ?>

                            </div>
                        </div>
                    </div>

            </div>                
        </div>
<?php
endif; 
wp_reset_postdata();

                
//initiate new WP_Query
$nested_project_part_query_2 = new WP_Query($nested_project_part_args_2);
if ($nested_project_part_query_2->have_posts()) : 
?>

        <div class="row">
            <div class="large-11 large-centered columns">

                    <div class="row">
                        <div class="large-12 columns">
                            <h2>Other Project Parts</h2>
                            <hr>
                        </div>
                    </div>            




                    <div class="row">
                        <div class="large-12 columns">
                            <div class="project-part-slider-2">


                                
                                
                                <?php while ($nested_project_part_query_2->have_posts()) : $nested_project_part_query_2->the_post(); ?>
                                    <div>
                                        <div class="row">
                                            <div class="small-12 columns">
                                                
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            
                                            <div class="small-12 medium-6 columns">
                                                <?php the_post_thumbnail('small'); ?>
                                            </div>
                                            
                                            <div class="small-12 medium-6 columns">
                                                
                                                    <div class="row">
                                                        <div class="small-12 columns">
                                                            <h4 class="text-center"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                        </div>
                                                    </div>
                                                
                                                    <div class="row">
                                                        <div class="small-12 columns">
                                                            <?php the_excerpt(); ?>
                                                        </div>
                                                    </div>
                                                
                                            </div>
                                            
                                        </div>
                                        
                                        
                                    </div>
                                <?php endwhile; ?>

                                
                                
                            </div>
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