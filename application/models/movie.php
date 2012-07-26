<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Movie extends CI_Model {
	public function getByAll($movie_id=array(), $movie_title_id=array()/* ... $movie_genres_id*/) {
		$results = R::getAll( "
			SELECT		m.id AS id,
						m.user_id,
						m.datetime_added,
						m.approved,
						m.visible,

						mt.id AS movie_title_id,
						mt.user_id_added,
						mt.title,
						mt.datetime_added,
						mt.approved,
						mt.visible
			FROM        movies m
			JOIN		movie_titles mt
			ON          mt.movie_id=m.id
			WHERE       current=1
			ORDER BY	m.datetime_added
		");



		$results = $this->convertArrayToObject($results);

		return $results;
	}
}