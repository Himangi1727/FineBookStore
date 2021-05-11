<?php
error_reporting(0);
session_start();

include_once 'app/StoreFunctions.php';

if (!isset($_SESSION['id'])){
    header("Location: login.html");
}

$storeFunctions = new StoreFunctions();

$allBooks = $storeFunctions->listBooks()["message"];
$allCustomers = $storeFunctions->listCustomers()["message"];
$allPurchases = $storeFunctions->listPurchases()["message"];

$cardDetails = $storeFunctions->populateCardInfo();

$buyers = $storeFunctions->countBuyers()["message"]["total_buyers"];
$booksInStock = $storeFunctions->countBooksInStock()["message"]["books_stock"];
$totalSales = $cardDetails['message']['total_sales'];
$soldBooks = $cardDetails['message']['sold_books'];



