<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OfflineController extends CI_Controller {

  public function index() {
		$data = array(
			'page' => 0,
			'title' => 'Offline',
			'css' => [
				'base.min',
				'offline.min'
			],
			'js' => ['all-5.11.2.min']
		);
		// $this->load->view('vDashboard');
		$this->template->load('base', 'vOffline', $data);
	}
}
