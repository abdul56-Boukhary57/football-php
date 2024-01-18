<?php
include"start_session.php";



if (isset($_POST['player']))
{
 $index=$array->getIndexplayerByName($_GET['player']);
        unset($array->listplayers[$index]);
        foreach ($array->listteams as $key => $value) {
            foreach ($value->players as $key2 =>$player) {
                if($player==$_GET['player']){
                    unset($value->players[$key2]);
                }
            }
        }
        $_SESSION['project'] = $array;

        header("location:display_players.php ");
}

     if(isset($_POST['return'])){
        header("location:main.html");
    }
?>
<html>
<body>
<title>Delete Players Form</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h3 {
            text-align: center;
        }

        form {
            text-align: center;
            background-color: #e0e0e0;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        table {
            border-collapse: collapse;
            margin-top: 5%;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4caf50;
            color: white;
        }

        a {
            text-decoration: none;
            color: #333;
            transition: color 0.3s ease-in-out;
        }

        a:hover {
            color: red;
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
    </style>
    
    <form action="display_players.php" method="post">
    <h3>Delete players of a team</h3>
        <p>Select a team:
            <select name="selectedteam">
            <option disabled selected>Choose a team from the list</option>
                <?php
                foreach($array->listteams as $key=>$value)
                    echo "<option>".$value->tname."</option>";
                ?>
            </select>
        </p>

        <p>Number of players to display:
            <input type="number" name="numPlayers" min="1" max="100" value="1" />
        </p>


        <input type="submit" value="Show" name="showteam" />
        <input type="submit" value="Return" name="return" />

    </form>
    <?php
        if(isset($_POST['showteam'])){
            if(isset($_POST['selectedteam'])){
            $team=$_POST['selectedteam'];}
            $players=array();
            foreach($array->listteams as $key=>$value){
                if ($value->tname === $team) {       
                foreach ($value->players as $player) {
            array_push($players,$player);
                    }
                }   
            }

            $numPlayersToDisplay = isset($_POST['numPlayers']) ? (int)$_POST['numPlayers'] : 1;


            echo"<table border=1'><tr>";
            echo"<th>Id</th><th>Name</th><th>Age</th><th></th></tr>";
            foreach($players as $p){
                if ($numPlayersToDisplay <= 0) {
                    break; // Stop displaying players if the desired count is reached
                }
                $array->getplayerinfo($p);
                echo "<td><a href='display_players.php?player=".$p."'>Delete</a></td>";
                echo"</tr>";
                $numPlayersToDisplay--;
            }
            echo"</table>";
            }
    ?>
</body>
</html>