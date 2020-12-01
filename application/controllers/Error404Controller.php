<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error404Controller extends CI_Controller
{
  function index()
  {
    $data = array(
      'page' => 1,
        'title' => 'Error 404',
      'css' => [ ],
      'js' => ['https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js']);

    $this->template->load('base', 'vError404', $data);
  }
}
