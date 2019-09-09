<?php

interface Cart{
    public function getItems();
    public function addItem($item);
    public function removeItem($item);
    public function calculateTotal();
    public function processPayment($account,$amount);
}

interface ProductCollection{
    public function getItems();
    public function addItem(Product $item);
    public function removeItem(Product $item);
}

//BAD
public function calculate(array $array){
    $t=0;
    foreach($array as $r){
        $t+=$r->getPrice()*$r->getQuantity();
    }
    return $t;
}

//GOOD
public function calculateProductsTotal(ProductCollection $products){
    $total = 0;
    foreach($products as $product){
        $total += $product->getPrice() * $product->getQuantity();
    }
    return $total;
}

class Collection{

}

class ArrayCollection extends Collection{
    //collection of Array
}

public function something(){
    $userCollection = []; //That's not a collection! Better call that $userGroups or $userArray
}


class ProductInfo{
    //[...]
}

class ProductData{ //you have made the names different without making them mean anything different

    //[...]
}

//BAD
public function copyFileInDirectory($path,$path){

}

//GOOD
public function copyFileInDirectory(string $sourceFilePath,string $destinationDirectoryPath){

}



class Address{

    private $name;
    private $lastName;
    private $street;
    private $postalCode;
    // enough context
}

public function generateReceipt(){
    // [...]

    $name = "something"; //Is that the name of what? better write $addressName;
}

class Product{
    public function addDiscountCode($code){
        // ...enough context
    }
}

//prefix needed
public function addProductDiscountCode(Product $product, string $code){

}
