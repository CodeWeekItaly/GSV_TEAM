<?php
$store=$conn->query("SELECT * FROM store");

?>


<div>
        <h2 class="text-2xl py-4 px-4">Store Disponibili</h2>

        <!--Section Negozi-->
        <div class="w-100 clearfix p-4">


            <!--Container card-->
            <div class="w-full w-1/3 float-left flex justify-center pb-3"  > 
            <?php
                if($store){
                    $store=$store->fetch_all();
                    //var_dump($store);
                    $img=1;
                    foreach($store as $s){
                        $valutazione=$conn->query("SELECT AVG(valutazione) as 'media' from recensione where id_store='$s[0]'")->fetch_assoc();
                        echo '<!--Card-->
                        <div class="w-1/3  m-2 shadow-xl" >
                        
                            <!--Immagine-->
                            <div class="w-100 h-64 rounded-t-lg" >
                                <img src="assets/img/store/'.$img.'.jpg" alt="img" class="h-64 object-cover object-center rounded-t-lg" style="width: 100%;">
                            </div>
                            <!--Descrizione-->
                            <div class="p-4">
                                <h2>'.$s[1].'</h2>
                                <p>'.substr($s[2],0,70).'....</p>
                                <p>Valutazione: '.trim($valutazione['media'],'.0').'/5</p>
                            </div>
                            <!--Btn Visita-->
                            <div class="p-4">
                              <a href="?page=magazzino.php&id='.$s[0].'"><button class="p-2 bg-blue-600 w-24 text-white">Visita</button></a>  
                            </div>
                        </div>
                        <br>';
                        $img++;
                    }
                }
                ?>
                
            </div>
        </div>

    </div>