<div class="row">

    <div class="off-canvas-wrap" data-offcanvas>
        <div class="inner-wrap">

            <nav class="tab-bar">
                <section class="left-small">
                    <a class="left-off-canvas-toggle menu-icon" href="#"><span></span></a>
                </section>

                <section class="middle tab-bar-section">
                    <h1 class="title"><?php echo get_the_title($queried_object->ID); ?> </h1>
                </section>

            </nav>

            <?php
                
                $printegration_menu_params = array(
                    'theme_location' => 'printegration-menu',
                    'menu' => 'none',
                    'container' => 'false',
                    'container_class' => 'none',
                    'container_id' => 'none',
                    'menu_class' => 'off-canvas-list',
                    'menu_id' => 'none',
                    'echo' => true,
                    'fallback_cb' => 'wp_page_menu',
                    'before' => '',
                    'after' => '',
                    'link_before' => '',
                    'link_after' => '',
                    //'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'depth' => 0,
                    'walker' => ''
                );
                
                $projects_menu_params = array(
                    'theme_location' => 'projects-menu',
                    'menu' => 'none',
                    'container' => 'false',
                    'container_class' => 'none',
                    'container_id' => 'none',
                    'menu_class' => 'off-canvas-list',
                    'menu_id' => 'none',
                    'echo' => true,
                    'fallback_cb' => 'wp_page_menu',
                    'before' => '',
                    'after' => '',
                    'link_before' => '',
                    'link_after' => '',
                    //'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'depth' => 0,
                    'walker' => ''
                );
                
            ?>
            
            <aside class="left-off-canvas-menu">
                <!---------------- call wp_nav_menu function to genereate menu items -------------->
                
                
                <ul class="off-canvas-list">
                    <li><label>Printegration</label></li>
                    <?php wp_nav_menu($printegration_menu_params); ?>
                </ul>
                <ul class="off-canvas-list">
                    <li><label>Printed Reality Projects</label></li>
                    <?php wp_nav_menu($projects_menu_params); ?>
                </ul>
                

                <!--            <ul class="off-canvas-list">
                            
                                <li><label>Foundation</label></li>
                                <li><a href="#">The Psychohistorians</a></li>
                                <li><a href="#">...</a></li>
                                
                            </ul>-->

            </aside>



         