<?php

include 'DBConnection.php';
class StoreFunctions
{
    public function registerUser($email,$name,$password){
        $conn = DBConnection::dbConnect();
        $query = "INSERT INTO users(email,name,userPassword) VALUES(?,?,?)";

        if ($stmt=mysqli_prepare($conn,$query)){
            mysqli_stmt_bind_param($stmt,'sss',$paramEmail,$paramName,$paramPassword);
            $paramEmail = $this->cleanData($email);
            $paramName = $this->cleanData($name);
            $paramPassword = password_hash($this->cleanData($password),PASSWORD_DEFAULT);

            if (mysqli_stmt_execute($stmt)){
                $output=array("error"=>"false","message"=>"success");
            }else{
                $output = array("error"=>"true","message"=>"failed registering user");
            }
            mysqli_stmt_close($stmt);
        }else{
            $output = array("error"=>"true","message"=>"failed registering user");
        }
        mysqli_close($conn);
        return $output;
    }

    public function login($email,$password){
        $conn = DBConnection::dbConnect();
        $query= "SELECT userID,email,userPassword FROM users WHERE email = ?";

        if ($stmt = mysqli_prepare($conn,$query)){
            mysqli_stmt_bind_param($stmt,'s',$paramEmail);
            $paramEmail = $this->cleanData($email);

            if (mysqli_stmt_execute($stmt)){
                mysqli_stmt_bind_result($stmt,$returnedUserID,$returnedUsername,$returnedPassword);
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) < 1 ){
                    $output = array("error"=>"true","message"=>"Account does not exist");
                }elseif (mysqli_stmt_num_rows($stmt) >= 1){
                    while (mysqli_stmt_fetch($stmt)){
                        if (password_verify($this->cleanData($password),$returnedPassword)){
                            //login success
                            //redirect
                            //setting sessions
                            $output = array("error"=>"false","message"=>$returnedUserID);
                        }else{
                            $output = array("error"=>"true","message"=>"Incorrect login credentials");
                        }
                    }
                }
                else{
                    $output=array("error"=>"true","message"=>"Account does not exist");
                }
            }else{
                $output=array("error"=>"true","message"=>"Oops! Something went wrong");
            }
            mysqli_stmt_close($stmt);
        }else{
            $output=array("error"=>"true","message"=>"Oops! Something went wrong");
        }
        mysqli_close($conn);
        return $output;
    }

    public function addBook($ISBN,$title,$author,$price,$quantity){
        $conn = DBConnection::dbConnect();
        $query = "INSERT INTO book(ISBN,title,author,price,quantity) VALUES(?,?,?,?,?)";

        if ($stmt=mysqli_prepare($conn,$query)){
            mysqli_stmt_bind_param($stmt,'sssss',$paramISBN,$paramTitle,$paramAuthor,$paramPrice,
            $paramQuantity);
            $paramAuthor = $this->cleanData($author);
            $paramISBN = $this->cleanData($ISBN);
            $paramPrice = $this->cleanData($price);
            $paramTitle = $this->cleanData($title);
            $paramQuantity = $this->cleanData($quantity);

            if (mysqli_stmt_execute($stmt)){
                $output=array("error"=>"false","message"=>"success");
            }else{
                $output=array("error"=>"true","message"=>"failed adding book");
            }
            mysqli_stmt_close($stmt);
        }else{
            $output=array("error"=>"true","message"=>"failed adding book");
        }
        mysqli_close($conn);
        return $output;
    }

    public function deleteBook($ISBN){
        $conn = DBConnection::dbConnect();
        $query = "DELETE FROM book WHERE ISBN = ?";

        if ($stmt=mysqli_prepare($conn,$query)){
            mysqli_stmt_bind_param($stmt,'s',$paramISBN);
            $paramISBN = $this->cleanData($ISBN);

            if (mysqli_stmt_execute($stmt)){
                $output=array("error"=>"false","message"=>"success");
            }else{
                $output=array("error"=>"true","message"=>"failed deleting book");
            }
            mysqli_stmt_close($stmt);
        }else{
            $output=array("error"=>"true","message"=>"failed deleting book");
        }
        mysqli_close($conn);
        return $output;
    }

    public function addBuyer($firstName,$lastName,$email){
        $conn = DBConnection::dbConnect();
        $query="INSERT INTO buyer(firstName,lastName,email) VALUES(?,?,?)";

        if ($stmt=mysqli_prepare($conn,$query)){
            mysqli_stmt_bind_param($stmt,"sss",$paramFirstName,$paramLastName,$paramEmail);
            $paramLastName = $this->cleanData($lastName);
            $paramEmail = $this->cleanData($email);
            $paramFirstName = $this->cleanData($firstName);


            if (mysqli_stmt_execute($stmt)){
                $buyerID = mysqli_stmt_insert_id($stmt);
                $output=array("error"=>"false","message"=>$buyerID);
            }else{
                $output=array("error"=>"true","message"=>"failed adding buyer");
            }
            mysqli_stmt_close($stmt);
        }else{
            $output=array("error"=>"true","message"=>"failed adding buyer");
        }
        mysqli_close($conn);
        return $output;
    }

    public function isStockAvailable($ISBN){
        $conn = DBConnection::dbConnect();
        $query = "SELECT quantity FROM book WHERE ISBN = ?";

        if ($stmt=mysqli_prepare($conn,$query)){
            mysqli_stmt_bind_param($stmt,'s',$paramISBN);
            $paramISBN = $this->cleanData($ISBN);

            if (mysqli_stmt_execute($stmt)){
                mysqli_stmt_bind_result($stmt,$fetchedQuantity);
                while (mysqli_stmt_fetch($stmt)){
                    $val = $fetchedQuantity;
                }
                if ($val > 0){
                    $output=true;
                }else{
                    $output=false;
                }
            }else{
                $output = false;
            }
            mysqli_stmt_close($stmt);
        }else{
            $output=false;
        }
        mysqli_close($conn);
        return $output;
    }
    public function makePurchase($buyerID,$ISBN){
        if ($this->isStockAvailable($ISBN)){
            $conn = DBConnection::dbConnect();
            $query = "INSERT INTO purchases(buyerID,ISBN) VALUES(?,?)";

            if ($stmt=mysqli_prepare($conn,$query)){
                mysqli_stmt_bind_param($stmt,'is',$paramBuyerID,$paramISBN);
                $paramISBN = $this->cleanData($ISBN);
                $paramBuyerID = $this->cleanData($buyerID);

                if (mysqli_stmt_execute($stmt)){
                    $output=array("error"=>"false","message"=>"success");
                }else{
                    $output=array("error"=>"true","message"=>"failed making purchase");
                }
                mysqli_stmt_close($stmt);
            }else{
                $output=array("error"=>"true","message"=>"failed making purchase");
            }
            mysqli_close($stmt);
        }else{
            $output=array("error"=>"true","message"=>"out of stock");
        }

        return $output;
    }

    public function listBooks(){
        $conn = DBConnection::dbConnect();
        $query = "SELECT ISBN,title,author,price,quantity FROM book";

        if ($stmt=mysqli_prepare($conn,$query)){
            if (mysqli_stmt_execute($stmt)){
                mysqli_stmt_bind_result($stmt,$fetchedISBN,$fetchedTitle,$fetchedAuthor,$fetchedPrice,
                $fetchedQuantity);
                while (mysqli_stmt_fetch($stmt)){
                    $data[]=array("isbn"=>$fetchedISBN,"title"=>$fetchedTitle,"author"=>$fetchedAuthor,"price"=>$fetchedPrice,
                        "quantity"=>$fetchedQuantity);
                }
                $output=array("error"=>"false","message"=>$data);
            }else{
                $output=array("error"=>"true","message"=>"failed listing books");
            }
            mysqli_stmt_close($stmt);
        }else{
            $output=array("error"=>"true","message"=>"failed listing books");
        }
        mysqli_close($conn);
        return $output;
    }

    public function selectSingleBook($ISBN){
        $conn = DBConnection::dbConnect();
        $query = "SELECT ISBN,title,author,price,quantity FROM book WHERE ISBN = ?";

        if ($stmt=mysqli_prepare($conn,$query)){
            mysqli_stmt_bind_param($stmt,'s',$paramISBN);
            $paramISBN = $this->cleanData($ISBN);

            if (mysqli_stmt_execute($stmt)){
                mysqli_stmt_bind_result($stmt,$fetchedISBN,$fetchedTitle,$fetchedAuthor,$fetchedPrice,
                $fetchedQuantity);
                while (mysqli_stmt_fetch($stmt)){
                    $data[]=array("isbn"=>$fetchedISBN,"title"=>$fetchedTitle,"author"=>$fetchedAuthor,"price"=>$fetchedPrice,
                        "quantity"=>$fetchedQuantity);
                }
                $output=array("error"=>"false","message"=>$data);
            }else{
                $output=array("error"=>"true","message"=>"failed listing book");
            }
            mysqli_stmt_close($stmt);
        }else{
            $output=array("error"=>"true","message"=>"failed listing book");
        }
        mysqli_close($conn);
        return $output;
    }

    public function listPurchases(){
        $conn = DBConnection::dbConnect();
        $query="SELECT p.buyerID,buy.firstName,buy.lastName,p.ISBN,b.title,p.purchaseDate,b.price FROM purchases p INNER JOIN 
                  book b ON b.ISBN = p.ISBN INNER JOIN buyer buy ON buy.id = p.buyerID";

        if ($stmt = mysqli_prepare($conn,$query)){
            if (mysqli_stmt_execute($stmt)){
                mysqli_stmt_bind_result($stmt,$fetchedBuyerID,$fetchedBuyerFirstName,$fetchedBuyerLastName,
                $fetchedISBN,$fetchedTitle,$fetchedPurchaseDate,$fetchedPrice);

                while (mysqli_stmt_fetch($stmt)){
                    $data[]=array("buyer_id"=>$fetchedBuyerID,"first_name"=>$fetchedBuyerFirstName,
                        "last_name"=>$fetchedBuyerLastName,"book_isbn"=>$fetchedISBN,"book_title"=>$fetchedTitle,
                        "purchase_date"=>$fetchedPurchaseDate,"price"=>$fetchedPrice);
                }
                $output=array("error"=>"false","message"=>$data);
            }else{
                $output=array("error"=>"true","message"=>"failed listing purchases");
            }
            mysqli_stmt_close($stmt);
        }else{
            $output=array("error"=>"true","message"=>"failed listing purchases");
        }
        mysqli_close($conn);
        return $output;
    }

    public function listCustomers(){
        $conn = DBConnection::dbConnect();
        $query="SELECT id,firstName,lastName,email FROM buyer";

        if ($stmt=mysqli_prepare($conn,$query)){
            if (mysqli_stmt_execute($stmt)){
                mysqli_stmt_bind_result($stmt,$fetchedId,$fetchedFirstName,$fetchedLastName,$fetchedEmail);
                while (mysqli_stmt_fetch($stmt)){
                    $data[]=array("id"=>$fetchedId,"first_name"=>$fetchedFirstName,"last_name"=>$fetchedLastName,
                        "email"=>$fetchedEmail);
                }
                $output=array("error"=>"false","message"=>$data);
            }else{
                $output=array("error"=>"true","message"=>"failed listing customers");
            }
            mysqli_stmt_close($stmt);
        }else{
            $output=array("error"=>"true","message"=>"failed listing customers");
        }
        mysqli_close($conn);
        return $output;
    }
//    purchases cost
//SELECT SUM(b.price) FROM purchases p INNER JOIN book b ON b.ISBN = p.ISBN INNER JOIN buyer buy ON buy.id = p.buyerID
//total books sold
//SELECT COUNT(p.ISBN) FROM purchases p INNER JOIN book b ON b.ISBN = p.ISBN INNER JOIN buyer buy ON buy.id = p.buyerID
//SELECT SUM(b.price), COUNT(p.ISBN) FROM purchases p INNER JOIN book b ON b.ISBN = p.ISBN INNER JOIN buyer buy ON buy.id = p.buyerID
//total customers
//SELECT COUNT(id) FROM buyer
//count books in stock
//SELECT COUNT(ISBN) FROM book
    public function populateCardInfo(){
        $conn=DBConnection::dbConnect();
        $query="SELECT SUM(b.price), COUNT(p.ISBN) FROM purchases p INNER JOIN book b ON b.ISBN = p.ISBN INNER JOIN 
            buyer buy ON buy.id = p.buyerID";

        if ($stmt=mysqli_prepare($conn,$query)){
            if (mysqli_stmt_execute($stmt)){
                mysqli_stmt_bind_result($stmt,$fetchedSumSales,$fetchedBooksSoldCount);
                while(mysqli_stmt_fetch($stmt)){
                    $data=array("total_sales"=>$fetchedSumSales,"sold_books"=>$fetchedBooksSoldCount);
                }
                $output=array("error"=>"false","message"=>$data);
            }else{
                $output=array("error"=>"true","message"=>"failed populating card info");
            }
            mysqli_stmt_close($stmt);
        }else{
            $output=array("error"=>"true","message"=>"failed listing card info");
        }
        mysqli_close($conn);
        return $output;
    }

    public function countBuyers(){
        $conn = DBConnection::dbConnect();
        $query = "SELECT COUNT(id) FROM buyer";

        if ($stmt=mysqli_prepare($conn,$query)){
            if (mysqli_stmt_execute($stmt)){
                mysqli_stmt_bind_result($stmt,$fetchedBuyerCount);
                while (mysqli_stmt_fetch($stmt)){
                    $data=array("total_buyers"=>$fetchedBuyerCount);
                }
                $output=array("error"=>"false","message"=>$data);
            }else{
                $output=array("error"=>"true","message"=>"failed counting buyers");
            }
            mysqli_stmt_close($stmt);
        }else{
            $output=array("error"=>"true","message"=>"failed counting buyers");
        }
        mysqli_close($conn);
        return $output;
    }

    public function countBooksInStock(){
        $conn = DBConnection::dbConnect();
        $query = "SELECT COUNT(ISBN) FROM book";

        if ($stmt=mysqli_prepare($conn,$query)){
            if (mysqli_stmt_execute($stmt)){
                mysqli_stmt_bind_result($stmt,$fetchedBooksCount);
                while (mysqli_stmt_fetch($stmt)){
                    $data=array("books_stock"=>$fetchedBooksCount);
                }
                $output=array("error"=>"false","message"=>$data);
            }else{
                $output=array("error"=>"true","message"=>"failed counting books in stock");
            }
            mysqli_stmt_close($stmt);
        }else{
            $output=array("error"=>"true","message"=>"failed counting books in stock");
        }
        mysqli_close($conn);
        return $output;
    }
    public function cleanData($data){
        return htmlspecialchars(htmlentities(htmlspecialchars(strip_tags(trim($data)))));
    }
}