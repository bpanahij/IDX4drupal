<?php
/*
    This file is part of FoxyIDX.

    Foobar is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    FoxyIDX is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Foobar.  If not, see <http://www.gnu.org/licenses/>.

    Author: Brian P Johnson
    Contact: brian@pjohnson.info
*/


function foxyidx_preprocess_node(&$vars) {
	// Check if the image field exists
	if(isset($vars['field_image'])) {
		// create the variable that we will use to store our images
		$vars['addtl_images'] = '';
		// create a variable of the amount of images uploaded
		$length = count($vars['field_image']);

		// loop through the array of images
		for($i=2; $i<$length; $i++) {
			// variable containing the url to each image
			$path = file_create_url($vars['field_image'][$i]['uri']);
			// variable of each image
			$image = theme_image_formatter(
					array(
						'item' => $vars['field_image'][$i],
						'image_style' => 'product_thumb',
						'path' => array(
							'path' => $path,
							'options' => array(
								'html' => TRUE,
								'attributes' => array(
									'class' => 'prodthumb'
									)
								)
							)
					     ));
			// adding each image to the initial variable
			$vars['addtl_images'] .= $image;
		}
	}
}

function foxyidx_form_element($element, $value) {
	// This is also used in the installer, pre-database setup.
	$t = get_t();

	$output = '<div class="form-item"';
	if (!empty($element['#id'])) {
		$output .= ' id="'. $element['#id'] .'-wrapper"';
	}
	$output .= ">\n";
	$required = !empty($element['#required']) ? '<span class="form-required" title="'. $t('This field is required.') .'">*</span>' : '';

	if (!empty($element['#title'])) {
		$title = $element['#title'];
		if (!empty($element['#id'])) {
			$output .= ' <label for="'. $element['#id'] .'">'. $t('!required', array('!required' => $required)) ."</label>\n";
		}
		else {
			$output .= ' <label>'. $t('!required', array('!required' => $required)) ."</label>\n";
		}
	}

	$output .= " $value\n";

	if (!empty($element['#description'])) {
		$output .= ' <div class="description">'. $element['#description'] ."</div>\n";
	}

	$output .= "</div>\n";

	return $output;
}

?>
