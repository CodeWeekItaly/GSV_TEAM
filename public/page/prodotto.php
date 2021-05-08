<?php
$idprodotto=$_GET['id'];
$userprod=$_GET['userprod'];
$iduser=isset($_SESSION['iduser'])?$_SESSION['iduser']:'';
$prodotto=$conn->query("SELECT * from prodotti WHERE id='$idprodotto'")->fetch_assoc();

if(isset($_POST['carello'])){
    $cart=$conn->query("SELECT lista FROM carrello WHERE id_utente='$iduser'")->fetch_assoc();
    $cart=$cart['lista']==''?$_POST['idprodotto'].";":$cart['lista'].";".$_POST['idprodotto'].";";
    $res=$conn->query("UPDATE carrello SET lista='$cart' where id_utente='$iduser'");
    if($res){
        echo '<script>alert("prodotto inserito con successo"); location.href="?page=carrello.php";</script>';
    }
}
?>


    <!--Visualizzazione Prodotto-->
    <div class="w-100 flex" style="height:80vh;">


        <!--Container immagine-->
        <div class="w-1/2 flex justify-center items-center " >
            <img src="<?php echo "./assets/img/".$userprod."/".$prodotto['nome'].".jpeg"; ?>" alt="" class="h-64 rounded-lg shadow-2xl">
        </div>
        <!--Descrizione Prodotto-->
        <div class="w-1/2 flex flex-col items-center justify-center relative" >
            <div class="w-1/2 absolute left-0 ml-4" >

                <h2 class="font-bold text-2xl ml-2 pb-2"><?php echo $prodotto['nome'];  ?></h2>
                <p class="ml-2 pb-4"><?php echo $prodotto['descrizione'];  ?></p>
                <p class="ml-2 pb-4">prezzo: <?php echo $prodotto['prezzo'];  ?> euro</p>
                <p class="ml-2 pb-4">Disponibilita: <?php echo $prodotto['qta'];  ?>pz</p>
                <div class="flex  justify-start">
                <?php
                    if($iduser==''){
                        echo 'effettua l\'accesso</div>';
                    }else{
                        echo '<form  method="post">
                        <input type="hidden" name="idprodotto" value="'.$prodotto['id'].'">
                        <button type="submit" name="carello" class="bg-blue-600 hover:bg-blue-500 p-1 rounded-sm text-white ml-2">Aggiungi al carrello</button>
                        <button type="submit" name="acquista" class="bg-red-600 hover:bg-red-500 p-1 rounded-sm text-white ml-2">Acquista</button>
                        </div>
                        </form>';
                    }
                ?>
                


            </div>
        </div>
    </div>

   