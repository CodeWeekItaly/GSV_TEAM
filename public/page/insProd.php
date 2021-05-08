<?php
    $idp=$_SESSION['idprod'];
 $store=$conn->query("SELECT id,nome FROM store WHERE id_venditore='$idp'")->fetch_all();
 $u2=$_SESSION['userprod'];
 echo $u2;
 $idp=$_SESSION['idprod'];
 $i=0;
 if($store){
    $l='';
    $k='';
    var_dump($store);
    for($i=0;$i<count($store);$i++){
        $i2=$store[$i][0];
        $n=$store[$i][1];
        $categorie=$conn->query("SELECT id,nome FROM categoria WHERE id_store='".($i2-1)."'")->fetch_assoc();
        var_dump($categorie);
        if(!is_null($categorie)){
            for($j=0;$j<count($categorie);$j++){
                $n1=$categorie['id'];
                $i3=$categorie["nome"];
                $k.="<option value='$n1'>$i3</option>";
            }
        }
        var_dump($categorie);
        
        $l.="<option value='$i2'>$n</option>";

    }
}
var_dump($_POST);
if(isset($_POST['nome']) && isset($_POST['descrizione']) && isset($_POST['prezzo']) && isset($_POST['qta']) && isset($_POST['categoria']) && isset($_POST['store']) && isset($_FILES['img']) ){
    $u=$_POST['nome'];$n=$_POST['descrizione'];$c=$_POST['prezzo'];$e=$_POST['qta'];$cc=$_POST['categoria'];$s=$_POST['store'];
    $res=$conn->query("INSERT INTO prodotti(id,nome,descrizione,prezzo,qta,id_store,id_categoria,img) VALUES ('','$u','$n','$c','$e','$s','$cc','$u.jpeg')");
    if($res){
        echo '<script>alert("Registrazione effetuata"); location.href="?page=home.php";</script>';

    $PATH=$_SERVER['DOCUMENT_ROOT']."/php/Hackaton GVS/GSV_TEAM/assets/img/$u2";//quando inserisci nel server sostituire con /home/vol5_3/epizy.com/epiz_27299733/htdocs/mvcommerce/admin/prodotti/
    echo $_POST['nome'];

    $upload_percorso = $PATH.'/';

    $file_tmp = $_FILES['img']['tmp_name'];

    $file_nome=$u.'.jpeg';

    move_uploaded_file($file_tmp, $upload_percorso.$file_nome);
    echo '<script>alert("prodotto inserito con successo"); location.href="./index.php";</script>';
    }
    
}


?>

    <!--Register-->
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-md w-full space-y-8">
    <div>
      <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
        inserisci prodotto
      </h2>
    </div>
    <!--Form-->
    <form class="mt-8 space-y-6" enctype="multipart/form-data" method="POST">
      <div class="rounded-md shadow-sm -space-y-px">

        <!--Username-->
        <div>
          <label for="email-address" class="sr-only">nome prodotto</label>
          <input id="email-address" name="nome" type="text" autocomplete="none" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="nome ">
        </div>
        <!--Nome-->
        <div>
          <label for="nome" class="sr-only">descrizione</label>
          <input id="nome" name="descrizione" type="text" autocomplete="none" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="descrizione">
        </div>
        <!--Cognome-->
        <div>
          <label for="cognome" class="sr-only">prezzo </label><br>
          <input id="cognome" name="prezzo" type="number" step="0.01"  autocomplete="none" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="prezzo">
        </div><br>
        <!--Data di Nascita-->
        <div>
          <label for="nascita" class="sr-only">quantita in magazzino</label>
          <input id="nascita" name="qta" type="number" step="1" autocomplete="none" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="quantita">
        </div>
        <!--Password-->
        <div>
          Seleziona lo store del prodotto<label for="localita" class="sr-only"></label><br>
          <select name="store">
          <?php echo $l; ?>
          </select>
        </div>
      </div>
        <!--Password Ripeti-->
        <br>Seleziona la categoria del prodotto<label for="localita" class="sr-only"></label>
          <select name="categoria">
          <?php var_dump($k); ?>
          </select>
      <div class="flex items-center justify-between">

      </div>
        Scegli immagine <input name="img" type="file" />
      <div>
        <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" name="register_venditore">
          inserisci
        </button>
      </div>
    </form>
  </div>
</div>  

