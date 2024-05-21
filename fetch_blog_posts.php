<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT title, summary, link FROM blog_posts";
$result = $conn->query($sql);

$blog_posts = [];
if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        $blog_posts[] = $row;
    }
} else {
    echo "0 results";
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>blogReynold</title>
  <link rel="stylesheet" href="blog.css">
  <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
</head>
<body>
  <header>
  </header>
  <nav class="navbar">
    <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="gallery.html">Gallery</a></li>
        <li><a href="blog.html">Blog</a></li>
        <li><a href="contact.html">Contact</a></li>
    </ul>
  </nav>
  <main>
    <section id="blog-posts">
      <h1>This is my Blog, hope you enjoy it</h1>
      <div class="blog-container">
          <?php foreach($blog_posts as $post): ?>
          <div class="blog-post">
              <h2><?php echo $post['title']; ?></h2>
              <p><?php echo $post['summary']; ?></p>
              <a href="<?php echo $post['link']; ?>" class="read-more">Read More</a>
          </div>
          <?php endforeach; ?>
      </div>
    </section>
  </main>
</body>
</html>
