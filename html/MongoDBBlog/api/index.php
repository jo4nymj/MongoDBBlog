<?php

use Phalcon\Mvc\Micro;

// Instantiate the class responsible for implementing a micro application
$app = new Micro();

// Routes

//Home
$app->get('/', 'home');
$app->get('/api', 'home');

	

/**********
** YOUR CODE HERE:
Define the routes provided in the function home 
**********/
$app->get('/api/id/{id}', 'findById');
$app->get('/api/tag/{tag}', 'findByTag');
$app->post('/api/', 'addPost');
$app->put('/api/{id}', 'addComment');

// Handlers

// Show the use of the API
function home() {


	include('head.php');
	// Describe the use of this API

	echo "<h1>Use of the API</h1>";

	echo '<table class="table table-striped">';
	echo '<tr><td>Method</td><td>URL</td><td>Description</td><td>Use</td></tr>';
	echo '<tr><td>GET</td><td>/api/id/{id}</td><td>Devuelve un post en JSON a partir de la clave proporcionada</td><td>curl -i -X GET http://localhost/mongoblog/api/api/id/50ab0f8bbcf1bfe2536dc3f8</td></tr>';
	echo '<tr><td>GET</td><td>/api/tag/{tag}</td><td>Devuelve los posts en JSON que incluyen la etiqueta proporcionada</td><td>curl -i -X GET http://localhost/mongoblog/api/api/tag/trade</td></tr>';
	echo '<tr><td>POST</td><td>/api/</td><td>Crea un nuevo post con el documento proporcionado</td><td>curl -i -X POST -d \'{"body":"Lore ipsum", "permalink": "TqoHkbHyUgLyCKWgPLqm", "author": "machine", "title": "Lore ipsum", "tags": ["Lore", "ipsum"], "comments":[{"body": "Lore ipsum", "email": "john@doe.com", "author": "John Doe"}]}\' http://localhost/mongoblog/api/api</td></tr>';
	echo '<tr><td>PUT</td><td>/api/{id}</td><td>Modifica el documento especificado añadiéndole el comentario proporcionado {body, email, author}</td><td>curl -i -X PUT -d \'{"body":"Hello world!", "email": "foo@bar.com", "author": "Foo Bar"}\' http://localhost/mongoblog/api/api/50ab0f8bbcf1bfe2536dc3f8</td></tr>';
	echo '</table>';

	include('tail.php');
}

//Searches for post with $id in the _id
function findById ($id) {

// Get the id of the post and convert it to an ObjectId 
// Queries using _id need it converted to a MongoId object
	$objectId = new MongoDB\BSON\ObjectID($id);

// Connect to the database 
	include_once("../connection.php");

// Get the post
	/**********
	** YOUR CODE HERE:
	Get from $collection the post matching with $objectId
	Assign the results to $document
	**********/
    $document = $collection->findOne(['_id' => $objectId]);

// Prepare and send the data in JSON
	echo json_encode($document);
}

//Searches for posts with $tag in 'tags'
function findByTag ($tag) {

// Connect to the database 
	include_once("../connection.php");

// Get the posts
	/**********
	** YOUR CODE HERE:
	Get from $collection the posts matching with $tag
	Assign the results to $documents
	**********/
	$documents = $collection->find(array('tags' => $tag));
	
// Iterate through results adding each matching post to the result
    foreach($documents as $document) {
	    $result[] = $document;
    }

// Prepare and send the data in JSON
	echo json_encode($result);
}

//Adds a new post
function addPost() {

	// Access to the global var $app
	global $app;

	// Connect to the database 
	include_once("../connection.php");

	// Obtain the data of the request
	$requestData = json_decode($app->request->getRawBody(), true);
	$requestData['date'] = new MongoDB\BSON\UTCDateTime;

	// Insert the post document provided on the request
	/**********
	** YOUR CODE HERE:
	Insert into $collection the document stored in $requestData
	**********/

	$collection->insertOne($requestData);
}

//Updates values from its key
function addComment($id) {

	// Access to the global var $app
	global $app;

	// Get the id of the post and convert it to an ObjectId 
	// Queries using _id need it converted to a MongoId object
	$objectId = new MongoDB\BSON\ObjectID($id);

	// Connect to the database 
	include_once("../connection.php");

	// Obtain the data of the request
	$requestData = json_decode($app->request->getRawBody());

	// Update the post adding the new comment passed on the request
	/**********
	** YOUR CODE HERE:
	Update in $collection the post matching with $objectId adding (pushing) a new comment 
	**********/
	$collection->updateOne(
	    array('_id' => $objectId), 
		array('$set' => $requestData)
	);
}

function notFound() {
	home();
}

// Handle the request
$app->handle();
?>

