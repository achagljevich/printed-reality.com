<?php
/*
  Template Name: Contact Page
 */


get_header(); 


if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="row">
            <div class="large-12 columns">
                <h2><?php the_title(); ?></h2>
            </div>
        </div>


        <div class="row">
            <div class="large-12 columns">





                <?php the_content(); ?>



            </div>
</div>
            
<!--<div class="row">
            <div class="large-12 columns"><hr class="hr_spacer"></div>
</div>-->
        

    <?php endwhile;
else : ?>
    <div class="row">
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    </div>    
<?php endif; ?>

<?php get_footer(); ?>