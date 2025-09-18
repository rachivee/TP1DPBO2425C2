<?php
// Include the class definition before using it
require_once('Sumisang.php');
session_start();

// Initialize products list in session if it doesn't exist
if (!isset($_SESSION['productsList'])) {
    $_SESSION['productsList'] = [];
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] === 'add_product') {
        // Add new product
        $code = htmlspecialchars($_POST['code'] ?? '');
        $name = htmlspecialchars($_POST['name'] ?? '');
        $category = htmlspecialchars($_POST['category'] ?? '');
        $desc = htmlspecialchars($_POST['desc'] ?? '');
        $photo = '';

        // Handle photo upload
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {
            $targetDir = "uploads/";
            $photo = $_FILES['photo']['name'];
            $targetFile = $targetDir . basename($photo);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            if ($imageFileType == "jpg" || $imageFileType == "jpeg" || $imageFileType == "png" || $imageFileType == "gif") {
                if ($_FILES["photo"]["size"] <= 5000000) {
                    if (!file_exists($targetFile)) {
                        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile)) {
                            $photo = $targetFile;
                        } else {
                            $uploadOk = 0;
                        }
                    } else {
                        $uploadOk = 0;
                    }
                } else {
                    $uploadOk = 0;
                }
            } else {
                $uploadOk = 0;
            }

            if ($uploadOk == 1) {
                // Successfully uploaded photo
            }
        }
        // Create new product and add to session
        $newProduct = new Sumisang($code, $name, $category, $desc, $photo);
        $_SESSION['productsList'][] = $newProduct;
    }

    if ($_POST['action'] === 'remove_product' && isset($_POST['remove_code'])) {
        // Remove product by code
        $removeCode = $_POST['remove_code'];
        foreach ($_SESSION['productsList'] as $index => $prod) {
            if ($prod->getCode() === $removeCode) {
                unset($_SESSION['productsList'][$index]);
                $_SESSION['productsList'] = array_values($_SESSION['productsList']); // Re-index the array
                break;
            }
        }
    }

    header("Location: main.php"); // Redirect to refresh the page
    exit;
}

// Handle product search
$searchResult = [];
if (isset($_GET['search_code'])) {
    $searchCode = $_GET['search_code'];
    foreach ($_SESSION['productsList'] as $prod) {
        if (strpos($prod->getCode(), $searchCode) !== false) {
            $searchResult[] = $prod;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumisang Store</title>
</head>
<body>
    <h1>Sumisang Official Store</h1>

    <!-- Add Product Form -->
    <h2>Add New Product</h2>
    <form action="main.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="action" value="add_product">
        <label for="code">Product Code:</label>
        <input type="text" id="code" name="code" required><br><br>

        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="category">Category:</label>
        <input type="text" id="category" name="category" required><br><br>

        <label for="desc">Description:</label>
        <textarea id="desc" name="desc" required></textarea><br><br>

        <label for="photo">Product Photo:</label>
        <input type="file" id="photo" name="photo" required><br><br>

        <input type="submit" value="Add Product">
    </form>

    <hr>

    <!-- Search Product Form -->
    <h2>Search for a Product</h2>
    <form action="main.php" method="GET">
        <label for="search_code">Product Code:</label>
        <input type="text" id="search_code" name="search_code">
        <input type="submit" value="Search">
    </form>

    <h2>Search Results</h2>
    <?php if (!empty($searchResult)): ?>
        <table border="1">
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Category</th>
                <th>Description</th>
                <th>Photo</th>
            </tr>
            <?php foreach ($searchResult as $prod): ?>
                <tr>
                    <td><?= $prod->getCode(); ?></td>
                    <td><?= $prod->getName(); ?></td>
                    <td><?= $prod->getCategory(); ?></td>
                    <td><?= $prod->getDesc(); ?></td>
                    <td><img src="<?= $prod->getPhoto(); ?>" width="100" height="100"></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <?php echo "<p>No products found.</p>"; ?>
    <?php endif; ?>

    <hr>

    <!-- Display All Products -->
    <h2>All Products</h2>
    <?php if (!empty($_SESSION['productsList'])): ?>
        <table border="1">
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Category</th>
                <th>Description</th>
                <th>Photo</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($_SESSION['productsList'] as $prod): ?>
                <tr>
                    <td><?= $prod->getCode(); ?></td>
                    <td><?= $prod->getName(); ?></td>
                    <td><?= $prod->getCategory(); ?></td>
                    <td><?= $prod->getDesc(); ?></td>
                    <td><img src="<?= $prod->getPhoto(); ?>" width="100" height="100"></td>
                    <td>
                        <form action="main.php" method="POST" style="display:inline;">
                            <input type="hidden" name="remove_code" value="<?= $prod->getCode(); ?>">
                            <input type="hidden" name="action" value="remove_product">
                            <input type="submit" value="Remove">
                        </form>
                        <form action="main.php" method="POST" style="display:inline;">
                            <input type="hidden" name="action" value="update_product">
                            <input type="submit" value="Update">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <?php echo "<p>No products available.</p>";?>
    <?php endif; ?>
</body>
</html>
