<?php
$corrieri=$conn->query("SELECT * FROM corriere");
$localita=$conn->query("SELECT * FROM localita")->fetch_all();
//var_dump($localita);
if($corrieri){
    $corrieri=$corrieri->fetch_all();
}


?>




<div class="row">
<div class="col">
<form class="form-horizontal" method="POST">
 <div class="form-group">
  <label class="col-sm-2">Nome</label>
  <div class="col-sm-10">
   <input type="text" class="form-control" name="cn" placeholder="Nome">
  </div>
 </div>
 <div class="form-group">
  <label class="col-sm-2">Cognome</label>
  <div class="col-sm-10">
   <input type="text" class="form-control" name="cc" placeholder="Cognome">
  </div>
 </div>
 <div class="form-group">
  <label class="col-sm-2">username</label>
  <div class="col-sm-10">
   <input type="text" class="form-control" name="cu" placeholder="username">
  </div>
 </div>
 </div>
 <div class="form-group">
  <label class="col-sm-2">numero telefono</label>
  <div class="col-sm-10">
   <input type="text" class="form-control" name="ct" placeholder="telefono">
  </div>
 </div>
 <div class="form-group">
  <label class="col-sm-2">localita</label>
  <div class="col-sm-10">
   <select class="form-select" name="localita" id="">
    <?php echo $l; ?>
   </select>
  </div>
 </div>
 <div class="form-group">
  <div class="col-sm-offset-2 col-sm-10">
   <button type="submit" class="btn btn-default">Invia</button>
  </div>
 </div>
</form>
</div>
<div class="col"></div>
<div class="w-100"></div>
<div class="col">
<table class="table">
<thead>
<tr>

<th>id</th>
<th>nome</th>
<th>cognome</th>
<th>username</th>
<th>telefono</th>
<th>localita</th>

<?php
    
    if($corrieri){
        foreach($corrieri as $c){
            $i=$c[6];
            $sql=$conn->query("SELECT citta from localita where id='$i'")->fetch_assoc();
            echo '<tr><td>'.$c[0].'</td><td>'.$c[1].'</td><td>'.$c[2].'</td><td>'.$c[3].'</td><td>'.$c[5].'</td><td>'.$sql['citta'].'</td></tr>';
        }
    }else{
        echo '<h1>Nessun corriere presente</h1>';
    }
?>

</tr>
</thead>

</table>
</div>
</div>
