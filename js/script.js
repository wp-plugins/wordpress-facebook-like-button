/*
var Url = {
 
	// public method for url encoding
	encode : function (string) {
		return escape(this._utf8_encode(string));
	},
 
	// public method for url decoding
	decode : function (string) {
		return this._utf8_decode(unescape(string));
	},
 
	// private method for UTF-8 encoding
	_utf8_encode : function (string) {
		string = string.replace(/\r\n/g,"\n");
		var utftext = "";
 
		for (var n = 0; n < string.length; n++) {
 
			var c = string.charCodeAt(n);
 
			if (c < 128) {
				utftext += String.fromCharCode(c);
			}
			else if((c > 127) && (c < 2048)) {
				utftext += String.fromCharCode((c >> 6) | 192);
				utftext += String.fromCharCode((c & 63) | 128);
			}
			else {
				utftext += String.fromCharCode((c >> 12) | 224);
				utftext += String.fromCharCode(((c >> 6) & 63) | 128);
				utftext += String.fromCharCode((c & 63) | 128);
			}
 
		}
 
		return utftext;
	},
 
	// private method for UTF-8 decoding
	_utf8_decode : function (utftext) {
		var string = "";
		var i = 0;
		var c = c1 = c2 = 0;
 
		while ( i < utftext.length ) {
 
			c = utftext.charCodeAt(i);
 
			if (c < 128) {
				string += String.fromCharCode(c);
				i++;
			}
			else if((c > 191) && (c < 224)) {
				c2 = utftext.charCodeAt(i+1);
				string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
				i += 2;
			}
			else {
				c2 = utftext.charCodeAt(i+1);
				c3 = utftext.charCodeAt(i+2);
				string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
				i += 3;
			}
 
		}
 
		return string;
	}
 
}
*/

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
        var FBLheight      = $fbla('#likebutton_param_height').val();
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