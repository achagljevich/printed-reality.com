<?php

get_header();

$queried_object = get_queried_object();
//var_dump( $queried_object );



$associated_project_terms = \get_related_project_terms($queried_object->ID, $queried_object->post_type);



get_template_part('content', 'single-project-nav');

?>
<section class="main-section">
                <div class="row">
                    <div class="small-11 small-centered columns end">
                <!-- content goes here -->


                <div class="row">
                    <div class="small-12 medium-6 columns">

                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                <img src="<?php the_field('overview_photo'); ?>"/>
                        <?php endwhile;
                        endif;
                        wp_reset_postdata(); 
                        ?>
                    
                    </div>
                    
                    <div class="small-12 medium-6 columns">
                        
                        <div class="row">
                            
                            <div class="small-12 columns">
                                
                                <p><?php the_field( 'overview_description' ); ?></p>
                            </div>
                        
                        </div>
                        
                        <div class="row">
                            
                            <div class="small-12 columns"></div>
                            
                        </div>
                        
                    </div>
                </div>
                
                
                
                
                
                
                
                
<?php
//define parameters for a new WP_Query.
//find all profiles associated with main loop post's term
$nested_pr_overview_args = array(
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
//    'post__not_in' => array(
//        0 => $queried_object->ID
//    ),
);

//initiate new WP_Query
$nested_pr_overview_query = new WP_Query($nested_pr_overview_args);
if ($nested_pr_overview_query->have_posts()) : 
?>

        <div class="row">
            <div class="large-12 columns">

                    <div class="row">
                        <div class="small-12 columns">
                            <h2>Project Parts</h2>
                            <hr>
                        </div>
                    </div>            




                    <div class="row">
                        <div class="small-12 columns">

                                <div class="overview-slider">


                                <?php while ($nested_pr_overview_query->have_posts()) : $nested_pr_overview_query->the_post(); ?>
                                   

                                        <div>
                                            
                                            
                                            <div class="row">
                                                <div class="small-6 columns">
                                                    <?php the_post_thumbnail('small'); ?>
                                                </div>
                                                <div class="small-6 columns">
                                                    
                                                    <div class="row">
                                                        <div class="small-12 columns">
                                                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="small-12 columns">
                                                            <p><?php the_excerpt(); ?></p>
                                                        </div>
                                                    </div>
                                                    
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