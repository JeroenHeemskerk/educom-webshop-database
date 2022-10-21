<?php

function test(){
    $cart = array(array('id'=>1, 'nbrOfItems'=>2),array('id'=>2, 'nbrOfItems'=>2),array('id'=>3, 'nbrOfItems'=>2),array('id'=>6, 'nbrOfItems'=>2));
    print_r(addItemToCart(6,12,$cart));
    /*
    $arr=array (1,2,3,4,5);
    $m=3;
    print_r(array_map(function($el)use($m){
        if($el % 2==0)
        return array('id'=>1, 'nbrOfItems'=>2);
    },$arr));
    */
}

function addItemToCart($id,$nbrOfItems,$cart){
    $idExist = false;
    $result=array_map(
        function($el)use($id,$nbrOfItems,&$idExist){         
            if($id == $el['id']){
                $nbrOfItems+=$el['nbrOfItems'];
                $idExist = true;
                return array('id'=>$id, 'nbrOfItems'=>$nbrOfItems+=$el['nbrOfItems']);
            }else return $el;
        },$cart);
    if(!$idExist)array_push($cart,array('id'=> $id, 'nbrOfItems'=>$nbrOfItems));
    return $result;
}