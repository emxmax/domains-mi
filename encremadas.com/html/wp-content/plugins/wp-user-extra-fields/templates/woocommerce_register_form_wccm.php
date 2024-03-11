<?php 
global $wpuef_option_model, $wpuef_wpml_helper, $wpuef_woocommerce_is_active;

 ?>
<div id="wpuef_required_fields_warning_message"><?php _e('Please fill all the required fields.', 'wp-user-extra-fields'); ?> </div>
<div id="wpuef-file-container" style="display:none"></div> <!--file upload -->
<table class="form-table">
<?php foreach($extra_fields->fields as $extra_field):
	$read_only = !current_user_can( 'manage_options' ) && isset($extra_field->editable_only_by_admin) && $extra_field->editable_only_by_admin ? true : false;
	if( (!isset($extra_field->invisible) || !$extra_field->invisible) /*&&  !$read_only  &&  ( !isset($extra_field->woocommerce_checkout_only_editable) || !$extra_field->woocommerce_checkout_only_editable) */):
	$required = isset($extra_field->required) && $extra_field->required ? true:false;
	$placeholder = !isset($extra_field->field_options->placeholder) ? "": str_replace('"', "", $extra_field->field_options->placeholder);
	$is_password_override = isset($extra_field->field_to_override) && $extra_field->field_to_override == 'password' ? true : false;
	if($is_password_override)
		continue;
?>
	<tr>
	<th><label class="wpuef_label <?php if($required) echo "wpuef_required";?> "><?php echo $extra_field->label; ?></label></th>
	<td>
	<?php 
		
		//Types
		if($extra_field->field_type == "dropdown"): ?>
		<select class="wpuef_input_select" name="wpuef_options[<?php echo $extra_field->cid; ?>]" <?php if($read_only) echo 'disabled="true"'; if($extra_field->required) echo 'required="required"';?>>
			<?php if($extra_field->field_options->include_blank_option): ?>
			   <option value="" ><?php echo $placeholder; ?> </option>
			<?php endif; 
				foreach($extra_field->field_options->options as $index => $extra_option): ?>
			  <option value="<?php echo $index; ?>" <?php if((isset($field_value) && $field_value != "" && $field_value == $index) || (!isset($field_value) && $extra_option->checked && !$extra_field->field_options->include_blank_option)) echo 'selected';?>><?php echo $extra_option->label; ?></option>
			<?php endforeach; ?>
		</select>
		
	<?php elseif($extra_field->field_type == "country_and_state"): 
			  global $wpuef_country_model;
			  $countries = array("" => __('Select one','wp-user-extra-fields'));
			  $country_list = $wpuef_country_model->get_countries(isset($extra_field->coutries_to_show) ? $extra_field->coutries_to_show : null);
			  foreach((array)$country_list as $country_code => $country_name)
						$countries[$country_code] = $country_name;
			  $show_state = !isset($extra_field->show_state) || $extra_field->show_state != 'no' ? true : false;
			  
			   //defaults
			  if(isset($extra_field->default_country))
				$field_value["country"] = isset($field_value["country"]) && $field_value["country"] != "" ? $field_value["country"] : strtoupper($extra_field->default_country);
			  if(isset($extra_field->default_state))
				$field_value["state"] = isset($field_value["state"]) && $field_value["state"] != "" ? $field_value["state"] : strtoupper($extra_field->default_state);
			
			  //js
			  if($show_state)
			  {
				  wp_enqueue_script('wpuef-country-state-manager', WPUEF_PLUGIN_PATH."/js/wpuef-country-state-manager.js", array('jquery'));
				  $js_vars = array(
						'ajax_url' => admin_url('admin-ajax.php'),
					);
					wp_localize_script( 'wpuef-country-state-manager', 'wpuef', $js_vars );
			  }
			  $custom_attributes = array('data-id'=>$extra_field->cid, 'data-required'=> $required ? 'true' : 'false');
			  if($required)
				   $custom_attributes['required'] = 'required';
			  woocommerce_form_field('wpuef_options['. $extra_field->cid.'][country]', array(
								'type'       => 'select',
								'class'      =>  $show_state ? array( 'form-row-first' ) :  array( 'form-row-wide' ),
								'input_class' => array('select2-choice', 'wpuef_country_selector'),
								//'label'      => __('Select a country','wp-user-extra-fields'),
								'label_class' => array( 'wcmca_form_label' ),
								'custom_attributes' =>  array('data-id'=>$extra_field->cid),
								//placeholder'    => __('Select a country','wp-user-extra-fields'),
								'required' => $required,
								'custom_attributes' =>  $custom_attributes,
								'options'    => $countries,
								'default' => isset($field_value["country"]) ? $field_value["country"] : ""
									)
								); 
	?>
	<div id="wpuef_country_field_container_<?php echo $extra_field->cid; ?>">
	<?php 
		if($show_state && isset($field_value["country"]) && $field_value["country"] != "")
		{
			$wpuef_country_model->render_state_select_html_by_country($field_value["country"], $extra_field->cid, isset($field_value["state"]) ? $field_value["state"] : null, $required, $read_only, count($country_list) == 1);
		}
		?>
	</div>
	<img class="wpuef_preloader_image"id="wpuef_preloader_image_<?php echo $extra_field->cid; ?>" src="<?php echo WPUEF_PLUGIN_PATH.'/img/loader.gif' ?>" ></img>
		
	<?php elseif($extra_field->field_type == "file"): ?>
	<span class="wpuef_file_uploader_container">
		<input class="wpuef_input_file input-text" type="file" value=""  
				id="wpuef_upload_field_<?php echo $extra_field->cid; ?>"
			   data-id="<?php echo $extra_field->cid; ?>"  
			   <?php if($required) echo 'required="required"';?> 
			   <?php if(isset($extra_field->file_types) && $extra_field->file_types) echo 'accept="'.$extra_field->file_types.'"';?> 
			   data-size="<?php if(isset($extra_field->file_size) && $extra_field->file_size) echo $extra_field->file_size*1048576; ?>" 
			   value="<?php if(isset($extra_field->file_size) && $extra_field->file_size) echo $extra_field->file_size*1048576; ?>">
			   </input>
			   <strong><?php if(isset($extra_field->file_size) && $extra_field->file_size) echo __('( Max size: ', 'wp-user-extra-fields').$extra_field->file_size." MB )"; ?></strong>
		<input type="hidden" id="wpuef-filename-<?php echo $extra_field->cid; ?>" name="wpuef_files[<?php echo $extra_field->cid; ?>][file_name]" value=""></input>
		<input type="hidden" id="wpuef-filenameprefix-<?php echo $extra_field->cid; ?>" name="wpuef_files[<?php echo $extra_field->cid; ?>][file_name_tmp_prefix]" value=""></input>
		<?php if(isset($extra_field->image_preview)): ?>
			<span id="wpuef-file-preview-<?php echo $extra_field->cid; ?>" class="wpuef_tmp_image_preview" data-width="<?php if(isset($extra_field->preview_width) && $extra_field->preview_width != "") echo $extra_field->preview_width; else echo 120;?>"></span>
		<?php endif; ?>
		<!-- Upload button -->
		<button class="button wpuef_file_upload_button"  
				id="wpuef_file_upload_button_<?php echo $extra_field->cid; ?>"
			   data-id="<?php echo $extra_field->cid; ?>"  
			   data-upload-field-id="#wpuef_upload_field_<?php echo $extra_field->cid; ?>"><?php _e('Upload', 'wp-user-extra-fields') ?></button>
		<button class="button wpuef_file_tmp_delete_button"  
				id="wpuef_file_tmp_delete_button_<?php echo $extra_field->cid; ?>"
			   data-id="<?php echo $extra_field->cid; ?>"  
			   data-file-to-delete=""><?php _e('Delete', 'wp-user-extra-fields') ?> </button>
		<!-- Upload progress managment -->
		<span id="wpuef_upload_progress_status_container_<?php echo $extra_field->cid; ?>" class="wpuef_upload_progress_status_container">
			<span class="wpuef_upload_progressbar" id="wpuef_upload_progressbar_<?php echo $extra_field->cid; ?>"></span >
			<span class="wpuef_upload_progressbar_percent" id="wpuef_upload_progressbar_percent_<?php echo $extra_field->cid; ?>">0%</span>
		</span>
	</span>			
	<?php elseif($extra_field->field_type == "checkboxes"): ?>
		<?php foreach($extra_field->field_options->options as $index => $extra_option): ?>
		<input type="hidden" value="<?php if($extra_option->checked) echo 'true'; else 'null';?>" id="<?php echo $extra_field->cid."-".$index; ?>" name="wpuef_options[<?php echo $extra_field->cid; ?>][<?php echo $index ?>]" />
		<input type="checkbox" data-id="<?php echo $extra_field->cid."-".$index;?>" value="<?php echo $index ?>" <?php if($extra_option->checked) echo 'checked';?>  <?php if($required) echo 'required="required" class="wpuef_checkbox wpuef_checkbox_perform_check wpuef_checkobox_group_'.$extra_field->cid.'" '; else echo 'class = "wpuef_checkbox"';?> <?php if($read_only) echo 'readonly="readonly"';?> ><span class="wpuef_checkbox_label"><?php echo $extra_option->label; ?></span></input><br/>
		<?php endforeach; ?>
		
		
	<?php elseif($extra_field->field_type == "radio"): ?>
		<?php foreach($extra_field->field_options->options as $index => $extra_option): ?>
			<input type="radio" name="wpuef_options[<?php echo $extra_field->cid; ?>]" value="<?php echo $index; ?>" <?php if($extra_option->checked) echo 'checked';?>  <?php if($required) echo 'required="required"';?> ><span class="wpuef_checkbox_label"><?php echo $extra_option->label; ?></span></input><br/>
		<?php endforeach; ?>

		
	<?php elseif($extra_field->field_type == "date"): ?>
		 <input class="wpuef_input_date" type="text" value="" placeholder="<?php echo $placeholder; ?>" name="wpuef_options[<?php echo $extra_field->cid; ?>]"  <?php if($required) echo 'required="required"';?> ></input>
	<?php elseif($extra_field->field_type == "time"): ?>
		 <input class="wpuef_input_time " type="text" value="" placeholder="<?php echo $placeholder; ?>" name="wpuef_options[<?php echo $extra_field->cid; ?>]"  <?php if($required) echo 'required="required"';?> ></input>
	
				
	<?php elseif($extra_field->field_type == "website"): ?>
		<input class="wpuef_input_url input-text" type="url" value="" placeholder="<?php echo $placeholder; ?>" name="wpuef_options[<?php echo $extra_field->cid; ?>]"  <?php if($required) echo 'required="required"';?>  ></input>

	<?php elseif($extra_field->field_type == "paragraph" || $extra_field->field_type == "html" ): ?>
		<textarea  class="wpuef_input_textarea" name="wpuef_options[<?php echo $extra_field->cid; ?>]"  placeholder="<?php echo $placeholder; ?>" <?php if($required) echo 'required="required"';?> ></textarea>
	
	<?php elseif($extra_field->field_type == "number"): ?>
		<input class="wpuef_input_number input-text" type="<?php echo $extra_field->field_type; ?>" placeholder="<?php echo $placeholder; ?>" value="" name="wpuef_options[<?php echo $extra_field->cid; ?>]" <?php if(isset($extra_field->field_options->min)) echo 'min="'.$extra_field->field_options->min.'"'?>  <?php if(isset($extra_field->field_options->max)) echo 'max="'.$extra_field->field_options->max.'"'?>  <?php if($required) echo 'required="required"';?> />
	<?php elseif($extra_field->field_type != "title_no_input"): ?>
		<input class="wpuef_input_text input-text" type="<?php echo $extra_field->field_type; ?>" placeholder="<?php echo $placeholder; ?>" value="" name="wpuef_options[<?php echo $extra_field->cid; ?>]"  <?php if($required) echo 'required="required"';?> />
	<?php endif; 
	//End types
	?>
	
	<?php //Description
		if( isset($extra_field->field_options->description)): ?>
		<span class="description">
			<p class="wpuef_description"><?php echo $extra_field->field_options->description; ?></p>
		</span>
		<?php endif; ?>
</td>
</tr>			
<?php endif; endforeach; ?>
</table>

<script>
var delete_pending_message = ""; //file upload
var delete_popup_warning_message ="";  //file upload
var file_check_popup_browser = "<?php _e("Please upgrade your browser, because your current browser lacks some new features we need!", 'wp-user-extra-fields'); ?>";  
var file_check_popup_size = "<?php _e("Choosen file is too big and will not be uploaded!", 'wp-user-extra-fields'); ?>";  
var file_check_popup_api = "<?php _e("The File APIs are not fully supported in this browser.", 'wp-user-extra-fields'); ?>";  
jQuery(document).ready(function()
{
	jQuery( ".wpuef_input_date" ).pickadate({formatSubmit: 'yyyy/mm/dd', format: '<?php echo $wpuef_option_model->get_date_format(); ?>', selectMonths: true,  selectYears: true, selectYears: 100, max: [<?php echo date('Y', strtotime('+10 years'))  ?>,11,31] });
	jQuery( ".wpuef_input_time" ).pickatime({formatSubmit: 'HH:i', format: 'HH:i'});
});
</script>