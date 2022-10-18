<?php

function database_connect($servername = "127.0.0.1", $username = "webshopuser", $password = "ZnYuNE6kEG7QHGa",$dbname = "abdel_webshop" )
{
    try{
    $conn = mysqli_connect($servername, $username, $password,$dbname);
    if (!$conn)  throw new Exception ("Connection failed: " . mysqli_connect_error());
    return $conn;
    }catch(Exception $e){
        echo 'Error message : '. $e->getMessage() . '<BR>';
    }
       
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
        if(!mysqli_query($conn, $sql))throw new Exception("user is not added");
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
        $conn = database_connect();

        $sql = "SELECT name, email, password FROM users WHERE email='" . $email . "'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                
                return array('naam' => $row["name"], 'email' => $row["email"], 'wachtwoord' => $row["password"]);
            }
            
        } else {
            
            echo null;
        }
    } catch (Exception $e) {
        echo "MEssage : " . $e->getMessage();
    } finally {
        database_disconnect($conn);
    }
    
}
