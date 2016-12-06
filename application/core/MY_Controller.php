<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public static $salt = "AyvbG4dKhxnRmLrwMnVTcpFNjgqzTcgw";

	public function __construct() {

		parent::__construct();

		define('CSS_PATH',    base_url() . 'assets/layout/css/');
		define('JS_PATH',     base_url() . 'assets/addons/js/');
		define('IMG_PATH',    base_url() . 'assets/layout/images/');
		define('SYSTEM_PATH', base_url() . 'index.php/');

	}

}