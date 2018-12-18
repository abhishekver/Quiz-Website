<?php 
      include_once 'database.php';
      session_start();

      $res = $mysqli->query('SELECT * from questions') or die($mysqli->error().__LINE__) ;
      $total = $res->num_rows;

      if(!isset($_SESSION['score']))      {
            $_SESSION['score'] = 0;
      }

      if(isset($_POST['submit']))   {
            $number = $_POST['number'];
            $selected_choice = $_POST['choice'];
            $next = $number + 1;
            $query = "SELECT * FROM `CHOICES` 
                              where question_number = $number AND is_correct = 1";
            
            $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
            $row = $result->fetch_assoc();

            $correct_choice = $row['id'];

            if($correct_choice == $selected_choice)   {
                  $_SESSION['score']++ ; 
            }

            if($number == $total)  {
                  header("Location: final.php");
                  return;
            }
            else  {
                  header("Location: question.php?n=".$next);
                  return;
            }
      }
?>