<?php get_header(); ?>

        <div class="row">
            <div class="large-12 columns">
                <img src="http://placehold.it/1000x400&text=[img]">
                <hr>
            </div>
      </div>


      
      
      <!-- Third Band (Image Right with Text) -->
     <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <div class="row">
        <div class="large-8 columns">
            
            
            
                <h4><?php the_title(); ?></h4>
     
                <p><?php the_content(); ?></p>
            
            
            
                
        </div>
        <div class="large-4 columns">
          <img src="http://placehold.it/400x300&text=[img]">
        </div>
      </div>

    <?php endwhile; else : ?>
          
            <p><?php _e( 'Sorry, no pages found.' ); ?></p>
<?php endif; ?>
<?php get_footer(); ?>