<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Reverse routing
 *
 * Based on DrF Reverse Routing (http://drfloob.com/)
 * @author  Matt Alexander
 * @link    http://mattalexander.me
 */

// ------------------------------------------------------------------------

/**
 * App Config Class
 *
 */
class MY_Config extends CI_Config {

	/**
	 * Site URL
	 *
	 * @access    public
	 * @param    string or array    the URI
	 * @return    string
	 */
	function site_url($uri = '')
	{
		// Clean up $uri
		if (is_array($uri)) {
			$uri = implode('/', $uri);
		}
		$uri = trim($uri, '/');

		// Loop through routes to check for back-references
		$routes = $this->reverse_routes();
		foreach ($routes as $route) {
			if (preg_match($route['uri_pattern'], $uri)) {
				$rewritten_uri = preg_replace($route['uri_pattern'], $route['rewritten'], $uri);
				return parent::site_url($rewritten_uri);
			}
		}

		// Nothing found
		return parent::site_url($uri);
	}

	/**
	 * Retrieve reverse routes
	 *
	 * @access    public
	 * @return    array
	 */
	function reverse_routes()
	{
		// Cache routes
		static $routes;
		if (!is_null($routes)) {
			return $routes;
		}

		// Get config routes
		$config_routes =& load_class('Router')->routes;
		unset($config_routes['default_controller'], $config_routes['scaffolding_trigger']);

		// Loop through routes to check for back-references
		$routes = array();
		foreach ($config_routes as $route_pattern => $route_destination) {

			// Every non-literal piece of regex needs to be within a backreference because the
			// parentheses themselves are used to find the regex parts.
			// So just add it straight to the array for literal matching.
			if (preg_match('/[^\(][.+?{\:]/', $route_pattern)
				|| strpos($route_pattern, '(') === FALSE
				|| strpos($route_destination, '$') === FALSE
			) {
				$routes[] = array(
					'uri_pattern' => '#^'.$route_destination.'$#',
					'rewritten' => $route_pattern,
				);
				continue;
			}

			$route_pattern = str_replace(array(':any', ':num'), array('.+?', '[0-9]+'), $route_pattern);

			// Find all back-references in route pattern
			preg_match_all('/(\(.+?\))/', $route_pattern, $matches);
			$route_pattern_backreferences = array();
			foreach ($matches[1] as $i => $match) {
				$n = $i + 1;
				$route_pattern_backreferences[$n] = $match;
			}

			// Find all references in route destination
			// Also, create an array that keeps the order of references
			preg_match_all('/\$(\d+?)/', $route_destination, $matches);
			$route_destination_references = array();
			$reference_order = array();
			foreach ($matches[1] as $n) {
				$route_destination_references[$n] = '$'.$n;
				$reference_order[] = $n;
			}
			asort($route_destination_references);

			// Create a rewritten URL for use as the second paramater of preg_replace
			$rewritten = $route_pattern;
			foreach ($reference_order as $n) {
				$rewritten = preg_replace('/(\(.+?\))/', '\\'.$route_destination_references[$n], $rewritten, 1);
			}

			$uri_pattern = $route_destination;
			foreach ($route_destination_references as $n => $reference) {
				if (isset($route_pattern_backreferences[$n])) {
					$uri_pattern = str_replace($reference, $route_pattern_backreferences[$n], $uri_pattern);
				}
			}
			$uri_pattern = '#^'.$uri_pattern.'$#';

			$routes[] = array(
				'uri_pattern' => $uri_pattern,
				'rewritten' => $rewritten,
			);
		}
		return $routes;
	}

}