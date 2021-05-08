<?php
 $id=$_SESSION['iduser'];
 $ordini=$conn->query("SELECT conferma,lista FROM ordine where id_utente='$id'");
 if($ordini){
     $ordini=$ordini->fetch_all();
     $l='';
     $p='';
     for($i=0;$i<count($ordini);$i++){
         $lista=explode(";",$ordini[$i][1]);
         unset($lista[count($lista)-1]);
         foreach($lista as $l1){
            $prodotto=$conn->query("SELECT * FROM prodotti WHERE id='$l1'")->fetch_assoc();
            $userprod=$conn->query("SELECT venditore.username from venditore,store,prodotti WHERE prodotti.id='$l1' AND prodotti.id_store=store.id AND store.id_venditore=venditore.id ")->fetch_assoc();
            $p.='<!--Prodotto-->
            <div class="flex items-center h-20 shadow mb-4">

                <!--Immagine-->
                <div class="w-1/3 "  >
                    <img src="./assets/img/'.$userprod['username'].'/'.$prodotto['nome'].'.jpeg" alt="" class="h-20 w-full object-center object-cover rounded-tl-lg  rounded-bl-lg">
                </div>

                <!--footer-prodotto-->
                <div class="w-2/3 bg-gray-100 pt-2 h-20"> 

                    <!--Descrizione-->
                    <div class="ml-12 ">
                        <h2 class="font-bold" >'.$prodotto['nome'].'</h2>
                        <p>Prezzo: '.$prodotto['prezzo'].'€</p>
                    </div>
                </div>';
         }
         $l.='<!--Data-->
         <div>
             <p class="mb-4">Data: '.$ordini[$i][0].'</p>
         </div>
         <!--ContainerProdotto-->
         <div>
               '.$p.'  

         </div>';
     }
 }
?>

     <!--Storico Acquisti-->
    <div class="w-100 flex flex-col justify-center items-center" style="height: 78.7vh;">
        <div>
            <h2 class="font-bold text-2xl mb-4">Storico Ordini</h2>
        </div>

        <!--ContainerStorico-->
        <div class="w-1/2 p-4 border rounded-sm shadow overflow-y-scroll" style=" height:50vh">
            <!--Storico-->
            <div class="p-4" >
                    <?php echo $l; ?>
                </div>
            </div>
        </div>



    </div>



    