<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  class Template
  {
    // var $ci;
    function __construct()
    {
      $this->ci =& get_instance();
    }

    function load($tpl_view, $body = null, $data = null)
    {
      if ( ! is_null( $body ) )
      {
        if ( file_exists( APPPATH.'views/'.$tpl_view.'/'.$body ) ) {
          $body_path = $tpl_view.'/'.$body;
        }
        else if ( file_exists( APPPATH.'views/'.$tpl_view.'/'.$body.'.php' ) ) {
          $body_path = $tpl_view.'/'.$body.'.php';
        }
        else if ( file_exists( APPPATH.'views/'.$body ) ) {
          $body_path = $body;
        }
        else if ( file_exists( APPPATH.'views/'.$body.'.php' ) ) {
          $body_path = $body.'.php';
        }
        else
        {
          show_error('Unable to load the requested file: ' . $tpl_name.'/'.$view_name.'.php');
        }

        $body = $this->ci->load->view($body_path, $data, TRUE);

        if ( is_null($data) ) {
          $data = array('body' => $body);
        }
        else if ( is_array($data) ) {
          $data['body'] = $body;
        }
        else if ( is_object($data) ) {
          $data->body = $body;
        }
      }

      $this->ci->load->view('templates/'.$tpl_view, $data);
    }
  }
