<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>The Journal App of David Ciccone | Journal Entry Edit Page</title>
        <link href="https://fonts.googleapis.com/css?family=Cousine:400" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:600" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/site.css">
    </head>
    <body>

    <?php include('includes/header.php'); 
             require 'includes/functions.php';
             $editVars = getEditInfo($_GET['id']);
             $id = $_GET['id']; 
             $title = $editVars[title]; 
             $date = $editVars[date]; 
             $timeSpent = $editVars[time_spent];
             $learned = $editVars[learned]; 
             $resources = $editVars[resources]; 
             
             if($_SERVER['REQUEST_METHOD'] == 'POST'){
                 $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING)); 
                 $date = trim(filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING)); 
                 $timeSpent = trim(filter_input(INPUT_POST, 'timeSpent', FILTER_SANITIZE_STRING));
                 $learned = trim(filter_input(INPUT_POST, 'whatILearned', FILTER_SANITIZE_STRING));
                 $resources = trim(filter_input(INPUT_POST, 'ResourcesToRemember', FILTER_SANITIZE_STRING));
                 $id = $_GET['id'];
                 
                 editJournalEntry($title, $date, $timeSpent, $learned, $resources, $id);
                 exit;
             };

    ?>

        <section>
            <div class="container">
                <div class="edit-entry">
                    <h2>Edit Entry</h2>
                    <form method="post">
                        <label for="title"> Title*</label>
                        <input id="title" type="text" name="title" value="<?php echo $title; ?>" required><br>
                        <label for="date">Date*</label>
                        <input id="date" type="date" name="date" value="<?php echo $date; ?>" required><br>
                        <label for="time-spent"> Time Spent*</label>
                        <input id="time-spent" type="text" name="timeSpent" value="<?php echo $timeSpent; ?>" required><br>
                        <label for="what-i-learned">What I Learned</label>
                        <textarea id="what-i-learned" rows="5" type="text" name="whatILearned" value="<?php echo $learned; ?>"><?php echo $learned; ?></textarea>
                        <label for="resources-to-remember">Resources to Remember <span style="font-size:12px;">Separate each resource with a semicolon "Resource 1;Resource 2;ect"</span></label>
                        <textarea id="resources-to-remember" type="text" rows="5" name="ResourcesToRemember" value="<?php echo $resources; ?>"><?php echo $resources; ?></textarea>
                        <input type="submit" value="submit" class="button">
                        <input type="reset" value="Clear Added Work" class="button button-secondary">
                    </form>
                </div>
            </div>
        </section>
        
        <?php include('includes/footer.php'); ?>
        
    </body>
</html>