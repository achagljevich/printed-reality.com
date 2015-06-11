<?php

get_header();

$queried_object = get_queried_object();

//var_dump( $queried_object );

$associated_printegration_terms = \get_related_printegration_terms($queried_object->ID, $queried_object->post_type);

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
$nested_pr_profile_args_1 = array(
    'posts_per_page' => -1,
    'post_type' => 'pr_unit',
    'tax_query' => array(
        array(
            'taxonomy' => 'printegration-data-type',
            'field' => 'term id',
            'terms' => $associated_printegration_terms,
        ),
    ),
);

$nested_pr_profile_args_2 = array(
    'post_type' => 'pr_intercomponent',
    'tax_query' => array(
        array(
            'taxonomy' => 'printegration-data-type',
            'field' => 'term id',
            'terms' => $associated_printegration_terms,
        ),
    ),
);




$nested_pr_profile_query_1 = new WP_Query($nested_pr_profile_args_1);
    if ($nested_pr_profile_query_1->have_posts()) :
?>
        <div class="row">
            <div class="small-12 columns">

                    <div class="row">
                        <div class="small-12 columns">
                            
                            <hr>

                            <h2 class="text-center">Compatible Parts</h2>

                            <hr>

                        </div>
                    </div>


                    <div class="row">
                        <div class="small-12 columns">

                                <div class="profile-slider-1">



                                 <?php while ($nested_pr_profile_query_1->have_posts()) : $nested_pr_profile_query_1->the_post(); ?>

                                    <div>
                                        <div class="row">
                                            
                                            
                                            <div class="small-12 medium-6 columns">
                                                <?php the_post_thumbnail('small'); ?>
                                            </div>
                                        
                                            <div class="small-12 medium-6 columns">
                                                
                                                <div class="row">
                                                    <div class="small-12 columns">
                                                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
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


                                <?php
                                    endwhile;
                                ?>

                                    </div>

                                <hr>
                        </div>
                    </div>

            </div>                
        </div>
<?php
endif;
wp_reset_postdata();

                    
$nested_pr_profile_query_2 = new WP_Query($nested_pr_profile_args_2);
if ($nested_pr_profile_query_2->have_posts()) : 
?>

        <div class="row">
            <div class="small-12 columns">

                    <div class="row">
                        <div class="large-12 columns">
                            <h2>InterComponents</h2>
                            <hr>
                        </div>
                    </div>            




                    <div class="row">
                        <div class="large-12 columns">
<!--                            <ul class="small-block-grid-2 medium-block-grid-3">-->
                                <div class="profile-slider-2">


                                <?php while ($nested_pr_profile_query_2->have_posts()) : $nested_pr_profile_query_2->the_post(); ?>
<!--                                        <li>-->
<div>
                                            <div class="row">
                                                <div class="small-12 columns">


                                                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

                                                    
                                                </div>

                                                

                                            </div>
                                            
                                            <div class="row">
                                                <div class="small-6 columns">
                                                    <?php the_excerpt(); ?>
                                                </div>
                                                
                                                <div class="small-6 columns">
                                                    <?php the_post_thumbnail('small'); ?>
                                                </div>
                                                
                                            </div>
    </div>
<!--                                        </li>-->

                                        <?php
                                    endwhile;
                                    ?>
                                </div>
<!--                            </ul>-->
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