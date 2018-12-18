<?php session_start(); ?>

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
            <h2> You're done !</h2>
            <p> Congrats! you have completed the test </p>
            <p> Final Score: <?php echo $_SESSION['score']; $_SESSION['score']=0; ?></p>
            <a href="question.php?n=1" class="start">Take Again </a>
        </div>
    </main>

    <footer>
        <div class="container">
            Copyright &copy; AVCV Solutions, 2017
        </div>    
    </footer>
</body>
</html>