<?php

$fbOptions = likebutton_get_default_admin_options();
if(isset($_POST['likebutton_hidden'])) {
	if($_POST['likebutton_hidden'] == 'Y') {
		$fbOptions = likebutton_set_admin_options();
	}
}
extract(get_option('likebuttonAdminOptions'));

?>

<div class="likebuttonAdminFormContainer">  
<h2><?php echo ( 'Facebook Like Button Settings'); ?></h2>
<form name="likebutton_form" id="likebutton_form"  method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">  
	<input type="hidden" class="hidden" name="likebutton_hidden" id="likebutton_hidden" value="Y">  

	 <table border="0" width="90%">
	<tr>
    	<th><h3>Display configuration button</h3></th>
        <th><h3>Preview button</h3></th>
    </tr>
	<tr>
		<td>
	<ul id="likebuttonParameters" name="likebuttonParameters" class="likebuttonFormFields">
    <li class="first settings_show_before_post">
		<label class="description" for="likebutton_settings_show_before_post">
			<?php echo("Display Like Button before the page/post content"); ?></label>
		<input id="likebutton_settings_show_before_post" name="likebutton_settings_show_before_post" class="checkbox" type="checkbox" 
			value="<?php echo $likebutton_settings_show_before_post; ?>" 
			<?php echo ($likebutton_settings_show_before_post == 'true') ? 'checked="checked"' : '';  ?> />
	</li>

	<li class="setting_show_after_post">
		<label class="description" for="likebutton_settings_show_after_post">
			<?php echo("Display Like Button after the page/post content"); ?></label>
		<input id="likebutton_settings_show_after_post" name="likebutton_settings_show_after_post" class="checkbox" type="checkbox" 
			value="<?php echo $likebutton_settings_show_after_post; ?>" 
			<?php echo ($likebutton_settings_show_after_post == 'true') ? 'checked="checked"' : '';  ?> />
	</li>


	<li class="settings_show_on_single_post" style="display:none;">
		<label class="description" for="likebutton_settings_show_on_single_post">
			<?php echo("Display Like Button on individual posts"); ?></label>
		<input id="likebutton_settings_show_on_single_post" name="likebutton_settings_show_on_single_post" 
			class="checkbox" type="checkbox" 
			value="<?php echo $likebutton_settings_show_on_single_post; ?>" 
			<?php echo ($likebutton_settings_show_on_single_post == 'true') ? 'checked="checked"' : '';  ?> />
	</li>


	<li class="settings_show_on_single_page" style="display:none;">
		<label class="description" for="likebutton_settings_show_on_single_page">
			<?php echo("Display Like Button on individual pages"); ?></label>
		<input id="likebutton_settings_show_on_single_page" name="likebutton_settings_show_on_single_page" 
			class="checkbox" type="checkbox" 
			value="<?php echo $likebutton_settings_show_on_single_page; ?>" 
			<?php echo ($likebutton_settings_show_on_single_page == 'true') ? 'checked="checked"' : '';  ?> />
	</li>

	<li class="settings_show_on_front_page">
		<label class="description" for="likebutton_settings_show_on_front_page">
			<?php echo("Display Like Button on the Homepage"); ?></label>
		<input id="likebutton_settings_show_on_front_page" name="likebutton_settings_show_on_front_page" 
			class="checkbox" type="checkbox" 
			value="<?php echo $likebutton_settings_show_on_front_page; ?>" 
			<?php echo ($likebutton_settings_show_on_front_page == 'true') ? 'checked="checked"' : '';  ?> />
	</li>
	<li class="param_layout">
	 	<label class="description" for="likebutton_param_layout"><?php echo("Layout" ); ?></label>
		<select id="likebutton_param_layout" name="likebutton_param_layout" >
			<option value="standard" <?php echo ($likebutton_param_layout == 'standard') ? "selected='selected'" : ""; ?> ><?php echo("Standard" ); ?></option>
			<option value="button_count" <?php echo ($likebutton_param_layout == 'button_count') ? "selected='selected'" : ""; ?> ><?php echo("Button Count" ); ?></option>
            <option value="box_count" <?php echo ($likebutton_param_layout == 'box_count') ? "selected='selected'" : ""; ?> ><?php echo("Box Count" ); ?></option>
		</select>
        <img class="help" src="../wp-content/plugins/facebook-like-button-widget/img/info.png" title="Determines the size and amount of social context next to the button." alt="Determines the size and amount of social context next to the button." />
	</li>

	<li class="param_width">
			<label class="description" for="likebutton_param_width"><?php echo("Width"); ?></label>
			<input id="likebutton_param_width" name="likebutton_param_width" class="number" type="text" maxlength="7" value="<?php echo $likebutton_param_width; ?>"/> 
            <img class="help" src="../wp-content/plugins/facebook-like-button-widget/img/info.png" title="The width of the plugin, in pixels. The default is 300." alt="The width of the plugin, in pixels. The default is 300." />
	</li>

	<li class="param_height">
			<label class="description" for="likebutton_param_height"><?php echo("Height"); ?></label>
			<input id="likebutton_param_height" name="likebutton_param_height" class="number" type="text" maxlength="4" value="<?php echo $likebutton_param_height; ?>"/> 
             <img class="help" src="../wp-content/plugins/facebook-like-button-widget/img/info.png" title="The height of the plugin, in pixels. The default is 25." alt="The height of the plugin, in pixels. The default is 25." />
	</li>

	<li class="param_action">
		<label class="description" for="likebutton_param_action"><?php echo("Verb to Display"); ?></label>
		<select  id="likebutton_param_action" name="likebutton_param_action"> 
			<option value="like" <?php echo ($likebutton_param_action == 'like') ? "selected='selected'" : ""; ?>><?php echo("Like"); ?></option>
			<option value="recommend" <?php echo ($likebutton_param_action == 'recommend') ? "selected='selected'" : ""; ?>><?php echo("Recommend"); ?></option>
		</select>
         <img class="help" src="../wp-content/plugins/facebook-like-button-widget/img/info.png" title="The verb to display in the button. Currently only 'Like' and 'Recommend' are supported." alt="The verb to display in the button. Currently only 'Like' and 'Recommend' are supported." />
	</li>
	<li class="param_font">
		<label class="description" for="likebutton_param_font"><?php echo("Font"); ?></label>
		<select id="likebutton_param_font" name="likebutton_param_font"> 
			<option value="arial" <?php echo ($likebutton_param_font == 'arial') ? "selected='selected'" : ""; ?>	>Arial</option>
			<option value="lucida grande" <?php echo ($likebutton_param_font == 'lucida grande') ? "selected='selected'" : ""; ?>	>Lucida Grande</option>
			<option value="segoe ui" <?php echo ($likebutton_param_font == 'segoe ui') ? "selected='selected'" : ""; ?>>Segoe UI</option>
			<option value="tahoma" <?php echo ($likebutton_param_font == 'tahoma') ? "selected='selected'" : ""; ?>>Tahoma</option>
			<option value="trebuchet ms" <?php echo ($likebutton_param_font == 'trebuchet ms') ? "selected='selected'" : ""; ?>>Trebuchet MS</option>
			<option value="verdana" <?php echo ($likebutton_param_font == 'verdana') ? "selected='selected'" : ""; ?>	>Verdana</option>
		</select>
        <img class="help" src="../wp-content/plugins/facebook-like-button-widget/img/info.png" title="The font of the text button." alt="The font of the text button." />
	</li>
	
	<li class="param_colorscheme">
		<label class="description" for="likebutton_param_colorscheme"><?php echo("Color Scheme"); ?></label>
		<select id="likebutton_param_colorscheme" name="likebutton_param_colorscheme"> 
			<option value="light" <?php echo ($likebutton_param_colorscheme == 'light') ? "selected='selected'" : ""; ?>><?php echo("Light"); ?></option>
			<option value="dark" <?php echo ($likebutton_param_colorscheme == 'dark') ? "selected='selected'" : ""; ?>	><?php echo("Dark"); ?></option>
		</select>
         <img class="help" src="../wp-content/plugins/facebook-like-button-widget/img/info.png" title="The color scheme of the button." alt="The color scheme of the button." />
	</li>
	<li class="param_show_faces">
		<label class="description" for="likebutton_param_show_faces"><?php echo("Show Faces?"); ?></label>
		<input id="likebutton_param_show_faces" name="likebutton_param_show_faces" class="checkbox" type="checkbox" 
			value="<?php echo $likebutton_param_show_faces; ?>" 
			<?php echo ($likebutton_param_show_faces == 'true') ? ' checked="checked"' : '';  ?>/>
            <img class="help" src="../wp-content/plugins/facebook-like-button-widget/img/info.png" title="Show facebook profile pictures below the button." alt="Show facebook profile pictures below the button." />

	</li>
	<li class="setting_class" style="display:none;">
			<label class="description" for="likebutton_settings_cssclass"><?php echo("CSS Class"); ?></label>
			<input id="likebutton_settings_cssclass" name="likebutton_settings_cssclass" class="text" type="text" maxlength="50" value="<?php echo $likebutton_settings_cssclass ?>"/> 
			<span class="help" id="likebutton_settings_cssclass_help"><?php echo("CSS class encapsulating the button code. The default is likebuttonContainer."); ?></span>
	</li>
	</ul>
        </td>
		<td class="previewcell">
        	 <div class="fblInnerHtml"><input type="hidden" id="check_url" value="<?php echo 'http%3A%2F%2Fwww.facebook.com%2F%23!%2Fpages%2FFast-Email-Sender%2F157869230912585'; ?>" size="50" /></div>
			<div id="likebutton_preview" class="fblInnerHtml"></div>
        </td>
	</tr>
</table>
  <div class="submit"><input type="submit" name="Submit" value="<?php echo('Update Options'); ?>" /> </div>
</form>  
</div>  

