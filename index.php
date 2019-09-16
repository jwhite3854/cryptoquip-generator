<?php

$base_url = 'http://cheezoid.com/toys/chcrypto';
$meta_title = 'Cheezoid::Crypto';
$meta_canonical_url = '';
$meta_site_name = 'Cheezoid::Crypto';

$view_file = __DIR__.'/app/views/index.php';

?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8" />
    <title><?php echo $meta_title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="canonical" href="<?php echo $meta_canonical_url ?>" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="<?php echo $meta_site_name ?>" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <meta name="google-signin-scope" content="profile email">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-client_id" content="684383920757-oa8n5tpuqrtn25bprmive8e0p7oon1gf.apps.googleusercontent.com">
    <link rel='stylesheet' id='primary_style'  href='<?php echo $base_url ?>/assets/style.css?ver=1.0.0' type='text/css' media='all' />
    <link rel="icon" href="<?php echo $base_url ?>/assets/favicon.ico" />
</head>
<body>
    <div class="site-wrapper">
        <div class="site-wrapper-inner">
            <div class="cover-container">
                <div class="masthead clearfix">
                    <div class="inner">
                        <h3 class="masthead-brand"><?php echo $meta_site_name ?></h3>
                    </div>
                </div>
                <div class="inner cover">
                    <?php include($view_file) ?>
                </div>
            </div>
        </div>
    </div>

	<div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
    <div id="sign_out_wrapper"></div>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script src="<?php echo $base_url ?>/assets/script.js"></script>
    <script>
      function onSignIn(googleUser) {
        var profile = googleUser.getBasicProfile();
        var profile_id = profile.getId();
      };
    </script>
</body>
</html>