<?php

$url = 'https://opentdb.com/api.php?amount=10&type=boolean';
$content = file_get_contents($url);

$result = json_decode($content, true);

$randomNumber = rand(0, count($result['results']) - 1);
$question = $result['results'][$randomNumber]['question'];

?>




<form action="web_quiz.php" method="GET">
    <label for="question"> 
        <?php 
            print_r($question);
        ?> 
    </label>
</form>