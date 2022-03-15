<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- <script src="script01.js"></script>  -->

</head>

<body>



    <form method="post">
    <h3> Cadastro do jogador: </h3>
        <!-- <p id="pontos">000</p> -->
        Name:<input type="text" name="fname">
         <br> <br>
        PTOS:<input type="text" name="ptos">
        <input type="submit">

    </form>
    <br>  <br>
    <script src="script01.js"></script> 
    
    <h3>score: </h3>
<!-------------------------------------------------------------------------- -->

    <?php



    $name = $_POST['fname'];
    $ptos = $_POST['ptos']; 
  
   

    //variavel de conexao com banco de dados

    try {
        $pdo = new PDO("mysql:dbname=pontuacao;host=localhost", "root", "");
    } catch (PDOException $e) {
        echo $e;
    }

    //-------insert 

    $pdo->query("INSERT INTO best_score (nome,pontos) VALUES('$name','$ptos')") ;
     
      //------------select
     
       $sql = $pdo->prepare("SELECT *FROM best_score  ORDER BY `pontos` DESC");
       $sql->execute();
       $fetchBest_score = $sql->fetchAll();

       foreach($fetchBest_score as $key =>$value){
        
        echo $value['nome'].'-----------------> '.$value['pontos'];
        echo'<br>';

       }

    

    
      
       



    ?>







</body>

</html>