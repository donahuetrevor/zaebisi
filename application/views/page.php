<?php $this->load->view('base/header'); ?>
<div id="top">
    <div id="top-wrap">
        <ul id="topnav">
            <!--{if $smarty.session.admin} -->
                <li><a href="<?=base_url()?>"><?=ucfirst(_('home'))?></a></li>
                <li><a href="<?=base_url('invites/')?>"><?=ucfirst(_('invites'))?></a></li>
            <!--{/if}-->
        </ul>
        <ul id="top-rghtnav">
            <!--{if $smarty.session.admin}
                {if $smarty.session.group->id <= 2}
                <li><a href="{$smarty.const.ADMIN_URL}bug-tracker/">{$lang.bug_tracker}</a></li>
                {/if}
                <li><a id="logout-user" href="javascript:void(0);">{$lang.log_out}</a></li>
            {else}
                <li><a href="{$smarty.const.ADMIN_URL}account/login/">{$lang.log_in}</a></li>
            {/if}-->
        </ul>
        <div class="clear"></div>
    </div>
</div>
<div id="head">
	<div id="head-wrap">
		<div id="hw-left">
			<h1>Admin Control Panel</h1>
			<p>Admin panel</p>
		</div>
		<div id="hw-right">
			<h1>Admin Control Panel Right</h1>
			<p>Admin panel</p>
		</div>
		<div class="clear"></div>
	</div>
</div>
<div id="menu">
	<ul class="main">
		<!--{if $smarty.session.admin && $smarty.session.group->id <= 2}-->
		<li><a href="#"><?=ucfirst(_('dashboard'))?></a></li>
		<li><a href="<?=base_url('documents/')?>"><?=ucfirst(ngettext('document', 'documents', 10))?></a></li>
		<li><a href="<?=base_url('users/')?>"><?=ucfirst(ngettext('user', 'users', 10))?></a></li>
		<li><a href="#"><?=ucfirst(ngettext('template', 'templates', 10))?></a></li>
		<li><a href="<?=base_url('languages/')?>"><?=ucfirst(ngettext('language', 'languages', 10))?></a></li>
		<li>
			<a href="<?=base_url('modules/')?>"><?=ucfirst(ngettext('module', 'modules', 10))?></a>
			<ul>
				<li><a href="<?=base_url('movies/')?>"><?=ucfirst(ngettext('movie', 'movies', 10))?></a></li>
				<li><a href="<?=base_url('games/')?>"><?=ucfirst(ngettext('game', 'games', 10))?></a></li>
			</ul>
		</li>
		<li><a href="<?=base_url('admin-forums/')?>"><?=ucfirst(ngettext('admin forum', 'admin forums', 10))?></a></li>

		<li class="add-menu">
			<a href="#" onclick="return false;"><?=ucfirst(ngettext('options', 'options', 10))?></a>
			<ul>
				<li><a href="<?=base_url('menus/')?>"><?=ucfirst(ngettext('edit menu', 'edit menus', 10))?></a></li>
			</ul>
		</li>
		<!--{else}-->
		<li><a href="<?=base_url('math/')?>"><?=ucfirst(_('math module'))?></a></li>
		<!--{/if}-->
	</ul>
</div>
<div id="content">
	<?php if (!empty($messages)) :?>
	<div class="infodiv">
		<?php foreach ($messages as $msg) : ?>
			<div class="error"><?=$msg?>.</div>
		<?php endforeach;?>
	</div>
	<?php endif; ?>
<?php $this->load->view($include); ?>
</div>
<div id="lower">
	<div id="lower-wrap">
		<div class="lowerbar">
			<div class="lowerbar-wrap">
				<h2>Test 1</h2>
				<div class="lb-content">
					Ea eam labores imperdiet, apeirian democritum ei nam, doming neglegentur ad vis.
					Ne malorum ceteros feugait quo, ius ea liber offendit placerat, est habemus aliquyam legendos id.
				</div>
			</div>
		</div>
		<div class="lowerbar">
			<div class="lowerbar-wrap">
				<h2>Test 2</h2>
				<div class="lb-content">
					Ea eam labores imperdiet, apeirian democritum ei nam, doming neglegentur ad vis.
					Ne malorum ceteros feugait quo, ius ea liber offendit placerat, est habemus aliquyam legendos id.
				</div>
			</div>
		</div>
		<div class="lowerbar">
			<div class="lowerbar-wrap">
				<h2>Test 3</h2>
				<div class="lb-content">
					Ea eam labores imperdiet, apeirian democritum ei nam, doming neglegentur ad vis.
					Ne malorum ceteros feugait quo, ius ea liber offendit placerat, est habemus aliquyam legendos id.
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>
<?php $this->load->view('base/footer'); ?>