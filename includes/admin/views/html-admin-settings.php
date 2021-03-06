<?php
/**
 * Admin View: Settings
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="wrap geodirectory">
	<form method="<?php echo esc_attr( apply_filters( 'geodir_settings_form_method_tab_' . $current_tab, 'post' ) ); ?>" id="mainform" action="" enctype="multipart/form-data">
		<nav class="nav-tab-wrapper gd-nav-tab-wrapper">
			<?php
				foreach ( $tabs as $name => $label ) {
					if(isset($_REQUEST['page']) && $_REQUEST['page']=='gd-cpt-settings'){
						$cpt = isset($_REQUEST['post_type']) ? sanitize_title( $_REQUEST['post_type'] ) : 'gd_place';
						echo '<a href="' . admin_url( 'edit.php?post_type=' . $cpt . '&page=gd-cpt-settings&tab=' . $name ) . '" class="nav-tab ' . ( $current_tab == $name ? 'nav-tab-active' : '' ) . '">' . $label . '</a>';
					}else{
						echo '<a href="' . admin_url( 'admin.php?page=gd-settings&tab=' . $name ) . '" class="nav-tab ' . ( $current_tab == $name ? 'nav-tab-active' : '' ) . '">' . $label . '</a>';
					}
				}
				do_action( 'geodir_settings_tabs' );
			?>
		</nav>
		<h1 class="screen-reader-text"><?php echo esc_html( $tabs[ $current_tab ] ); ?></h1>
		<?php
			do_action( 'geodir_sections_' . $current_tab );

			self::show_messages();

			do_action( 'geodir_settings_' . $current_tab );
			do_action( 'geodir_settings_tabs_' . $current_tab ); // @deprecated hook
		?>
		<p class="submit">
			<?php if ( empty( $GLOBALS['hide_save_button'] ) ) : ?>
				<input name="save" class="button-primary geodir-save-button" type="submit" value="<?php esc_attr_e( 'Save changes', 'geodirectory' ); ?>" />
			<?php endif; ?>
			<?php wp_nonce_field( 'geodirectory-settings' ); ?>
		</p>
	</form>
</div>
