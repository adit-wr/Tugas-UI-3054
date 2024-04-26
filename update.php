<?php
require_once 'librarian.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $librarianData = Librarian::selectById($id);

    if ($librarianData) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['newphone']) && isset($_POST['newname'])) {
                $newPhone = $_POST['newphone'];
                $newName = $_POST['newname'];

                Librarian::update($id, $newPhone, $newName);

                header("Location: main.php");
                exit;
            } else {
                echo "Error: Data is incomplete.";
            }
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style3.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="https://img.freepik.com/premium-vector/partai-pdi_588787-87.jpg?w=996">
    <title>PSI</title>
</head>
<body>
    <div class="container">
        <nav class="header">
            <div class="head1">
                <p>e-Library</p>
            </div>
            <div class="head2">
                <div class="search">
                    <input type="text" class="search1" placeholder="Search">
                    <a class="btnsrch" href=""><span class="material-symbols-outlined">search</span></a>
                </div>
            </div>
        </nav>
        <div class="main">
            <form id="upt" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $id; ?>" method="post">
                <h1>Edit Librarian</h1>
                <div class="forminput">
                    <label for="newphone">New Phone</label>
                    <input type="text" id="newphone" name="newphone" value="<?= $librarianData['Phone'] ?>" placeholder="Enter new phone" autocomplete="off">
                </div>
                <div class="forminput">
                    <label for="newname">New Name</label>
                    <input type="text" id="newname" name="newname" value="<?= $librarianData['Name'] ?>" placeholder="Enter new name" autocomplete="off">
                </div>
                <button type="submit" class="btnsi">Update</button>
            </form>
        </div>
        <div class="kanan">
            <div class="navbar">
                <a class="btnnav" href="">Dashboard<span class="material-symbols-outlined">home</span></a>
                <a class="btnnav" href="">Order<span class="material-symbols-outlined">shopping_cart</span></a>
                <a class="btnnav" href="main.php">Librarian<span class="material-symbols-outlined">person</span></a>
                <a class="btnnavlo" href="index.php">Logout<span class="material-symbols-outlined">logout</span></a>
            </div>
        </div>
    </div>
</body>
</html>
<?php
    } else {
        echo "Error: Librarian not found.";
    }
} else {
    echo "Error: ID is missing.";
}
?>
