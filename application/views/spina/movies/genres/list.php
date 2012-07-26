<div class="box">
	<div class="box-header">
		<h1><?=_('movie genres list')?></h1>
	</div>

	<table class="datatable">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Added by</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($movie_genres_array as $movie_genre_obj): ?>
			<tr>
				<td><?=$movie_genre_obj->id?></td>
				<td><?=$movie_genre_obj->name?></td>
				<td><?=$movie_genre_obj->user_obj->username?></td>
				<td>
					<a href="<?=site_url('movie-genres/edit').'/'.$movie_genre_obj->id?>" class="button plain">Edit</a>
					<a href="<?=site_url('movie-genres/delete').'/'.$movie_genre_obj->id?>" class="button plain">Delete</a>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>