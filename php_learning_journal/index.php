<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>The Journal App of David Ciccone</title>
        <link href="https://fonts.googleapis.com/css?family=Cousine:400" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:600" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/site.css">
    </head>
    <body>
    
       <?php include('includes/header.php');
             include('includes/functions.php');
       ?>
        
        <section>
            <div class="container">
                <div class="entry-list">
               <?php foreach(getJournalEntries() as $entry){
                   
                   echo '<article><h2>'. 
                    '<a href="detail.php?id='. $entry[id] .'">' . $entry[title] . '</a></h2>'. 
                    '<time datetime="' . $entry[date] . '">' . date('M jS, Y', strtotime($entry[date])) .'</time>'. 
                    '</article>';
               }
              
               ?>
                <!--
                    <article>
                        <h2><a href="detail.php">The best day I’ve ever had</a></h2>
                        <time datetime="2016-01-31">January 31, 2016</time>
                    </article>
                    <article>
                        <h2><a href="detail_2.php">The absolute worst day I’ve ever had</a></h2>
                        <time datetime="2016-01-31">January 31, 2016</time>
                    </article>
                    <article>
                        <h2><a href="detail_3.php">That time at the mall</a></h2>
                        <time datetime="2016-01-31">January 31, 2016</time>
                    </article>
                    <article>
                        <h2><a href="detail_4.php">Dude, where’s my car?</a></h2>
                        <time datetime="2016-01-31">January 31, 2016</time>
                    </article>
                    -->
                </div>
            </div>
        </section>

        <?php include('includes/footer.php'); ?>
    
    </body>
</html>