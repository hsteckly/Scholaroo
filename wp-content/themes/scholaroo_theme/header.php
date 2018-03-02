<?php

    // Creating the doctype
    thematic_create_doctype();
    echo " ";
    language_attributes();
    echo ">\n";
    
    // Creating the head profile
    thematic_head_profile();

    // Creating the doc title
    thematic_doctitle();
    
    // Creating the content type
    thematic_create_contenttype();
    
    // Creating the description
    thematic_show_description();
    
    // Creating the robots tags
    thematic_show_robots();
    
    // Creating the canonical URL
    thematic_canonical_url();
    
    // Loading the stylesheet
    thematic_create_stylesheet();

	if (THEMATIC_COMPATIBLE_FEEDLINKS) {    
    	// Creating the internal RSS links
    	thematic_show_rss();
    
    	// Creating the comments RSS links
    	thematic_show_commentsrss();
   	}
    
    // Creating the pingback adress
    thematic_show_pingback();
    
    // Enables comment threading
    thematic_show_commentreply();

    // Calling WordPress' header action hook
    wp_head();
    
?>

</head>

<?php 

thematic_body();

// action hook for placing content before opening #wrapper
thematic_before(); 

if (apply_filters('thematic_open_wrapper', true)) {
	echo '<div id="wrapper" class="hfeed">';
}
    
    // action hook for placing content above the theme header
    thematic_aboveheader(); 
    
    ?> 


    <div id="header">
    
        <?php 
        
        // action hook creating the theme header
        thematic_header();
        
        ?>

        <!-- Homepage header background-->
        <?php if (is_page_template('home.php')): ?>
            <div class="home-header">
                <div class="blocks">
                    <div class="header-pink">
                    </div>
                    <div class="header-white">
                    </div>
                    <h1>Scholaroo</h1>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="call-to-action">
                <div class="tab">
                    Scholarship of the Day
                </div>
                <div class="call-outer">
                    <div class="call-inner">

                        <?php 
                            $posts = get_posts(array(
                                'posts_per_page'    => 1,
                                'post_type'         => 'scholarships'
                            ));

                            if( $posts ): ?>                    
                                    
                                <?php foreach( $posts as $post ): 
                                    
                                    setup_postdata( $post );


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
                                        echo '<div class="call-detail">';
                                            //Award amount
                                            if(get_field('award_amount'))
                                                {
                                                echo '<h3 class="scholarship-spec">Award Amount:</h3><span>  &#36;' . get_field('award_amount') . '</span>';
                                            } 
                                        echo '</div><div class="call-detail">';
                                            //Number of awards
                                            if(get_field('number_available'))
                                                {
                                                echo '<h3 class="scholarship-spec">Number Available:</h3><span>  ' . get_field('number_available') . '</span>';
                                            }   
                                        echo '</div><div class="call-detail lrg">';
                                            //Judging criteria
                                            if(get_field('judging_criteria'))
                                                {
                                                echo '<h3 class="scholarship-spec">Judging Criteria:</h3><div>' . get_field('judging_criteria') . '</div>';
                                            }   
                                        echo '</div><div class="call-detail lrg">';
                                            //Application Process
                                            if(get_field('application_process'))
                                                {
                                                echo '<h3 class="scholarship-spec">Application Process:</h3><div>' . get_field('application_process') . '</div>';
                                            }      

                                        echo '</div>';

                                        echo do_shortcode( '[favorite_button post_id="" site_id=""] ');
                                        ?> 
                                        <div class="clearfix"></div>
                                        <div class="button-outer">
                                            <a href="<?php the_permalink(); ?>"><button>View Scholarhip</button></a>
                                        </div>
                                
                                
                                <?php endforeach; ?>
                                
                                <?php wp_reset_postdata(); ?>

                            <?php endif; ?>

                    </div>
                </div>
            </div>
        
        <?php endif; ?>
        <!-- End Homepage header -->  

	</div><!-- #header-->
    <?php
    
    // action hook for placing content below the theme header
    thematic_belowheader();
    
    ?>   
    <div id="main">
    