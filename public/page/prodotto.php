<?php
$idprodotto=$_GET['id'];

$prodotto=$conn->query("SELECT * from prodotti WHERE id='$idprodotto'")->fetch_assoc();
?>


    <!--Visualizzazione Prodotto-->
    <div class="w-100 flex" style="height:80vh;">


        <!--Container immagine-->
        <div class="w-1/2 flex justify-center items-center " >
            <img src="<?php echo ""; ?>" alt="" class="h-64 rounded-lg shadow-2xl">
        </div>
        <!--Descrizione Prodotto-->
        <div class="w-1/2 flex flex-col items-center justify-center relative" >
            <div class="w-1/2 absolute left-0 ml-4" >

                <h2 class="font-bold text-2xl ml-2 pb-2">Pomodori</h2>
                <p class="ml-2 pb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo modi maxime exercitationem esse eos, incidunt velit laboriosam non atque? Eos harum unde repellendus voluptates quos iure voluptatibus culpa, laborum dolorem.</p>
                <p class="ml-2 pb-4">Disponibilita:20pz</p>
                <div class="flex  justify-start">
                <button type="submit" name="carello" class="bg-blue-600 hover:bg-blue-500 p-1 rounded-sm text-white ml-2">Aggiungi al carrello</button>
                    <button type="submit" name="acquista" class="bg-red-600 hover:bg-red-500 p-1 rounded-sm text-white ml-2">Acquista</button>
                </div>


            </div>
        </div>
    </div>

   