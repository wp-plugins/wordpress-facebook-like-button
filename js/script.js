//Copyright Kumberg Strauss (kumbergstrauss@yahoo.com).
//This program is free software; you can redistribute it and/or modify
//it under the terms of the GNU General Public License as published by
//the Free Software Foundation; either version 2 of the License, or
//(at your option) any later version.
//
//This program is distributed in the hope that it will be useful,
//but WITHOUT ANY WARRANTY; without even the implied warranty of
//MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
//GNU General Public License for more details.
//
//You should have received a copy of the GNU General Public License
//along with this program; if not, write to the Free Software
//Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
//Online: http://www.gnu.org/licenses/gpl.txt

var $fbla = jQuery.noConflict();
(function($jf) {
    $fbla.fn.likebutton = function(options) {
        // Set the options.
        options = $jf.extend({}, $.fn.likebutton.defaults, options);

        // Go through the matched elements and return the jQuery object.
        return this.each(function() {
        });
    };
    // Public defaults.
    $fbla.fn.likebutton.defaults = {
        property: 'value'
    };
    // Private functions.
    function func() {
        return;
    };


    $fbla.fn.likebutton.Preview = function() {

	    var FBLmyurl	   = document.getElementById('check_url').value;
        var FBLclass       = $fbla('#likebutton_settings_cssclass').val();
        var FBLlayout      = $fbla('#likebutton_param_layout :selected').val();
        var FBLfaces       = $fbla('#likebutton_param_show_faces').is(':checked') ? true : false;
        var FBLwidth       = $fbla('#likebutton_param_width').val();
        var FBLheight      = 80; //$fbla('#likebutton_param_height').val();
        var FBLverb        = $fbla('#likebutton_param_action :selected').val();
        var FBLfont        = $fbla('#likebutton_param_font :selected').val();
        var FBLcolor       = $fbla('#likebutton_param_colorscheme :selected').val();


        var FBLbutton =  '<div class="likebutton_button" style="height: 115px;overflow-y:auto;">';
        FBLbutton += '<iframe src="http://www.facebook.com/plugins/like.php?href='+ FBLmyurl;
        FBLbutton += '&amp;layout='+ FBLlayout +'&amp;show_faces='+ FBLfaces;
        FBLbutton += '&amp;width='+ FBLwidth +'&amp;action='+ FBLverb
        FBLbutton += '&amp;font='+ FBLfont +'&amp;colorscheme='+ FBLcolor +'" ';
        FBLbutton += ' scrolling="no" frameborder="0" allowTransparency="true" ';
        FBLbutton += ' class="' + FBLclass + '" ';
        FBLbutton += ' style="border:none; overflow:hidden; ';
        FBLbutton += ' width:' + FBLwidth +'px; height:'+ FBLheight +'px"></iframe></div>';

        $fbla('#likebutton_preview').html(FBLbutton);

        return false;
    };

})(jQuery);

/* ---------------- document read ------------------ */

$fbla(document).ready(function(){
        $fbla.fn.likebutton.Preview();

	$fbla('#likebuttonParameters select').change(function() {
        	$fbla.fn.likebutton.Preview();
	        return false;
	});



	$fbla('#likebuttonParameters input').blur(function() {
        	$fbla.fn.likebutton.Preview();
	        return false;
	});


});

function findselected(){
var colorscheme = document.getElementById('likebutton_param_colorscheme');
var bgpreview = document.getElementById('previewcell');
(colorscheme.value == "dark")? bgpreview.style.backgroundColor = '#222222' : bgpreview.style.backgroundColor = '#FFFFFF'
} 