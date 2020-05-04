<?php 

//Retrives information for specific journal entry for the details page.
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

//Retrives all journal entrys for the index.php page
function getJournalEntries(){
    include 'includes/connection.php';

    try{
        return $db->query('SELECT id, title, date FROM entries ORDER BY date DESC');
    } catch(Exception $e){
        echo "Error!: " . $e->getMessage() . "</br>";
        return false;
    }
};

//Deletes journal entry
function delEntry($entryId){
    include 'includes/connection.php';

    try{
        $entryData = $db->prepare('DELETE FROM entries WHERE id = ?');
        $entryData->bindValue(1, $entryId, PDO::PARAM_INT);
        $entryData->execute();
        return true;
    } catch(Exception $e){
        echo "Error!: " . $e->getMessage() . "</br>";
        return false;
    }
    
};

//Adds a journal entry
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

//Retrives the journal entries information and applies it to the edit form on the edit.php page
function getEditInfo($id){
    include 'includes/connection.php';

    try{
        $editData = $db->prepare('SELECT title, date, time_spent, learned, resources FROM entries WHERE id = ?');
        $editData->bindValue(1, $id, PDO::PARAM_INT);
        $editData->execute();
    } catch(Exception $e){
        echo "Error!: " . $e->getMessage() . "</br>";
        return false;
    }
    return $editData->fetch();
};

//Applies edits to the database on submit of the form on edit.php
function editJournalEntry($title, $date, $timeSpent, $learned, $resources, $id){
    include 'includes/connection.php';

    $sql = 'UPDATE entries SET title = ?, date = ?, time_spent = ?, learned = ?, resources = ? WHERE id = ?';
            
    try{
        $results = $db->prepare($sql);       
        $results->bindValue(1, $title, PDO::PARAM_STR);
        $results->bindValue(2, $date, PDO::PARAM_STR);
        $results->bindValue(3, $timeSpent, PDO::PARAM_STR);
        $results->bindValue(4, $learned, PDO::PARAM_STR);
        $results->bindValue(5, $resources, PDO::PARAM_STR);
        $results->bindValue(6, $id, PDO::PARAM_INT);
        $results->execute();
        header('Location: detail.php?id=' . $id);
    return true;
    } catch(Exception $e){
        echo "Error!: " . $e->getMessage() . "</br>";
        return false;
    }
};