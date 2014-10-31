<?php

function incsub_support_get_model() {
	return MU_Support_System_Model::get_instance();
}

function incsub_support_priority_dropdown( $args ) {
	$defaults = array(
		'name' => 'ticket-priority',
		'id' => 'ticket-priority',
		'show_empty' => __( 'Select a priority', INCSUB_SUPPORT_LANG_DOMAIN ),
		'selected' => null,
		'echo' => true
	);
	$args = wp_parse_args( $args, $defaults );

	extract( $args );

	if ( ! $echo )
		ob_start();

	$plugin_class = incsub_support();
	$priorities = $plugin_class::$ticket_priority;
	?>
		<select name="<?php echo esc_attr( $name ); ?>" id="<?php echo esc_attr( $id ); ?>">
			<?php if ( ! empty( $show_empty ) ): ?>	
				<option value="" <?php selected( $selected === null ); ?>><?php echo esc_html( $show_empty ); ?></option>
			<?php endif; ?>

			<?php foreach ( $priorities as $key => $value ): ?>
				<option value="<?php echo $key; ?>" <?php selected( $selected === $key ); ?>><?php echo esc_html( $value ); ?></option>
			<?php endforeach; ?>

		</select>
	<?php

	if ( ! $echo )
		return ob_get_clean();
}

function incsub_support_super_admins_dropdown( $args ) {
	$defaults = array(
		'name' => 'super-admins',
		'id' => 'super-admins',
		'show_empty' => __( 'Select a staff', INCSUB_SUPPORT_LANG_DOMAIN ),
		'selected' => null,
		'echo' => true
	);
	$args = wp_parse_args( $args, $defaults );

	$plugin = incsub_support();
	$super_admins = $plugin::get_super_admins();

	extract( $args );

	if ( ! $echo )
		ob_start();
	?>
		<select name="super-admins">
			<?php if ( ! empty( $show_empty ) ): ?>	
				<option value="" <?php selected( empty( $selected ) ); ?>><?php echo esc_html( $show_empty ); ?></option>
			<?php endif; ?>
			<?php foreach ( $super_admins as $user_name ): ?>
				<option value="<?php echo esc_attr( $user_name ); ?>" <?php selected( $selected, $user_name ); ?>><?php echo $user_name; ?></option>
			<?php endforeach; ?>
		</select>
	<?php

	if ( ! $echo )
		return ob_get_clean();
}
