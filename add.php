<?php
    include_once "database.php";

    if(isset($_POST['submit'])) {
        $question_number = $_POST['question_number'];
        $question_text = $_POST['text'];
        $correct_choice = $_POST['correct_choice'];

        $choices = array();
        for($i=1; $i<=5; $i++)
            $choices[$i] = $_POST['choice'.$i];
        
        $query = "INSERT INTO `questions` (question_number, text)
                        VALUES ('$question_number', '$question_text')";
        $insert_row = $mysqli->query($query) or die ($mysqli->error.__LINE__);

        if($insert_row) {
            foreach($choices as $choice => $value)  {
                if($value != '')    {
                    if($correct_choice == $choice)  {
                        $is_correct = 1;
                    }
                    else    {
                        $is_correct = 0;
                    }

                    $query = "INSERT INTO `choices` (question_number, is_correct, text)
                                    VALUES ('$question_number','$is_correct','$value')";

                    $insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);
                    if($insert_row) {
                        continue;
                    }
                    else    {
                        die('Error: ('.$mysqli->errno . ') '. $mysqli->error);
                    }
                }
            }
            $msg = 'Question Inserted';
        }
    }

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
            <h2> Add a question </h2>

            <?php
                if(isset($msg)) {
                    echo "<p>" .$msg. "</p>";
                }
            ?>

            <form method="post" action="add.php">
                <p>
                    <label>Question Number </label>
                    <input type="number" name="question_number" value="<?=$total+1?>"/>
                </p>
                <p>
                    <label>Question Text </label>
                    <input type="text" name="question_text" />
                </p>
                <p>
                    <label>Choice #1: </label>
                    <input type="text" name="choice1" />
                </p>
                <p>
                    <label>Choice #2: </label>
                    <input type="text" name="choice2" />
                </p>
                <p>
                    <label>Choice #3: </label>
                    <input type="text" name="choice3" />
                </p>
                <p>
                    <label>Choice #4: </label>
                    <input type="text" name="choice4" />
                </p>
                <p>
                    <label>Choice #5: </label>
                    <input type="text" name="choice5" />
                </p>
                <p>
                    <label>Correct choice number</label>
                    <input type="number" name="correct_choice" />
                </p>
                <p>
                    <input type="submit" name="submit" value="Submit">
                </p>
        </div>
    </main>

    <footer>
        <div class="container">
            Copyright &copy; AVCV Solutions, 2017
        </div>    
    </footer>
</body>
</html>