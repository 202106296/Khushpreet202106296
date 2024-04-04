<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper {
            width: 600px;
            margin: 0 auto;
        }

        table tr td:last-child {
            width: 120px;
        }
        body{
    border-style: dashed;
     border-color: #034c4b;
 }
 ul {
   margin: 10px;
   padding: 12px;
   overflow: hidden;
   background-color: #b4faf5;
   font-family: Copperplate Papyrus fantasy;
   font-size: 35px;
   font-weight: bold;
   border-style: solid;
   border-color:#004766;
 }
 
 li {
   float: left;
 }
 
 li a {
   display: block;
   color: #00665f;
   text-align: center;
   padding: 20px 40px;
 }
 
 li a:hover:not(.active) {
   background-color: #81bac5;
 }
 
 .active {
   background-color: #8caa04;
 }
 h1 {
     text-align: center;
    text-shadow: 2px 2px rgb(238, 91, 91);
   color:#006664;
  font-family: papyrus, fantasy;
   font-size: 45px;
    text-decoration: underline;
   border: 3px solid black;
   padding-top: 30px;
    padding-bottom: 30px;
 }
 img {
     display: block;
     margin: auto;
     width: 30%;
   border: 3px solid black;
 }
 .responsive {
   width: 100%;
   height: auto;
 }
 
 p {
    font-family: Georgia, serif;
    font-size: 20px;
    text-shadow: 1px 1px #7e16fd;
    font-weight: bold;
    color: #0aa07f;
    padding-left: 30px;
    padding-right: 30px;
 }
 h2{  
    font-family: Brush Script, cursive;
    font-size: 40px;
    text-shadow: 1px 1px #9916fd;
    text-align: center;
    text-decoration: underline;
     font-style: italic;
    color: #0a5760;
    margin: 10px;
    
 }
 
    </style>
    
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>
<nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="create.php">Add Menu</a></li>
        <li><a href="menu.html">Menu</a></li>
        <li><a href="contact.html">Contact</a></li>
      </ul>
    </nav>
<h2>About Us</h2>
<img src="Images/starbucks.jpg" alt="Starbucks" width="400" height="300",</img>
    <p>Welcome to Starbucks, where we're passionate about crafting the perfect coffee experience for you.</p>
<p>Starbucks, a global coffeehouse chain, has revolutionized the way people enjoy coffee since its inception in 1971 in Seattle, Washington. With an extensive menu offering various types of coffees, Starbucks caters to a diverse range of tastes and preferences. From classic espresso-based drinks to trendy seasonal concoctions, Starbucks has something for everyone<p>At the heart of Starbucks' menu are the espresso-based beverages, including the iconic Caffè Americano, a shot of espresso diluted with hot water, and the velvety smooth Caffè Latte, consisting of espresso, steamed milk, and a thin layer of foam. These timeless classics showcase the rich and bold flavors that define Starbucks' coffee experience.</p>

<p>For those seeking a stronger caffeine kick, Starbucks offers an array of espresso-based drinks like the Cappuccino, characterized by equal parts espresso, steamed milk, and foam, and the potent Espresso Macchiato, featuring a shot of espresso "stained" with a dollop of frothy milk. These beverages cater to the aficionados who appreciate the robust intensity of espresso.</p>
<p>Beyond the classics, Starbucks continually innovates with seasonal offerings and specialty drinks. From the indulgent Pumpkin Spice Latte, a fall favorite blending espresso with pumpkin spice flavors and steamed milk, to the refreshing Iced Matcha Green Tea Latte, Starbucks' seasonal menu reflects the evolving tastes and preferences of its customers.
<p>Moreover, Starbucks is renowned for its commitment to customization, allowing customers to personalize their drinks with various milk alternatives, syrups, and toppings. Whether you prefer your coffee dairy-free with almond milk or decadently sweet with caramel syrup, Starbucks ensures that your coffee experience is tailored to your liking.</p>
    <p>
    </section>
    
    <section>
      <h2>Specials</h2>
      <p>Check out our latest specials and promotions.</p>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Product Details</h2>
                        <a href="create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Product</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";

                    // Attempt select query execution
                    $sql = "SELECT * FROM StarbucksMenu";
                    if ($result = mysqli_query($link, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            echo '<table class="table table-bordered table-striped">';
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>#</th>";
                            echo "<th>productName</th>";
                            echo "<th>price</th>";
                            echo "<th>description</th>";
                            echo "<th>category</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['productName'] . "</td>";
                                echo "<td>" . $row['price'] . "</td>";
                                echo "<td>" . $row['description'] . "</td>";
                                echo "<td>" . $row['category'] . "</td>";
                                echo "<td>";
                                echo '<a href="read.php?id=' . $row['id'] . '" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                echo '<a href="update.php?id=' . $row['id'] . '" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                echo '<a href="delete.php?id=' . $row['id'] . '" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                echo "</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else {
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else {
                        echo "Oops! Something went wrong. Please try again later.";
                    }

                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>