<?php

get_header();

$queried_object = get_queried_object();

//var_dump( $queried_object );

$associated_printegration_terms = \get_related_printegration_terms($queried_object->ID, $queried_object->post_type);

set_query_var( 'associated_printegration_terms', $associated_printegration_terms );

get_template_part('content', 'single-pr-main-loop');




//define parameters for a new WP_Query.
//find all profiles associated with main loop post's term
$nested_pr_intercomponent_args = array(
    'posts_per_page' => -1,
    'post_type' => 'pr_profile',
    'tax_query' => array(
        array(
            'taxonomy' => 'printegration-data-type',
            'field' => 'term id',
            'terms' => $associated_printegration_terms,
        ),
    ),
    //make sure main loop post does not appear in this new loop
    'post__not_in' => array(
        0 => $queried_object->ID
    ),
);

//initiate new WP_Query
$nested_pr_intercomponent_query = new WP_Query($nested_pr_intercomponent_args);
if ($nested_pr_intercomponent_query->have_posts()) : 
?>

        <div class="row">
            <div class="large-8 columns">

                    <div class="row">
                        <div class="large-12 columns">
                            <h2>Compatible Profiles</h2>
                            <hr>
                        </div>
                    </div>            




                    <div class="row">
                        <div class="large-12 columns">
                            <ul class="small-block-grid-1">


                                <?php while ($nested_pr_intercomponent_query->have_posts()) : $nested_pr_intercomponent_query->the_post(); ?>
                                        <li>
                                            <div class="row">
                                                <div class="small-12 medium-8 small-centered medium-uncentered columns">


                                                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

                                                    <?php the_excerpt(); ?>
                                                </div>

                                                <div class="small-12 medium-4 small-centered medium-uncentered columns">
                                                    <?php the_post_thumbnail('small'); ?>
                                                </div>

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