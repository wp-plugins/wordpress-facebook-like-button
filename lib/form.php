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
        <img class="help" src="../wp-content/plugins/wordpress-facebook-like-button/img/info.png" title="Determines the size and amount of social context next to the button." alt="Determines the size and amount of social context next to the button." />
	</li>

	<li class="param_width">
			<label class="description" for="likebutton_param_width"><?php echo("Width"); ?></label>
			<input id="likebutton_param_width" name="likebutton_param_width" class="number" type="text" maxlength="7" value="<?php echo $likebutton_param_width; ?>"/> 
            <img class="help" src="../wp-content/plugins/wordpress-facebook-like-button/img/info.png" title="The width of the plugin, in pixels. The default is 300." alt="The width of the plugin, in pixels. The default is 300." />
	</li>

	<li class="param_height">
			<label class="description" for="likebutton_param_height"><?php echo("Height"); ?></label>
			<input id="likebutton_param_height" name="likebutton_param_height" class="number" type="text" maxlength="4" value="<?php echo $likebutton_param_height; ?>"/> 
             <img class="help" src="../wp-content/plugins/wordpress-facebook-like-button/img/info.png" title="The height of the plugin, in pixels. The default is 25." alt="The height of the plugin, in pixels. The default is 25." />
	</li>

	<li class="param_action">
		<label class="description" for="likebutton_param_action"><?php echo("Verb to Display"); ?></label>
		<select  id="likebutton_param_action" name="likebutton_param_action"> 
			<option value="like" <?php echo ($likebutton_param_action == 'like') ? "selected='selected'" : ""; ?>><?php echo("Like"); ?></option>
			<option value="recommend" <?php echo ($likebutton_param_action == 'recommend') ? "selected='selected'" : ""; ?>><?php echo("Recommend"); ?></option>
		</select>
         <img class="help" src="../wp-content/plugins/wordpress-facebook-like-button/img/info.png" title="The verb to display in the button. Currently only 'Like' and 'Recommend' are supported." alt="The verb to display in the button. Currently only 'Like' and 'Recommend' are supported." />
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
        <img class="help" src="../wp-content/plugins/wordpress-facebook-like-button/img/info.png" title="The font of the text button." alt="The font of the text button." />
	</li>
	
	<li class="param_colorscheme">
		<label class="description" for="likebutton_param_colorscheme"><?php echo("Color Scheme"); ?></label>
		<select id="likebutton_param_colorscheme" name="likebutton_param_colorscheme" onchange="findselected()"> 
			<option value="light" <?php echo ($likebutton_param_colorscheme == 'light') ? "selected='selected'" : ""; ?>><?php echo("Light"); ?></option>
			<option value="dark" <?php echo ($likebutton_param_colorscheme == 'dark') ? "selected='selected'" : ""; ?>	><?php echo("Dark"); ?></option>
		</select>
         <img class="help" src="../wp-content/plugins/wordpress-facebook-like-button/img/info.png" title="The color scheme of the button." alt="The color scheme of the button." />
	</li>
	<li class="optional_settings">
    	<table border="0">
        	<tr>
            	<td style="border:none;">
                <label class="description" for="likebutton_param_show_faces"><?php echo("Show Faces?"); ?></label>
                <input id="likebutton_param_show_faces" name="likebutton_param_show_faces" class="checkbox" type="checkbox" 
                    value="<?php echo $likebutton_param_show_faces; ?>" 
                    <?php echo ($likebutton_param_show_faces == 'true') ? ' checked="checked"' : '';  ?>/>
                    <img class="help" src="../wp-content/plugins/wordpress-facebook-like-button/img/info.png" title="Show facebook profile pictures below the button." alt="Show facebook profile pictures below the button." />
            	</td>
                <td style="border:none;">
                <label class="description" for="likebutton_credits"><?php echo("Show Credits?"); ?></label>
				<input id="likebutton_credits" name="likebutton_credits" class="checkbox" type="checkbox" 
			value="<?php echo $likebutton_credits; ?>" 
				<?php echo ($likebutton_credits == 'true') ? ' checked="checked"' : '';  ?>/>
            	<img class="help" src="../wp-content/plugins/wordpress-facebook-like-button/img/info.png" title="Support WordPress Facebook Like Button plugin by showing a small link in the footer of your blog." alt="" />
                </td>
            </tr>
		</table>
	</li>
	<li class="setting_class" style="display:none;">
			<label class="description" for="likebutton_settings_cssclass"><?php echo("CSS Class"); ?></label>
			<input id="likebutton_settings_cssclass" name="likebutton_settings_cssclass" class="text" type="text" maxlength="50" value="<?php echo $likebutton_settings_cssclass ?>"/> 
			<span class="help" id="likebutton_settings_cssclass_help"><?php echo("CSS class encapsulating the button code. The default is likebuttonContainer."); ?></span>
	</li>
	</ul>
        </td>
		<td id="previewcell" class="previewcell">
        	 <div class="fblInnerHtml"><input type="hidden" id="check_url" value="<?php echo 'http%3A%2F%2Fwww.facebook.com%2F%23!%2Fpages%2FFast-Email-Sender%2F157869230912585'; ?>" size="50" /></div>
			<div id="likebutton_preview" class="fblInnerHtml"></div>
        </td>
	</tr>
</table>
<small>Display WordPress Facebook Like Button as <a href="/wp-admin/widgets.php">widget</a>. Drag Facebook Like Button to your sidebar or favorite area.</small>
  <div class="submit"><input type="submit" name="Submit" value="<?php echo('Update Options'); ?>" /> </div>
</form>  
</div>  

