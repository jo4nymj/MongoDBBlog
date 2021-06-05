<?php
require 'vendor/autoload.php';

// Setup MongoDB connection
$connection = NULL;

/**********
** YOUR CODE HERE:
Assign to $connection the connection to MongoDB
**********/
$connection = new MongoDB\Client;

// Select the "posts" collection in the database "blog"
$collection = NULL;

/**********
** YOUR CODE HERE:
Assign to $collection the the "posts" collection of the database "blog"
**********/

$database = $connection->blog;

$collection = $database->posts;
?>
