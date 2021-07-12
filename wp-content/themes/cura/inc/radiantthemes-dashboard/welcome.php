<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$radiantthemes_my_theme = wp_get_theme();
if ( $radiantthemes_my_theme->parent_theme ) {
	$radiantthemes_my_theme = wp_get_theme( basename( get_template_directory() ) );
}
?>

<div class="wrap about-wrap rt-admin-wrap">

	<h1><?php echo esc_html__( 'Welcome to ', 'cura' ) . esc_html( $radiantthemes_my_theme->Name ); ?></h1>
	<div class="about-text"><?php echo esc_html( $radiantthemes_my_theme->Name ) . esc_html__( ' is now installed and ready to use!', 'cura' ); ?></div>
	<div class="wp-badge"><?php printf( esc_html__( 'Version %s', 'cura' ), esc_html( $radiantthemes_my_theme->Version ) ); ?></div>

	<h2 class="nav-tab-wrapper wp-clearfix">
		<a class="nav-tab nav-tab-active" href="<?php echo esc_url( self_admin_url( 'themes.php?page=radiantthemes-dashboard' ) ); ?>"><?php esc_html_e( 'Dashboard', 'cura' ); ?></a>
		<a class="nav-tab" href="<?php echo esc_url( self_admin_url( 'themes.php?page=radiantthemes-admin-plugins' ) ); ?>"><?php esc_html_e( 'Install Plugins', 'cura' ); ?></a>
		<?php if ( defined( 'FW' ) ) { ?>
			<a class="nav-tab" href="<?php echo esc_url( self_admin_url( 'tools.php?page=fw-backups-demo-content' ) ); ?>"><?php esc_html_e( 'Demo Importer', 'cura' ); ?></a>
		<?php } ?>
		<?php if ( class_exists( 'ReduxFrameworkPlugin' ) ) { ?>
			<a class="nav-tab" href="<?php echo esc_url( self_admin_url( 'admin.php?page=_options' ) ); ?>"><?php esc_html_e( 'Theme Options', 'cura' ); ?></a>
		<?php } ?>
	</h2>

	<?php

	$radiantthemes_theme              = wp_get_theme();
	$theme_version                    = $radiantthemes_theme->get( 'Version' );
	$theme_name                       = $radiantthemes_theme->get( 'Name' );
	$mem_limit                        = ini_get( 'memory_limit' );
	$mem_limit_byte                   = wp_convert_hr_to_bytes( $mem_limit );
	$upload_max_filesize              = ini_get( 'upload_max_filesize' );
	$upload_max_filesize_byte         = wp_convert_hr_to_bytes( $upload_max_filesize );
	$post_max_size                    = ini_get( 'post_max_size' );
	$post_max_size_byte               = wp_convert_hr_to_bytes( $post_max_size );
	$mem_limit_byte_boolean           = ( $mem_limit_byte < 268435456 );
	$upload_max_filesize_byte_boolean = ( $upload_max_filesize_byte < 67108864 );
	$post_max_size_byte_boolean       = ( $post_max_size_byte < 67108864 );
	$execution_time                   = ini_get( 'max_execution_time' );
	$execution_time_boolean           = ( $execution_time < 300 );
	$input_vars                       = ini_get( 'max_input_vars' );
	$input_vars_boolean               = ( $input_vars < 2000 );
	$input_time                       = ini_get( 'max_input_time' );
	$input_time_boolean               = ( $input_time < 1000 );
	$theme_option_address             = admin_url( 'themes.php?page=radiantthemes_theme_options' );

	?>

	<div id="radiantthemes-dashboard" class="wrap about-wrap">
		<div class="welcome-content w-clearfix extra">
			<div class="w-row">
				<div class="w-col-sm-7">
					<div class="w-row">
						<div class="w-col-sm-6">
							<div class="w-box text-center">
								<div class="w-box-head">
									<?php esc_html_e( 'Theme Documentation', 'cura' ); ?>
								</div>
								<div class="w-box-content">
									<div class="w-button">
										<a href="https://radiantthemes.zendesk.com/hc/" target="_blank"><?php esc_html_e( 'DOCUMENTATION', 'cura' ); ?></a>
									</div>
								</div>
							</div>
						</div>
						<div class="w-col-sm-6">
							<div class="w-box text-center">
								<div class="w-box-head">
									<?php esc_html_e( 'Theme Support', 'cura' ); ?>
								</div>
								<div class="w-box-content">
									<div class="w-button">
										<a href="https://radiantthemes.zendesk.com/hc/en-us/requests/new" target="_blank"><?php esc_html_e( 'OPEN SUPPORT TICKET', 'cura' ); ?></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="w-col-sm-5">
					<div class="w-box">
						<div class="w-box-head">
							<?php esc_html_e( 'System Status', 'cura' ); ?>
						</div>
						<div class="w-box-content">
							<div class="w-system-info">
								<span> <?php esc_html_e( 'WP Memory Limit', 'cura' ); ?> </span>
								<?php
								$wp_memory_limit       = WP_MEMORY_LIMIT;
								$wp_memory_limit_value = preg_replace( '/[^0-9]/', '', $wp_memory_limit );
								if ( $wp_memory_limit_value < 256 ) {
									?>
									<i class="w-icon w-icon-red"></i> <span class="w-current"> <?php echo esc_html__( 'Currently:', 'cura' ) . ' ' . esc_html( $wp_memory_limit ); ?> </span>
									<span class="w-min"> <?php esc_html_e( '(min:256M)', 'cura' ); ?> </span>
								<?php } else { ?>
									<i class="w-icon w-icon-green ti-check"></i> <span class="w-current"> <?php echo esc_html__( 'Currently:', 'cura' ) . ' ' . esc_html( $wp_memory_limit ); ?> </span>
								<?php } ?>
							</div>
							<div class="w-system-info">
								<span> <?php esc_html_e( 'Upload Max. Filesize', 'cura' ); ?> </span>
								<?php
								if ( $upload_max_filesize_byte_boolean ) {
									?>
									<i class="w-icon w-icon-red"></i> <span class="w-current"> <?php echo esc_html__( 'Currently:', 'cura' ) . ' ' . esc_html( $upload_max_filesize ); ?> </span>
									<span class="w-min"> <?php esc_html_e( '(min:64M)', 'cura' ); ?> </span>
								<?php } else { ?>
									<i class="w-icon w-icon-green ti-check"></i> <span class="w-current"> <?php echo esc_html__( 'Currently:', 'cura' ) . ' ' . esc_html( $upload_max_filesize ); ?> </span>
								<?php } ?>
							</div>
							<div class="w-system-info">
								<span> <?php esc_html_e( 'Max. Post Size', 'cura' ); ?> </span>
								<?php
								if ( $post_max_size_byte_boolean ) {
									?>
									<i class="w-icon w-icon-red"></i> <span class="w-current"> <?php echo esc_html__( 'Currently:', 'cura' ) . ' ' . esc_html( $post_max_size ); ?> </span>
									<span class="w-min"> <?php esc_html_e( '(min:64M)', 'cura' ); ?> </span>
								<?php } else { ?>
									<i class="w-icon w-icon-green ti-check"></i> <span class="w-current"> <?php echo esc_html__( 'Currently:', 'cura' ) . ' ' . esc_html( $post_max_size ); ?> </span>
								<?php } ?>
							</div>
							<div class="w-system-info">
								<span> <?php esc_html_e( 'Max. Execution Time', 'cura' ); ?> </span>
								<?php
								if ( $execution_time_boolean ) {
									?>
									<i class="w-icon w-icon-red"></i>
									<span class="w-current"> <?php echo esc_html( 'Currently:', 'cura' ) . ' ' . esc_html( $execution_time ); ?> </span>
									<span class="w-min"> <?php esc_html_e( '(min:300)', 'cura' ); ?> </span>
								<?php } else { ?>
									<i class="w-icon w-icon-green ti-check"></i> <span class="w-current"> <?php echo esc_html__( 'Currently:', 'cura' ) . ' ' . esc_html( $execution_time ); ?> </span>
								<?php } ?>
							</div>
							<div class="w-system-info">
								<span> <?php esc_html_e( 'PHP Max. Input Vars', 'cura' ); ?> </span>
								<?php
								if ( $input_vars_boolean ) {
									?>
									<i class="w-icon w-icon-red"></i>
									<span class="w-current"> <?php echo esc_html__( 'Currently:', 'cura' ) . ' ' . esc_html( $input_vars ); ?> </span>
									<span class="w-min"> <?php esc_html_e( '(min:2000)', 'cura' ); ?> </span>
								<?php } else { ?>
									<i class="w-icon w-icon-green ti-check"></i> <span class="w-current"> <?php echo esc_html__( 'Currently:', 'cura' ) . ' ' . esc_html( $input_vars ); ?> </span>
								<?php } ?>
							</div>
							<div class="w-system-info">
								<span> <?php esc_html_e( 'PHP Max. Input Time', 'cura' ); ?> </span>
								<?php
								if ( $input_time_boolean ) {
									?>
									<i class="w-icon w-icon-red"></i> <span class="w-current"> <?php echo esc_html__( 'Currently:', 'cura' ) . ' ' . esc_html( $input_time ); ?> </span>
									<span class="w-min"> <?php esc_html_e( '(min:1000)', 'cura' ); ?></span>
								<?php } else { ?>
									<i class="w-icon w-icon-green ti-check"></i> <span class="w-current"> <?php echo esc_html__( 'Currently:', 'cura' ) . ' ' . esc_html( $input_time ); ?> </span>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div> <!-- end wrap -->
