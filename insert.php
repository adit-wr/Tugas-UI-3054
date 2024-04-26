<?php
require_once 'librarian.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newphone = $_POST['newphone'];
    $newname = $_POST['newname'];
    Librarian::insert($newphone, $newname);

    echo '<script>window.location.href = "main.php";</script>';
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
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
            <form id="ins" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">    
                <h1>Add Librarian</h1>
                <div class="forminput">
                    <label for="newphone">Phone</label>
                    <input type="text" id="newphone" name="newphone" placeholder="Enter phone" autocomplete="off">
                </div>
                <div class="forminput">
                    <label for="newname">Name</label>
                    <input type="text" id="newname" name="newname" placeholder="Enter name" autocomplete="off">
                </div>
                <button type="submit" class="btnsi">Submit</button>
            </form>
        </div>
    </div>
    <div class="kanan">
        <div class="navbar">
            <a class="btnnav" href="">Dashboard<span class="material-symbols-outlined">home</span></a>
            <a class="btnnav" href="">Order<span class="material-symbols-outlined">shopping_cart</span></a>
            <a class="btnnav" href="main.php">Librarian<span class="material-symbols-outlined">person</span></a>
            <a class="btnnavlo" href="index.php">Logout<span class="material-symbols-outlined">logout</span></a>
        </div>
    </div>
    <script>
        document.getElementById('ins').addEventListener('submit', function() {
            window.location.href = 'main.php';
        });
    </script>
</body>
</html>
