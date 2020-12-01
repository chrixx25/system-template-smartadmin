<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

    public function index()
    {
		$this->load->view('vLogin');
	}

    // public function setSession()
    // {
	// 	$data = $this->input->post('data');
	// 	$this->session->set_userdata('isApprover', (int)$data['UserLevelID'] !== 1 || (int)$data['UserLevelID'] !== 2);
	// 	$this->session->set_userdata('break_out', $data['break_out']);
	// 	$this->session->set_userdata('userStatusId', $data['UserStatusID']);
	// 	$this->session->set_userdata('userLevelId', $data['UserLevelID']);
	// }

    public function removeSession()
    {
		$this->session->sess_destroy();
	}
}
