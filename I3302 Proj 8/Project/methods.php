<?php
 error_reporting(E_ALL ^ E_DEPRECATED);
 class Player{
    public $id;
    public $name;
    public $age;

    public function __construct($id, $name, $age) {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
    }
    
}
class Team{
    public $tname;
    public $location;
    public $nb;
    public $players=array();

    public function __construct($tname, $location, $nb) {
        $this->tname = $tname;
        $this->location = $location;
        $this->nb = $nb;
    }
    
    
}
/**
 * Summary of PlayerList
 */
class Lists{
    public $listplayers;
    public $listteams;
    public function getIndexplayerByName($name) {
        $index = -1;
        foreach ($this->listplayers as $i => $value) {
            if ($value->name == $name) {
                $index = $i;
                break;
            }
        }
        return $index;
    }
    public function gettotalnbofplayers($team){
        $count=0;
        foreach($this->listteams as $key1=>$val1){
            if($val1->tname==$team){
        foreach($val1->players as $val2){
            $count++;
        }
    }
    }
return $count; 
}

public function getplayerinfo($player){
    echo"<tr>";
foreach ($this->listplayers as $key => $value) {
    if($player==$value->name){
        echo"<td>".$value->id."</td>";
        echo"<td>".$value->name."</td>";
        echo"<td>".$value->age."</td>";
     }
     //   echo"</tr>";
    }        
}


public function displayteaminfo($team){
    foreach($this->listteams as $key=>$value){
    if($team==$value->tname){
    echo "Name:".$value->tname."<br>";
    echo "Location:".$value->location."<br>";
    echo "Players assigned:";
    foreach($value->players as $names){
        echo $names."<br>";
    }
    break;}
    } 
}
public function getallteams(){
    echo"<table border =1><tr>";
    echo"<th>Name</th><th>Location</th><th>NbofPlayers</th></tr>";
    echo"<tr>";
    foreach($this->listteams as $key=>$value){
        echo"<td>".$value->tname."</td>";
        echo"<td>".$value->location."</td>";
        echo"<td>".$value->nb."</td>";
        echo "<td><a href='displays_players_by_team.php?team=" . $value->tname . "'>Show Players</a></td>";
        
            
echo"</tr>";}
echo"</table>";

    }
    public function getallplayers(){
echo"<table border=1><tr>";
echo"<th>Id</th><th>Name</th><th>Age</th><th>Team</th></tr>";
echo"<tr>";
foreach($this->listplayers as $key1=>$val1){
    echo"<td>".$val1->id."</td>";
    echo"<td>".$val1->name."</td>";
    echo"<td>".$val1->age."</td>";

foreach($this->listteams as $key2=>$val2){
    foreach($val2->players as $val3){
        if($val3==$val1->name){
            echo "<td>".$val2->tname."</td>";
        }
    
    }
}
echo"</tr>";}
echo"</table>";
    }

    public function getPlayersByTeam($teamName) {
        $players = array();
    
        foreach ($this->listteams as $team) {
            if ($team->tname == $teamName) {
                foreach ($team->players as $playerName) {
                    $players[] = $this->listplayers[$this->getIndexplayerByName($playerName)];
                }
                break;
            }
        }
    
        return $players;
    }
    
}





    