
<!DOCTYPE html> 
<html> 
<head>
</head> 
<title>Taberna</title>

<script src="./includes/jquery-3.3.1.slim.min.js"></script>
<script src="./includes/popper.min.js"></script>

<link rel="stylesheet" href="./css/bootstrap/css/bootstrap.min.css">
<script src="./css/bootstrap/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="./css/styles.css">

<script>
    $(document).ready(function() {
        $("#btn-logout").click(function(){
            window.location.replace("index.php?c=login&a=logout");
        });
    });
</script>

<body>

<div id="app-wrapper">

<?php
     if (isset( $_SESSION['user_id']) && App::getParam('c') != 'login') {
        ?>
        <div class="section">
         <div class="container">
            <div id="header">
               
                <div class="row">
                    <div class="col-sm-4">
                         <div id="main-title" class="title">Las taberneras</div>
                    </div>
                    <div class="col-sm-4">
                        <div id="user-name" class="subtitle">Bienvenida, <?php echo $_SESSION["user_name"] ?></div>
                    </div>
                    <div class="col-sm-4">
                        <button id="btn-logout" type="button" class="btn btn-primary">Cerrar sesión</button>
                    </div>
              </div>
            </div>
            </div>
            </div>
        <?php
    }
?>