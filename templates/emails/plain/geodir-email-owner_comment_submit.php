<?php
// don't load directly
if ( !defined('ABSPATH') )
    die('-1');

do_action( 'geodir_email_header', $email_heading, $email_name, $email_vars, $plain_text, $sent_to_admin );

if ( ! empty( $message_body ) ) {
    echo wp_strip_all_tags( $message_body );
}

do_action( 'geodir_email_footer', $email_name, $email_vars, $plain_text, $sent_to_admin );