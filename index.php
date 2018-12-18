<?php 
    include 'database.php'; 
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
            <h2> Test your knowledge </h2>
            <p> This is a multiple choice quiz, to check your knowledge on PHP </p>
            <ul>
                <li><strong>Number of questions: </strong><?=$total?></li> 
                <li><strong>Type: </strong>Multiple Choice</li> 
                <li><strong>Estimated time: </strong><?=$total*0.5?> minutes</li> 
            </ul>
            <a href="question.php?n=1" class="start">Start Quiz</a>
        </div>
    </main>

    <footer>
        <div class="container">
            Copyright &copy; AVCV Solutions, 2017
        </div>    
    </footer>
</body>
</html>