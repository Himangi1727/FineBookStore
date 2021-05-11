<?php

include_once '../app/StoreFunctions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $storeFunctions = new StoreFunctions();

    $firstName = filter_input(INPUT_POST,"first-name",FILTER_SANITIZE_STRING);
    $lastName = filter_input(INPUT_POST,"last-name",FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL);
    $isbn = filter_input(INPUT_POST,"isbn",FILTER_SANITIZE_STRING);

    $buyerID = $storeFunctions->addBuyer($firstName,$lastName,$email)["message"];
    $output = $storeFunctions->makePurchase($buyerID,$isbn);

    if ($output["error"] == "false"){
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