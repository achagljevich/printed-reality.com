<?php
/*
  Template Name: Standard Set Listing
 */

get_header();


$queried_object = get_queried_object();
//var_dump( $queried_object );

get_template_part('content', 'single-printegration-nav');

?>





            <section class="main-section">
                
                <div class="row">
                    <div class="small-12 columns">
                <!-- content goes here -->


                            <div class="row light-grey">
                                <div class="small-11 medium-11 small-centered columns">

                                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                    
                                        <?php $photo_gallery = get_field('photo_gallery'); ?>

                                    <div class="row">
                                        
                                        <div class="small-12 medium-7 columns">
                                            
                                            <div class="row">
                                                <div class="small-10  small-centered columns end">
                                                    <h2>
                                                        <?php the_field('printegration_header'); ?>
                                                    </h2>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="small-10 small-centered columns end">
                                                    <p>
                                                        <?php the_field('printegration_mission_statement'); ?>
                                                    </p>
                                                </div>
                                            </div>
                                                                                        
                                        </div>
                                        
                                        <div class="small-12 medium-5 columns">
                                    
                                            
                                            <div class="row">
                                                <div class="small-12 columns">
                                                    <?php
                                                        if( $photo_gallery ): 
                                                    ?>

                                                    <div class="printegration-page-mission-slider-for">

                                                        <?php foreach($photo_gallery as $image ): ?>

                                                        <div>
                                                            <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />

                                                        </div>

                                                        <?php endforeach; ?>
                                                    </div>

                                                    <?php endif; ?>
                                                
                                                </div>
                                            </div>
                                            
                                            <div class="row">

                                                <div class="small-11 small-centered columns">
                                                    <?php 
                                                        if( $photo_gallery ): 
                                                    ?>

                                                    <div class="printegration-page-mission-slider">

                                                        <?php foreach($photo_gallery as $image ): ?>

                                                        <div class="border-thin">
                                                            <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />

                                                        </div>

                                                        <?php endforeach; ?>
                                                    </div>

                                                    <?php endif; ?>
                                                </div>

                                            </div>
                                            
                                            
                                            
                                        </div>

                                    </div>



                                    <?php 
                                    endwhile;
                                    endif;
                                    wp_reset_postdata(); 
                                    ?>

                                </div>
                            </div>                

<?php
$args = array(
    'posts_per_page' => -1,
    'post_type' => 'pr_overview',
);

$query = new WP_Query($args);

?>
        <div class="row panel">
            <div class="small-12 columns small-centered">
                        
                
                        <div class="row">
                            <div class="small-12 small-centered medium-12 columns">

                                <div class="standard-set-slider-for">

                                    <!-- Loop listing of the standard sets.  -->
                                    <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                                            <div class="slide-div ">


                                                <div class="row">

                                                    <div class="small-12 medium-4 columns">
                                                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a>
                                                    </div>


                                                    <div class="small-12 medium-8 columns">

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
                                        endif;
                                        wp_reset_postdata();
                                    ?>
                                </div>

                            </div>
                        </div>

               
                
                
                
                
                
                
                
                
                
                
                        <div class="row printegration-page">
                            
                            
                            
                            
                            
                            <div class="small-12 small-centered medium-10 columns ">
                                
                                 
                                
                                <div class="row">
                                    <div class="small-12 columns">
                                        <div class="standard-set-slider hide-for-small-only">


                                            <!-- Loop listing of the standard sets.  -->
                                            <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                                                    <div class="slide-div panel">



                                                        <div class="row">
                                                            <div class="small-12 columns">
                                                                <h4 class="text-center"><?php the_title(); ?></h4>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="small-12 columns">
                                                                <?php the_post_thumbnail('thumbnail'); ?>
                                                            </div>


                                                        </div>


                                                    </div>

                                            <?php
                                                endwhile;
                                                endif;
                                                wp_reset_postdata();
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="small-12 columns nav-buttons">

                                    </div>
                                </div>

                            </div>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                        </div>




            </div>
        </div>
    </div>
</div>
                    </section>






                    <a class="exit-off-canvas"></a>

                </div>
            </div>



        </div>









        











<?php get_footer(); ?>