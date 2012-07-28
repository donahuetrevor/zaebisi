<?php $this->load->view($template_name.'/base/header'); ?>

<?php if($auth->logged_in()): ?>
<!-- Primary navigation -->
<nav id="primary">
	<ul>
		<li<?=(strpos(uri_string(), 'home') === FALSE && uri_string() !== '' ? '' : ' class="active"')?>>
			<a href="<?=site_url('home')?>">
				<span class="glyph home"></span>
				Home
			</a>
		</li>
		<li<?=(strpos(uri_string(), 'dashboard') === FALSE ? '' : ' class="active"')?>>
			<a href="<?=site_url('dashboard')?>">
				<span class="glyph dashboard"></span>
				Dashboard
			</a>
		</li>
		<li>
			<a href="/uielements/miscellaneous">
				<span class="glyph shuffle"></span>
				UI Elements
			</a>
		</li>
		<li >
			<a href="<?=site_url('movies/')?>">
				<span class="glyph file"></span>
				Movies
			</a>
		</li>
		<li >
			<a href="/tables/tables">
				<span class="glyph listicon"></span>
				Tables
			</a>
		</li>
		<li >
			<a href="/charts/linechart">
				<span class="glyph chart"></span>
				Charts
			</a>
		</li>
		<li class="bottom">
			<a href="<?=site_url('auth/logout')?>">
				<span class="glyph quit"></span>
				Log out
			</a>
		</li>
	</ul>
</nav>
<!-- Secondary navigation -->
<nav id="secondary">
	<ul>
		<li><a href="#">Dashboard</a></li>
		<li><a href="#">Last user activities</a></li>
		<li><a href="#">System logs</a></li>
		<li<?=(strpos(uri_string(), 'changes-log') !== FALSE ? ' class="active"' : '')?>><a href="<?=site_url('changes_log/index')?>">Changes log</a></li>
	</ul>

	<div id="notifications">
		<ul>
			<li>test notification</li>
		</ul>
	</div>
</nav>



<section id="maincontainer">
	<div id="main" class="container_12">

	<?php if ($errors): ?>
	<?php foreach($errors as $error_string): ?>
	<div class="notification error">
		<span class="icon"></span>
		<?=$error_string?>
		<a href="#" class="close">x</a>
	</div>
	<?php endforeach; ?>
	<?php endif; ?>

	<?php if ($success_msgs): ?>
	<?php foreach($success_msgs as $success_string): ?>
		<div class="notification success">
			<span class="icon"></span>
			<?=$success_string?>
			<a href="#" class="close">x</a>
		</div>
	<?php endforeach; ?>
	<?php endif; ?>

<?php endif; ?>

<?php $this->load->view($include); ?>

<?php if($auth->logged_in()): ?>
	</div>
</section>
<?php endif; ?>

<?php $this->load->view($template_name.'/base/footer'); ?>