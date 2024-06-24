<!DOCTYPE html>
<html lang="en">
<head>
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="css/fontawesome.css">
    <link rel="stylesheet" href="css/templatemo-villa-agency.css">
    <link rel="stylesheet" href="css/owl.css">
    <link rel="stylesheet" href="css/animate.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Search</title>
    <style>
        /* General body styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        /* Container for search results */
        .search-results {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffeee9;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Individual product links */
        .search-results a {
            display: block;
            padding: 10px;
            margin: 5px 0;
            color: #f35525;
            text-decoration: none;
            border: 1px solid #ddd;
            border-radius: 4px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .search-results a:hover {
            background-color: #f35525;
            color: #fff;
        }

        /* No products found message */
        .no-products {
            color: #888;
            text-align: center;
            padding: 20px;
        }
    </style>
</head>
<body>

<div class="search-results">
<?php
// Database connection credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projet_finetude";

// Create connection using mysqli
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form is submitted
if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    
    // Sanitize the search term to prevent SQL injection
    $searchTerm = mysqli_real_escape_string($conn, $searchTerm);
    
    // Query the database to search for products
    $query = "SELECT produit.*, categorie.* 
    FROM produit 
    JOIN categorie ON produit.categorie_prod = categorie.ID_CATE 
    WHERE produit.NOM_PDT LIKE '%$searchTerm%' 
    OR categorie.NOM_CATE LIKE '%$searchTerm%';";

    $result = mysqli_query($conn, $query);
    
    // Check if any products match the search term
    if (mysqli_num_rows($result) > 0) {
        // Display the products
        while ($row = mysqli_fetch_assoc($result)) {
            // Determine the product page based on the category
            if ($row['categorie_prod'] == 2) {
                echo "<a href='Detais-prod.php?id={$row['ID_PDT']}'>{$row['NOM_PDT']}</a>";
            } elseif ($row['categorie_prod'] == 1) {
                echo "<a href='details-pdt_robinet.php?id={$row['ID_PDT']}'>{$row['NOM_PDT']}</a>";
            }
            // Add more conditions for other categories if needed
        }
    } else {
        echo "<div class='no-products'>Aucun produit trouvé.</div>";
    }
}

// Close the connection
mysqli_close($conn);
?>
</div>

</body>
</html>
