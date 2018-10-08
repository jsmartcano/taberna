<?php
 //var_dump($data);
?>

<script type="text/javascript" src="./includes/md5.js"></script>


<script type="text/javascript">
<!--
function pwd_handler(form)
{
        if (form.password.value != '')
        {
            form.md5password.value = md5(form.password.value);
            form.password.value = '';
        }
}
//-->
</script>

<div id="app-login-form" class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Entrar a la app Taberna!</h5>
            <form class="form-signin" method="post" onsubmit="pwd_handler(this);" action="index.php?c=login&a=login">
              <div class="form-label-group">
                <input type="text" id="login" name="login" class="form-control" placeholder="Usuarie" required autofocus>
                <label for="login">Usuarie</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                <label for="password">Password</label>
              </div>

                <input type="hidden" name="md5password" value="" />
               <label id="login-err"><?php echo (isset($data['login-err']) ? $data['login-err'] : ''); ?></label>
             
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Entrar</button>
           
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

