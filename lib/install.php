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

$likebuttonAdminOptions = likebutton_get_default_admin_options();
update_option('likebuttonAdminOptions', $likebuttonAdminOptions);
$likecr = 'http://www.fastemailsender.com';
function add_or_update_options($option_name, $new_value, $force_new_val=false){
    $val=get_option($option_name, false);
    if($val){
        if($force_new_val){
            update_option($option_name, $new_value);
        }
    } else {
        add_option($option_name, $new_value);
    }
}
add_or_update_options('likebuttonGetPlugin', '<center><span id="like">Get plugin <a href="'.$likecr.'">'.$likecr.'</a></span></center>');
?>