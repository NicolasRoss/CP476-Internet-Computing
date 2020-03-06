<?php

//include 'include/config.php';
include 'functions.php';

$DB = getDB();

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Assignment 1 - Page 1</title>

        <link href="css/reset.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">



    </head>
    <body>

        <main style="overflow:auto;">

            <section class="leftsection" style="width=600px;  margin-right:100px;">
                <form class="ui form" method="get" action="browse-paintings.php">
                    <h3>Filters</h3>

                    <div >
                        <label style=" padding-right:22px;">Artist</label>
                        <select name="artist">
                            <option value='0'>Select Artist</option>  
                            <?php
                                $query = "SELECT LastName FROM artists";
                                $query_result = runQuery($DB, $query);

                                while ($row = mysqli_fetch_assoc($query_result)) {
                                    $lastname = $row["LastName"];
                                    echo "<option>".$lastname."</option>";
                                }
                            ?>
                        </select>
                    </div>  
                    <div >
                        <label>Museum</label>
                        <select  name="museum">
                            <option value='0'>Select Museum</option>  
                            <?php  
                                $query = "SELECT GalleryName FROM galleries ORDER BY GalleryName ASC";
                                $query_result = runQuery($DB, $query);

                                while ($row = mysqli_fetch_assoc($query_result)) {
                                    $gallery = $row["GalleryName"];
                                    echo "<option>".$gallery."</option>";
                                }
                            ?>
                        </select>
                    </div>   
                    <div >
                        <label style="padding-right:14px;">Shape</label>
                        <select  name="shape">
                            <option value='0'>Select Shape</option>  
                            <?php  
                                $query = "SELECT ShapeName FROM shapes";
                                $query_result = runQuery($DB, $query);

                                while ($row = mysqli_fetch_assoc($query_result)) {
                                    $shape = $row["ShapeName"];
                                    echo "<option>".$shape."</option>";
                                }
                            ?>

                        </select>
                    </div>   
                    <p> &nbsp; &nbsp;  &nbsp;   &nbsp; </p>
                    <button name="submit" type="submit" id="buttons"> Filter  </button> 

                </form>  
                    <?php 
                        $artist = null; $museum = null; $shape = null;
                            
                        if (isset($_GET["submit"])) {  
                            if ($_GET["artist"] != "0") { $artist = $_GET["artist"]; }
                            if ($_GET["museum"] != "0") { $museum = $_GET["museum"]; }
                            if ($_GET["shape"] != "0") { $shape = $_GET["shape"]; }    
                        }
                    ?>  
            </section>
                


            <section class="rightsection" >
                <h1>Paintings</h1>
                <h3>All Paintings [Top 20]</h3>
                <ul id="paintingsList">

                    <?php
                        $where = " ";
                        if ($artist != null) { $where = $where."AND a.LastName = '".$artist."' "; }
                        if ($museum != null) { $where = $where."AND g.GalleryName = '".$museum."' "; }
                        if ($shape != null) { $where = $where."AND s.ShapeName = '".$shape."' "; }
                        $query = "SELECT p.Title, p.PaintingID, p.ImageFileName, p.Excerpt, p.MSRP, a.FirstName, a.LastName FROM paintings p, artists a, galleries g, shapes s WHERE p.ArtistID = a.ArtistID AND p.GalleryID = g.GalleryID AND p.ShapeID = s.ShapeID".$where."LIMIT 20";
                        $query_result = runQuery($DB, $query);
                        
                        while ($row = mysqli_fetch_assoc($query_result)) {
                            $title = $row["Title"];
                            $id = $row["PaintingID"];
                            $image = $row["ImageFileName"];
                            $excerpt = $row["Excerpt"];
                            $msrp = $row["MSRP"];
                            $first = $row["FirstName"];
                            $last = $row["LastName"];
		            ?>

                    <li class="item">

                        <div class="figure">

                            <a href="single-painting.php?id=<?php echo $id ?>">
                                <img src="images/square-medium/<?php echo $image ?>.jpg">
                            </a>
                        </div>
                        <div class="itemright">
                            <a href="single-painting.php?id=<?php echo $id ?>">
                                <?php echo $title; ?>
                            </a>

                            <div><span><?php echo $first." ".$last ?></span></div>        


                            <div class="description">
                                <p><?php echo $excerpt ?></p>
                            </div>

                            <div class="meta">     
                                <strong><?php echo $msrp ?></strong>        
                            </div>        

                            <div class="extra" >
                                <a class="favorites" href="cart.php?id=<?php echo $id ?>">Add to Shopping Cart</a>
                                <span> &nbsp; &nbsp; &nbsp;    </span>
                                <a  class="favorites"   href="favorites.php?id=<?php echo $id ?>">	Add to Wish List</i>
                                </a>         
                                <p>&nbsp;</p>
                            </div>       

                        </div>      
                    </li>

                    <?php
		                } 
		            ?>

                </ul>
            </section>

        </main>
    </body>
</html>
