<?php
$target_dir = "images/";
header('Content-Type: text/html; charset=UTF-8');

// Check if the directory exists
if (!is_dir($target_dir)) {
    // If it doesn't exist, create it
    if (!mkdir($target_dir, 0777, true)) {
        // If creation fails, handle the error (e.g., display an error message)
        die("Failed to create directory: $target_dir");
    }
}

// Check if produit.html exists
if (file_exists('produit.php')) {
    $produit = file_get_contents('produit.php');
} else {
    // Handle the case where produit.html doesn't exist
    die("Error: produit.php not found");
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projet_finetude";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $productcateg = $_POST['categorie_prod'];
    $productName = $_POST['productName'];
    $productDescription = $_POST['productDescription'];
    $productPrice = $_POST['productPrice'];

    // Check if the product name already exists in the database
    $check_query = "SELECT * FROM produit WHERE NOM_PDT = ?";
    $stmt_check = mysqli_prepare($conn, $check_query);
    if ($stmt_check) {
        mysqli_stmt_bind_param($stmt_check, "s", $productName);
        mysqli_stmt_execute($stmt_check);
        mysqli_stmt_store_result($stmt_check);
        if (mysqli_stmt_num_rows($stmt_check) > 0) {
            // Product name already exists, display an alert message
            echo "<script>alert('Le nom du produit existe déjà dans la base de données');
            window.location.href = 'produit.php'
            </script>";
            exit; // Stop further execution
        }
    } else {
        echo "Error preparing SQL statement: " . mysqli_error($conn);
        exit; // Stop further execution
    }

    // Check if image is uploaded
    if (isset($_FILES["productImage"])) {
        // Adjust the target file path
        $target_file = $target_dir . basename($_FILES["productImage"]["name"]);

        // Move uploaded file to target directory
        if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $target_file)) {
            // File uploaded successfully
           
        } else {
            // File upload failed
            die("Sorry, there was an error uploading your file.");
        }
    }

    // Prepare and execute SQL statement
    $sql = "INSERT INTO produit (categorie_prod, NOM_PDT, DESCR_PDT, PRIX_PDT, image_pdt) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssss", $productcateg, $productName, $productDescription, $productPrice, $target_file);
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Le produit a été ajouté avec succès');
            window.location.href = 'produit.php';
            </script>";
           
        } else {
            echo "Error executing SQL statement: " . mysqli_error($conn);
        }
    } else {
        echo "Error preparing SQL statement: " . mysqli_error($conn);
    }
}

// Close connection
mysqli_close($conn);
?>



<?php
include 'db_connection.php';

$product_name = "";
$product_info = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST['product_name'];

    // Rechercher le produit dans la base de données
    $sql = "SELECT * FROM produit WHERE NOM_PDT = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $product_name);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $product_info = $result->fetch_assoc();
    } else {
        echo "Produit non trouvé.";
    }

    if (isset($_POST['confirm_delete'])) {
        // Supprimer le produit de la base de données
        $sql = "DELETE FROM produit WHERE NOM_PDT = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $product_name);
        if ($stmt->execute()) {
            echo "Produit supprimé avec succès.";
            $product_info = "";
        } else {
            echo "Erreur lors de la suppression du produit.";
        }
    }
}
?>

