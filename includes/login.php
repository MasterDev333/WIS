<?php
function my_login_logo() { ?>
  <style type="text/css">
  #login h1 a, .login h1 a {
    background-image: url(<?= get_template_directory_uri(); ?>/assets/img/logo-main.png);
    height:auto;
    width:320px;
    background-size: contain;
    background-repeat: no-repeat;
    padding-bottom: 50px;
  }
  body.login {
    background-color: #E5E5E5 !important;
  }

  body.login form {
    background: #fff;
    border: 2px solid #000;
    box-shadow: 0 5px 30px 0 rgba(255, 255, 255, 0.17);
  }

  body.login form label {
    color: #000;
  }

  body.login form input[type="text"],
  body.login form input[type="password"] {
    background: #fff !important;
    border: 1px solid #ccc!important;
    border-radius: 0px;
    color: #000;
    font-size: 16px;
  }

  body.login form input[type="text"]:focus,
  body.login form input[type="password"]:focus {
    box-shadow: none!important;
    border: 1px solid #ccc!important;
  }
  body.login form input[type="submit"] {
    margin-top: 15px;
    float:none;
    width: 100%;
    background: #3d3d4b !important;
    border: none;
    transition: all 0.4s ease !important;
    text-shadow: none !important;
    box-shadow: none !important;
    border-radius: 25px !important;
  }

  body.login form input[type="submit"]:hover {
    background: #000 !important;
    text-shadow: none !important;
  }

  .login #backtoblog a, .login #nav a {
    color: #3d3d4b !important;
    transition: color 0.4s ease;
  }

  .login #backtoblog a:hover, .login #nav a:hover, .login h1 a:hover {
    color: #000 !important;
  }
  .login form .forgetmenot{
      float: none!important;
  }
  .login .button.wp-hide-pw .dashicons{
      color: #fff;
  }
  .login .button.wp-hide-pw:focus{
    box-shadow: none!important;
    outline: none!important;
    border-color: transparent!important;
  }
  </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );