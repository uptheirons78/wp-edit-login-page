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
    /* Admin CSS Variables */
    :root {
      --mb-login-clr-primary: #c11718;
      --mb-login-clr-primary-clearer: rgba(193, 23, 24, .8);
    }

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

    /* A tag focus */
    .login a:focus {
      box-shadow: 0 0 0 1px var(--mb-login-clr-primary), 0 0 2px 1px var(--mb-login-clr-primary-clearer) !important;
    }

    /* Button and Button Primary focus */
    .login .button-primary:focus,
    .login .button:focus {
      box-shadow: 0 0 0 1px #fff, 0 0 0 3px var(--mb-login-clr-primary) !important;
    }

    /* Inputs styles: username, password and remember-me inputs */
    .login input[type=text]:focus,
    .login input[type=password]:focus,
    .login input[type=checkbox]:focus {
      border-color: var(--mb-login-clr-primary);
      box-shadow: 0 0 0 1px var(--mb-login-clr-primary);
      outline: 2px solid transparent;
    }

    /* Icon inside password input styles */
    .login .dashicons-visibility,
    .login .dashicons-hidden {
      color: var(--mb-login-clr-primary);
    }

    /* Focus styles for hide password button */
    .login .button.wp-hide-pw:focus {
      border-color: var(--mb-login-clr-primary) !important;
      box-shadow: 0 0 0 1px var(--mb-login-clr-primary) !important;
      outline: 2px solid transparent;
    }

    /* Ticker styles for remember-me checkbox when checked */
    .login .forgetmenot input[type=checkbox]:checked::before {
      content: url("<?php echo TICKER; ?>");
    }

    /* #nav and #backtoblog link styles on hover */
    .login #nav a:hover,
    .login #nav a:focus,
    .login #backtoblog a:hover,
    .login #backtoblog a:focus {
      color: var(--mb-login-clr-primary) !important;
      box-shadow: 0 0 0 1px var(--mb-login-clr-primary), 0 0 2px 1px var(--mb-login-clr-primary-clearer) !important;
    }

    /* Submit button styles */
    .login .button-primary {
      background: var(--mb-login-clr-primary) !important;
      border-color: var(--mb-login-clr-primary) !important;
    }

    /* Privacy Policy link styles */
    .login .privacy-policy-link {
      color: var(--mb-login-clr-primary);
    }

    /* Language switcher styles: on focus */
    .login .language-switcher select:focus {
      border-color: var(--mb-login-clr-primary);
      color: var(--mb-login-clr-primary);
      box-shadow: 0 0 0 1px var(--mb-login-clr-primary);
    }

    /* Language switcher styles: on hover */
    .login .language-switcher select:hover {
      color: var(--mb-login-clr-primary);
    }

    /* Language switcher styles: on focus */
    .login .language-switcher select:focus {
      border-color: var(--mb-login-clr-primary) !important;
      color: var(--mb-login-clr-primary) !important;
      box-shadow: 0 0 0 1px var(--mb-login-clr-primary) !important;
    }

    /* Reset Firefox inner outline that appears on :focus. */
    /* This ruleset overrides the color change on :focus thus needs to be after select:focus. */
    .login .language-switcher select:-moz-focusring {
      text-shadow: 0 0 0 var(--mb-login-clr-primary) !important;
    }

    /* Remove background focus style from IE11 while keeping focus style available on option elements. */
    .login .language-switcher select:hover::-ms-value {
      color: var(--mb-login-clr-primary) !important;
    }

    .login .language-switcher select:focus::-ms-value {
      color: var(--mb-login-clr-primary) !important;
    }

    /* Language switcher styles: submit button */
    .login .language-switcher input[type=submit] {
      color: var(--mb-login-clr-primary);
      border-color: var(--mb-login-clr-primary);
      background: #f6f7f7;
      vertical-align: top;
    }

    /* Loged out message styles */
    .login .message {
      border-left: 4px solid var(--mb-login-clr-primary) !important;
    }
  </style>
<?php }

add_action('login_enqueue_scripts', 'mb_login_style');

function my_login_logo_url()
{
  return home_url();
}
add_filter('login_headerurl', 'my_login_logo_url');
