
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sample Blog using PHP driver for MongoDB</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="blog.css" rel="stylesheet">

   <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Navigation bar at the top -->
    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item active" href="index.php">Home</a>
          <a class="blog-nav-item" href="api/index.php">API</a>
        </nav>
      </div>
    </div>

    <div class="container">

      <!-- Blog header -->
      <div class="blog-header">
        <h1 class="blog-title">El Blog de GGVD</h1>
        <p class="lead blog-description">Ejemplo usando el driver de PHP sobre MongoDB</p>
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">

          <?php
            // Setup $command, $tag, $id and $author variables with the values passed by URL
            if (isset($_GET['command'])) {
              $command = $_GET['command'];
            }
            else {
              $command = 'nothing';
            }
            if (isset($_GET['tag'])) $tag = $_GET['tag'];
            if (isset($_GET['id'])) $id = $_GET['id'];
            if (isset($_GET['author'])) $author = $_GET['author'];

            // Decide what to show depending on the command used to load index.php
            switch ($command) {
              case 'showPostsByTag':
                include('showPostsByTag.php');
                break;

              case 'showMore':
                include('showMore.php');
                break;

              case 'showPostsCommentedByAuthor':
                include('showPostsCommentedByAuthor.php');
                break;
              
              case 'nothing':
                include("showPosts.php");
                break;
            }
            
          ?>

        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          <!-- Right sidebar with an About section -->
          <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Blog de ejemplo de sobre una base de datos MongoDB usando el driver para PHP</p>
          </div>

          <!-- Right sidebar with the list of authors that have written a comment -->
          <div class="sidebar-module">
            <?php
              include("commentsAuthor.php");
            ?>
          </div>
       </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </div><!-- /.container -->

    <footer class="blog-footer">
      <p>Blog template built for <a href="http://getbootstrap.com">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
