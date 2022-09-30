<?php 

    if(isset($_POST['submit']))
    {
    
      /* *  print_r($_POST['nome']);
        print_r($_POST['email']);
        print_r($_POST['telefone']);
        print_r($_POST['genero']);
        print_r($_POST['data_nascimento']);
        print_r($_POST['cidade']);
        print_r($_POST['estado']);
        print_r($_POST['endereco']); */

        include_once('config.php');

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $telefone = $_POST['telefone'];
        $sexo = $_POST['genero'];
        $data_nasc = $_POST['data_nascimento'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $endereco = $_POST['endereco'];

        $result = mysqli_query($conexao, "INSERT INTO usuarios(nome,email,senha,telefone,sexo,data_nasc,cidade,estado,endereco) VALUES ('$nome','$email','$senha','$telefone','$sexo','$data_nasc','$cidade','$estado','$endereco')");

            header("Location: login.php");    
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: url(imagem/aquapast.jpg);
            background-size: 100%;
            color:white;
        }

        .caixa{
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0,0,0,0.5);
            padding: 15px;
            border-radius: 15px;

        }

        fieldset{
            border: 5px solid dodgerblue;
            
        }
        legend{
            border: 1px solid dodgerblue;
            padding: 15px;
            text-align: center;
            background-color: dodgerblue;
            border-radius: 15px;
            color: white;
        }
        .inputBox{
            position: relative;
            color: white;
        }
        .inputUser{
            background: none;
            border: none;
            border-bottom: 2px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 1px;       
        }
        .labelin{
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;        
        }
        .inputUser:focus ~ .labelin,
        .inputUser:valid ~ .labelin{
            top: -20px;
            font-size: 12px;
            color: dodgerblue;
        }
        #data_nascimento{
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;

        }
        #submit{
            background-image: linear-gradient(to right, rgb(0, 92, 197), rgb(90, 20, 220));
           width: 100%;
           border:none;
           padding: 15px;
           color: white;
           font-size: 15px;
           cursor: pointer;
           border-radius: 10px;

        }

        #submit:hover{
            background-image: linear-gradient(to right, rgb(0, 80, 172), rgb(90, 19, 195));
        }

    </style>
</head>
<body>
<a href="home.php">Voltar</a>
    <div class="caixa">
        <form action="form.php" method="POST">
            <fieldset>
                <legend><b>Formulário de Cadastro</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelin">Nome Completo</label>
                </div>
                <Br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="nome" class="labelin">Email</label>
                </div>
                <Br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="labelin">Senha</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="nome" class="labelin">Telefone</label>
                </div>
                <p>Sexo:</p>
                <input type="radio" id="feminino" name="genero" value="feminino" required>
                <label for="feminino">Feminino</label> 
                <br>
                <input type="radio" id="masculino" name="genero" value="masculino" required>
                <label for="masculino">Masculino</label>
                <br> 
                <input type="radio" id="outro" name="genero" value="outro" required>
                <label for="outro">Outro</label>
                <br><br>
                <label for="data_nascimento"><b>Data de nascimento</b></label>
                <input type="date" name="data_nascimento" id="data_nascimento" required>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" required>
                    <label for="cidade" class="labelin">Cidade</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser" required>
                    <label for="estado" class="labelin">Estado</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" required>
                    <label for="endereco" class="labelin">Endereço</label>
                </div>
                <br>
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
</body>
</html>