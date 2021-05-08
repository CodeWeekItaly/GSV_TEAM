<main role="main" class="container">


      <?php
        if(isset($_GET['page'])){
            include './page/'.$_GET['page'];
        }else{
            include './page/home.php';
        }
      ?>






    </main>