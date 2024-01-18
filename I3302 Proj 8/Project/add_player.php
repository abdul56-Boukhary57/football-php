<?php
include"start_session.php";
if (isset($_POST['ok'])) {
    if(!empty($_POST['id'])&&!empty($_POST['name'])&&!empty($_POST['age'])){
    $id= $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $p=new Player($id, $name, $age);
    $array->listplayers[]=$p;
  
}}

if (isset($_POST['back'])) {        
    header('Location:main.html');
}
// print_r($_SESSION['project']);
?>

<html>
    <title> Add Player Page </title>
<style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            text-align: center;
            background-color: #e0e0e0;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        p {
            margin: 10px 0;
        }

        input {
            padding: 8px;
            margin: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
    <body>
        <form action="add_player.php" method="post">
            <h2>Enter a Player</h2>
            <p>ID:</p><input type="text" name="id"/>
            <p>Name</p><input type="text" name="name"/>
            <p>Age:</p><input type="text" name="age"/>
            <br>
            <input type="submit" name="ok" value="Ok"/>
            <br><input type="submit" name="back" value="Back"/>

        </form>
    </body>
</html>