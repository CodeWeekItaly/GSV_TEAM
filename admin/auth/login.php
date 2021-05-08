<?php
if(isset($_POST['user']) && isset($_POST['pass'])){
    $u=$_POST['user'];$p=$_POST['pass'];
    $res=$conn->query("SELECT * FROM admin WHERE username='$u' AND password='$p'");
    if($res){
        $_SESSION['admin']=true;
    }else{
        echo '<script>alert("Accesso Negato");</script>';
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>Accesso Admin</title>
</head>
<body>

<div class="container">
        <div class="row justify-content-center align-items-center" style="height:100vh">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title justify-content-center">Login Admin</h5>
                        <form method="POST" autocomplete="off">
                            <div class="form-group">
                                <input type="text" placeholder="username" class="form-control" name="user">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="pass">
                            </div>
                            <button type="submit" class="btn btn-primary">Accedi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>



