<?php


if(isset($_POST['username']) && isset($_POST['nome']) && isset($_POST['cognome']) && isset($_POST['nascita']) && isset($_POST['password']) && ($_POST['password']==$_POST['password_ripeti']) ){
    $u=$_POST['username'];$n=$_POST['nome'];$c=$_POST['cognome'];$e=$_POST['nascita'];$p=$_POST['password'];
    $res=$conn->query("INSERT INTO venditore(id,nome,cognome,username,password,data_nasc) VALUES ('','$n','$c','$u','$p','$e')");
    echo '<script>alert("Registrazione effetuata"); location.href="?page=loginU.php";</script>';
    if(!mkdir($_SERVER['DOCUMENT_ROOT']."/php/Hackaton GVS/GSV_TEAM/assets/img/$u")){

    }
}


?>

    <!--Register-->
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-md w-full space-y-8">
    <div>
      <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
        Sign in to your account
      </h2>
    </div>
    <!--Form-->
    <form class="mt-8 space-y-6" action="#" method="POST">
      <div class="rounded-md shadow-sm -space-y-px">

        <!--Username-->
        <div>
          <label for="email-address" class="sr-only">Username </label>
          <input id="email-address" name="username" type="text" autocomplete="none" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Username ">
        </div>
        <!--Nome-->
        <div>
          <label for="nome" class="sr-only">Nome </label>
          <input id="nome" name="nome" type="text" autocomplete="none" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Nome">
        </div>
        <!--Cognome-->
        <div>
          <label for="cognome" class="sr-only">Cognome </label>
          <input id="cognome" name="cognome" type="text" autocomplete="none" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Cognome">
        </div>
        <!--Data di Nascita-->
        <div>
          <label for="nascita" class="sr-only">Data di Nascita</label>
          <input id="nascita" name="nascita" type="date" autocomplete="none" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Data di Nascita">
        </div>
        <!--Password-->
        <div>
          <label for="password" class="sr-only">Password</label>
          <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Password">
        </div>
      </div>
        <!--Password Ripeti-->
        <div>
          <label for="password_ripeti" class="sr-only">ripeti password</label>
          <input id="password_ripeti" name="password_ripeti" type="password" autocomplete="none" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Password Ripeti">
        </div>

      <div class="flex items-center justify-between">

        <div class="text-sm">
          <a href="#" class="font-medium text-blue-600 hover:text-blue-500">
            Forgot your password?
          </a>
        </div>
      </div>

      <div>
        <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" name="register_venditore">
          <span class="absolute left-0 inset-y-0 flex items-center pl-3">
            <!-- Heroicon name: solid/lock-closed -->
            <svg class="h-5 w-5 text-blue-500 group-hover:text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
            </svg>
          </span>
          Sign in
        </button>
      </div>
    </form>
  </div>
</div>  

