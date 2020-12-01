<!DOCTYPE html>
<html lang="en">
   <head>
      <title>SYSTEM TEMPLATE<?php echo ENV == 'dev' ? ' DEV' : '' ?> | <?php echo $title ? $title :'No title' ?></title>
      <?php $this->load->view('includes/head') ?>

      <script>
         const baseUrl = (url = '') => `<?php echo base_url(); ?>${url}`;
         const API = (url = '') => `<?php echo API; ?>${url}`;
         const token = sessionStorage.getItem('sms_token');

         console.log({token});
         //if (!token) window.location.replace(baseUrl('login'));

         let user_id;
         let employee_name;
      </script>

      <link rel="stylesheet" media="screen, print" href="<?php echo base_url('css/common.min.css') ?>">
      <link id="myskin" rel="stylesheet" media="screen, print" href="assets/css/skins/skin-master.css">
      <?php
         if( isset($css) and count($css) > 0 )
         {
            foreach ($css as $c)
            {
               $src = strpos($c, 'https') > -1 ? $c : base_url('assets/css/'.$c.'.css');
               echo '<link rel="stylesheet" href="'.$src.'">';
            }
         }

         if( isset($dev_css) and count($dev_css) > 0 )
         {
            foreach ($dev_css as $c)
            {
               $src = strpos($c, 'https') > -1 ? $c : base_url('css/'.$c.'.css');
               echo '<link rel="stylesheet" href="'.$src.'">';
            }
         }
      ?>
   </head>
   <body class="mod-bg-1 ">

      <div class="page-wrapper">
         <div class="page-inner">
            <?php $this->load->view('includes/nav') ?>
            <div class="page-content-wrapper">
               <?php echo $body; ?>
            </div>
         </div>
      </div>

      <?php $this->load->view('includes/script-settings') ?>

      <?php $this->load->view('includes/shortcut-menu') ?>

      <?php $this->load->view('includes/messenger') ?>

      <?php $this->load->view('includes/settings') ?>

      <?php $this->load->view('includes/js-color-profile') ?>

      <!-- <script src="<?php //echo base_url('assets/js/checkToken.min.js') ?>"></script> -->
      <?php
         if( isset($js) and count($js) > 0 )
         {
            foreach ($js as $j)
            {
               $src = strpos($j, 'https') > -1 ? $j : base_url('assets/js/'.$j.'.js');
               echo '<script src="'.$src.'"></script>';
            }
         }

         if( isset($dev_js) and count($dev_js) > 0 )
         {
            foreach ($dev_js as $j)
            {
               $src = strpos($j, 'https') > -1 ? $j : base_url('assets-dev/js/'.$j.'.js');
               echo '<script src="'.$src.'"></script>';
            }
         }
      ?>
      <script src="<?php echo base_url('assets/js/vendors.bundle.js') ?>"></script>
      <script src="<?php echo base_url('assets/js/app.bundle.js') ?>"></script>
   </body>
</html>
