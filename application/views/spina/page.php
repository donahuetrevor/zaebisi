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
		<li class="active"><a href="#">Dashboard</a></li>
		<li><a href="#">Last user activities</a></li>
		<li><a href="#">System logs</a></li>
	</ul>

	<div id="notifications">
		<ul>
		</ul>
	</div>
</nav>

<section id="maincontainer">
	<div id="main" class="container_12">
<?php endif; ?>

<?php $this->load->view($include); ?>

<?php if($auth->logged_in()): ?>
	</div>
</section>
<?php endif; ?>

<?php $this->load->view($template_name.'/base/footer'); ?>