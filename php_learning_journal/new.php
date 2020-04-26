<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>MyJournal</title>
        <link href="https://fonts.googleapis.com/css?family=Cousine:400" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:600" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/site.css">
    </head>
    <body>
        
    <?php 
        include('includes/header.php'); 
        require 'includes/functions.php';
        $id = ''; 
        $title = ''; 
        $date = ''; 
        $timeSpent = '';
        $learned = ''; 
        $resources = ''; 
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING)); 
            $date = trim(filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING)); 
            $timeSpent = trim(filter_input(INPUT_POST, 'timeSpent', FILTER_SANITIZE_STRING));
            $learned = trim(filter_input(INPUT_POST, 'whatILearned', FILTER_SANITIZE_STRING));
            $resources = trim(filter_input(INPUT_POST, 'ResourcesToRemember', FILTER_SANITIZE_STRING));
            
            addJournalEntry($title, $date, $timeSpent, $learned, $resources);
            header('Location: new.php');
            exit;
        };
    
    ?>

        <section>
            <div class="container">
                <div class="new-entry">
                    <h2>New Entry</h2>
                    <form method="post" action="new.php">
                        <label for="title"> Title*</label>
                        <input id="title" type="text" name="title" value="<?php echo $title; ?>" required><br>
                        <label for="date">Date*</label>
                        <input id="date" type="date" name="date" value="<?php echo $date; ?>" required><br>
                        <label for="time-spent"> Time Spent*</label>
                        <input id="time-spent" type="text" name="timeSpent" value="<?php echo $timeSpent; ?>" required><br>
                        <label for="what-i-learned">What I Learned</label>
                        <textarea id="what-i-learned" rows="5" type="text" name="whatILearned" value="<?php echo $learned; ?>"></textarea>
                        <label for="resources-to-remember">Resources to Remember</label>
                        <textarea id="resources-to-remember" type="text" rows="5" name="ResourcesToRemember" value="<?php echo $resources; ?>"></textarea>
                        <input type="submit" value="submit" class="button">
                        <input type="reset" value="Cancel" class="button button-secondary">
                    </form>
                </div>
            </div>
        </section>
        
        <?php include('includes/footer.php'); ?>
        
    </body>
</html>