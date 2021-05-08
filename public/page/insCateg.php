<?php
$idp=$_SESSION['idprod'];
if(isset($_POST['categ'])){
    $u=$_POST['categ'];
    echo $u;
    $res=$conn->query("INSERT INTO categoria(id,id_store,nome) VALUES ('','$idp','$u')");
    if($res){
        echo '<script>alert("categoria inserita con successo"); location.href="./index.php";</script>';
    }

}

?>

<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-md w-full space-y-8">
    <div>
      <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
        Inserisci categoria
      </h2>
    </div>
    
      <div class="rounded-md shadow-sm -space-y-px">
       <!--Form-->
    <form class="mt-8 space-y-6" method="POST">

<div class="rounded-md shadow-sm -space-y-px">
    <input type="hidden" name="ids" value="<?php echo $idp; ?>">
  <!--Username-->
  <div>
    <label for="categ" class="sr-only">nome categoria</label>
    <input id="categ" name="categ" type="text" autocomplete="none" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="categoria ">
  </div><br>


<div>
  <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" name="login">
    
    Inserisci
  </button>
</div>
</form>
      </div>

      

      
  </div>
  </div>
</div>

