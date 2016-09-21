
<div id="main">
	<div class="w-container">
		<?php
			if (isset($this->session->userdata['logged_in'])) {

				header("location: /admin/dashboard");
			}

			if (isset($logout_message)) {
				echo "<div class='message'>";
				echo $logout_message;
				echo "</div>";
			}

			if (isset($message_display)) {
				echo "<div class='message'>";
				echo $message_display;
				echo "</div>";
			}
		?>
		<div id="login">
			<h2>Login Form</h2>
			<hr/>
			<?php echo form_open('/admin/dashboard'); ?>
			<?php
				echo "<div class='error_msg'>";
				if (isset($error_message)) {
					echo $error_message;
				}
				echo validation_errors();
				echo "</div>";
			?>
			<label>UserName :</label>
			<input type="text" name="username" id="name" placeholder="username"/><br /><br />
			<label>Password :</label>
			<input type="password" name="password" id="password" placeholder="**********"/><br/><br />
			<input type="submit" value=" Login " name="submit"/><br />
			<a href="<?php echo base_url() ?>index.php/user_authentication/user_registration_show">To SignUp Click Here</a>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>