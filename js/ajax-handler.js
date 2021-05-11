// ECMAScript 5
"use strict";

function login(event) {
    event.preventDefault();

    let email = document.getElementById("login-email").value;
    let password = document.getElementById("login-password").value;

    let errorMessageDiv = document.getElementById("login-error-message");
    if (email === "" || password === ""){
        errorMessageDiv.innerHTML = "<hr><div class=\"alert alert-danger\">" +
            "<p align=\"center\"><strong> <i class=\"fa fa-exclamation-triangle\"></i> Error Processing Request!</strong>\n" +
            "                Fill in all the required fields </p></div>";
    }else{
        let loginForm = new FormData();

        loginForm.append("email",email);
        loginForm.append("password",password);

        let xhr = new XMLHttpRequest();
        xhr.open("post","ajax/login.php",true);
        xhr.onload = function () {
            errorMessageDiv.innerHTML = "";
            errorMessageDiv.insertAdjacentHTML("beforeend", xhr.responseText);
            if (document.getElementById("results-ajax") !== null){
                eval(document.getElementById("results-ajax").innerHTML);
            }
        };

        xhr.send(loginForm);
    }
}

function register(event) {
    event.preventDefault();
    let name = document.getElementById("register-name").value;
    let email = document.getElementById("register-email").value;
    let password = document.getElementById("register-password").value;
    let confirmPassword = document.getElementById("register-confirm-password").value;

    let errorMessageDiv = document.getElementById("register-error-message");

    if (name === "" || email === "" || password === "" || confirmPassword === ""){
        errorMessageDiv.innerHTML = "<hr><div class=\"alert alert-danger\">" +
            "<p align=\"center\"><strong> <i class=\"fa fa-exclamation-triangle\"></i> Error Processing Request!</strong>\n" +
            "                Fill in all the required fields </p></div>";
    }else if (password !== confirmPassword){
        errorMessageDiv.innerHTML = "<hr><div class=\"alert alert-danger\">" +
            "<p align=\"center\"><strong> <i class=\"fa fa-exclamation-triangle\"></i> Error Processing Request!</strong>\n" +
            "                Passwords do not match </p></div>";
    }else{
        let adminRegisterForm = new FormData();

        adminRegisterForm.append("name",name);
        adminRegisterForm.append("email",email);
        adminRegisterForm.append("password",password);

        let xhr = new XMLHttpRequest();
        xhr.open("post","ajax/register.php",true);
        xhr.onload = function () {
            errorMessageDiv.innerHTML = "";
            errorMessageDiv.insertAdjacentHTML("beforeend", xhr.responseText);
            if (document.getElementById("results-ajax") !== null){
                eval(document.getElementById("results-ajax").innerHTML);
            }
        };
        xhr.send(adminRegisterForm);
    }
}

function addBook(event) {
    event.preventDefault();

    let isbn = document.getElementById("book-isbn").value;
    let title = document.getElementById("book-title").value;
    let author = document.getElementById("book-author").value;
    let price = document.getElementById("book-price").value;
    let quantity = document.getElementById("book-quantity").value;

    let errorMessageDiv = document.getElementById("book-error-message");
    if (isbn === "" || title === "" || author === "" || price === "" || quantity === ""){
        errorMessageDiv.innerHTML = "<hr><div class=\"alert alert-danger\">" +
            "<p align=\"center\"><strong> <i class=\"fa fa-exclamation-triangle\"></i> Error Processing Request!</strong>\n" +
            "                Fill in all the required fields </p></div>";
    }else{
        let addBookForm = new FormData();

        addBookForm.append("isbn",isbn);
        addBookForm.append("title",title);
        addBookForm.append("author",author);
        addBookForm.append("price",price);
        addBookForm.append("quantity",quantity);

        let xhr = new XMLHttpRequest();
        xhr.open("post","ajax/add-book.php",true);
        xhr.onload = function () {
            errorMessageDiv.innerHTML = "";
            errorMessageDiv.insertAdjacentHTML("beforeend", xhr.responseText);
            if (document.getElementById("results-ajax") !== null){
                eval(document.getElementById("results-ajax").innerHTML);
            }
        };
        xhr.send(addBookForm);
    }
}

function addCustomer(event) {
    event.preventDefault();
    console.log("Adding");
    let firstName = document.getElementById("customer-first-name").value;
    let lastName = document.getElementById("customer-last-name").value;
    let email = document.getElementById("customer-email").value;
    let isbn = document.getElementById("isbn").value;

    let errorMessageDiv = document.getElementById("customer-error-message");

    if (firstName === "" || lastName === "" || email === "" || isbn === ""){
        errorMessageDiv.innerHTML = "<hr><div class=\"alert alert-danger\">" +
            "<p align=\"center\"><strong> <i class=\"fa fa-exclamation-triangle\"></i> Error Processing Request!</strong>\n" +
            "                Fill in all the required fields </p></div>";
    }else{
        let purchaseForm = new FormData();

        purchaseForm.append("first-name",firstName);
        purchaseForm.append("last-name",lastName);
        purchaseForm.append("email",email);
        purchaseForm.append("isbn",isbn);

        let xhr = new XMLHttpRequest();
        xhr.open("post","ajax/add-customer.php",true);
        xhr.onload = function () {
            errorMessageDiv.innerHTML = "";
            errorMessageDiv.insertAdjacentHTML("beforeend", xhr.responseText);
            if (document.getElementById("results-ajax") !== null){
                eval(document.getElementById("results-ajax").innerHTML);
            }
        };

        xhr.send(purchaseForm);
    }
}

