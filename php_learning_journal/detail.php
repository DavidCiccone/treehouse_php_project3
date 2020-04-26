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
        
    <?php include('includes/header.php'); 
          require 'includes/functions.php';
        //$data = array();
        
        $getID = $_GET['id'];
        $details = getJournalDetails($getID);
        //var_dump($details[title]);
          
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
                            <h3>Resources to Remember:</h3>
                            <ul>
                                <li>'. $details[resources] . '</li>' .
                                
                            '</ul>
                        </div>'
                        ?>
                    </article>
                </div>
            </div>
            <div class="edit">
                <p><a href="edit.php">Edit Entry</a></p>
            </div>
        </section>

        <?php include('includes/footer.php'); ?>
        
    </body>
</html>