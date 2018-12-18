<?php
    require_once 'database.php';
    session_start();
    $number = (int) $_GET['n'];

    $query = "Select * from questions where question_number = $number";
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $question = $result->fetch_assoc();

    $query = "Select * from choices where question_number = $number";
    $choices = $mysqli->query($query) or die($mysqli->error.__LINE__);

    $res = $mysqli->query('SELECT * from questions') or die($mysqli->error().__LINE__) ;
    $total = $res->num_rows;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quizzer</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>
    <header>
        <div class="container">
            <h1>Quizzer</h1>
        </div>
    </header>

    <main>
        <div class="container">
            <div class="current"> 
                Question <?=$number?> of <?=$total?>
            </div>       
            <p class="question">
                <?=$question['text'];?>
            </p>
            <form method="post" action="process.php">
                <ul class="choices">
                    <?php
                        while($row = $choices->fetch_assoc()):
                            echo "<li> <input name = 'choice' type = 'radio' value = '".$row['id']."'/>".$row['text']."";
                        endwhile;
                    ?>
                </ul>
                <input type="submit" name="submit" value="Submit">
                <input type="hidden" name="number" value= <?=$number?> >
            </form>
        </div>
    </main>

    <footer>
        <div class="container">
            Copyright &copy; AVCV Solutions, 2017
        </div>    
    </footer>
</body>
</html>