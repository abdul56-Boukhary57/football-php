<?php
include_once "start_session.php";
include_once "methods.php";

if(isset($_POST['back'])){
    header("location:table_teams.php");
}
if(isset($_POST['main'])){
    header("location:main.html");
}
if (isset($_GET['team'])) {
    $teamName = $_GET['team'];

    // Retrieve players using the new method
    $players = $array->getPlayersByTeam($teamName);

    if ($players) {
        echo "<html>";
        echo "<head>";
        echo "<title>Players of Team: " . $teamName . "</title>";
        echo "<style>";
        echo "body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }";

        echo "h2 {
            text-align: center;
        }";

        echo "table {
            position: center;
            border-collapse: collapse;
            width: 90%;
            margin-top: 10;
        }";

        echo "th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }";

        echo "th {
            background-color: #4caf50;
            color: white;
        }";
        echo "td{
            background-color: white;
        }";
        echo "form {
            text-align: center;
            background-color: #e0e0e0;
            margin-top: 20px;
            width:100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            
        }";

        echo "input[type='submit'] {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
            margin: 20px 20px;
        }";

        echo "input[type='submit']:hover {
            background-color: #45a049;
            color: white;
        }";
        echo "</style>";
        echo "</head>";
        echo "<body>";
        echo "<form action='' method='post'>"; 
        echo "<h2>Players of Team: " . $teamName . "</h2>";
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Name</th>";
        echo "<th>Age</th>";
        echo "</tr>";

        foreach ($players as $player) {
            echo "<tr>";
            echo "<td>" . $player->id . "</td>";
            echo "<td>" . $player->name . "</td>";
            echo "<td>" . $player->age . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "<input type='submit' name='back' value='Back' />";
        echo "<input type='submit' name='main' value='Main Menu' />";
        echo "</form>";
        echo "</body>";
        echo "</html>";
    } else {
        echo "Players not found.";
    }
} else {
    echo "Invalid request.";
}
?>
