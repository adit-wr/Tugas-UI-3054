<?php
require_once 'librarian.php';
if (isset($_GET['delete_id'])) {
    $deleteId = $_GET['delete_id'];
    Librarian::delete($deleteId);
    header("Location: main.php");
    exit;
}
$arr = Librarian::select()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
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
        <div class="container1">
            <div class="main"> 
                <h1>Librarian</h1>
                <table>
                        <tr>
                            <th>No</th>
                            <th>Phone</th>
                            <th>Name</th>
                            <th>
                                <div class="tdbtn">
                                    <a class="tadd" href="insert.php"><span class="material-symbols-outlined">library_add</span>New Librarian</a>
                                </div>
                            </th>
                        </tr>
                        <?php 
                            for ($i = 0; $i < count($arr['ID']); $i++) {
                        ?>
                                <tr>
                                    <td><?= $i+1 ?></td>
                                    <td><?= $arr['Phone'][$i] ?></td>
                                    <td class="tdname"><?= $arr['Name'][$i] ?></td>
                                    <td class="tdbtn">
                                        <a class="tupd" href="update.php?id=<?= $arr['ID'][$i] ?>">Edit<span class="material-symbols-outlined">edit</span></a>
                                        <a class="tdlt" href="main.php?delete_id=<?= $arr['ID'][$i] ?>" onclick="return confirm('Delete this librarian?')">Delete<span class="material-symbols-outlined">delete</span></a>
                                    </td>
                                </tr>
                        <?php
                            }
                        ?>
                </table>
                <div class="cpr">
                    <p><i class="fa fa-instagram" style="font-size:24px"></i> Copyright @aditwchksr :v</p>
                </div>
            </div>
        </div>
    </div>
    <div class="kanan">
        <div class="navbar">
            <a class="btnnav" href="">Dashboard<span class="material-symbols-outlined">home</span></a>
            <a class="btnnav" href="">Order<span class="material-symbols-outlined">shopping_cart</span></a>
            <a class="btnnav" href="">Librarian<span class="material-symbols-outlined">person</span></a>
            <a class="btnnavlo" href="index.php">Logout<span class="material-symbols-outlined">logout</span></a>
        </div>
    </div>
</body>
</html>
