<?php
$nome = $_POST['nome'];
$ptos = $_POST['ptos'];

echo "TOTAL SCORE :"."<br><br>";
try {
    $pdo = new PDO("mysql:dbname=pontuacao;host=localhost", "root", "");
} catch (PDOException $e) {
    echo $e;
}

//-------insert   


 $pdo->query("INSERT INTO best_score (nome,pontos) VALUES('$nome','$ptos')") ;

 
      //------------select
     
      $sql = $pdo->prepare("SELECT *FROM best_score  ORDER BY `pontos` DESC limit 3");
      $sql->execute();
      $fetchBest_score = $sql->fetchAll();
        
     $cont=0;
      foreach($fetchBest_score as $key =>$value){
       $cont++;
       $sms = "LUGAR/ ";
      
      
       echo "$cont ,$sms ".$value['nome'].'-----------------------------'.$value['pontos'];
       echo'<br>';

      } 

?>