<?php 
include "start_session.php";

if (isset($_POST['assigned'])) {
    if (isset($_POST['teamplayers'])) {
        $teamName = $_POST['teams'];
        $playerIds = $_POST['teamplayers'];

        //Find the selected team
        foreach ($array->listteams as $team) {
            if ($team->tname == $teamName) {
                $selectedTeam = $team;
                break;
            }
        }
         // Check if the players are already assigned to the selected team
        // Check if the players are assigned to any other team
        foreach ($array->listteams as $team) {
            foreach ($playerIds as $playerId) {
                if (in_array($playerId, $team->players)) {
                    if ($team->tname == $teamName) {
                        // Handle the error, display a message, or redirect as needed
                        echo "Error: Player with ID $playerId is already assigned to $teamName team.";
                    } else {
                        // Handle the error, display a message, or redirect as needed
                        echo "Error: Player with ID $playerId is already assigned to another team.";
                    }
                    exit; // or redirect, or display a message and return
                }
            }
        }

        // If not assigned, update the team's players
        $selectedTeam->players = array_merge($selectedTeam->players, $playerIds);
    }
    
    
}
else if(isset($_POST['back'])){
    header("location:main.html");
}

// Print the contents of the $array object
echo "<pre>";
// print_r($array);
echo "</pre>";
?>

<html>
    <title>Assignment Page</title>
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
        div.center{
            display: flex;
            flex-direction: column;
            margin-left:30%;
        }
        div.checkbox-wrapper {
        text-align: left; 
        
        margin-right: 10px;
    }

        h2 {
            text-align: center;
            color: #333;
        }

        p {
            margin: 10px 0;
        }

        select, input {
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
            margin-top: 10%;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
    <body>
        
        <form action="assign.php" method="post">
            <h2 style="text-align:center">Assign a player to a team</h2>
            <p>Enter team:
                <select name="teams" >
                    <?php
                    foreach($array->listteams as $key=>$value)
                    echo "<option>".$value->tname."</option>";

                    ?>
                </select>
            </p>
            <p>Select players to assign:</p>

            <?php foreach ($array->listplayers as $player): ?>
                <div class="center">
                    <div class="checkbox-wrapper">
                        <input type="checkbox" name="teamplayers[]" value="<?= $player->name; ?>">
                        <?= $player->name; ?>
                    </div>
                </div>
            <?php endforeach; ?>

            <input type="submit" value="Assign" name="assigned"/>
            <input type="submit" value="Return to main menu" name="back"/>            
        </form>
    </body>
</html>
