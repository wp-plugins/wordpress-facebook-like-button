<?php
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

/* Build iframe code:
 * http://developers.facebook.com/docs/reference/plugins/like
 */

add_filter('the_content', 'likebutton_the_content'); 
function likebutton_the_content($content) {
	extract(get_option('likebuttonAdminOptions'));
	$likebutton_uri = get_permalink(get_the_ID());

	if( 	(is_front_page() && $likebutton_settings_show_on_front_page == 'true') ||
		(is_single() && $likebutton_settings_show_on_single_post == 'true') ||
		(is_page() && $likebutton_settings_show_on_single_page == 'true') ) 
	{
		if($likebutton_settings_show_before_post == 'true') {
			$content = likebutton_get_iframe($likebutton_uri).$content;
		}
		if($likebutton_settings_show_after_post == 'true') {
			$content .= likebutton_get_iframe($likebutton_uri);
		}
	}
	return $content;
}

function likebutton_get_iframe($likebutton_uri) {
	extract(get_option('likebuttonAdminOptions'));

	$likebutton_ret = '<iframe src="http://www.facebook.com/plugins/like.php?href='.urlencode($likebutton_uri);
	$likebutton_ret .= '&amp;layout='.$likebutton_param_layout;
        $likebutton_ret .= '&amp;show_faces='.$likebutton_param_show_faces;
        $likebutton_ret .= '&amp;width='.$likebutton_param_width;
        $likebutton_ret .= '&amp;height='.$likebutton_param_height;
        $likebutton_ret .= '&amp;action='.$likebutton_param_action;
        $likebutton_ret .= '&amp;font='.$likebutton_param_font;
        $likebutton_ret .= '&amp;colorscheme='.$likebutton_param_colorscheme.'" ';	/* note, this is where the SRC arg ends */
	$likebutton_ret .= ' id="likebuttonIframe" name="likebuttonIframe" ';
        $likebutton_ret .= ' scrolling="no" frameborder="0" allowTransparency="true" ';
	if(!empty($likebutton_settings_cssclass)) {
	        $likebutton_ret .= ' class="'.$likebutton_settings_cssclass.'" ';
	}
	$likebutton_ret .= ' style="border:none; overflow:hidden; width:'.$likebutton_param_width.'px; height:'.$likebutton_param_height.'px; display:inline;" ';
        $likebutton_ret .= ' ></iframe>';
	return $likebutton_ret;
}
?>
