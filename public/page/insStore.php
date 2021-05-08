<?php
$localita=$conn->query("SELECT * FROM Localita")->fetch_all();
$i=0;
if($localita){
   $l='';
   $l2='';

   for($i=0;$i<count($localita);$i++){
       $n=$localita[$i][1];
       $r=$localita[$i][2];
       $i2=$i+1;
       $l.="<option value='$i2'>$n</option>";
       $l2.="<option value='$i2'>$r</option>";
       
   }
}
if(isset($_POST['nome_store']) && isset($_POST['regione']) && isset($_POST['citta']) && isset($_POST['indirizzo_store']) && isset($_POST['descrizione'])){
    $n=$_POST['nome_store'];$r=$_POST['regione'];$i=$_POST['indirizzo_store'];$id=$_SESSION['idprod'];$desc=$_POST['descrizione'];
    //echo "INSERT INTO store(id,nome,descrizione,id_venditore,id_localita,indirizzo) VALUES('','$n','$desc','$id','$r','$i'";
    $res=$conn->query("INSERT INTO store(id,nome,descrizione,id_venditore,id_localita,indirizzo) VALUES('','$n','$desc','$id','$r','$i')");
    echo '<script>alert("Registrazione store effettuata"); location.href="?page=Vis.php";</script>';
}
?>

    <!--Register Store-->
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-md w-full space-y-8">
    <div>
      <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
        Registra il tuo Store
      </h2>
    </div>
    <!--Form-->
    <form class="mt-8 space-y-6" action="#" method="POST">

      <div class="rounded-md shadow-sm -space-y-px">
        <!--Nome Store-->
        <div>
          <label for="nome_store" class="sr-only">Nome Store</label>
          <input id="nome_store" name="nome_store" type="text" autocomplete="none" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Nome Store ">
        </div>
        <!--Citta Store-->
        <div>
           regione: <select name="regione" id="">
                    <?php echo $l2; ?>
           </select>
        </div>
        <!--Regione Store-->
        <div>
           citta: <select name="citta" id="">
           <?php echo $l; ?>
           </select>
        </div>
        <!--Indirizzo Store-->
        <div>
          <label for="indirizzo_store" class="sr-only">Indirizzo Store</label>
          <input id="indirizzo_store" name="indirizzo_store" type="text" autocomplete="none" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Indirizzo Store ">
        </div>
        <div>
          <label for="descrizione" class="sr-only">Indirizzo Store</label>
          <input id="descrizione" name="descrizione" type="text" autocomplete="none" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="descrizione ">
        </div>
      </div>
      <div>
        <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" name="register_store">
          <span class="absolute left-0 inset-y-0 flex items-center pl-3">
            
          </span>
          Registra Store
        </button>
      </div>
    </form>
  </div>
</div>



  