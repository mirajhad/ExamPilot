<?php
include("config.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Online Examinaton in India | MyExam.com</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<style type="text/css">
.animateuse{
    animation: leelaanimate 0.5s infinite;
}

@keyframes leelaanimate{
    0%{ color: red },
    10%{ color: yellow },
    20%{ color: blue },
    40%{ color: green },
    50%{ color: pink },
    60%{ color: orange },
    80%{ color: black },
    100%{ color: brown} 
}
</style>

</head>
<body>
<div class="ccontainer text-center">
<br><br>
<h1 class="text-center text-success text-uppercase animateuse">RESULT</h1>
<br><br><br><br>
<table class="table text-center table-bordered table-hover">
<tr>
<th colspan="2" class="bg-dark"><h1 class="text-white">Results</h1></th>
</tr>

<tr>
<td>
Questions Attempted
</td>
<td>
<?php

    if(isset($_POST['submit'])){
        if(!empty($_POST['quizcheck'])){
            $count = count($_POST['quizcheck']);

            echo "out of 5, you have selected ".$count. " options";
        }
           ?>
           </td>
           <?php
            $result = 0;
            $i = 1;

            $selected = $_POST['quizcheck'];

            $q = "select * from questions";

            $query = mysqli_query($con, $q);

            while($rows = mysqli_fetch_array($query)) {
                
                $checked = $rows['ans_id'] == $selected[$i];

                if($checked){
                    $result++;
                }
                $i++;
            }
        }
            ?>
            <tr>
        <td>
        your total score
        </td>
        <td colspan="2">
        <?php
        echo " your score is ".$result.".";
?>   
<?php

    //storing score 
    $name = $_SESSION['username'];
    $finalresult =  "insert into user(username, totalques, answerscorrect) values ('$name', '5', '$result')";
    $queryresult = mysqli_query($con, $finalresult);

?>

</table>
<a href="logout.php" class="btn btn-success">logout</a>
</div>
</body> 
</html>

