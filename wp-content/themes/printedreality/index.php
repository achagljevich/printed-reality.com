<?php 

get_header();

get_template_part('content', 'featured-carousel' ); 


//define parameters for a new WP_Query.
//find all profiles associated with main loop post's term
$nested_index_args = array(
    'posts_per_page' => -1,
    'pagename' => 'homepage',
    
    'order' => 'ASC',
    'orderby' => 'menu_order',
    
   
);

//initiate new WP_Query
$nested_index_query = new WP_Query($nested_index_args);

if ($nested_index_query->have_posts()) : 

?>


                        <div class="row">
                            <div class="large-12 columns">

                                    <div class="row">
                                        <div class="large-12 columns">
                                            <ul class="small-block-grid-1">


                                                <?php while ($nested_index_query->have_posts()) : $nested_index_query->the_post(); 
                                                        
                                                                    


    // check if the repeater field has rows of data
    if( have_rows('homepage_section') ): ?>
<li>
                                                            <div class="row light-grey">
                                                                
            <?php                                                    
            // loop through the rows of data
        while ( have_rows('homepage_section') ) : the_row(); ?>
            <div class="row index_section">
                <div class="small-6 columns">
                 
                
                <img src=" <?php the_sub_field('section_photo'); ?>" />
                    
            </div>
                <div class="small-6 columns">

                    <div class="row">
                        <div class="small-12 columns">
                            <h1><?php 
                                // display a sub field value
                                the_sub_field('section_header');
                            ?></h1>
                        </div>
                    </div>

                    <div class="row">
                        <div class="small-12 columns">
                            <h1 class="subheader"><?php 
                                // display a sub field value
                                the_sub_field('section_subheader');
                            ?></h1>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="small-12 columns">
                            <a href="<?php the_sub_field('section_url'); ?>"><h1><?php the_sub_field('section_url_text'); ?></h1></a>
                        </div>
                    </div>
                    
                </div>
            </div>
    <?php        
        endwhile;

    else :

        // no rows found

    endif;

    ?>
                                                                    
                                                                

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






<?php get_footer(); ?>      


     
     
      
       

  