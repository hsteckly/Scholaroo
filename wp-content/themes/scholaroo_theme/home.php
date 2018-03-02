<?php

	/* Template Name: Home Page */

    // calling the header.php
    get_header();

    // action hook for placing content above #container
    thematic_abovecontainer();

?>
		<div id="container">
		
			<div id="content">

		
    	        <?php                



    	        the_post();
    	        
    	        // create the navigation above the content
				thematic_navigation_above();
		
    	        // calling the widget area 'single-top'
    	        get_sidebar('single-top');
		
    	        // action hook creating the single post
    	        thematic_singlepost();
				
    	        // calling the widget area 'single-insert'
    	        get_sidebar('single-insert');


                //Loop through ACF scholarship details
                ?> 
                

                <div class="scholarship-card">
                	<div class="scholarship-details">
                	<p class="focus">Feature Scholarships</p>
                	</div>

				<?php 
				$posts = get_posts(array(
					'posts_per_page'	=> 5,
					'offset'			=> 1,
					'post_type'			=> 'scholarships'
				));

				if( $posts ): ?>					
						
					<?php foreach( $posts as $post ): 
						
						setup_postdata( $post );

						//Get Post and Site ID to use in Favorites plugin
						$post_id = get_the_ID();
						$site_id = get_current_blog_id();
					
						?>
							<div class="scholarship-details"> <a href="<?php the_permalink(); ?>">
								
								<?php the_favorites_button($post_id, $site_id); ?>
								<?php
								//Post title
								$title = get_the_title();
								if($title){
									echo '<div><h2>' . $title . '</h2></div>';
								}	

								//Overview
			                    if(get_field('overview'))
			                        {
			                        echo '<div class="overview">' . get_field('overview') . '</div>';
			                    } 

			                    //Award amount
			                    if(get_field('award_amount'))
			                        {
			                        echo '<i class="fas fa-dollar-sign"></i><h3 class="scholarship-spec">Award Amount</h3><div class="scholarship-entry">&#36;' . get_field('award_amount') . '</div>';
			                    }  
			                    //Number of awards
			                    if(get_field('number_available'))
			                        {
			                        echo '<i class="fas fa-hashtag"></i><h3 class="scholarship-spec">Number Available</h2><div class="scholarship-entry">' . get_field('number_available') . '</div>';
			                    }   

		                	?></a>
		                	
		                	</div> 
	                
					
					<?php endforeach; ?>
					
					<?php wp_reset_postdata(); ?>

				<?php endif; ?>

				</div>

				<div class="button-outer">
                    <a href="<?php echo site_url(); ?>/scholarships"><button>View All Scholarhips</button></a>
                </div>

                <?php

		
    	        // create the navigation below the content
				thematic_navigation_below();
		
    	        // calling the comments template
    	        //thematic_comments_template();
		
    	        // calling the widget area 'single-bottom'
    	        get_sidebar('single-bottom');
    	        
    	        ?>
		
			</div><!-- #content -->
			
			<?php thematic_belowcontent(); ?> 
			
		</div><!-- #container -->
		
<?php 

    // action hook for placing content below #container
    thematic_belowcontainer();

    // calling the standard sidebar 
    thematic_sidebar();
    
    // calling footer.php
    get_footer();

?>