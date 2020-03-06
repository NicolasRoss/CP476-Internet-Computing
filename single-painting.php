<?php
// include 'include/config.php';
include 'functions.php';

$DB = getDB();

if (isset($_GET["id"])) {
	$query = "SELECT p.Title, p.ImageFileName, p.Excerpt, p.MSRP, p.YearOfWork, p.Medium, p.Height, p.Width, g.GalleryName, g.GalleryCity, g.GalleryCountry, a.FirstName, a.LastName FROM paintings p, artists a, galleries g WHERE p.ArtistID = a.ArtistID AND p.GalleryID = g.GalleryID AND p.PaintingID = ".$_GET['id']."";
	$query_result = runQuery($DB, $query);
	$row = mysqli_fetch_assoc($query_result);
	$title = $row["Title"];
	$image = $row["ImageFileName"];
	$excerpt = $row["Excerpt"];
	$msrp = $row["MSRP"];
	$first = $row["FirstName"];
	$last = $row["LastName"];
	$date = $row["YearOfWork"];
	$medium = $row["Medium"];
	$height = $row["Height"];
	$width = $row["Width"];
	$home = $row["GalleryName"];
	$city = $row["GalleryCity"];
	$country = $row["GalleryCountry"];

	$query = "SELECT g.GenreName FROM paintings p, paintinggenres pg, genres g WHERE p.PaintingID = pg.PaintingID AND pg.GenreID = g.GenreID AND p.PaintingID = ".$_GET['id']."";
	$query_result = runQuery($DB, $query);
	$row = mysqli_fetch_assoc($query_result);
	$genre = $row["GenreName"];

	$query = "SELECT s.SubjectName FROM paintings p, paintingsubjects ps, subjects s WHERE p.PaintingID = ps.PaintingID AND ps.SubjectID = s.SubjectID AND p.PaintingID = ".$_GET['id']."";
	$query_result = runQuery($DB, $query);
	$row = mysqli_fetch_assoc($query_result);
	$subject = $row["SubjectName"];
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="css/reset.css" rel="stylesheet">
   <link href="css/assign1.css" rel="stylesheet">
</head>

<body>
    <header>    
        <nav class="navBar">
            <a href="#">My Account</a>
            <a href="#">Wish List</a>
            <a href="#">Shopping Cart</a>
            <a href="#">Checkout</a>
        </nav>
    </header>
	
    <h1>Art Store</h1>
    <nav class="section navBar">
        <a href="#">Home</a>
        <a href="#">About Us</a>
        <a href="#">Art Works</a>
        <a href="#">Artists</a>
    </nav>

    <div class="section main">
        <h2><?php echo $title ?></h2>
        <p class="creator">By <a href="#"> <?php echo $first." ".$last ?></a></p>

        <div class="selectedProduct">
            <img id="portrait" class="portrait" src="images/medium/<?php echo $image ?>.jpg"/>
            <div class="portraitDesc">
                <p class="desc"><?php echo $excerpt ?></p>
				
                <p class="price"><b><span class="bold red"><?php echo $msrp ?></span></b></p>
                <div class="buttons">
                    <button class="mainButtons">Add to Wish List</button>
                    <button class="mainButtons">Add to Shopping Cart</button>
                </div>
                <div>
				
                <h3>Product Details</h3>
                <hr>
                <table class="portraitDetails">
                    <tr>
                        <td class="detail">Date:</td>
                        <td><?php echo $date ?></td>
                    </tr>
                    <tr>
                        <td class="detail">Medium:</td>
                        <td><?php echo $medium ?></td>
                    </tr>
                    <tr>
                        <td class="detail">Dimensions:</td>
                        <td><?php echo $height."cm x ".$width."cm" ?></td>
                    </tr>
                    <tr>
                        <td class="detail">Home:</td>
                        <td><a href="#"><?php echo $home.", ".$city.", ".$country ?></a></td>
                    </tr>
                    <tr>
                        <td class="detail">Genres;</td>
                        <td><a href="#"><?php echo $genre ?></a></td>
                    </tr>
                    <tr>
                        <td class="detail">Subjects:</td>
                        <td><a href="#"><?php echo $subject ?></a></td>
                    </tr>
                </table>
                </div>
            </div>
        </div>

        <div class="related">
            <h3>Similar Products</h3>
            <hr>
            <div class="similarProducts">
                <div class="section similar">
                    <img src="images/square-medium/116010.jpg">
                    <a href="#">Artist Holding a Thistle</a>
                    <br>
                    <button>View</button>
                    <button>Wish</button>
                    <button>Cart</button>
                </div>
                <div class="section similar">
                    <img src="images/square-medium/120010.jpg">
                    <a href="#">Portrait of Eleanor of Toledo</a>
                    <br>
                    <button>View</button>
                    <button>Wish</button>
                    <button>Cart</button>
                </div>
                <div class="section similar">
                    <img src="images/square-medium/107010.jpg">
                    <a href="#">Madame do Pompadour</a>
                    <br>
                    <button>View</button>
                    <button>Wish</button>
                    <button>Cart</button>
                </div>
                <div class="section similar">
                    <img src="images/square-medium/106020.jpg">
                    <a href="#">Girl with a pearl Earring</a>
                    <br>
                    <button>View</button>
                    <button>Wish</button>
                    <button>Cart</button>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>All images are copyright to their owners. This is just a hypothetical site &#9400; 2014 Copyright Art Store</p>
    </footer>
</body>
</html>
