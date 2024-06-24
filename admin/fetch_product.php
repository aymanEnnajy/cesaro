
<?php
// Include database connection
include_once 'db_connection.php';

// Check if product_name is provided
if (isset($_POST['proddModifNom'])) {
    $product_name = $_POST['proddModifNom'];

    // Prepare and execute SQL query to retrieve product information
    $stmt = $pdo->prepare("SELECT * FROM produit WHERE NOM_PDT = ?");
    $stmt->execute([$product_name]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($product) {
        // Product found
        $response = [
            'success' => true,
            'message' => 'Product found.',
            'product' => [
                'categorie_prod' => $product['categorie_prod'],
                'DESCR_PDT' => $product['DESCR_PDT'],
                'PRIX_PDT' => $product['PRIX_PDT'],
                'image_pdt' => $product['image_pdt']
            ]
        ];
    } else {
        // Product not found
        $response = [
            'success' => false,
            'message' => 'Product not found.'
        ];
    }

    echo json_encode($response);
}
?>