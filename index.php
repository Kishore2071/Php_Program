<?php

include 'libs/load.php';

?>

<!doctype html>
<html lang="en">
<? load_template('_head'); ?>

<body>
    <?
    Session::start();
    if (Session::isset('session_token')){
      $token = Session::get('session_token');
      if (UserSession::authorize($token)){
          ?>
          <main>
            <? load_template('_calltoaction');
            load_template("_photogram");?>
          </main>
        <? load_template('_footer');

      }
      else{
        ?><script>window.location.href = "<?=get_config('base_path')?>login.php"</script><?
        
      }
    }else{
      ?><script>window.location.href = "<?=get_config('base_path')?>login.php"</script><?   
    }
    ?>
    <script src="<?=get_config('base_path')?>assets/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>