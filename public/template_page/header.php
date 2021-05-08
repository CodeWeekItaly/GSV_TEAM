<?php
    
if(isset($_SESSION['iduser'])){
    $id=$_SESSION['iduser'];
 $user=$conn->query("SELECT * from utente WHERE id='$id'")->fetch_assoc();
}

if(isset($_SESSION['idprod'])){
    $id=$_SESSION['idprod'];
 $prod=$conn->query("SELECT * from venditore WHERE id='$id'")->fetch_assoc();
 $_SESSION['userprod']=$prod['username'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--FontAwesome-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!--TailwindCSS-->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <title>GSV</title>
</head>
<body>
    
    <nav class="w-100 bg-blue-600 flex relative h-20 items-center shadow"> 

        <!--Logo-->
        <div class="w-1/3  flex items-center text-white">
            <i class="fas fa-store pl-4 text-2xl"></i>
            <a href="?page=home.php"><h2 class="pl-2">GSV commerce</h2></a>
        </div>
        <!--Carrello-->
        <?php 
            if(isset($user)){
                echo '<a href="?page=carrello.php"<div class="w-1/3  text-center"> 
                <i class="fas fa-shopping-basket text-white text-2xl"></i>
            </div></a>';
            }
        ?>
        

        <!--Menu-->
        <div class="w-1/3 ">

            <!--Menu icon-->
            <div class="text-right">
                <i class="menu-icon fas fa-bars text-white pr-8 text-2xl cursor-pointer"></i>
            </div>

            <!--Menu-list-->
            <ul class="menu-list hidden z-10 absolute bg-white w-1/4 right-0 shadow p-4 top-0" style="top: 5rem;">
                <!--Account-->
                <?php if(isset($user) OR isset($prod)){
                    $nome=isset($prod)?$prod['nome']." ".$prod['cognome']:$user['nome']." ".$user['cognome'];
                    echo '<div class="flex items-center pb-2">
                    <i class="fas fa-user-circle text-2xl"></i>
                    <p class="pl-2">'.$nome.'</p>
                </div>';
                if(isset($user)){
                    echo '
                    <li><a href="?page=carrello.php">Carrello</a></li>
                    <li><a href="?page=acq.php">Acquisti</a></li>
                    <li><a href="?page=imp.php">Impostazioni</a></li>
                    <li><a href="?page=logout.php">Logout</a></li>';
                }else{
                    echo '
                    <li><a href="?page=insStore.php">Gestisci store</a></li>
                    <li><a href="?page=insCateg.php">aggiungi categoria</a></li>
                    <li><a href="?page=InsProd.php">gestisci prodotti</a></li>
                    <li><a href="?page=logout.php">Logout</a></li>';
                }
                }else{
                   echo  '<li><a href="?page=scelta.php">accedi</a></li>';
                }  ?>
                
                <hr>
                <!--List-->
                <li><a href="?page=home.php">Lista Store</a></li>

                
            </ul>
        </div>
    
    </nav>
    <!--JQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!--Menu.js-->
    <script >
    $(document).ready(function(){
    $(".menu-icon").click(function(){
      $(".menu-list").toggle();
    });
  });
    </script>
   