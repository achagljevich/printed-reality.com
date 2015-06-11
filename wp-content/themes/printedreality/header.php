<!doctype html>

<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title><?php wp_title(); ?></title>

    <?php wp_head(); ?>

  </head>
  

  <body <?php body_class();?>>
    <header class="row no-max pad main">
        
        
      <!-- Header and Nav -->
   
      <div class="row">
        <div class="small-12 small-centered medium-5 medium-uncentered columns">
            <h1 class="text-center"><a href="<?php bloginfo('url'); ?>"><img src="http://placehold.it/400x100&text=Logo"></a></h1>
        </div>
          
        <div class="small-12 medium-6 large-5 large-offset-2 columns">
            
            <?php 
            
                $defaults = array(
                    'container' => false,
                    'theme_location' => 'primary-menu',
                    
                    'menu_class' => 'button-group even-2',
                    'walker' => new pr_walker_nav_menu
                );
                
                wp_nav_menu( $defaults );
            
            ?>
<!--            
          <ul class="button-group right">
              <a href="item.html" class="button"><li>Link 1</li></a>
            
          </ul>
-->
        </div>
      </div>
    </header> 
      <!-- End Header and Nav -->