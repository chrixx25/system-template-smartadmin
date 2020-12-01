<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller
{
  function index()
  {
    $data = array(
      'page' => 1,
        'title' => 'Error 404',
      'css' => [
          'miscellaneous/fullcalendar/fullcalendar.bundle'
        ],
      'dev_css' => [
      ],
      'js' => [
          'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'
          , 'dependency/moment/moment'
          , 'miscellaneous/fullcalendar/fullcalendar.bundle'
      ],
      'dev_js' => [
          'home.min'
        ]
    );
    $this->template->load('base', 'vHome', $data);
  }
}
