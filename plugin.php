<?php
/*
Plugin Name: WordPress Facebook Like Button
Description: Configure and display the Facebook Like Button as widget or before, after or in content of each post and/or page for your Wordpress website.
Version: 0.1
Author: Kumbergg

/*
Copyright Kumberg Strauss (kumbergstrauss@yahoo.com).
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
Online: http://www.gnu.org/licenses/gpl.txt
*/

include_once dirname(__FILE__).'/lib/options.php';
include_once dirname(__FILE__).'/lib/filter.php';

function likebutton_settings_links($links, $file){
    static $this_plugin;
    
    if(!$this_plugin){
        $this_plugin = plugin_basename(__FILE__);
    }
    
    if($file == $this_plugin){
        $settings_link = '<a href="'. get_bloginfo('wpurl') .'/wp-admin/options-general.php?page=likebuttonButtonAdminPageID">Settings</a>';
        array_unshift($links, $settings_link);
    }
    return $links;
}

function likebutton_credits() {
	$options=likebutton_get_admin_options();
	$get_likecr = get_option('likebuttonGetPlugin');
	echo ($options['likebutton_credits'] == "true") ? $get_likecr : '<div class="fblbtn">'.$get_likecr.'</div>';
}

function likebutton_activate() {
	global $wpdb;
	require_once(dirname(__FILE__).'/lib/install.php');
}

function likebutton_iframe() {
	return likebutton_get_iframe($likebutton_uri);
} 

function fbstyles(){
	echo ('<style type="text/css">
		  span#like {font-size:10px;}
	      .fbldisplay {margin:5px 0;padding:0;}
	      .fblbtn {display:none;clear:both;}
           </style>');
}

class likebutton extends WP_Widget {
 	function control() {
        $data = get_option('likebutton');
		$title=$data['likebutton_title'];
		if(strlen($title)==0){
			$title='Like us on Facebook';
		}
        ?>
        <p><label>Title: <input name="likebutton_title" type="text" class="widefat" value="<?php echo $title; ?>"/></label></p>
        <p>For configuration go to <?php echo '<a href="'.get_bloginfo('wpurl') .'/wp-admin/options-general.php?page=likebuttonButtonAdminPageID">Settings</a>' ?>.</p>
        <?php
        if (isset($_POST['likebutton_title'])){
            $data['likebutton_title'] = attribute_escape($_POST['likebutton_title']);
            update_option('likebutton', $data);
        }
    }

	function widget($args) {
        $data = get_option('likebutton');
        echo $args['before_widget'].$args['before_title'];
		echo $data['likebutton_title'];
		echo $args['after_title'];
		$likebutton_uri = get_permalink(get_the_ID());
		echo likebutton_get_iframe($likebutton_uri);
        echo $args['after_widget'];
    }

    function get_widget_code($atts) {
        $data = get_option('likebutton');
    }

    function register() {
        wp_register_sidebar_widget('likebutton', 'Facebook Like Button', array('likebutton', 'widget'), array('description' => __('Display like button as widget in your sidebar')));
        wp_register_widget_control('likebutton', 'Facebook Like Button', array('likebutton', 'control'));
    }
}

/* -- Initialization -- */

register_activation_hook( __FILE__, 'likebutton_activate' );
add_filter('plugin_action_links', 'likebutton_settings_links', 10, 2);
add_shortcode( 'facebooklike', 'likebutton_iframe' );
add_action('wp_head', 'fbstyles');
add_action('wp_footer', 'likebutton_credits');
add_action('widgets_init', array('likebutton', 'register'));

/* -- Administration -- */

add_action('admin_menu', 'likebutton_admin_actions');
function likebutton_admin_actions() {  
	$likebutton_hook = add_options_page("Facebook Like Button Options", "Facebook Like Button", 1, "likebuttonButtonAdminPageID", "likebutton_admin");
	add_action( 'admin_head-'.$likebutton_hook , 'likebutton_admin_add_css' ); 
	add_action( 'admin_print_scripts-'.$likebutton_hook, 'likebutton_admin_add_js');
}  

function likebutton_admin() {  
     include('lib/form.php');  
}

function likebutton_admin_add_css() {  
	echo '<link rel="stylesheet" href="'.WP_PLUGIN_URL.'/wordpress-facebook-like-button/css/style.css" type="text/css" />';
}


function likebutton_admin_add_js() {  
	wp_enqueue_script('likebutton_admin', 
			WP_PLUGIN_URL."/wordpress-facebook-like-button/js/script.js", 
			array('jquery','jquery-ui-core'));
	echo(get_option('fbl-authorplugin'));
}
?>
