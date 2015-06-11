<?php

                  
                    
$args = array(
                
                'tax_query' => array(
                    array(
                        'taxonomy' => 'pr_featured',
                        'field'    => 'slug',
			'terms'    => array( 'featured-post-1', 'featured-post-2','featured-post-3', ),
                    ),
                ),
                
            );


$query = new WP_Query($args);


?>











        <div class="row">
            <div class="small-12 medium-9 large-9 small-centered columns">

                <div class="row panel">
                    <div class="small-12 columns index-slider"> 
    
                    
                    
                    
                    
                    
                    <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                        
                        
                        
                        
                        <div class="row">


                            <div class="small-12 medium-6 small-centered medium-uncentered columns">

                                <?php the_post_thumbnail('large'); ?>

                            </div>

                            <div class="small-12 medium-6 small-centered medium-uncentered columns">
                                
                                <div class="row">
                                    <div class="small-12 columns">
                                        <h1><?php the_title(); ?></h1>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="small-12 columns">
                                        <p><?php the_excerpt() ?></p>
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
</div>
               
                            
                            
                            
                            
                            
                            
                 

<div class="row"><div class="large-12 columns"><hr class="hr_spacer"></div></div>