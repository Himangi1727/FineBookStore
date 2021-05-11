<?php

include_once '../app/StoreFunctions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $storeFunctions = new StoreFunctions();

    $isbn = filter_input(INPUT_POST,"isbn",FILTER_SANITIZE_STRING);
    $title = filter_input(INPUT_POST,"title",FILTER_SANITIZE_STRING);
    $author = filter_input(INPUT_POST,"author",FILTER_SANITIZE_STRING);
    $price = filter_input(INPUT_POST,"price",FILTER_SANITIZE_NUMBER_INT);
    $quantity = filter_input(INPUT_POST,"quantity",FILTER_SANITIZE_NUMBER_INT);

    $output = $storeFunctions->addBook($isbn,$title,$author,$price,$quantity);

    if ($output["error"] == "false"){
        ?>
        <hr><div class="alert alert-success"><p align="center"><strong>
                    <i class="fa info"></i> Success!</strong>
            </p></div>
        <script id="results-ajax">setTimeout(function(){
                document.getElementById("book-error-message").innerHTML = "";
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