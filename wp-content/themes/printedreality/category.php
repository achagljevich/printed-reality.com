<?php get_header(); ?>

        <div class="row">
            <div class="large-12 columns">
                <h3>good going there bud. i am so stupid</h3>
                <hr>
            </div>
        </div>




     
     
      
       

      
      
      <!-- Third Band (Image Right with Text) -->
     <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="row">
            <div class="large-8 columns">
          
            
                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
     
            <?php the_content(); ?>
            </div>
        
            <div class="large-4 columns">
                <?php the_post_thumbnail( 'thumbnail' ); ?>
            </div>
            <div class="large-12 columns"><hr class="hr_spacer"></div>
        </div>
      
            <?php endwhile; else : ?>
                <div class="row">
                    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                </div>    
            <?php endif; ?>
      
     

<?php get_footer(); ?>