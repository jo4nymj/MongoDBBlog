<?php
// Connect to the database 
include_once("connection.php");

// Store in an array the (distinct) authors stored in the collection
/**********
** YOUR CODE HERE:
Assign to $authorArray all the distinct authors of comments.
See the 'distinct' method of MongoDB collections
**********/

echo '<h4>Autores de comentarios</h4>';
echo '<ol class="list-unstyled">';

// Show the authors
// Each author is an hyperlink to index.php with this two GET parameters:
// command: 'showPostsCommentedByAuthor' 
// name: the name of the author

/**********
** YOUR CODE HERE:
Iterate through the array of authors (use the variable $authorArray)
For each author, print an hyperlink with the full name of the author
The link points to index.php with two parameters:
* command =  showPostsCommentedByAuthor
* author = the full name of the author
**********/
$authorArray = $collection->distinct('comments.author');
foreach ($authorArray as $author) {
	if($author != ""){
		$link = str_replace(" ", "%", $author);
		echo '<p> <a href = index.php?command=showPostsCommentedByAuthor&author=' . $link . '>' . $author . '</a></p>';
	}
}

echo '</ol>';
?>
