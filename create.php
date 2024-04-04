<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$productName = $price = $description = $category = "";
$productName_err = $price_err = $description_err = $category_err = "";

// Processing form data when form is submitted  
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    // Validate productName
    $input_productName = trim($_POST["productName"]);
    if (empty($input_productName)) {
        $productName_err = "Please enter productName.";
    } else {
        $productName = $input_productName;
    }

    // Validate price
    $input_price = trim($_POST["price"]);
    if (empty($input_price)) {
        $price_err = "Please enter name of price.";
    } else {
        $price = $input_price; // Fixed variable assignment
    }

    // Validate description
    $input_description = trim($_POST["description"]); // Corrected form field name
    if (empty($input_description)) {
        $description_err = "Please enter description.";
    } else {
        $description = $input_description;
    }

    // Validate category
    $input_category = trim($_POST["category"]);
    if (empty($input_category)) {
        $category_err = "Please enter the category.";
    } else {
        $category = $input_category;
    }

    // Check input errors before inserting in database
    if (empty($productName_err) && empty($price_err) && empty($description_err) && empty($category_err)) { // Fixed condition
        // Prepare an insert statement
        $sql = "INSERT INTO technology (productName, price, description, category) VALUES (?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_productName, $param_price, $param_description, $param_category); // Fixed parameter types

            // Set parameters
            $param_productName = $productName;
            $param_price = $price;
            $param_description = $description;
            $param_category = $category;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Informations created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <productName>Create Menu</productName>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper {
            width: 600px;
            margin: 0 auto;
        }
           
   </style>
    
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
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Create Menu</h2>
                    <p>Please fill this form and submit to add Menu to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>productName</label>
                            <input type="text" name="productName" class="form-control <?php echo (!empty($productName_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $productName; ?>">
                            <span class="invalid-feedback"><?php echo $productName_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>price</label>
                            <input type="text" name="price" class="form-control <?php echo (!empty($price_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $price; ?>">
                            <span class="invalid-feedback"><?php echo $price_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>description</label>
                            <input type="text" name="description" class="form-control <?php echo (!empty($description_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $description; ?>">
                            <span class="invalid-feedback"><?php echo $description_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>category</label>
                            <input type="text" name="category" class="form-control <?php echo (!empty($category_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $category; ?>">
                            <span class="invalid-feedback"><?php echo $category_err; ?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>