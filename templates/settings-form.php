<div class="login_hide_main">
	<ul class="nav nav-tabs nabTabBar">
		<li class="active"><a data-toggle="tab" href="#login_logo">Login Logo</a></li>
		<li><a data-toggle="tab" href="#login_page_style">Login Page Style</a></li>
		<li> <a data-toggle="tab" href="#login_page_template">Customize Template</a></li>
		<li> <a data-toggle="tab" href="#ihl-google-catcha">Google Recaptcha</a></li>
		<li><a data-toggle="tab" href="#login_limits">Login Limit</a></li>
		<li><a data-toggle="tab" href="#login_url">Login URL</a></li>
	</ul>

    <div class="tab-content">
		<div class="tab-pane fade in active ihl-setting" id="login_logo">
			<form method="post" action="" id="logo-form">
			<h2>Change Login Logo</h2>
				<div class="login-logo">
						<div class="wrapDiv logo-uploadDiv">
							<label class="logoUpLabel" for="upload_image">Login Logo</label>
							<img id="image-preview" src="<?php echo esc_attr( $ihl_logo_submitted_url ?: $ihl_logo_current_url ); ?>" alt="Logo Preview" />
							<input type="button" id="ihl_logo_button" class="button-secondary" value="Upload Logo">
							<input type="text" id="ihl_login_logo" style="display: none;" name="ihl_login_logo" class="regular-text" value="<?php echo esc_attr( $ihl_logo_submitted_url ?: $ihl_logo_current_url ); ?>" />
						</div>

					<div class="wrapDiv ">
						<label class="logoUpLabel" for="logo_width">Logo Width</label>
						<input class="widthInput" type="number" id="logo_width" name="logo_width" class="regular-text" value="<?php echo esc_attr( get_option( 'login_logo_width' ) ); ?>" /> px
					</div>

					<div class="wrapDiv">
						<label class="logoUpLabel" for="logo_height">Logo Height</label>
						<input class="heightInput" type="number" id="logo_height" name="logo_height" class="regular-text" value="<?php echo esc_attr( get_option( 'login_logo_height' ) ); ?>" /> px
					</div>
					<div class="wrapDiv">
							<label class="logoUpLabel" for="enable_logo">Enable Logo</label>
							<input type="checkbox" id="enable_logo" name="enable_logo" <?php checked( get_option( 'enable_login_logo' ), 'yes' ); ?> />
					</div>
				</div>
				<div class="submit">
					<input type="submit" class="button button-primary" value="Save Changes">
				</div>
			</form>
		</div>

</div>