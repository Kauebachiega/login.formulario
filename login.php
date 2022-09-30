<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <Style>
        body{
           font-family: Arial, Helvetica, sans-serif;
           background-image: url(imagem/aquapast.jpg);
           background-size: 100%;
        }
        div{
            background-color: rgba(0, 0, 0, 0.4);
            position: absolute;
            top: 50%;
            left:50%;
            transform: translate(-50%, -50%); 
            padding: 80px;
            border-radius: 15px;
            color: white;
         
        }
        input{
            padding: 15px;
            border:none; 
            outline: none;
            font-size: 20px;

        }
        .inputsubmit{
            background-color: dodgerblue;
            border: none;
            padding:15px;
            width: 100%;
            border-radius: 10px;
            color: white;
            font-size: 15px;
            cursor:pointer;
        }
        .inputsubmit:hover{
            background-color: deepskyblue;
        }
    </Style>
</head>
<body>
    <a href="home.php">Voltar</a>
    <div>
        <h1>Login</h1>
        <form action="testLogin.php" method="POST">
            <input type="text" name="email" placeholder="Email">
            <br><br>
            <input type="password" name="senha" placeholder="Senha">
            <br><br>
            <input class="inputsubmit" type="submit" name="submit" value="Enviar">
        </form>
    </div>
</body>
</html>