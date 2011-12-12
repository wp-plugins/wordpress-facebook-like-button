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

	function likebutton_set_admin_options() {
		$likebuttonOptions = likebutton_get_default_admin_options();
		$likebuttonSave = (isset($_POST['likebutton_hidden'])) ? $_POST['likebutton_hidden'] : 'N';
		
		if($likebuttonSave && !empty($likebuttonOptions)) {
			foreach ($likebuttonOptions as $key => $option) {
				$likebuttonIsSet = 'false';
				if(isset($_POST[$key])) {
					$likebuttonIsSet = 'true';
					if($_POST[$key]) {
						$likebuttonOptions[$key] = $_POST[$key];

					}
				} 

				if(	$key == 'likebutton_settings_show_before_post' || 
					$key == 'likebutton_settings_show_after_post' ||
					$key == 'likebutton_settings_show_on_single_page' ||
					$key == 'likebutton_settings_show_on_front_page' ||
					$key == 'likebutton_settings_show_on_single_post' ||
					$key == 'likebutton_credits' ||
					$key == 'likebutton_param_show_faces' ) {
					$likebuttonOptions[$key] = $likebuttonIsSet;
				}
			}            
			update_option('likebuttonAdminOptions', $likebuttonOptions);
			?>
			<div class="updated"><p><strong><?php echo('Facebook Like Button Options Saved.' ); ?></strong></p></div>
			<?php
		}
		return $fbOptions;
	}

        function likebutton_get_default_admin_options() {
            $likebuttonAdminOptions = array('likebutton_settings_show_before_post' => 'true',
                'likebutton_settings_show_after_post' => 'true',
                'likebutton_settings_show_on_single_page' => 'true',
                'likebutton_settings_show_on_front_page' => 'true',
                'likebutton_settings_show_on_single_post' => 'true',
                'likebutton_settings_cssclass' => 'likebuttonContainer',
		'likebutton_param_layout' => 'standard',
		'likebutton_param_width' => '600',
		'likebutton_param_height' => '25',
		'likebutton_param_action' => 'like',
		'likebutton_param_font' => 'arial',
		'likebutton_param_colorscheme' => 'light',
        'likebutton_param_show_faces' => 'true',
		'likebutton_credits' => 'true');
            return $likebuttonAdminOptions;
        }
		
        function likebutton_get_admin_options() {
            $likebuttonAdminOptions = likebutton_get_default_admin_options();
            $likebuttonOptions = get_option('likebuttonAdminOptions');
            if (!empty($likebuttonOptions)) {
                foreach ($likebuttonOptions as $key => $option) {
                    $likebuttonAdminOptions[$key] = $option;
		}
            }            
            return $likebuttonAdminOptions;
        }
?>
