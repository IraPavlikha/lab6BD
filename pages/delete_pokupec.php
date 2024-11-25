<?php
include('../includes/db.php');
include('../includes/header.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = 'DELETE FROM POKUPEC WHERE ID_POKUPEC = :id';
    $stmt = $pdo->prepare($query);
    $stmt->execute([':id' => $id]);

    header('Location: pokupec_list.php');
    exit();
} else {
    echo "ID покупця не вказано.";
}

include('../includes/footer.php');
?>
