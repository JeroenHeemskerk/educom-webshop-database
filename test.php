<?php

function database_connect($servername = "127.0.0.1", $username = "webshopuser", $password = "ZnYuNE6kEG7QHGa", $dbname = "abdel_webshop")
{
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn)  throw new Exception("Connection failed: " . mysqli_connect_error());
        return $conn;    
}

function database_disconnect($conn)
{
    mysqli_close($conn);
}

function saveUser($user)
{
    try {
        echo 'try ... <BR>';
        $conn = database_connect();
        $sql = "INSERT INTO users (name, email, password) 
        VALUE ('" . $user['naam'] . "', '" . $user['email'] . "','" . $user['wachtwoord'] . "')";
        if (!mysqli_query($conn, $sql)) throw new Exception("user not Found");
    } catch (Exception $e) {
        echo "Message : " . $e->getMessage();
    } finally {
        database_disconnect($conn);
    }
}

function findUserByEmail($email)
{
    $conn = database_connect();
    try {
        $sql = "SELECT name, email, password FROM users WHERE email='" . $email . "'";
        $user = mysqli_query($conn, $sql);
        if(!$user) throw new Exception("user not found" . $sql );
        if (mysqli_num_rows($user) > 0) {            
            while ($row = mysqli_fetch_assoc($user)) {
                print_r($row);
                return array('naam' => $row["name"], 'email' => $row["email"], 'wachtwoord' => $row["password"]);
            }
        } 
    } finally {
        database_disconnect($conn);
    }
}

function getProducts(){
    $conn = database_connect();
    $sql = "SELECT  * FROM products";
    try{
        $products = mysqli_query($conn, $sql);
        if(!$products)throw new Exception("GetProducts failed");
        return mysqli_fetch_all($products,MYSQLI_ASSOC);
    }finally{
        database_disconnect($conn);
    }
}

function findProductById($id){
    $conn = database_connect();
    try {
        $sql = "SELECT * FROM products WHERE product_id='" . $id . "'";
        $result = mysqli_query($conn, $sql);
        if(!$result) throw new Exception("Error by Function find product by Id : " . mysqli_error($conn) );
        $products = (mysqli_fetch_all($result,MYSQLI_ASSOC));
        print_r($products[0]);
        return sizeof($products)==1 ?  $products[0] : null;
    } finally {
        database_disconnect($conn);
    }
}
