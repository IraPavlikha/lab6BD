<?php
include('../includes/db.php');
include('../includes/header.php');

// Перевіряємо, чи вказано ID для видалення
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Запит для видалення персоналу
    $query = 'DELETE FROM PERSONNEL WHERE ID_PERSONNEL = :id';
    $stmt = $pdo->prepare($query);
    $stmt->execute([':id' => $id]);

    // Перенаправлення на основну сторінку після видалення
    header('Location: personnel_list.php');
    exit();
} else {
    echo "ID персоналу не вказано.";
}

include('../includes/footer.php');
?>
