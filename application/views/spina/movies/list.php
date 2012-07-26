<div class="quick-actions">
	<a href="#quickpost" class="modal">
		<span class="glyph new"></span>
		Quick create wizard
	</a>
</div>

<div class="box">
	<div class="box-header">
		<h1><?=_('movie list')?></h1>
	</div>

	<table class="datatable">
		<thead>
			<tr>
				<th>ID</th>
				<th><?=ucfirst(_('title'))?></th>
				<th><?=ucfirst(_('year'))?></th>
				<th><?=ucfirst(_('genres'))?></th>
				<th><?=ucfirst(_('date added'))?></th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php if (!empty($movie_list)): ?>
			<?php foreach($movie_list as $movie_obj): ?>
			<tr>
				<td><?=$movie_obj->id?></td>
				<td><?=$movie_obj->title?></td>
				<td>???</td>
				<td>??? / ??? / ???</td>
				<td><?=time_since($movie_obj->datetime_added)?></td>
				<td>
					<a href="<?=site_url('movies/edit').'/'.$movie_obj->id?>" class="button plain">Edit</a>
					<a href="<?=site_url('movies/delete').'/'.$movie_obj->id?>" class="button plain">Delete</a>
				</td>
			</tr>
			<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
	</table>
</div>

<div id="quickpost" class="box">
	<div class="box-header">
		<h1>Create Movie - Quick</h1>
		<ul class="with-fs">
			<li class="active"><a href="#step1">1. <?=_('title')?></a></li>
			<li><a href="#step2">2. <?=_('release date')?></a></li>
			<li><a href="#step3">3. <?=_('genres')?></a></li>
		</ul>
	</div>

	<div class="box-content">
		<form method="post" action="<?=site_url('movies/create')?>">
			<div class="tab-content" id="step1">
				<p><?=ucfirst(_('movie title'))?>:</p>
				<p>
					<input type="text" name="title" class="{validate: {required:true,minlength:5}}" id="title" placeholder="<?=ucfirst(_('movie title'))?>" />
				</p>
				<div class="action_bar">
					<a href="#" class="button close"><?=_('cancel')?></a>
				</div>
			</div>
			<div class="tab-content" id="step2">
				<p>
					<label for="release-date"><?=ucfirst(_('release date'))?>:</label>
				</p>
				<p>
					<input type="text" name="date" class="datepicker {validate:{required:true}}" id="release-date" placeholder="<?=ucfirst(_('click to select a date'))?>" class="{validate:{required:true}}" />
					<span class="icon calendar"></span>
				</p>
				<div class="action_bar">
					<a href="#" class="button close"><?=_('cancel')?></a>
				</div>
			</div>
			<div class="tab-content" id="step3">
				<p><?=ucfirst(_('genres select'))?>:</p>
				<div class="column-left">
					<div class="column-left">
						<p>
							<input type="checkbox" name="genres[]" id="genre1" />
							<label for="genre1">Action</label>
						</p>
						<p>
							<input type="checkbox" name="genres[]" id="genre2" />
							<label for="genre2">Comedy</label>
						</p>
						<p>
							<input type="checkbox" name="genres[]" id="genre3" />
							<label for="genre2">Fantasy</label>
						</p>
					</div>
					<div class="column-right">
						<p>
							<input type="checkbox" name="genres[]" id="genre4" />
							<label for="genre1">Action</label>
						</p>
						<p>
							<input type="checkbox" name="genres[]" id="genre5" />
							<label for="genre2">Comedy</label>
						</p>
						<p>
							<input type="checkbox" name="genres[]" id="genre6" />
							<label for="genre2">Fantasy</label>
						</p>
					</div>
				</div>
				<div class="column-right">
					<div class="column-left">
						<p>
							<input type="checkbox" name="genres[]" id="genre7" />
							<label for="genre1">Action</label>
						</p>
						<p>
							<input type="checkbox" name="genres[]" id="genre8" />
							<label for="genre2">Comedy</label>
						</p>
						<p>
							<input type="checkbox" name="genres[]" id="genre9" />
							<label for="genre2">Fantasy</label>
						</p>
					</div>
					<div class="column-right">
						<p>
							<input type="checkbox" name="genres[]" id="genre10" />
							<label for="genre1">Action</label>
						</p>
						<p>
							<input type="checkbox" name="genres[]" id="genre11" />
							<label for="genre2">Comedy</label>
						</p>
						<p>
							<input type="checkbox" name="genres[]" id="genre12" />
							<label for="genre2">Fantasy</label>
						</p>
					</div>
				</div>
				<div class="clear"></div>
				<div class="action_bar">
					<a href="#" class="button close"><?=_('cancel')?></a>
				</div>
			</div>
			<div class="tab-content" id="final-step">
				<div class="action_bar">
					<input type="submit" class="button blue" value="Post it!" />
					<a href="#" class="close button">Cancel</a>
				</div>
			</div>
		</form>
	</div>
</div>