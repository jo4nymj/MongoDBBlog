<?php
// Get the tag to be found
$tag = $_GET['tag'];

// Connect to the database 
include_once("connection.php");

// Get 5 posts including the tag
/**********
** YOUR CODE HERE:
Get from $collection five post documents that have the tag $tag
Store the results in $documents
**********/
$documents = $collection->find(array('tags' => $tag), ['limit' => 5]);

// Show the 5 posts
foreach($documents as $document) {
	// Include the header of the post (title and date)
	include("postHeader.php");

	//Show the first 300 characters of the body of the comment
	/**********
	** YOUR CODE HERE:
	** Get the body of a post (use the variable $document)
	Print the first 300 characters of the body (use the PHP substr() function)
	**********/
    $body =  $document['body'];
	if (strlen($body) > 300)
		$body = substr($body, 0, 300) . '...';

	echo "<p>" . $body. "</p>";

	// Setup an hyperlink to obtain the full text of the post
	// The hyperlink points to index.php with this two GET parameters:
	// command: 'showMore' 
	// id: the string of the _id of the post
	$id = $document['_id'];
	echo '<a href = index.php?command=showMore&id=' . $id . '> Mostrar más</a>';
	
	// Include the labels of the post
	include("labels.php");

	// Include the comments of the post
	include("comments.php");

	echo '</div>';
}
?>
