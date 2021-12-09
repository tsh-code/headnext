<?php
function headnext_register_theme_customizer( $wp_customize ) {
	$wp_customize->add_section('nextjs', array(
    'title' => __( 'Next.js', 'headnext' ),
    'description' => __( 'Next.js application configuration' ),
    'priority' => 50,
  ));

  $wp_customize->add_setting('nextjs_application_url', [
		'sanitize_callback' => function ($input) {
      return strip_tags(esc_url_raw($input, array('https')));
    }
	]);

	$wp_customize->add_control('nextjs_application_url', array(
		'name' => 'nextjs_url',
		'label' => __( 'Next.js application URL', 'headnext' ),
		'type' => 'url',
		'section' => 'nextjs',
		'input_attrs' => array(
	    'placeholder' => 'Next.js application URL',
	  ),
	));
}
add_action('customize_register', 'headnext_register_theme_customizer');

function headnext_custom_preview_link($link, $post) {
  $domain = get_theme_mod('nextjs_application_url');
	$type = $post->post_type;
	$nonce = wp_create_nonce('wp_rest');

	return add_query_arg(
		['nonce' => $nonce],
		"$domain/api/$type/" . $post->ID . "/preview"
	);
}
add_filter('preview_post_link', 'headnext_custom_preview_link', 10, 2);
