<?php
session_start();

include_once('config.php');
//print_r($_SESSION);
if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
{
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: login.php');
}

$logado = $_SESSION['email'];
if(!empty($_GET['search']))
{
    $data = $_GET['search'];
    $sql ="SELECT * FROM usuarios WHERE id LIKE '%$data%' or nome LIKE '%$data%' or email LIKE '%$data%' ORDER BY id DESC";
}
else
{
    $sql ="SELECT * FROM usuarios ORDER BY id DESC";
}


$result = $conexao->query($sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Acessou o Sistema</title>

    <style>
         body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: url(imagem/aquapast.jpg);
            background-size: 100%;
            color:black;
            text-align: center;
        }
        .table-bg{
           background: rgba(0, 0, 0, 0.3); 
           border-radius: 15px 15px 0 0;
        }

        .box-search{
            display: flex;
            justify-content: center;
            gap: .1%;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <span class="navbar-text">
       <a href=""> <img src="imagem/semina.png" width="40" height="40">SEMINÁRIO WEB </a> 
    </span>
    <div class="d-flex">
        <a href="sair.php" class="btn btn-danger me-5">Sair</a>
    </div>
  </div>
    </nav>
    <br><br>
    <?php 
        echo "<h1> Bem Vindo - <u>$logado</u></h1>"
    ?>
    <br>
    <div class="box-search">
        <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
        <button onclick="searchData()" class="btn btn-primary">
         <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg>
        </button>
    </div>
    <div class = "m-5">
        <table class="table text-white table-bg">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">nome</th>
        <th scope="col">email</th>
        <th scope="col">senha</th>
        <th scope="col">telefone</th>
        <th scope="col">sexo</th>
        <th scope="col">data_nasc</th>
        <th scope="col">cidade</th>
        <th scope="col">estado</th>
        <th scope="col">endereco</th>
        <th scope="col">...</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while($user_data = mysqli_fetch_assoc($result))
            {
                echo "<tr>";
                echo "<td>".$user_data['id']."</td>";
                echo "<td>".$user_data['nome']."</td>";
                echo "<td>".$user_data['email']."</td>";
                echo "<td>".$user_data['senha']."</td>";
                echo "<td>".$user_data['telefone']."</td>";
                echo "<td>".$user_data['sexo']."</td>";
                echo "<td>".$user_data['data_nasc']."</td>";
                echo "<td>".$user_data['cidade']."</td>";
                echo "<td>".$user_data['estado']."</td>";
                echo "<td>".$user_data['endereco']."</td>";
                echo "<td>

                <a class='btn btn-sm btn-primary' href='edit.php?id=$user_data[id]'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                </svg>
                </a>
                <a class='btn btn-sm btn-danger' href='delete.php?id=$user_data[id]'>

                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
  <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
  <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
</svg>

                </a>
                </td>";
                echo"</tr>";
            }
        ?>
    </tbody>
    </table>
        </div>
    <br><br>
    <h1> Seminário interdiciplinar Desenvolvimento WEB com PHP, HTML, CSS, Booststrap e Mysql.</h1>
<p></p>

</body>
<script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event){
        if (event.key === "Enter")
        {
            searchData();
        }
    });

    function searchData()
    {
        window.location = 'sistema.php?search='+search.value;
    }
</script>
</html>