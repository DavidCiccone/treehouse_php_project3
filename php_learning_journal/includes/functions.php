<?php 

function getJournalDetails($journalId){
    include 'includes/connection.php';

    try{
        $entryData = $db->prepare('SELECT * FROM entries WHERE id = ?');
        $entryData->bindValue(1, $journalId, PDO::PARAM_INT);
        $entryData->execute();
    } catch(Exception $e){
        echo "Error!: " . $e->getMessage() . "</br>";
        return false;
    }
    return $entryData->fetch();
};

function getJournalEntries(){
    include 'includes/connection.php';

    try{
        return $db->query('SELECT id, title, date FROM entries ORDER BY date DESC');
    } catch(Exception $e){
        echo "Error!: " . $e->getMessage() . "</br>";
        return false;
    }
};

function addJournalEntry($title, $date, $timeSpent, $learned, $resources){
    include 'includes/connection.php';

    $sql = 'INSERT INTO entries(title, date, time_spent, learned, resources) VALUES(?, ?, ?, ?, ?)';
    
   
        $results = $db->prepare($sql);       
        $results->bindValue(1, $title, PDO::PARAM_STR);
        $results->bindValue(2, $date, PDO::PARAM_STR);
        $results->bindValue(3, $timeSpent, PDO::PARAM_STR);
        $results->bindValue(4, $learned, PDO::PARAM_STR);
        $results->bindValue(5, $resources, PDO::PARAM_STR);
        $results->execute();
   
    return true;
};