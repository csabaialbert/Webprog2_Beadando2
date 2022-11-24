<?php
if (str_contains(__FILE__, 'feladat')) {
	//alkalmazás gyökér könyvtára a szerveren
	//URL cím az alkalmazás gyökeréhez
	define('SERVER_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/feladat/WP2_T2/');
	define('SITE_ROOT', 'http://localhost/feladat/WP2_T2/');
} else {
	//alkalmazás gyökér könyvtára a szerveren
	//URL cím az alkalmazás gyökeréhez
	define('SERVER_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/WP2_T2/');
	define('SITE_ROOT', 'http://localhost/WP2_T2/');
}
// a router.php vezérlő betöltése
require_once(SERVER_ROOT . 'controllers/' . 'router.php');

?>