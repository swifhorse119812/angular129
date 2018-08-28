<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Schema Lite
 */

?>




     
<div id="subscribestcheader">
     </div>
<div id="subscribeticketyoda">
<div id="h2subscribe">Get Alerts & The Lowest Prices for <?php single_term_title(); ?> Tickets</div>
<?php echo do_shortcode( '[contact-form-7 id="1935" title="Subscribe"]' ); ?>
    </div>
   



	<footer id="site-footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
		<?php //if ( is_active_sidebar( 'footer-first' ) || is_active_sidebar( 'footer-second' ) || is_active_sidebar( 'footer-third' ) ) { ?>
        
       
                
                <?php
//wp_nav_menu( array( 
  //  'theme_location' => 'my-custom-menu', 
   // 'container_class' => 'custom-menu-class' ) ); 
?>
                
                
        
        
        
			<div class="container">
            
            <div class="sectionfooter group">
	<div class="col span_1_of_3footer"><h5>Connect</h5>
	                            <p><a class="footerl" rel="nofollow" itemprop="sameAs" href="https://twitter.com/TicketEngine" target="_blank">Twitter</a></p>
                                <p><a class="footerl" rel="nofollow" itemprop="sameAs" href="https://www.facebook.com/safeticketcompare" target="_blank">Facebook</a></p>
    
	</div>
	<div class="col span_1_of_3footer"><h5>League/Cups</h5>
                   <p> <a class="footerl" href="https://www.safeticketcompare.com/football/premier-league/" title="Arsenal tickets">Premier League</a></p>
                    <p><a class="footerl" href="https://www.safeticketcompare.com/football/efl-cup/" title="EFL Cup tickets">EFL Cup</a></p>
                     <p><a class="footerl" href="https://www.safeticketcompare.com/football/uefa-champions-league/" title="UEFA Champions League tickets">Champions League</a></p>
                   <p><a class="footerl" href="https://www.safeticketcompare.com/football/fa-cup/" title="FA Cup Tickets">FA Cup</a></p>
                        
	</div>
	<div class="col span_1_of_3footer">
     <h5>Team</h5>

                  <p><a class="footerl" href="https://www.safeticketcompare.com/team/arsenal/" title="Arsenal tickets">Arsenal FC</a></p>
                  <p><a class="footerl" href="https://www.safeticketcompare.com/team/chelsea/" title="Chelsea tickets">Chelsea F.C</a></p>
                  <p><a class="footerl" href="https://www.safeticketcompare.com/team/liverpool/" title="Liverpool tickets">Liverpool F.C</a></p>
                  <p><a class="footerl" href="https://www.safeticketcompare.com/team/manchester-united/" title="Manchester United">Manchester United</a></p>
                  <p><a class="footerl" href="https://www.safeticketcompare.com/venue/" title="All Venues/Stadiums">All Venues</a></p>
                            </div>
    
    
</div>

            
            <div class="sectionfooter group">
	<div class="col span_1_of_3footer">
	                <p><a class="footerl" href="https://www.safeticketcompare.com/about-us/">About Us</a></p>
	</div>
	<div class="col span_1_of_3footer">
                   <p> <a class="footerl" href="https://www.safeticketcompare.com/privacy-policy/">Privacy Policy</a></p>
                   
	</div>
	<div class="col span_1_of_3footer">
                    <a class="footerl" href="https://www.safeticketcompare.com/contact/">Contact Us</a></p>
             
                            </div>
    
    
</div>
            
            
            
            
            
            
            
			</div>
		<?php // }
		//schema_lite_copyrights_credit(); ?>
	</footer><!-- #site-footer -->
<?php wp_footer(); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
  function filterTeam(teams){
    var location = $("#location").val();
    var s = teams.split(" v ");
    teamname = s[0];

    $("article").each(function(i){
      $(this).show();
      if(location == "hometeam"){      
         var homeTeamName = $(this).find(".eventsection .eventspan_2_of_3 .stcp:eq(0) span.caption").html();
         if(homeTeamName.indexOf(teamname)>-1){
          filterDate($(this));
         } else {
          $(this).hide();
         }      
      } else if(location == "awayteam"){
          var homeTeamName = $(this).find(".eventsection .eventspan_2_of_3 .stcp:eq(2) span.caption").html();
             if(homeTeamName.indexOf(teamname)>-1){
              filterDate($(this));
             } else {
              $(this).hide();
             }
      } else {
        filterDate($(this));
      }
      
    });   

  }

  function filterDate(obj){
    var eventdate = $("#event_date").val();
    var eventdates = eventdate.split("-");
    var eventYear = eventdates[0];
    var eventMonth = eventdates[1];

    if(eventdate != 'all'){
        var m = obj.find(".eventsection .eventspan_1_of_3 .month span").html();
        var y = obj.find(".eventsection .eventspan_1_of_3 .year span").html();
        if(eventYear == y && eventMonth == m)
          obj.show();
        else
          obj.hide();
      }
  }

</script>
</body>
</html>