<?php

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
		'likebutton_param_width' => '500',
		'likebutton_param_height' => '25',
		'likebutton_param_action' => 'like',
		'likebutton_param_font' => 'arial',
		'likebutton_param_colorscheme' => 'light',
        'likebutton_param_show_faces' => 'true');
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
