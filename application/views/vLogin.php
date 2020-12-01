<html lang="en">

<head>
    <title>Login - SYSTEM TEMPLATE</title>
    <?php $this->load->view('includes/head') ?>
    <!-- <link rel="stylesheet" media="screen, print" href="<?php echo base_url('assets/css/markdown.css') ?>"> -->

    <script>
        const baseUrl = (url = '') => `<?php echo base_url(); ?>${url}`;
        const API = (url = '') => `<?php echo API; ?>${url}`;
        const token = sessionStorage.getItem("sms_token");

        //if (token) window.location.replace(baseUrl('home'));
    </script>
</head>

<body>
    <div class="page-wrapper">
        <div class="page-inner bg-brand-gradient">
            <div class="page-content-wrapper bg-transparent m-0">
                <div class="height-10 w-100 shadow-lg px-4 bg-brand-gradient">
                    <div class="d-flex align-items-center container p-0">
                        <div class="page-logo width-mobile-auto m-0 align-items-center justify-content-center p-0 bg-transparent bg-img-none shadow-0 height-9">
                            <a href="javascript:void(0)" class="page-logo-link press-scale-down d-flex align-items-center">
                                <img src="<?php echo base_url('assets/img/logo.png') ?>" alt="SmartAdmin WebApp" aria-roledescription="logo">
                                <span class="page-logo-text mr-1">SmartAdmin WebApp</span>
                            </a>
                        </div>
                        <a href="page_register.html" class="btn-link text-white ml-auto">
                            Create Account
                        </a>
                    </div>
                </div>
                <div class="flex-1" style="background: url(<?php echo base_url('assets/img/svg/pattern-1.svg)') ?>) no-repeat center bottom fixed; background-size: cover;">
                    <div class="container py-4 py-lg-5 my-lg-5 px-4 px-sm-0">
                        <div class="row">
                            <div class="col col-md-6 col-lg-7 hidden-sm-down">
                                <h2 class="fs-xxl fw-500 mt-4 text-white">
                                    The simplest UI toolkit for developers &amp; programmers
                                    <small class="h3 fw-300 mt-3 mb-5 text-white opacity-60">
                                        Presenting you with the next level of innovative UX design and engineering. The most modular toolkit available with over 600+ layout permutations. Experience the simplicity of SmartAdmin, everywhere you go!
                                    </small>
                                </h2>
                                <a href="#" class="fs-lg fw-500 text-white opacity-70">Learn more &gt;&gt;</a>
                                <div class="d-sm-flex flex-column align-items-center justify-content-center d-md-block">
                                    <div class="px-0 py-1 mt-5 text-white fs-nano opacity-50">
                                        Find us on social media
                                    </div>
                                    <div class="d-flex flex-row opacity-70">
                                        <a href="#" class="mr-2 fs-xxl text-white">
                                            <i class="fab fa-facebook-square"></i>
                                        </a>
                                        <a href="#" class="mr-2 fs-xxl text-white">
                                            <i class="fab fa-twitter-square"></i>
                                        </a>
                                        <a href="#" class="mr-2 fs-xxl text-white">
                                            <i class="fab fa-google-plus-square"></i>
                                        </a>
                                        <a href="#" class="mr-2 fs-xxl text-white">
                                            <i class="fab fa-linkedin"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-5 col-xl-4 ml-auto">
                                <h1 class="text-white fw-300 mb-3 d-sm-block d-md-none">
                                    Secure login
                                </h1>
                                <div class="card p-4 rounded-plus bg-faded">
                                    <form id="sms-login">
                                        <div class="form-group">
                                            <label class="form-label" for="username">Username</label>
                                            <input type="text" id="username" class="form-control form-control-lg" placeholder="your id or email" required>
                                            <div class="invalid-feedback">No, you missed this one.</div>
                                            <div class="help-block">Your unique username to app</div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="password">Password</label>
                                            <input type="password" id="password" class="form-control form-control-lg" placeholder="password" required>
                                            <div class="invalid-feedback">Sorry, you missed this one.</div>
                                            <div class="help-block">Your password</div>
                                        </div>
                                        <!-- <div class="form-group text-left">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="rememberme">
                                                <label class="custom-control-label" for="rememberme"> Remember me for the next 30 days</label>
                                            </div>
                                        </div> -->
                                        <div class="row no-gutters">
                                            <div class="col-lg-12 pl-lg-1 my-2">
                                                <button id="js-login-btn" type="submit" class="btn btn-info btn-block btn-lg">login</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="position-absolute pos-bottom pos-left pos-right p-3 text-center text-white">
                            2019 © SmartAdmin by&nbsp;<a href='https://www.gotbootstrap.com' class='text-white opacity-40 fw-500' title='gotbootstrap.com' target='_blank'>gotbootstrap.com</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/dev/js/login.min.js') ?>"></script>
</body>
</html>
