<?php if ( is_user_logged_in() ) { ?>
  <div>
		<a href="<?php echo get_admin_url(); ?>" style="margin-right: 16px;">Admin Dashboard</a>
    <a href="<?php echo wp_logout_url(); ?>">Logout</a>
	</div>
<?php } else { ?>
    <a href="<?php echo wp_login_url(); ?>">Login</a>
<?php } ?>
