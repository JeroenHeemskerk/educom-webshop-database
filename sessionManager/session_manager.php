<?php

function user_login($user)
{
    if (!isset($_SESSION)) session_start();
    $_SESSION['sid'] = session_id();
    $_SESSION['email'] = $user['email'];
    $_SESSION['naam'] = $user['naam'];
    $_SESSION['cart'] = array(array('id' => 2, 'nbrItems' => 30));
}

function do_user_logout()
{
    if (!isset($_SESSION)) session_start();
    session_unset();
    session_destroy();
}

function is_user_logged_in()
{
    return isset($_SESSION['email']);
}
function get_logged_user_name()
{
    return $_SESSION['naam'];
}
function get_logged_user()
{
    return findUserByEmail($_SESSION['email']);
}

function setUpCartElement($id, $nbrOfItems = 1)
{
    $cart = $_SESSION['cart'];
    $_SESSION['cart'] = addItemToCartArray($id, $nbrOfItems, $cart);
}

function getCartElements()
{
    return $_SESSION['cart'];
}

function addItemToCartArray($id, $nbrOfItems, $cart)
{
    $idExist = false;
    $result = array_map(
        function ($el) use ($id, $nbrOfItems, &$idExist) {
            print_r($el);
            if ($id == $el['id']) {
                $nbrOfItems += $el['nbrOfItems'];
                $idExist = true;
                return array('id' => $id, 'nbrOfItems' => $nbrOfItems += $el['nbrOfItems']);
            } else return $el;
        },
        $cart
    );
    if (!$idExist) array_push($cart, array('id' => $id, 'nbrOfItems' => $nbrOfItems));
    return $result;
}
