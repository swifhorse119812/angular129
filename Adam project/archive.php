<?php
/**
 * The template for displaying archive pages.
 *
 * Used for displaying archive-type pages. These views can be further customized by
 * creating a separate template for each one.
 *
 * - author.php (Author archive)
 * - category.php (Category archive)
 * - date.php (Date archive)
 * - tag.php (Tag archive)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
?>
<?php get_header(); ?>

<?php require_once('connections/tickets.php');?>

<?
$matchname = get_post_meta($post->ID, 'event_name', true);
$matchdate = get_post_meta($post->ID, 'event_date', true);

mysql_select_db($database_tickets, $tickets);

$query_LOWPRICE = sprintf("SELECT *
FROM wp_events e
INNER JOIN wp_merchants m 
ON e.merchant = m.merchantname
AND e.uploaddate = (SELECT MAX(uploaddate) FROM wp_events WHERE merchant = e.merchant AND eventname = e.eventname)
AND e.eventname ='".$matchname."'
AND e.date = '".$matchdate."'
ORDER BY price ASC");
$LOWPRICE = mysql_query($query_LOWPRICE, $tickets) or die(mysql_error());
$row_LOWPRICE = mysql_fetch_assoc($LOWPRICE);
$totalRows_LOWPRICE = mysql_num_rows($LOWPRICE);	



if (empty($totalRows_LOWPRICE)) {
$ticketsfrom = "Order Tickets";
} else { 
$ticketsfrom = "Tickets From £";
//$lowestprice = $row_LOWPRICE['price'];
}
?>
<? if ($lowestprice< 10.00) { $ticketsfrom = "Sold Out"; }?>






<? $teampagename = single_tag_title("", false); 
$query_teampage = sprintf("SELECT * FROM wp_venues WHERE teamname = '".$teampagename."'");
$teampage = mysql_query($query_teampage, $tickets) or die(mysql_error());
$row_teampage = mysql_fetch_assoc($teampage);
$totalRows_teampage = mysql_num_rows($teampage);
?>


<div id="page" class="home-page">
	<div id="content" class="eventarticle">
	    
	    
	  <?  if (!empty($row_teampage['teambadge'])) { ?>
         <div class="teampagebadge"> <img alt="<?php single_term_title(); ?> Fixtures and Tickets" width="100" height="100" src="<?  echo $teampagebadge = $row_teampage['teambadge']; ?>"/>
         </div>
	    <? }?>
	    
	    
          <h1 class="postsby"><span><?php single_term_title(); ?> Tickets</span></h1>
          
          
     <? if ((in_category('Football')))  { ?>     
    
 <div class="breadcrumb" xmlns:v="http://rdf.data-vocabulary.org/#"><span class="home"></span><span typeof="v:Breadcrumb" class="root"><a rel="v:url" property="v:title" href="https://www.test.safeticketcompare.com">Home</a></span><span><i class="schema-lite-icon icon-right-dir"></i></span><span typeof="v:Breadcrumb"><a href="https://www.test.safeticketcompare.com/football/" rel="v:url" property="v:title">Football</a></span><span><i class="schema-lite-icon icon-right-dir"></i></span><span><span class="bctitle"><?php single_term_title(); ?></span></span></div>    
        
        
        
        <? }?>
        
            
				 
				 
				 
	<?php require_once('connections/tickets.php');?>
<? mysql_select_db($database_tickets, $tickets);?>
 
 <?
				 
                
                
            // First declare total and count before the loop
$total = 0;
$count = 0;

foreach($posts as $post)
{		
 $matchname = get_post_meta($post->ID, 'eventname', true);
$matchdate = get_post_meta($post->ID, 'eventdate', true);
mysql_select_db($database_tickets, $tickets);
$query_PRICELOW = sprintf("SELECT *
FROM wp_events e
INNER JOIN wp_merchants m 
ON e.merchant = m.merchantname
AND e.uploaddate = (SELECT MAX(uploaddate) FROM wp_events WHERE merchant = e.merchant AND eventname = e.eventname)
AND e.eventname ='".$matchname."'
AND e.date = '".$matchdate."'
ORDER BY price ASC");
$PRICELOW = mysql_query($query_PRICELOW, $tickets) or die(mysql_error());
$row_PRICELOW = mysql_fetch_assoc($PRICELOW);
$totalRows_PRICELOW = mysql_num_rows($PRICELOW);	
$lowestprice = $row_PRICELOW['price'];			 

     if($lowestprice){ // If we have a value add it to the total and count it
        $total += $lowestprice;
        $count++;
     }
	 
	 
	 
	 
	 
}
                
                ?>
                
                
                       
        
        
  <? if ((!is_category('Premier League')) && (!is_category('World Cup')))  { ?>      
<?php  $category_description = category_description();			   
if (!empty($category_description)) {?> 
 <div class="zerolistings">
				  <?  echo '' . $category_description . ''; ?>
</div>  <? } ?>   
<? }?>

        
        
        <? if (is_category(7)) { //Football World Cup?>           
   <div class="event-groupings">
  <h4 class="event-groupings__conference-division-header">
            World Cup Teams (Russia 2018)       </h4>  
  <div class="event-groupings__conferences">
      <div class="event-groupings__conference">
       
                  <a class="event-groupings__team" href="/team/argentina/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/argentina.png);"></div>
            <div class="event-groupings__team__label">
              Argentina          </div>
          </a>
                  <a class="event-groupings__team" href="/team/australia/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/australia.png);"></div>
            <div class="event-groupings__team__label">
              Australia           </div>
          </a>
                  <a class="event-groupings__team" href="/team/belgium/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/belgium.png);"></div>
            <div class="event-groupings__team__label">
              Belgium        </div>
          </a>
                  <a class="event-groupings__team" href="/team/colombia/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/colombia.png);"></div>
            <div class="event-groupings__team__label">
              Colombia         </div>
          </a>
                  <a class="event-groupings__team" href="/team/costa-rica/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/costa-rica.png);"></div>
            <div class="event-groupings__team__label">
             Costa Rica        </div>
          </a>
        
                  <a class="event-groupings__team" href="/team/croatia/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/croatia.png);"></div>
            <div class="event-groupings__team__label">
              Croatia          </div>
          </a>
                  <a class="event-groupings__team" href="/team/denmark/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/denmark.png);"></div>
            <div class="event-groupings__team__label">
              Denmark         </div>
          </a>
                  <a class="event-groupings__team" href="/team/egypt/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/egypt.png);"></div>
            <div class="event-groupings__team__label">
              Egypt          </div>
          </a>
                  <a class="event-groupings__team" href="/team/england/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/england.png;"></div>
            <div class="event-groupings__team__label">
              England          </div>
          </a>
                  <a class="event-groupings__team" href="/team/france/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/france.png);"></div>
            <div class="event-groupings__team__label">
              France         </div>
          </a>
        
       <a class="event-groupings__team" href="/team/germany/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/germany.png);"></div>
            <div class="event-groupings__team__label">
              Germany           </div>
          </a>
                  <a class="event-groupings__team" href="/team/iceland/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/iceland.png);"></div>
            <div class="event-groupings__team__label">
             Iceland         </div>
          </a>
                  <a class="event-groupings__team" href="/team/iran/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/iran.png);"></div>
            <div class="event-groupings__team__label">
             Iran        </div>
          </a>
                  <a class="event-groupings__team" href="/team/japan/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/japan.png);"></div>
            <div class="event-groupings__team__label">
              Japan            </div>
          </a>
                  <a class="event-groupings__team" href="/team/mexico/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/mexico.png);"></div>
            <div class="event-groupings__team__label">
              Mexico           </div>
          </a>
        
               
          </div>
      <div class="event-groupings__conference">
         
         <a class="event-groupings__team" href="/team/morocco/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/morocco-flag.png);"></div>
            <div class="event-groupings__team__label">
              Morocco          </div>
          </a>
             
                  <a class="event-groupings__team" href="/team/nigeria/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/nigeria.png);"></div>
            <div class="event-groupings__team__label">
             Nigeria        </div>
          </a>
                  <a class="event-groupings__team" href="/team/panama/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/panama.png);"></div>
            <div class="event-groupings__team__label">
             Panama           </div>
          </a>
                  <a class="event-groupings__team" href="/team/peru/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/peru.png);"></div>
            <div class="event-groupings__team__label">
             Peru           </div>
          </a>
           
         <a class="event-groupings__team" href="/team/poland/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/poland.png);"></div>
            <div class="event-groupings__team__label">
              Poland           </div>
          </a>
                  <a class="event-groupings__team" href="/team/portugal/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/portugal.png);"></div>
            <div class="event-groupings__team__label">
             Portugal        </div>
          </a>
                  <a class="event-groupings__team" href="/team/russia/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/russia.png);"></div>
            <div class="event-groupings__team__label">
             Russia (Hosts)        </div>
          </a>
                  <a class="event-groupings__team" href="/team/saudi-arabia/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/saudia-arabia.png);"></div>
            <div class="event-groupings__team__label">
              Saudi Arabia          </div>
          </a>
                  <a class="event-groupings__team" href="/team/senegal/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/senegal.png);"></div>
            <div class="event-groupings__team__label">
              Senegal        </div>
          </a>
        
                  <a class="event-groupings__team" href="/team/south-korea/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/south-korea.png);"></div>
            <div class="event-groupings__team__label">
           South Korea         </div>
          </a>
             <a class="event-groupings__team" href="/team/spain/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/spain.png);"></div>
            <div class="event-groupings__team__label">
              Spain      </div>
          </a>
                  <a class="event-groupings__team" href="/team/sweden/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/sweden.png);"></div>
            <div class="event-groupings__team__label">
              Sweden       </div>
          </a>
        
                  <a class="event-groupings__team" href="/team/switzerland/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/switzerland.png);"></div>
            <div class="event-groupings__team__label">
              Switzerland          </div>
          </a>
          
             <a class="event-groupings__team" href="/team/tunisia/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/tunisia.png);"></div>
            <div class="event-groupings__team__label">
              Tunisia      </div>
          </a>
          
             <a class="event-groupings__team" href="/team/uruguay/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/uruguay.png);"></div>
            <div class="event-groupings__team__label">
              Uruguay        </div>
          </a>
                 
        
          </div>
  
  </div>

</div>
        
        
        
        <br/>
        
         <?   $category_description = category_description(); ?>
    <div class="zerolistings">
				  <?  echo '' . $category_description . ''; ?>
       </div>
        
        <? }?>
        
        
        
        
        
        
        
        
          <? if (is_category(258)) { //Six Nations?>           
   <div class="event-groupings">
  <h4 class="event-groupings__conference-division-header">
            Six Nations (2019)       </h4>  
  <div class="event-groupings__conferences">
      <div class="event-groupings__conference">
       
                  <a class="event-groupings__team" href="/team/england-rugby/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/england-flag.png);"></div>
            <div class="event-groupings__team__label">
              England          </div>
          </a>
                  <a class="event-groupings__team" href="/team/france-rugby/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/france-flag.png);"></div>
            <div class="event-groupings__team__label">
              France          </div>
          </a>
                  <a class="event-groupings__team" href="/team/ireland-rugby/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/ireland-flag.png);"></div>
            <div class="event-groupings__team__label">
              Ireland        </div>
          </a>
              
          </div>
      <div class="event-groupings__conference">
         
         <a class="event-groupings__team" href="/team/italy-rugby/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/italy-flag.jpg);"></div>
            <div class="event-groupings__team__label">
              Italy        </div>
          </a>
             
                  <a class="event-groupings__team" href="/team/scotland-rugby/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/scotland-flag.png);"></div>
            <div class="event-groupings__team__label">
             Scotland        </div>
          </a>
              
<a class="event-groupings__team" href="/team/wales-rugby/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/wales-flag.png);"></div>
            <div class="event-groupings__team__label">
             Wales        </div>
          </a>
                 
        
          </div>
  
  </div>

</div>
        
        <? }?>
        
        
        
        
        
        
        
          <? if (is_category(84)) { //Cricket World Cup?>           
   <div class="event-groupings">
  <h4 class="event-groupings__conference-division-header">
            Cricket World Cup 2019    </h4>  
  <div class="event-groupings__conferences">
      <div class="event-groupings__conference">
       
                  <a class="event-groupings__team" href="/team/afghanistan-cricket-team/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/afganistan-flag.png);"></div>
            <div class="event-groupings__team__label">
              Afghanistan         </div>
          </a>
                  <a class="event-groupings__team" href="/team/bangladesh-cricket-team/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/bangladesh-flag.png);"></div>
            <div class="event-groupings__team__label">
              Bangladesh         </div>
          </a>
                  <a class="event-groupings__team" href="/team/australia-cricket-team/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/australia-flag.png);"></div>
            <div class="event-groupings__team__label">
              Australia      </div>
          </a>
              
                  <a class="event-groupings__team" href="/team/england-cricket-team/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/england-flag.png);"></div>
            <div class="event-groupings__team__label">
              England        </div>
          </a>
                  <a class="event-groupings__team" href="/team/india-cricket-team/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/india-flag.png);"></div>
            <div class="event-groupings__team__label">
              India       </div>
          </a>
          
              
          </div>
      <div class="event-groupings__conference">
      
        <a class="event-groupings__team" href="/team/new-zealand-cricket-team/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/nz-flag.png);"></div>
            <div class="event-groupings__team__label">
              New Zealand    </div>
          </a>
         
         <a class="event-groupings__team" href="/team/pakistan-cricket-team/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/pakistan-flag.png);"></div>
            <div class="event-groupings__team__label">
              Pakistan      </div>
          </a>
          
            <a class="event-groupings__team" href="/team/south-africa-cricket-team/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/south-africa-flag.png);"></div>
            <div class="event-groupings__team__label">
              South Africa      </div>
          </a>
         
             
                  <a class="event-groupings__team" href="/team/sri-lanka-cricket-team/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/sri-lanka-flag.png);"></div>
            <div class="event-groupings__team__label">
             Sri Lanka      </div>
          </a>
              
<a class="event-groupings__team" href="/team/west-indies-cricket-team/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/windies.png);"></div>
            <div class="event-groupings__team__label">
             West Indies       </div>
          </a>
                 
        
          </div>
  
  </div>

</div>
        
        <? }?>
        
      
            
<? if (is_category('Premier League')) { ?>           
   <div class="event-groupings">
  <h4 class="event-groupings__conference-division-header">
            Premier League Teams (2018/2019)       </h4>  
  <div class="event-groupings__conferences">
      <div class="event-groupings__conference">
       
                  <a class="event-groupings__team" href="/team/arsenal/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/arsenal.png);"></div>
            <div class="event-groupings__team__label">
              Arsenal           </div>
          </a>
                  <a class="event-groupings__team" href="/team/bournemouth/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/bournemouth.png);"></div>
            <div class="event-groupings__team__label">
              AFC Bournemouth           </div>
          </a>
                  <a class="event-groupings__team" href="/team/brighton/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/brighton.png);"></div>
            <div class="event-groupings__team__label">
              Brighton & Hove Albion           </div>
          </a>
                  <a class="event-groupings__team" href="/team/burnley/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/burnley.png);"></div>
            <div class="event-groupings__team__label">
              Burnley           </div>
          </a>
                  <a class="event-groupings__team" href="/team/cardiff-city/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/cardiff-city.jpg);"></div>
            <div class="event-groupings__team__label">
             Cardiff City          </div>
          </a>
        
                  <a class="event-groupings__team" href="/team/chelsea/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/chelsea.png);"></div>
            <div class="event-groupings__team__label">
              Chelsea           </div>
          </a>
                  <a class="event-groupings__team" href="/team/crystal-palace/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/crystal-palace.png);"></div>
            <div class="event-groupings__team__label">
              Crystal Palace          </div>
          </a>
                  <a class="event-groupings__team" href="/team/everton/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/everton.png);"></div>
            <div class="event-groupings__team__label">
              Everton            </div>
          </a>
                  <a class="event-groupings__team" href="/team/huddersfield-town/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/huddersfield.png;"></div>
            <div class="event-groupings__team__label">
              Huddersfield Town           </div>
          </a>
                  <a class="event-groupings__team" href="/team/fulham/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/ffc.png;"></div>
            <div class="event-groupings__team__label">
              Fulham FC           </div>
          </a>
                 
        
      
          </div>
      <div class="event-groupings__conference">
		  
		  
		   <a class="event-groupings__team" href="/team/leicester-city/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/lcfc.png);"></div>
            <div class="event-groupings__team__label">
              Leicester City           </div>
          </a>
		  
		  
		  
              <a class="event-groupings__team" href="/team/liverpool/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/liverpool-fc.png);"></div>
            <div class="event-groupings__team__label">
              Liverpool           </div>
          </a>
                  <a class="event-groupings__team" href="/team/manchester-city/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/manchester-city.png);"></div>
            <div class="event-groupings__team__label">
             Manchester City          </div>
          </a>
                  <a class="event-groupings__team" href="/team/manchester-united/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/manchester-united.png);"></div>
            <div class="event-groupings__team__label">
             Manchester United           </div>
          </a>
                  <a class="event-groupings__team" href="/team/newcastle-united/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/newcastle.png);"></div>
            <div class="event-groupings__team__label">
              Newcastle United            </div>
          </a>
                  <a class="event-groupings__team" href="/team/southampton/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/southampton.png);"></div>
            <div class="event-groupings__team__label">
              Southampton Tickets</div>
          </a>
        
                  <a class="event-groupings__team" href="/team/tottenham-hotspur/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/tottenham-hotspur.png);"></div>
            <div class="event-groupings__team__label">
              Tottenham Hotspur           </div>
          </a>
                  <a class="event-groupings__team" href="/team/watford/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/watford.png);"></div>
            <div class="event-groupings__team__label">
             Watford Tickets</div>
          </a>
                  <a class="event-groupings__team" href="/team/west-ham-united/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/west-ham-united.png);"></div>
            <div class="event-groupings__team__label">
              West Ham United           </div>
          </a>
                  <a class="event-groupings__team" href="/team/wolverhampton-wanderers/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/wolverhampton-wanderers.png);"></div>
            <div class="event-groupings__team__label">
             Wolverhampton Wanderers           </div>
          </a>
           
        
      
                 
        
          </div>
  
  </div>

</div>
    
  <?   $category_description = category_description(); ?>
     <div class="category-descripton">
				  <?  echo '' . $category_description . ''; ?>
</div>
    
    
    
<br/>



  <? $today = date( 'Y-m-d' );?>
<?php global $wp_query;
$args = array_merge( $wp_query->query, array('posts_per_page' => '15',
'post_status'=>'publish',
'meta_query' => array(
        array(
            'key' => 'eventdate',
            'value' => $today,
            'compare' => '>=',
            'type' => 'DATE'
        )),
'meta_key' => 'eventdate',
'meta_key' => 'DemandHigh',
'meta_value' => 1,
'orderby' => 'meta_value',
'order' => 'ASC'));
$wp_query->query($args); ?>



    
    <? } else if (is_category('Football')) { ?>

    <div class="premierleague">
Safe Ticket Compare specialises in comparing football tickets to the biggest and most high profile football matches in the world. Find your match and discover the lowest prices for the game. Ticket prices are updated hourly and reflect the market value. 
    </div>

    <div class="section group">
   <h4 class="titles">Top Selling Teams</h4>
	<div class="col span_1_of_4">
	<a href="https://www.test.safeticketcompare.com/team/arsenal/"><img src="https://www.test.safeticketcompare.com/site-images/arsenal.png" alt="Arsenal FC badge"><div class="home_images_titlebox">Arsenal</div></a></div>
	<div class="col span_1_of_4"><img src="https://www.test.safeticketcompare.com/site-images/manchester-united.png" alt="Manchester United badge">
	<a href="https://www.test.safeticketcompare.com/team/manchester-united/"><div class="home_images_titlebox">Manchester United</div></a>
	</div>
	<div class="col span_1_of_4">
    <a href="https://www.test.safeticketcompare.com/team/liverpool/"><img src="https://www.test.safeticketcompare.com/site-images/liverpool-fc.png" alt="Liverpool FC Badge"><div class="home_images_titlebox">Liverpool</div></a>
	</div>
	<div class="col span_1_of_4">
	<a href="https://www.test.safeticketcompare.com/team/chelsea/"><img src="https://www.test.safeticketcompare.com/site-images/chelsea.png" alt="Chelsea Football Club Badge"><div class="home_images_titlebox">Chelsea FC</div></a>
	</div>
    </div>

    <div class="section group">
      <h4 class="titles">Football Leagues and Cup</h4>
	<div class="col span_1_of_4">
	<a href="https://www.test.safeticketcompare.com/football/premier-league/"><img src="https://www.test.safeticketcompare.com/site-images/premierleague.png" alt="EPL Premier League Logo"><div class="home_images_titlebox">Premier League</div></a></div>
	<div class="col span_1_of_4"><img src="https://www.test.safeticketcompare.com/site-images/uefa-championsleague.png" alt="UEFA Champions League Logo">
	<a href="https://www.test.safeticketcompare.com/football/uefa-champions-league/"><div class="home_images_titlebox">Champions League</div></a>
	</div>
	<div class="col span_1_of_4">
    <a href="https://www.test.safeticketcompare.com/football/fa-cup/"><img src="https://www.test.safeticketcompare.com/site-images/thefacup.png" alt="The FA Cup Logo"><div class="home_images_titlebox">FA Cup</div></a>
	</div>
	<div class="col span_1_of_4">
	<a href="https://www.test.safeticketcompare.com/football/world-cup/"><img src="https://www.test.safeticketcompare.com/site-images/worldcuprussia.png" alt="FIFA World Cup logo"><div class="home_images_titlebox">World Cup</div></a>
	</div>
    </div>
<br/>


<?


//$today = date( 'Y-m-d' );
//global $wp_query;
//$args = array_merge( $wp_query->query, array('posts_per_page' => '5',
//'post_status'=>'publish',
//'meta_query' => array(
//        array(
         // 'key' => 'eventdate',
        //    'value' => $today,
      //      'compare' => '>=',
    //        'type' => 'DATE'
  //      )),
//'meta_key' => 'eventdate',
//'orderby' => 'meta_value',
//'order' => 'ASC'));
//$wp_query->query($args); 
           
		}
	
	
	?>     
          
        

            
		<?php 
		 if (is_tag()) {    
$today = date( 'Y-m-d' );
global $wp_query;
$args = array_merge( $wp_query->query, array('posts_per_page' => '50',
'post_status'=>'publish',
'meta_query' => array(
        array(
            'key' => 'eventdate',
            'value' => $today,
            'compare' => '>=',
            'type' => 'DATE'
        )),
'meta_key' => 'eventdate',
'orderby' => 'meta_value',
'order' => 'ASC'));
$wp_query->query($args); 
		}
		
	
		?>
		
        
        
      <?  if (is_archive() && !is_category('Premier League')   ) {    
		
	
		$today = date( 'Y-m-d' );
global $wp_query;
$args = array_merge( $wp_query->query, array('posts_per_page' => '76',
'post_status'=>'publish',
'meta_query' => array(
        array(
            'key' => 'eventdate',
            'value' => $today,
            'compare' => '>=',
            'type' => 'DATE'
        )),
'meta_key' => 'eventdate',
'orderby' => 'meta_value',
'order' => 'ASC'));
$wp_query->query($args); 
            
		}
		?>  
        
        
        
 <?  $eventcount = $GLOBALS['wp_query']->found_posts; ?>  
 
     		               
<? if (($eventcount>2)  && ($eventcount<50))  { ?>
<div class="PricingDetails"><div class="AVTP"><span class="averageteamprice"><? echo $eventcount; ?> <br/><span class="averageteampricetext">Events Found</span></span>	</div>

           <? if  ($total>10)     { ?>
<div class="AVTP">
<span class="averageteamprice">


<? $averageteamprice = ($total / $count); ?>
 £<? echo number_format((float)$averageteamprice, 0, '.', ''); ?><br/></span><span class="averageteampricetext">Average Price Ticket</span>
 </div>
 
 <? }?>
 
 </div>
        <? }?>





<? 
if ($eventcount==0){ ?>
<div class="zeroelistings">
<strong>No Events Currently Listed for <?php single_term_title(); ?>. </strong>
<div id="h2subscribelist">Email Notification When <?php single_term_title(); ?> Tickets are released:</div>
<?php echo do_shortcode( '[contact-form-7 id="563" title="NoEventsSubscribe"]' ); ?>
</div>




   <div class="event-groupings">
  		<h4 class="event-groupings__conference-division-header">
           Browse By Category  </h4>  
  			<div class="event-groupings__conferences">
      			<div class="event-groupings__conference">
       
                  <a class="event-groupings__team" href="/football/premier-league/">
       	     <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/premierleague.png);"></div>
        		    <div class="event-groupings__team__label">
              Premier League          </div>
          	</a>
            	      <a class="event-groupings__team" href="/football/fa-cup/">
            	<div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/facup.png);"></div>
            <div class="event-groupings__team__label">
              FA Cup (2019)          </div>
          </a>
                  <a class="event-groupings__team" href="/football/efl-cup/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/eflcup.png);"></div>
            <div class="event-groupings__team__label">
              EFL Cup  (2018-2019)       </div>
          </a>
          </div>
      <div class="event-groupings__conference">
              <a class="event-groupings__team" href="/football/europa-league/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/europa.png);"></div>
            <div class="event-groupings__team__label">
              UEFA Europa League  </div>
          </a>
                  <a class="event-groupings__team" href="/football/uefa-champions-league/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/championsleague.png);"></div>
            <div class="event-groupings__team__label">
             UEFA Champions League         </div>
          </a>
                  <a class="event-groupings__team" href="/football/european-championships/">
            <div class="event-groupings__team__photo" style="background-image: url(https://www.test.safeticketcompare.com/site-images/euro2020.png);"></div>
            <div class="event-groupings__team__label">
             European Championships (2020)          </div>
          </a>
        
               
        
          </div>
  
  </div>

</div>

<? } ?>
            


<? if (is_category('Premier League')) { ?>

<h3 align="center">Top Selling Premier League Tickets</h3>


<? }?>






<div style="text-align: center;">
  <div class="tc-select-item" style="clear: both;">
    <select id="location" onchange="filterTeam('<?php echo $matchname; ?>');">
      <option value="all">Home & Away</option>
      <option value="hometeam">Home</option>
      <option value="awayteam">Away</option>
    </select>
  
    <select id="event_date" onchange="filterTeam('<?php echo $matchname; ?>');">
      <option value="all">Anytime</option>
      <option value="2018-Jan">January 2018</option>
      <option value="2018-Feb">February 2018</option>
      <option value="2018-Mar">March 2018</option>
      <option value="2018-Apr">April 2018</option>
      <option value="2018-May">May 2018</option>
      <option value="2018-Jan">June 2018</option>
      <option value="2018-Jul">July 2018</option>
      <option value="2018-Aug">August 2018</option>
      <option value="2018-Sep">September 2018</option>
      <option value="2018-Oct">October 2018</option>
      <option value="2018-Nov">November 2018</option>
      <option value="2018-Dec">December 2018</option>
      <option value="2019-Jan">January 2019</option>
    </select>

  </div>

</div>



		<?
		if ( have_posts() && (!is_category('Football'))) :
		
			while ( have_posts() ) : the_post();
				//schema_lite_archive_post();
				?>
        
	
			
<? //echo 'Average: '.($total / $count); // To get the average ?> 


    
<?php require_once('connections/tickets.php');?>
<? mysql_select_db($database_tickets, $tickets);?>
 
 
 <? $matchname = get_post_meta($post->ID, 'eventname', true);
$matchdate = get_post_meta($post->ID, 'eventdate', true);
mysql_select_db($database_tickets, $tickets);
$query_PRICELOW = sprintf("SELECT *
FROM wp_events e
INNER JOIN wp_merchants m 
ON e.merchant = m.merchantname
AND e.uploaddate = (SELECT MAX(uploaddate) FROM wp_events WHERE merchant = e.merchant AND eventname = e.eventname)
AND e.eventname ='".$matchname."'
AND e.date = '".$matchdate."'
ORDER BY price ASC");
$PRICELOW = mysql_query($query_PRICELOW, $tickets) or die(mysql_error());
$row_PRICELOW = mysql_fetch_assoc($PRICELOW);
$totalRows_PRICELOW = mysql_num_rows($PRICELOW);	
$lowestprice = $row_PRICELOW['price'];

$query_PRICEAVG = sprintf("SELECT SUM(price)
FROM wp_events e
INNER JOIN wp_merchants m 
ON e.merchant = m.merchantname
AND e.uploaddate = (SELECT MAX(uploaddate) FROM wp_events WHERE merchant = e.merchant AND eventname = e.eventname)
AND e.eventname ='".$matchname."'
AND e.date = '".$matchdate."'
ORDER BY price ASC");
$PRICEAVG = mysql_query($query_PRICELOW, $tickets) or die(mysql_error());
$row_PRICEAVG = mysql_fetch_assoc($PRICELOW);
$totalRows_PRICEAVG = mysql_num_rows($PRICELOW);	
$avgprice = $row_PRICEAVG['price'];



$query_HIGHPRICE = sprintf("SELECT *
FROM wp_events e
INNER JOIN wp_merchants m 
ON e.merchant = m.merchantname
AND e.uploaddate = (SELECT MAX(uploaddate) FROM wp_events WHERE merchant = e.merchant AND eventname = e.eventname)
AND e.eventname ='".$matchname."'
AND e.date = '".$matchdate."'
ORDER BY price DESC");
$HIGHPRICE = mysql_query($query_HIGHPRICE, $tickets) or die(mysql_error());
$row_HIGHPRICE = mysql_fetch_assoc($HIGHPRICE);
$totalRows_HIGHPRICE = mysql_num_rows($HIGHPRICE);	
$highestprice = $row_HIGHPRICE['price']; ?>


<?
$hometeam = get_post_meta($post->ID, 'hometeam', true);
$awayteam = get_post_meta($post->ID, 'awayteam', true);
$query_teambadgehome = sprintf("SELECT * FROM wp_venues WHERE teamname = '".$hometeam."'");
$teambadgehome = mysql_query($query_teambadgehome, $tickets) or die(mysql_error());
$row_teambadgehome = mysql_fetch_assoc($teambadgehome);
$totalRows_teambadgehome = mysql_num_rows($teambadgehome);
$query_teambadgeaway = sprintf("SELECT * FROM wp_venues WHERE teamname = '".$awayteam."'");
$teambadgeaway = mysql_query($query_teambadgeaway, $tickets) or die(mysql_error());
$row_teambadgeaway = mysql_fetch_assoc($teambadgeaway);
$totalRows_teambadgeaway = mysql_num_rows($teambadgeaway);
?>


 <? if (!empty($row_teambadgehome['teambadge'])) 
	{$teamhomebadge = $row_teambadgehome['teambadge'];	}
  else {$teamhomebadge = "https://www.test.safeticketcompare.com/site-images/badgeimage.png";	 }
  ?><? if (!empty($row_teambadgeaway['teambadge'])) 
	{$teamawaybadge = $row_teambadgeaway['teambadge'];	}
  else {$teamawaybadge = "https://www.test.safeticketcompare.com/site-images/badgeimage.png";	 }
  ?>  

                

                
                
                
                	<article class="post excerpt">
            
                
	
			<?php if ( empty($schema_lite_full_posts) ) : ?>
            
                     
	
            
			<? //	<div class="post-content"></div> ?>
                
                   <script type="application/ld+json">[{"@context": "https://schema.org/","@type": "SportsEvent","name":"<?php echo get_post_meta($post->ID, 'eventname', true); ?>","url" : "<?php the_permalink(); ?>/","startDate": "<?php echo get_post_meta($post->ID, 'eventdate', true); ?>T<?php echo get_post_meta($post->ID, 'time', true); ?>:00Z","location" : {"@type" : "Place","name" : "<?php echo get_post_meta($post->ID, 'venue', true); ?>","address": {	"@type" : "PostalAddress",	"addressLocality" : "<?php echo get_post_meta($post->ID, 'city', true); ?>",	"addressCountry" : "<?php echo get_post_meta($post->ID, 'country', true); ?>"}},"homeTeam": {"@type": "SportsTeam","name": "<?php echo get_post_meta($post->ID, 'hometeam', true); ?>","url": "<? echo $row_teambadgehome['teamlink']; ?>","image": "<? echo $teamhomebadge; ?>"},"awayTeam": {"@type": "SportsTeam","name": "<?php echo get_post_meta($post->ID, 'awayteam', true); ?>","url": "<? echo $row_teambadgeaway['teamlink']; ?>","image": "<? echo $teamawaybadge; ?>"} ,"offers": {"@type": "AggregateOffer","category": "Primary","lowPrice": "<?php echo $lowestprice;?>","priceCurrency": "GBP","url": "<?php the_permalink(); ?>","Availability": "https://schema.org/InStock"}}]</script>
                

               <div class="eventsection group">
  <div class="col eventspan_1_of_3">
   <?    $date = get_post_meta($post->ID, 'eventdate', true); date('F j, Y', strtotime($date));         ?>  
<div class="month"><? echo date('\<\s\p\a\n \c\l\a\s\s\=\"\c\a\t\d\a\y\v\e\n\u\e\"\>M\<\/\s\p\a\n\>', strtotime($date));?></div><div class="day"><? echo date('\<\s\p\a\n \c\l\a\s\s\=\"\c\a\t\d\a\y\"\> j\<\/\s\p\a\n\>', strtotime($date)); ?></div>
<div class="year"><? echo date('\<\s\p\a\n \c\l\a\s\s\=\"\c\a\t\d\a\y\y\"\>Y\<\/\s\p\a\n\>', strtotime($date)); ?></div>
</div>


 <div class="col moeventspan_1_of_3">
   <?    $date = get_post_meta($post->ID, 'eventdate', true); date('j , F , Y', strtotime($date));         ?>  
<div class="modate">
<? echo date('j ', strtotime($date));?>
<? echo date('F ', strtotime($date)); ?>
<? echo date('Y', strtotime($date)); ?></div>
</div>



<div class="col eventspan_2_of_3"> 


  
        
  
    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?> tickets">
<h2>

<div class="stcp">
    <img width="75" height="75" src="<? echo $teamhomebadge ?>">
    <span class="caption"><? echo get_post_meta($post->ID, 'hometeam', true);?></span>
</div>
<div class="stcp">
    <span class="vcaption">v</span>
</div>
<div class="stcp">
    
<img width="75" height="75" src="<? echo $teamawaybadge ?>"/>
<span class="caption">
        <? echo get_post_meta($post->ID, 'awayteam', true);?></span>
</div>

</h2>
</a>



<p class="eventdetailslisting">
<span class="competitionname"><?php echo get_post_meta($post->ID, 'competition', true); ?></span> |  <span class="eventdetailarchive">   <?php echo get_post_meta($post->ID, 'venue', true); ?>: <?php echo get_post_meta($post->ID, 'city', true); ?>, <?php echo get_post_meta($post->ID, 'country', true); ?></span><?php //the_category(', ') ?>
       </p></div>
       
       
       
<div class="col eventspan_3_of_3">
       <a href="<?php the_permalink() ?>">

       <div class="viewticketsbuttonrelated"> 
       
       
       <? if ($totalRows_PRICELOW > 0){ ?>
       
       Prices from £<? echo $lowestprice; ?><i class="fa fa-chevron-right" aria-hidden="true"></i>
       
       <? } else { ?>
       
       Check Prices <i class="fa fa-chevron-right" aria-hidden="true"></i>
       
       <? } ?>
       
       
       </div></a>
       
       
       
       
       
       
       </div></div> 
       
       
                
			<?php else : ?>
				<div class="post-content full-post">
					<?php //the_content(); ?> 
				</div>
				
			<?php endif; ?>
            
    
		</article>
     
			<?	
				
			endwhile;
			?>
            
            
            <div align="center">
           
			<? //schema_lite_post_navigation();?>
</div>

      
        
    	<?
		endif; ?>
        



<?      if ($eventcount==0){ ?><div class="category-descriptontwo">   
<h3>  <?php single_term_title(); ?> Tickets</h3>:
Safe Ticket Compare are specialists in bringing you guaranteed tickets for <?php single_term_title(); ?>. When searching to buy <?php single_term_title(); ?> tickets cheap use our comparison tool on every event page. 
<h3>Safe <?php single_term_title(); ?> Tickets</h3>
All tickets for <?php single_term_title(); ?> events are fully guaranteed and wil be delivered in time.
</div>
<? }?>



<?      if ($eventcount>2){ ?><div class="listingdescription">   
<span class="featuretextheading">  <?php single_term_title(); ?> Tickets</span>
<span class="featuretext">
test.safeticketcompare.com are specialists in bringing you guaranteed tickets for <?php single_term_title(); ?>. When searching to buy <?php single_term_title(); ?> tickets cheap use our comparison tool on every event page. </span>
<br/>

<span class="featuretextheading">Cheap <?php single_term_title(); ?> Tickets</span><br/>
<span class="featuretext">
Safe Ticket Compare is the best place for <?php single_term_title(); ?> seats, guaranteeing the cheapest <?php single_term_title(); ?> tickets around. We compare all the prices so that you get the best deal from all the safe websites. All tickets for <?php single_term_title(); ?> events are fully guaranteed and wil be delivered in time.</span>
<br/>

<span class="featuretextheading">The Best <?php single_term_title(); ?> Tickets</span><br/>
<span class="featuretext">
With so many ticket websites, test.safeticketcompare.com compares all the available <?php single_term_title(); ?> tickets from safe and secure websites. Use our comparison tool to see the best deals and seats online. </span>

<br/>


<span class="featuretextheading">test.safeticketcompare.com Guarantee</span><br/>
<span class="featuretext">test.safeticketcompare.com guarantee all <?php single_term_title(); ?> tickets sold through throught the website and come from trusted suppliers. Tickets will be delivered with plenty of time for the event and will be the tickets you ordered or better. If the <?php single_term_title(); ?> event is cancelled then a redund will be completed if it is not rescheduled. </span>


</div>
<? }?>


		</div>
       
		<?php
global $wp_query; // you can remove this line if everything works for you
 
// don't display the button if there are not enough posts
//if (  $wp_query->max_num_pages > 1 )
//	echo '<div class="misha_loadmore">More posts</div>'; // you can use <a> as well
?>  
	<?php //get_sidebar(); ?>
    
  
    
</div>





<?php get_footer(); ?>`ar