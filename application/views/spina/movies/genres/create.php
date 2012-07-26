<div class="box">
	<div class="box-header">
		<h1>Create new genre</h1>
	</div>

	<div class="box-content">
		<?php echo form_open(); ?>

			<div class="column-left">
				<p>
					<?php echo form_input(array('id' => 'name', 'name' => 'name', 'placeholder' => ucfirst(_('genre name')), 'class' => '{validate:{required:true,minlength:5}}'));?>
				</p>
				<p class="warning">
					<?=ucfirst(_('warning'))?>: <?=_('minimum length')?> <?php printf(ngettext('%d char', '%d chars', $genre_name_min_length), $genre_name_min_length)?>.
				</p>
			</div>
			<div class="column-right">
				<div class="column-left">
					<p>
						<input type="checkbox" name="option1" id="option1" />
						<label for="option1">This is an option</label>
					</p>
					<p>
						<input type="checkbox" name="option1" id="option2" />
						<label for="option2">Another option</label>
					</p>
				</div>
				<div class="column-left">
					<p>
						<input type="checkbox" name="option3" id="option3" />
						<label for="option3">This is an option</label>
					</p>
					<p>
						<input type="checkbox" name="option4" id="option4" />
						<label for="option4">Another option</label>
					</p>
				</div>
			</div>
			<div class="clear"></div>
			<div class="action_bar">
				<?php echo form_submit(array('value' => _('create'), 'class' => 'button blue'));?>
				<a href="<?=site_url('movie_genres/list_action')?>" class="button">Cancel</a>
			</div>
		<?php echo form_close(); ?>
	</div>
</div>