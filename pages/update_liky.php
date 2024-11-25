<?php
global $pdo;
include('../includes/db.php');
include('../includes/header.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Отримуємо ліки за ID
    $query = 'SELECT * FROM LIKY WHERE ID_LIKY = ?';
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
        $name = $_POST['name'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];

        $updateQuery = 'UPDATE LIKY SET NAME = ?, CATEGORY = ?, PRICE = ?, STOCK = ? WHERE ID_LIKY = ?';
        $stmt = $pdo->prepare($updateQuery);
        $stmt->execute([$name, $category, $price, $stock, $id]);

        echo "Лік оновлено успішно!";
    }
}
?>

<h3>Редагувати лік</h3>
<form method="POST">
    <label for="name">Назва:</label>
    <input type="text" name="name" value="<?php echo htmlspecialchars($row['NAME']); ?>" required><br>
    <label for="category">Категорія:</label>
    <input type="text" name="category" value="<?php echo htmlspecialchars($row['CATEGORY']); ?>" required><br>
    <label for="price">Ціна:</label>
    <input type="number" name="price" value="<?php echo htmlspecialchars($row['PRICE']); ?>" required><br>
    <label for="stock">Кількість:</label>
    <input type="number" name="stock" value="<?php echo htmlspecialchars($row['STOCK']); ?>" required><br>
    <button type="submit" name="update">Оновити</button>
</form>

<?php include('../includes/footer.php'); ?>
