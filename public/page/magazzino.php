
<?php

$idstore=$_GET['id'];
$userprod=$conn->query("SELECT venditore.username FROM venditore,store WHERE venditore.id=store.id_venditore AND store.id='$idstore'")->fetch_assoc();
$prodotti=$conn->query("SELECT *
FROM  Prodotti
WHERE id_store = '$idstore' ")->fetch_all();
$l;
if($prodotti){
    $l='';
    var_dump($prodotti);
    for($i=0;$i<count($prodotti);$i++){
        $l.='<div class="w-9/12  shadow-xl">
        <!--Immagine-->
        <div class="w-100 h-64 rounded-t-lg" >
            <img src="./assets/img/'.$userprod['username'].'/'.$prodotti[$i][1].'.jpeg" alt="img" class="h-64 object-cover object-center rounded-t-lg" style="width: 100%;">
        </div>
        <!--Descrizione-->
        <div class="p-4">
            <h2>'.$prodotti[$i][1].'</h2>
            <p>'.$prodotti[$i][2].'</p>
            <p>Prezzo: '.$prodotti[$i][3].'</p>
            <p>dispondibilita: '.$prodotti[$i][4].'</p>
        </div>
        <!--Btn Visita-->
        <div class="p-4">
          <a href=".?page=prodotto.php&id='.$prodotti[$i][0].'&userprod='.$userprod['username'].'"><button class="p-2 bg-blue-600 w-24 text-white">Visita</button></a>  
        </div>
    </div>';
    }
}

?>

<div class="flex items-center" style="height:100vh;">
        
        <!--SideBar-->
        <nav class="w-1/4 " style="height:100vh;border:solid 1px red ">

            <h2 class="text-2xl"> Filtri:</h2>
            <!--Prezzo-->
            <div>
                <!--Form-->
                <form action="" method="get">
                    <!--Prezzo Crescente-->
                    <div class="flex items-center">
                        <p class="pr-2">Prezzo Crescente</p>
                        <input type="checkbox" name="crescente">
                    </div>
                    <!--Prezzo Decrescente-->
                    <div class="flex items-center">
                        <p class="pr-2">Prezzo Decrescente</p>
                        <input type="checkbox" name="decrescente">
                    </div>
                    <!--Inserimento Prezzo-->
                    <div class="flex items-center">
                        <p class="pr-2">Prezzo:</p>
                        <input type="text" style="border:solid 1px black" name="prezzo_ricerca">
                    </div>
                    <!--Select-->
                    <div class="flex">
                        <p>Categoria</p>
                        <select name="categoria" id="">
                            <!--Login-->
                        </select>
                    </div>
                </form>

            </div>
        </nav>

        <!--Main Prodotti-->
        <div class="w-9/12 overflow-y-scroll clearfix " style="height: 100vh;border:solid 1px green">

            <h2 class="text-2xl px-2 py-2">Prodotti:</h2>

                    <!--Container card-->
                    <div class=" w-1/2 float-left flex justify-center pb-3 pt-3"  > 

                        <!--Card-->
                        <?php 
                            if(isset($l)){
                                echo $l;
                            }else{
                                echo '<h1>nessun prodotto presente</h1>';
                            }
                        ?>
                    </div>
        </div>

                    


        </div>