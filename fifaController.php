<?php
/*
*
 * Created by PhpStorm.
 * User: Aaron
 * Date: 1-4-2019
 * Time: 09:28
 */
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST'){
    header('Location: index.php');
    exit;
}





if ($_POST['type'] == 'create') {
    $teamname = $_POST['teamname'];
    $created_by = $_SESSION['id'];
    $players = $_POST['p-amount'];

    $sql = "INSERT INTO teams (teamname, players, created_by ) 
values (:teamname,:players , :created_by)";

    function clean($teamname) {
        $teamname = str_replace(' ', '-', $teamname); // Replaces all spaces with hyphens.

        return preg_replace('/[^A-Za-z0-9\-]/', '', $teamname); // Removes special chars.
    }

    $prepare = $db->prepare($sql); //protect against sql injection
    $prepare->execute([
        ':teamname' => clean($teamname),
        ':players' => $players,
        ':created_by' => $created_by
        
    ]);
    header('Location: teams.php');
    exit;
}


if($_POST['type'] == 'delete'){
    $id = $_GET['id'];
    $sql = "DELETE FROM teams WHERE id = :id";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':id' => $id
    ]);

    $msg = 'Team deleted';
    header( "Location: teams.php?msg=$msg");
    exit;
}


if($_POST['type'] == 'edit'){
    $id = $_GET['id'];

    $sql = "UPDATE teams SET
    teamname = :teamname,
    players  = :players 
    WHERE id = :id";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':id' => $id,
        ':teamname' => $_POST['teamname'],
        ':players' => $_POST['p-amount']
    ]);
    header("Location: team.php?id=$id");
    exit;

}

if ($_POST['type'] == 'create-competition') {



    $sqldelete = "DELETE FROM matches";
    $querydel = $db->query($sqldelete); //verzoek naar de database, voer sql van hierboven uit

    $sqlclearpoints = "UPDATE teams SET points = null";
    $clearquery = $db->query($sqlclearpoints);

    $sql = "SELECT * FROM teams";
    $query = $db->query($sql); //verzoek naar de database, voer sql van hierboven uit
    $teams = $query->fetchAll(PDO::FETCH_ASSOC); //multie demensionale array //alles binnenhalen

    $teamsArray = array();

    foreach ($teams as $team) {
        array_push($teamsArray, $team['teamname']);
    }

    $arrLength = count($teamsArray);


            for ( $i = 0; $i < $arrLength; $i++)
            {
                for ($x = 0; $x < count($teamsArray); $x++ )
                {
                    if($teamsArray[0] !== $teamsArray[$x])
                    {
                        $matchsql = "INSERT INTO matches (team1, team2 )
                        values (:team1 , :team2)";
                        $prepare = $db->prepare($matchsql);
                        $prepare->execute([
                            ':team1' => $teamsArray[0],
                            ':team2' => $teamsArray[$x]
                        ]);
                    }
                }
                array_shift($teamsArray);
            }
    //exit;
    header("Location: matches.php");
}


if ($_POST['type'] == 'create-player') {
    $playername = $_POST['playername'];
    $created_by = $_SESSION['id'];
    $playerteam = $_POST['playerteam'];
    /*$p-teamname = $_POST['p-teamname'];*/

    $sql = "INSERT INTO players ( playername, playerteam, created_by ) 
values ( :playername, :playerteam, :created_by)";

    function clean($playername) {
        $playername = str_replace(' ', '-', $playername); // Replaces all spaces with hyphens.

        return preg_replace('/[^A-Za-z0-9\-]/', '', $playername); // Removes special chars.
    }

    $prepare = $db->prepare($sql); //protect against sql injection
    $prepare->execute([
        
        ':playername' => $playername,
        ':created_by' => $created_by,
        ':playerteam' => $playerteam

    ]);
    header('Location: spelers.php');
    exit;
}




if($_POST['type'] == 'create-score'){

    //echo '<pre>';
    //var_dump($_POST); die;
    $id = $_GET['id'];

    $score1 = $_POST['result_team1'];
    $score2 = $_POST['result_team2'];
    $teamone = $_POST['team1'];
    $teamtwo = $_POST['team2'];

    $sql = "UPDATE matches SET
    result_team1 = :result_team1,
    result_team2  = :result_team2 
    WHERE id = :id";

    $pointsteamone = "SELECT * FROM teams WHERE teamname = :id";
    $preparet1 = $db->prepare($pointsteamone);
    $preparet1->execute([
        ':id' => $teamone
    ]);
    $matchteam1 = $preparet1->fetch(PDO::FETCH_ASSOC);

    $pointsteamtwo = "SELECT * FROM teams WHERE teamname = :id";
    $preparet2 = $db->prepare($pointsteamtwo);
    $preparet2->execute([
        ':id' => $teamtwo
    ]);
    $matchteam2 = $preparet2->fetch(PDO::FETCH_ASSOC);


    $prepare = $db->prepare($sql); //protect against sql injection
    $prepare->execute([
        ':id' => $id,
        ':result_team1' => $_POST['result_team1'],
        ':result_team2' => $_POST['result_team2'],

    ]);
    
    if($score1 > $score2){
        $score = 3 + $matchteam1['points'];

        $pointsql = "UPDATE teams SET points = :points WHERE teamname = :teamname";
        $prepare = $db->prepare($pointsql);
        $prepare->execute([
            ':points' => $score,
            ':teamname' => trim($teamone)
        ]);

    }else if($score1 == $score2){
        $score1 = 1 + $matchteam1['points'];
        $score2 = 1 + $matchteam2['points'];

        $sql = "UPDATE teams SET points =:points  WHERE teamname =:teamname";
        $prepare = $db->prepare($sql);
        $prepare->execute([
            ':points' => $score1,
            ':teamname' => trim($teamone)
        ]);

        $sql = "UPDATE teams SET points =:points WHERE teamname =:teamname";
        $prepare = $db->prepare($sql);
        $prepare->execute([
            ':points' => $score2,
            ':teamname' => $teamtwo
        ]);
    }
    else if ($score2 > $score1){
        $score = 3 + $matchteam2['points'];

        $pointsql = "UPDATE teams SET points = :points WHERE teamname = :teamname";
        $prepare = $db->prepare($pointsql);
        $prepare->execute([
            ':points' => $score,
            ':teamname' => trim($teamtwo)
        ]);
    }


    header( "Location: matches.php");
    exit;
}
