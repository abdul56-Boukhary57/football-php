<?php
include_once"start_session.php";
if(isset($_POST['back'])){
    header('Location:main.html');
}

// foreach ($array->listteams as $key => $value) {
//     echo ($key+1)."-";      
//     echo $array->displayteaminfo($value->tname);
//           echo "number of players: ".$array->gettotalnbofplayers($value->tname);
//     echo"<br>";
//         }


?>


<html>
<title>All Teams Page</title>
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
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        input[type="submit"] {
            padding: 8px 20px;
            margin-top: 10px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4caf50;
            color: white;
        }
        a {
            text-decoration: none;
            background-color: #4caf50;
            color: white;
            padding: 8px 12px;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        };

         a:hover {
            background-color: #45a049;
            color: white;
        };
    </style>
    <body>
        <form action=""method="Post">
            <h2> ALL TEAMS SUBMITED
            <?php $array->getallteams(); ?>
            <input type="submit" name="back" value="Back"/>
        </form>
    </body>
</html>