<?php
$id=$_SESSION['iduser'];
$carrello=$conn->query("SELECT lista FROM carrello WHERE id_utente='$id'");
if(isset($_GET['rimozione_prodotti'])){
    $carrello=$carrello->fetch_assoc();
    $carrello=explode(";",$carrello['lista']);
    $search=array_search($_GET['idprodotto'],$carrello);
    unset($carrello[$search]);
    $carrello=implode(";",$carrello);
    $res=$conn->query("UPDATE carrello SET lista='$carrello' WHERE id_utente='$id'");
    echo "UPDATE carrello SET lista='$carrello' WHERE id_utente='$id'";
    if($res){
        //echo '<script>alert("prodotto rimosso con successo"); location.href="?page=carrello.php";</script>';
    }
}
if(isset($_POST['compra'])){
    $lista=$_POST['lista'];
    $data=date('Y-m-d');
    $res=$conn->query("INSERT INTO ordine(id,ritiro,consegna,lista,id_utente,id_corriere,conferma) VALUES('','','','$lista','$id','','$data')");
    //echo "INSERT INTO ordine(id,ritiro,consegna,lista,id_utente,id_corriere,conferma) VALUES('','','','$lista','$id','','$data')";
    $res=$conn->query("UPDATE carrello SET lista='' WHERE id_utente='$id'");
    echo '<script>alert("ordine effettuato con successo"); location.href="?page=carrello.php";</script>';
}
$tot=0;
if($carrello){
    $carrello=$carrello->fetch_assoc();
    
    $carrello=explode(";",$carrello['lista']);
    $c2=implode(";",$carrello);
    unset($carrello[count($carrello)-1]);
    $l='';
    
    foreach($carrello as $c){
        $prodotti=$conn->query("SELECT * FROM prodotti WHERE id='$c'")->fetch_assoc();
        $userprod=$conn->query("SELECT venditore.username from venditore,store,prodotti WHERE prodotti.id='$c' AND prodotti.id_store=store.id AND store.id_venditore=venditore.id ")->fetch_assoc();
        $tot+=$prodotti['prezzo'];
        $l.='<!--Prodotto-->
        <div class="flex w-1/3 h-32 ml-8 mt-8 border rounded-xl ">

            <!--Immagine-->
            <div class="w-1/3 "  >
                <img src="./assets/img/'.$userprod['username'].'/'.$prodotti['nome'].'.jpeg" alt="" class="h-32 w-full object-center object-cover rounded-tl-lg  rounded-bl-lg">
            </div>

            <!--footer-prodotto-->
            <div class="w-2/3 bg-gray-100 pt-2"> 

                <!--Descrizione-->
                <div class="ml-12 ">
                    <h2 class="font-bold" >'.$prodotti['nome'].'</h2>
                    <p>'.$prodotti['prezzo'].'€</p>
                </div>
                <!--BtnRimuovi-->
                <div class=" ml-10"> 
                    <form  method="get">
                    <input type="hidden" name="page" value="carrello.php">
                        <input type="hidden" name="idprodotto" value="'.$prodotti['id'].'">
                        <button type="submit" name="rimozione_prodotti" class="w-48  text-white  mt-2 ml-2 bg-red-600 hover:bg-red-500">Rimuovi Prodotto</button>
                    </form>
                </div>
            </div>

        </div>';
    }
}else{
    $l="<h1>Carrello Vuoto</h1>";
}
?>
    <!--Carrello-->

    <div style="height: 72.4vh;" style="border: solid 1px green;">

        <h2 class="font-bold text-2xl ml-8 mt-8">Lista Carrello </h2>

        <!--Section Prodotto-->
        <div  class="overflow-y-scroll" style="height: 60vh;" style="border: solid 3px red;">

            

            <?php echo '<h2 class="font-bold text-2xl ml-8 mt-8">'.$l.'</h2>'; ?>

        </div>

        <h2 class="font-bold ml-8 mt-4 text-xl">Totale Carrello : <?php echo $tot; ?>€</h2>
        <?php
            if(!$carrello[0]=""){
                //var_dump($c2);
                echo '<form method="post">
                <input type="hidden" name="lista" value="'.$c2.'">
                <button type="submit" name="compra" class="w-48  text-white  mt-2 ml-2 bg-green-600 hover:bg-red-500">acquista prodotti</button>
            </form>';
            }
        ?>
        

    </div>




   