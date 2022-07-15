<?php

include 'libs/load.php';

?>

<!doctype html>
<html lang="en">
<?php load_template('_head'); ?>

<body>
  <?php
    if (Session::isset('session_token')) {
        $token = Session::get('session_token');
        if (UserSession::authorize($token)) {
            ?>
  <main>
    <?php load_template('_calltoaction');
            load_template("_photogram"); ?>
  </main>
  <?php load_template('_footer');
        } else {
            ?><script>
    window.location.href =
      "<?=get_config('base_path')?>login.php"
  </script>
  <?php
        }
    } else {
        ?>
  <script>
    window.location.href =
      "<?=get_config('base_path')?>login.php"
  </script><?php
    }
    ?>
  <script
    src="<?=get_config('base_path')?>assets/dist/js/bootstrap.bundle.min.js">
  </script>


</body>

</html>