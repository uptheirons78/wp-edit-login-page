<?php

/**
 * Plugin Name: Edit Login Page
 * Description: Change logo and styles on default login page
 * Author:      Mauro Bono
 * License:     GNU General Public License v3 or later
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */

/**
 * Add your images (logo, background, etc...) inside /mu-plugins/assets
 * then change LOGO_FILE, BACKGROUND_FILE name and extension (if needed).
 * Update fill color hex code inside ticker.svg with your primary/main color.
 */
define('LOGO_FILE', 'la-corte-alpha.png');
define('BACKGROUND_FILE', 'la-corte-esterno.jpg');
define('TICKER_FILE', 'ticker.svg');
define('ASSETS_DIR', '/assets/');
define('LOGO', WPMU_PLUGIN_URL . ASSETS_DIR . LOGO_FILE);
define('BACKGROUND', WPMU_PLUGIN_URL . ASSETS_DIR . BACKGROUND_FILE);
define('TICKER', WPMU_PLUGIN_URL . ASSETS_DIR . TICKER_FILE);

/**
 * Edit styles as needed inside mb_login_style
 */
function mb_login_style()
{ ?>
  <style type="text/css">
    /* Background styles */
    .login {
      min-height: 100%;
      background: linear-gradient(0deg, rgba(0, 0, 0, 0.93), rgba(0, 0, 0, 0.93)), url("<?php echo BACKGROUND; ?>");
      background-size: cover;
    }
    /* Logo styles: change logo width and height as needed */
    #login h1 a,
    .login h1 a {
      background-image: url("<?php echo LOGO; ?>");
      width: 320px;
      height: 159px;
      background-size: 320px 159px;
      background-repeat: no-repeat;
    }
    /* Inputs styles: username, password and remember-me inputs */
    .login input[type=text]:focus,
    .login input[type=password]:focus,
    .login input[type=checkbox]:focus {
      border-color: #c11718;
      box-shadow: 0 0 0 1px #c11718;
      outline: 2px solid transparent;
    }
    /* Icon inside password input styles */
    .login .dashicons-visibility,
    .login .dashicons-hidden {
      color: #c11718;
    }
    /* Focus styles for hide password button */
    .login .button.wp-hide-pw:focus {
      border-color: #c11718 !important;
      box-shadow: 0 0 0 1px #c11718 !important;
      outline: 2px solid transparent;
    }
    /* Ticker styles for remember-me checkbox when checked */
    .login .forgetmenot input[type=checkbox]:checked::before {
      content: url("<?php echo TICKER; ?>");
    }
    /* Submit button styles */
    .login .button-primary {
      background: #c11718 !important;
      border-color: #c11718 !important;
    }
    /* Privacy Policy link styles */
    .login .privacy-policy-link {
      color: #c11718;
    }

    /* Language switcher styles: on focus */
    .login .language-switcher select:focus {
      border-color: #c11718;
      color: #c11718;
      box-shadow: 0 0 0 1px #c11718;
    }

    /* Language switcher styles: on hover */
    .login .language-switcher select:hover {
      color: #c11718;
    }

    /* Language switcher styles: submit button */
    .login .language-switcher input[type=submit] {
      color: #c11718;
      border-color: #c11718;
      background: #f6f7f7;
      vertical-align: top;
    }
  </style>
<?php }

add_action('login_enqueue_scripts', 'mb_login_style');

function my_login_logo_url()
{
  return home_url();
}
add_filter('login_headerurl', 'my_login_logo_url');
