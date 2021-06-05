<?php
// This script is included in the showXYZ.php scripts.
// In those scripts $document has been initialized with the current post

	echo '<div class="blog-post">';

	// Show post title
	echo '<h2 class="blog-post-title">';
	/**********
	** YOUR CODE HERE:
	Print the title of the post (use the variable $document)
	**********/
	echo $document['title'];
	echo '</h2>';

	// Show post date and author
	echo '<p class="blog-post-meta">';
	/**********
	** YOUR CODE HERE:
	Print the date of the post (use the variable $document)
	Format the date with this PHP method: toDateTime()->format('l, d F Y' )
	**********/
	echo $document['date']->toDateTime()->format('l, d F Y');
	echo ' by <a href="#">';
	/**********
	** YOUR CODE HERE:
	Print the author of the post (use the variable $document)
	Note that it is a hyperlink that does not point to anything. Do not change it.
	**********/
	echo $document['author'];
	echo '</a></p>';
?>
