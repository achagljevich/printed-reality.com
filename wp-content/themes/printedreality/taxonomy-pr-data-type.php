<?php get_header(); ?>

        <div class="row">
            <div class="large-12 columns">
                <h3>good lord i am so stupid</h3>
                <hr>
            </div>
        </div>



<?php
    
    var_dump($wp_query);
        
       
    
    
        //$current_posts[] = get_current_post_terms($posts);
        
   

  

   //print_r($posts);
   
    if (have_posts()) { 
        
        while (have_posts() ) {
            
            the_post();
            
            
    ?>
                <div class="row">
                    <div class="large-8 columns">


                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

                        <?php the_excerpt(); ?>
                    </div>

                    <div class="large-4 columns">
                        <?php the_post_thumbnail('small'); ?>
                    </div>
                    <div class="large-12 columns"><hr class="hr_spacer"></div>
                </div>

<?php
        }
                
    }
       // Restore original Post Data
wp_reset_postdata();     
    
        
        

 
       
get_footer();
   
?>