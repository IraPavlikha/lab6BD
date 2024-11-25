<?php
global $pdo;
include('../includes/db.php');
include('../includes/header.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Завантаження поточних даних
    $query = 'SELECT * FROM APTEKA WHERE ID_APTEKA = :id';
    $stmt = $pdo->prepare($query);
    $stmt->execute(['id' => $id]);
    $apteka = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $location = $_POST['location'];

        $updateQuery = 'UPDATE APTEKA SET NAME = :name, LOCATION = :location WHERE ID_APTEKA = :id';
        $updateStmt = $pdo->prepare($updateQuery);
        $updateStmt->execute(['name' => $name, 'location' => $location, 'id' => $id]);

        header('Location: apteki.php');
        exit;
    }
} else {
    header('Location: apteki.php');
    exit;
}
?>

<h2>Оновлення інформації про аптеку</h2>
<form method="POST">
    <label for="name">Назва:</label>
    <input type="text" id="name" name="name" value="<?= htmlspecialchars($apteka['NAME']) ?>" required>
    <br><br>
    <label for="location">Місцезнаходження:</label>
    <input type="text" id="location" name="location" value="<?= htmlspecialchars($apteka['LOCATION']) ?>" required>
    <br><br>
    <button type="submit">Зберегти</button>
</form>

<?php include('../includes/footer.php'); ?>
