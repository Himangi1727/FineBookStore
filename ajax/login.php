<?php

include_once '../app/StoreFunctions.php';

if ($_SERVER["REQUEST_METHOD"] =="POST"){
    $storeFunctions = new StoreFunctions();

    $email = filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL);
    $password= filter_input(INPUT_POST,"password",FILTER_SANITIZE_STRING);

    $output = $storeFunctions->login($email,$password);

    if ($output["error"]=="false"){
        session_start();
        $_SESSION['id'] = $output['message'];
        ?>
        <hr><div class="alert alert-success"><p align="center"><strong>
                    <i class="fa info"></i> Success!</strong>
            </p></div>
        <script id="results-ajax">setTimeout(function(){
                window.location.replace('index.php');
            }, 1000);</script>
        <?php
    }else{
        ?>
        <hr><div class="alert alert-danger"><p align="center"><strong>
                    <i class="fa fa-exclamation-triangle"></i> Error Processing Request!</strong>
                <?php echo $output['message']?></p></div>
        <?php
    }
}else{
    ?>
    <hr><div class="alert alert-danger"><p align="center"><strong>
                <i class="fa fa-exclamation-triangle"></i> Error Processing Request!</strong>
            Ooops! Something went wrong</p></div>
    <?php
}
