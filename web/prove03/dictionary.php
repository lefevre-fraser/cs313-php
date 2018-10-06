<?php

class Product {
	public $name;
	public $price;
	public $pictureName;

	function display() {
		return $this->name . " is $" . $this->price . " and can be seen at " . $this->pictureName;
	}
}

$dictionaryFile = fopen("dictionary.txt", "r");

$products = array();

while (! feof($dictionaryFile)) {
	$regexp 		= '/`/';
	$productString 	= fgets($dictionaryFile);
	$productArray 	= preg_split($regexp, $productString);

	$product 				= new Product();
	$product->name 			= $productArray[0];
	$product->price  		= $productArray[1];
	$product->pictureName 	= $productArray[2];

	array_push($products, $product);
}

// foreach ($products as $key => $value) {
// 	echo $value->display();
// }

?>