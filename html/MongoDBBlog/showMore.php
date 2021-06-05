<?php
// Get the id of the post and convert it to an ObjectId 
// Queries using _id need it converted to a MongoId object
$objectId = new MongoDB\BSON\ObjectID($_GET['id']);

// Connect to the database 
include_once("connection.php");

// Get the post
/**********
** YOUR CODE HERE:
Get from $collection the document with the $objectId
Store the results in $documents;
**********/

$documents = $collection->findOne(['_id' => $objectId]);
echo $documents['body'];

foreach ($documents as $document) {
	// Include the header of the post (title and date)
	include("postHeader.php"); 
	//Show the body of the post
	/**********
	** YOUR CODE HERE:
	Print the body of the post (use the variable $document)
	**********/
	echo $document['body'];
	//echo "hola";
	//echo $body."</br>";
	// Include the labels of the post
	include("labels.php");

	// Include the comments of the post
	include("comments.php");

	echo '</div>';
}
?>
