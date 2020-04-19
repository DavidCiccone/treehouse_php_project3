<?php
try{
    $db = new PDO("sqlite:journal.db");
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch(Exception $e){
    echo 'Database not available';
    echo $e->getMessage();
    die();
};

?>