<?php
/*
Plugin Name: mygiveaway
Plugin URI: http://thinktag.co.uk/static/wordpress.html
Description: Your Giveaways, hosted easily and securely . Requires free signup to the thinktag.co.uk console, available only in US, UK and EU (for the moment)
Version: 1
Author: wp-thinktag
Author URI: http://www.thinktag.co.uk
License: GPL2
*/
 
function mygiveaway_css() {
    echo "
    <link rel='stylesheet' href='//thinktag.co.uk/css/giveaway.css'/>
    ";
}

function mygiveaway_shortcode( $atts ) { 
    
    extract( shortcode_atts( array( 'id' => '0' ), $atts ) );
    
    $output .= '<div class="ttGiveawayContainer">';
    $output .= '	<script type="text/javascript" src="//thinktag.co.uk/spring/giveaway/scr">';
    $output .= '	</script>';
    $output .= '	<img class="ttGiveawayImg" src="//thinktag.co.uk/spring/giveaway/'  . $id . '/dl/img" />';
    $output .= '	<img class="ttGiveawayImg" src="//thinktag.co.uk/spring/giveaway/'  . $id . '/te/img" />';	
    $output .= '	<div>';
    $output .= '            <form id="ttGiveawayForm" name="ttGiveawayForm"  onsubmit="return validateForm();" method="post" action="//thinktag.co.uk/spring/giveaway/addentry/'  . $id . '">';
    $output .= '            <fieldset>';
    $output .= '                <label for="name" class="ttGiveawayLabel">Your name</label>';
    $output .= '                <input type="text" name="name" id="name"  class="ttGiveawayInput"/>';
    $output .= '                <span id="nameError" style="display: none;">Please enter a name</span>'; 
    $output .= '            </fieldset>';
    $output .= '            <fieldset>';
    $output .= '                <label for="email" class="ttGiveawayLabel">Your email address</label>';
    $output .= '                <input type="text" name="email" id="email"  class="ttGiveawayInput"/>'; 
    $output .= '                <span id="emailError" style="display: none;">Please enter a valid email</span>';
    $output .= '            </fieldset>';
    $output .= '            <fieldset>';
    $output .= '                <label for="captcha" class="ttGiveawayLabel">Please add the 2 numbers (human/bot ?)</label>';
    $output .= '                    <script type="text/javascript" src="//thinktag.co.uk/spring/giveaway/cap">';
    $output .= '                    </script>';
    $output .= '                <input type="text" name="captcha" id="captcha"  class="ttGiveawayInput"/>';
    $output .= '                <span id="captchaError" style="display: none;">Please fill in the captcha</span>';
    $output .= '            </fieldset>';
    $output .= '            <fieldset>';
    $output .= '            	<input type="submit" value="Submit your entry" class="ttFlatButton"/>';
    $output .= '            </fieldset>';
    $output .= '            </form>';
    $output .= '	</div>';
    $output .= '  </div>';
   
    return $output;    
}
 
add_action('wp_head', 'mygiveaway_css');

add_shortcode( 'mygiveaway', 'mygiveaway_shortcode' );

?>