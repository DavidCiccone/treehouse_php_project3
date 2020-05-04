<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>The Journal of David Ciccone | Journal Entry Details</title>
        <link href="https://fonts.googleapis.com/css?family=Cousine:400" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:600" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/site.css">
    </head>
    <body>
        
    <?php include('includes/header.php'); 
          require 'includes/functions.php';
        
            $getID = $_GET['id'];
            $details = getJournalDetails($getID);
            $resourceList = explode(';', $details[resources]);
            
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $entryId = trim(filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING)); 
               
                delEntry($entryId);
                header('Location: index.php');
                exit;
            };
    ?>

        <section>
            <div class="container">
                <div class="entry-list single">
                    <article>
                <?php
                echo    '<h1>'. $details[title] . '</h1>' .
                        '<time datetime="' . $details[date] . '">' . date('M jS, Y', strtotime($details[date])) . '</time>
                        <div class="entry">
                            <h3>Time Spent: </h3>
                            <p>' . $details[time_spent] . '</p>' .
                        '</div>
                        <div class="entry">
                            <h3>What I Learned:</h3>
                            <p>'. $details[learned] .'</p>' .
                        '</div>
                        <div class="entry">
                            <h3>Resources to Remember: </h3>
                            <span style="font-size:12px;">Separate each resource with a semicolon ;</span>
                            <ul>';
                            if(count($resourceList) > 1){
                            for($x = 0; $x < count($resourceList); $x++){
                                echo'<li>' . $resourceList[$x] . '</li>';
                                }
                            }  else {
                            echo'<li> No resources</li>';
                            };
                echo        '</ul>
                        </div>';
                        
                        ?>
                    </article>
                </div>
            </div>
            <div class="edit">
                <p>
                    <a href="edit.php?id=<?php echo $getID ?>">Edit Entry</a><br><br>
                    
                </p>
                <form method="post" onSubmit="return confirm('Are you sure you want to delete?')">
                    <input id="title" type="hidden" name="id" value="<?php echo $getID; ?>">
                    <input type="submit" value="Delete Entry" class="button">
                </form>
            </div>
        </section>

        <?php include('includes/footer.php'); ?>
        
    </body>
</html>