<div class="login_hide_main">
	<ul class="nav nav-tabs nabTabBar">
		<li class="active"><a data-toggle="tab" href="#login_logo">Login Logo</a></li>
		<li><a data-toggle="tab" href="#login_page_style">Login Page Style</a></li>
		<li> <a data-toggle="tab" href="#login_page_template">Customize Template</a></li>
		<li> <a data-toggle="tab" href="#pks-google-catcha">Google Recaptcha</a></li>
		<li><a data-toggle="tab" href="#login_limits">Login Limit</a></li>
		<!-- <li><a data-toggle="tab" href="#login_url">Login URL</a></li> -->
	</ul>
	<div class="tab-content">
		<div class="tab-pane fade in active pks-setting" id="login_logo">
			<form method="post" action="" id="logo-form">
				<h2>Change Login Logo</h2>
				<div class="login-logo">
					<div class="wrapDiv logo-uploadDiv">
						<label class="logoUpLabel" for="upload_image">Login Logo</label>
						<img id="image-preview" src="<?php echo esc_attr($pks_logo_submitted_url ?: $pks_logo_current_url); ?>" alt="Logo Preview" />
						<input type="button" id="pks_logo_button" class="button-secondary" value="Upload Logo">
						<input type="text" id="pks_login_logo" style="display: none;" name="pks_login_logo" class="regular-text" value="<?php echo esc_attr($pks_logo_submitted_url ?: $pks_logo_current_url); ?>" />
					</div>

					<div class="wrapDiv ">
						<label class="logoUpLabel" for="logo_width">Logo Width</label>
						<input class="widthInput" type="number" id="logo_width" name="logo_width" class="regular-text" value="<?php echo esc_attr(get_option('login_logo_width')); ?>" /> px
					</div>

					<div class="wrapDiv">
						<label class="logoUpLabel" for="logo_height">Logo Height</label>
						<input class="heightInput" type="number" id="logo_height" name="logo_height" class="regular-text" value="<?php echo esc_attr(get_option('login_logo_height')); ?>" /> px
					</div>
					<div class="wrapDiv">
						<label class="logoUpLabel" for="enable_logo">Enable Logo</label>
						<input type="checkbox" id="enable_logo" name="enable_logo" <?php checked(get_option('enable_login_logo'), 'yes'); ?> />
					</div>
				</div>
				<div class="submit">
					<input type="submit" class="button button-primary" value="Save Changes">
				</div>
			</form>
		</div>

		<div id="login_page_style" class="tab-pane fade">
			<div class="login-page-style">
				<h2>Customize Login Page</h2>
				<form method="post" action="" id="pks-login-page-bg-form">
					<div class="login-bg-setting">
						<div class="bg-setting">
							<h4>Background Settings</h4>
						</div>
						<div class="pks_login_page_bg_color pks_bg_inside">
							<label for="pks_login_page_bg_color">Background Color</label>
							<input type="color" id="pks_login_page_bg_color" name="pks_login_page_bg_color" value="<?php echo esc_attr(get_option('pks_login_page_bg_color', '#ffffff')); ?>">
						</div>
						<div class="pks_login_page_bg_img pks_bg_inside">
							<label id="lodin-page-label" class="" for="upload_image">Background Image</label>
							<input type="text" id="pks_login_page_bg_img" name="pks_login_page_bg_img" class="regular-text" value="<?php echo esc_attr($pks_bg_img_submitted_url ?: $pks_bg_img_current_url); ?>" />

							<input type="button" id="pks_login_page_bg_img_button" class="pks_login_page_bg_img_button-btn" value="Upload Image">
						</div>
					</div>
					<div class="login_form_setting">
						<div class="login-form-setting">
							<h4>Form Setting</h4>
						</div>
						<div class="pks-login-form-position pks_bg_inside">
							<label for="pks_login_form_position">Login Form Position</label>
							<select id="pks_login_form_position" name="pks_login_form_position">
								<option value="center" <?php selected(get_option('pks_login_form_position'), 'center'); ?>>Center</option>
								<option value="top-left" <?php selected(get_option('pks_login_form_position'), 'top-left'); ?>>Top Left</option>
								<option value="top-right" <?php selected(get_option('pks_login_form_position'), 'top-right'); ?>>Top Right</option>
								<option value="bottom-left" <?php selected(get_option('pks_login_form_position'), 'bottom-left'); ?>>Bottom Left</option>
								<option value="bottom-right" <?php selected(get_option('pks_login_form_position'), 'bottom-right'); ?>>Bottom Right</option>
							</select>
						</div>
						<div class="pks-login-form-width pks_bg_inside">
							<label for="pks_login_form_width">Login Form Width</label>
							<input type="number" id="pks_login_form_width" name="pks_login_form_width" value="<?php echo esc_attr(get_option('pks_login_form_width', '320')); ?>" min="320"> px
						</div>

						<div class="ih-login-form-color pks_bg_inside">
							<label for="pks_login_form_color">Login Form Color</label>
							<input type="color" id="pks_login_form_color" name="pks_login_form_color" value="<?php echo esc_attr(get_option('pks_login_form_color', '#ffffff')); ?>">
						</div>
						<div class="pks-login-label-color pks_bg_inside">
							<label for="pks_login_label_color">Label Color</label>
							<input type="color" id="pks_login_label_color" name="pks_login_label_color" value="<?php echo esc_attr(get_option('pks_login_label_color', '#212121')); ?>">
						</div>
						<div class="pks-login-form-label-size pks_bg_inside">
							<label for="pks_login_form_label_size">Login Form Label Size</label>
							<input type="number" id="pks_login_form_label_size" name="pks_login_form_label_size" value="<?php echo esc_attr(get_option('pks_login_form_label_size', '16')); ?>" min="14"> px
						</div>
						<div class="pks-login-form-border-radius pks_bg_inside">
							<label for="pks_login_form_border_radius">Login Form Border Radius</label>
							<input type="number" id="pks_login_form_border_radius" name="pks_login_form_border_radius" value="<?php echo esc_attr(get_option('pks_login_form_border_radius', '5')); ?>" max="15"> px
						</div>
						<div class="pks-login-form-border-color pks_bg_inside">
							<label for="pks_login_form_border_color">Login Form Border Color</label>
							<input type="color" id="pks_login_form_border_color" name="pks_login_form_border_color" value="<?php echo esc_attr(get_option('pks_login_form_border_color', '#212121')); ?>">
						</div>
						<div class="pks=login-form_input-field-color pks_bg_inside">
							<label for="pks_login_input_field_color">Input Field Color</label>
							<input type="color" id="pks_login_input_field_color" name="pks_login_input_field_color" value="<?php echo esc_attr(get_option('pks_login_input_field_color', '#ffffff')); ?>">
						</div>
						<div class="pks-login-form_input-field-border-color pks_bg_inside">
							<label for="pks_login_input_field_border_color">Input Field Border Color</label>
							<input type="color" id="pks_login_input_field_border_color" name="pks_login_input_field_border_color" value="<?php echo esc_attr(get_option('pks_login_input_field_border_color', '#212121')); ?>">
						</div>
						<div class="pks-input-field-border-radius pks_bg_inside">
							<label for="pks_login_input_field_border_radius">Input Field Border Radius</label>
							<input type="number" id="pks_login_input_field_border_radius" name="pks_login_input_field_border_radius" value="<?php echo esc_attr(get_option('pks_login_input_field_border_radius', '5')); ?>" max="10"> px
						</div>

					</div>
					<div class="button_setting_main">
						<div class="button_setting">
							<h4>Button Setting</h4>
						</div>
						<div class="pks_login_btn pks_bg_inside">
							<label for="pks_login_btn_color">Login Button Color</label>
							<input type="color" id="pks_login_btn_color" name="pks_login_btn_color" value="<?php echo esc_attr(get_option('pks_login_btn_color', '#2271b1')); ?>">
						</div>
						<div class="pks_login_text_btn pks_bg_inside">
							<label for="pks_login_btn_text_color">Login Button Text Color</label>
							<input type="color" id="pks_login_btn_text_color" name="pks_login_btn_text_color" value="<?php echo esc_attr(get_option('pks_login_btn_text_color', '#ffffff')); ?>">
						</div>
						<div class="pks_login_btn_hover pks_bg_inside">
							<label for="pks_login_btn_hover_color">Login Button Color Hover</label>
							<input type="color" id="pks_login_btn_hover_color" name="pks_login_btn_hover_color" value="<?php echo esc_attr(get_option('pks_login_btn_hover_color', '#2271b1')); ?>">
						</div>
						<div class="pks_login_btn_border pks_bg_inside">
							<label for="pks_login_btn_border_color">Login Button Border Color</label>
							<input type="color" id="pks_login_btn_border_color" name="pks_login_btn_border_color" value="<?php echo esc_attr(get_option('pks_login_btn_border_color', '#212121')); ?>">
						</div>
						<div class="pks_login_btn_border pks_bg_inside">
							<label for="pks_login_btn_border_radius">Login Button Border Radius</label>
							<input type="number" id="pks_login_btn_border_radius" name="pks_login_btn_border_radius" value="<?php echo esc_attr(get_option('pks_login_btn_border_radius',)); ?>" max="10"> px
						</div>

						<div class="pks_login_btn_width pks_bg_inside">
							<label for="pks_login_btn_width">Login Button Width</label>
							<input type="number" id="pks_login_btn_width" name="pks_login_btn_width" value="<?php echo esc_attr(get_option('pks_login_btn_width',)); ?>" min="65"> px
						</div>

					</div>

					<div class="lost_pw_blog_main">
						<div class="lost_pw_blog">
							<h4>Lost Password and Back To Blog</h4>
						</div>
						<div class="pks_nav_links_color pks_bg_inside">
							<label for="pks_nav_links_color">Navigation Links Color</label>
							<input type="color" id="pks_nav_links_color" name="pks_nav_links_color" value="<?php echo esc_attr(get_option('pks_nav_links_color', '#212121')); ?>">
						</div>
						<div class="pks_nav_links_hover_color pks_bg_inside">
							<label for="pks_nav_links_hover_color">Navigation Links Hover Color</label>
							<input type="color" id="pks_nav_links_hover_color" name="pks_nav_links_hover_color" value="<?php echo esc_attr(get_option('pks_nav_links_hover_color', '#025ae8')); ?>">
						</div>
						<div class="pks_nav_links_size pks_bg_inside">
							<label for="pks_nav_links_size">Navigation Links Size</label>
							<input type="number" id="pks_nav_links_size" name="pks_nav_links_size" value="<?php echo esc_attr(get_option('pks_nav_links_size',)); ?>" max="20px"> px
						</div>

					</div>

					<div class="submit">
						<input type="submit" id="styling_sub_btn" style="position: fixed; bottom: 20px; right: 10%; transform: translateX(-50%); z-index: 999; width: fit-content;" class="button button-primary" value="Save Changes">
					</div>
				</form>
			</div>
		</div>
		<div id="login_page_template" class="tab-pane fade">
			<div class="login-page-template">
				<h2>Custom Templates</h2>
			</div>
			<p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat, harum.</p>
		</div>

		<div id="pks-google-catcha" class="tab-pane fade">
			<div class="pks-google-catcha">
				<h2>Google ReCaptcha</h2>

				<p class="capthca_desc">You need to <a href="https://www.google.com/recaptcha/admin" rel="external">click here </a> to get Site and Secret keys For V2 of Google recaptcha to make ReCaptcha work.</p>
				<form action="" method="post" id="pks_captcha_form">
					<div class="pks_site_key">
						<label for="pks_site_key">Site key</label>
						<input type="text" id="pks_site_key" name="pks_site_key" value="<?php echo esc_attr(get_option('pks_site_key')); ?>" required />
						<small class="form-text text-muted">Enter your site key provided by the captcha service.</small>
					</div>
					<div class="pks_secret_key">
						<label for="pks_secret_key">Secret key</label>
						<input type="text" id="pks_secret_key" name="pks_secret_key" value="<?php echo esc_attr(get_option('pks_secret_key')); ?>" required />
						<small class="form-text text-muted">Enter your secret key provided by the captcha service.</small>
					</div>
					<p class="submit">
						<input type="submit" name="pks_captcha_submit" class="button-primary" value="Save Changes">
					</p>
				</form>
			</div>
		</div>

		<div id="login_limits" class="tab-pane fade">
			<div class="login-limit-main">
				<h2>Set Login Limits </h2>
				<form method="post" action="">
					<div class="login-limits">
						<label for="enable_login_limits">Enable login limits</label>
						<input type="checkbox" id="enable_login_limits" name="enable_login_limits" <?php checked(get_option('enable_login_limits'), 'yes'); ?> />
					</div>
					<div class="login-limits">
						<label for="login_attempts">Set Login Attempts</label>
						<input type="number" id="login_attempts" name="login_attempts" value="<?php echo $login_attempts; ?>" min="1" required>
					</div>


					<div class="login-limits">
						<label for="delay_duration">Delay Duration (in minutes)</label>
						<input type="number" id="delay_duration" name="delay_duration" value="<?php echo $delay_duration; ?>" min="1" required>
					</div>
					<div class="submit">
						<input type="submit" name="login_limits_submit" class="button button-primary" value="Save Changes">
					</div>
				</form>
			</div>
		</div>

		<!-- <div id="login_url" class="tab-pane fade">
			<div class="login-url">
				<h2>Change Login URL</h2>
			</div>
		</div> -->

	</div>
</div>
<script>
	jQuery(document).ready(function($) {
		var pks_bg_img = document.getElementById("pks_login_page_bg_img_button");
		pks_bg_img.addEventListener("click", function(e) {


			var customUploader = wp.media({
				title: "Select this Image",
				button: {
					text: "Select this Image",
				},
				multiple: false,
			});

			customUploader.on("select", function() {
				var attachment = customUploader.state().get("selection").first().toJSON();
				$("#pks_login_page_bg_img").val(attachment.url);

			});

			customUploader.on("select", function() {
				var attachment = customUploader.state().get("selection").first().toJSON();
				$("#pks_login_page_bg_img").val(attachment.url);

			});

			// Open the media uploader dialog
			customUploader.open();

		});
		var pksLoginPageForm = document.getElementById("pks-login-page-bg-form");
		// Capture form submission and prevent the default behavior
		pksLoginPageForm.addEventListener("submit", function(event) {
			event.preventDefault();
			alert("Settings Successfully Changed!");
			this.submit();
		});
	});
</script>