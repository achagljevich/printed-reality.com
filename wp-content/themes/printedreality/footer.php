      <!-- Footer -->
     
      <footer class="row no-max pad">
        <div class="large-12 columns">
          <hr />
          <div class="row">
            <div class="large-6 columns">
                <p>© Copyright <?php echo date('Y');?></p>
            </div>
            <div class="large-6 columns">
              
            
                  
                  
                  <?php 
            
                $defaults = array(
                    'container' => false,
                    'theme_location' => 'footer-menu',
                    
                    'menu_class' => 'inline-list right',
                    'walker' => ''
                );
                
                wp_nav_menu( $defaults );
            
            ?>
                  
            <!--<li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
                <li><a href="#">Link 4</a></li>-->
                
                                
              
            </div>
          </div>
        </div>
      </footer>


      <?php wp_footer(); ?>

      

  </body>
</html>