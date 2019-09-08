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

