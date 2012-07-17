<div id="login_container">
	<div id="login_form">
		<?php echo form_open("auth/login");?>
			<input type="hidden" name="remember" id="remember" value="1"/>
			<input type="hidden" name="submit" value="1"/>
			<p>
				<input type="text" id="username" name="identity" placeholder="Username" class="{validate: {required: true}}" />
			</p>
			<p>
				<input type="password" id="password" name="password" placeholder="Password" class="{validate: {required: true}}" />
			</p>
			<button type="submit" class="button blue"><span class="glyph key"></span> Login</button>
		</form>
	</div>
</div>