<?php

class Doppler_Locator {
	protected $loader;
	protected $doppler_locator;

	public function __construct() {
		$this->doppler_locator = 'doppler-locator';
		$this->load_dependencies();
		$this->define_admin_hooks();
		$this->define_public_hooks();
	}

	private function load_dependencies() {
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-loader.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-admin.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-public.php';
		$this->loader = new Doppler_Locator_Loader();
	}

	private function define_admin_hooks() {
		$plugin_admin = new Doppler_Locator_Admin($this->get_doppler_locator());
		$this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles');
		$this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts');
	}

	private function define_public_hooks() {
		$plugin_public = new Doppler_Locator_Public($this->get_doppler_locator());
		$this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_styles');
		$this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_scripts');
	}

	public function run() {
		$this->loader->run();
	}

	public function get_doppler_locator() {
		return $this->doppler_locator;
	}

	public function get_loader() {
		return $this->loader;
	}
}