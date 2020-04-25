<?php 
include 'includes/connection.php';

function getJournalEntries(){
    include 'includes/connection.php';

    try{
        return $db->query('SELECT title, date FROM entries ORDER BY date DESC');
    } catch(Exception $e){
        echo "Error!: " . $e->getMessage() . "</br>";
        return false;
    }
}