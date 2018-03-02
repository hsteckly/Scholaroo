<?php

    // calling the header.php
    get_header();

    // action hook for placing content above #container
    thematic_abovecontainer();

?>

		<div id="container">
			
			<?php thematic_abovecontent(); ?>
			
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


                //Loop through ACF scolarship details
                ?> <div class="scholarship-details"> <?php

                    //Overview
                    if(get_field('overview'))
                        {
                        echo '<div class="overview">' . get_field('overview') . '</div>';
                    }  

                    //Award amount
                    if(get_field('award_amount'))
                        {
                        echo '<i class="fas fa-dollar-sign"></i><h2 class="scholarship-spec">Award Amount</h2><div class="scholarship-entry">&#36;' . get_field('award_amount') . '</div>';
                    }  
                    //Number of awards
                    if(get_field('number_available'))
                        {
                        echo '<i class="fas fa-hashtag"></i><h2 class="scholarship-spec">Number Available</h2><div class="scholarship-entry">' . get_field('number_available') . '</div>';
                    }  

                    //Judging criteria
                    if(get_field('judging_criteria'))
                        {
                        echo '<i class="fas fa-gavel"></i><h2 class="scholarship-spec">Judging Criteria</h2><div class="scholarship-entry">' . get_field('judging_criteria') . '</div>';
                    }    

                    //Application Process
                    if(get_field('application_process'))
                        {
                        echo '<i class="fas fa-clipboard-check"></i><h2 class="scholarship-spec">Application Process</h2><div class="scholarship-entry">' . get_field('application_process') . '</div>';
                    }   


                ?> </div> <?php

		
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