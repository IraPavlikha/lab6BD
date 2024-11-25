<?php
global $pdo;
include('../includes/db.php');
include('../includes/header.php');

// Додавання ліків
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add'])) {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    $insertQuery = 'INSERT INTO LIKY (NAME, CATEGORY, PRICE, STOCK) VALUES (?, ?, ?, ?)';
    $stmt = $pdo->prepare($insertQuery);
    $stmt->execute([$name, $category, $price, $stock]);

    echo "Лік додано успішно!";
}

// Видалення ліків
if (isset($_GET['delete_id'])) {
    $deleteId = $_GET['delete_id'];
    $deleteQuery = 'DELETE FROM LIKY WHERE ID_LIKY = ?';
    $stmt = $pdo->prepare($deleteQuery);
    $stmt->execute([$deleteId]);

    echo "Ліки видалено успішно!";
}

// Отримуємо список ліків
$query = 'SELECT * FROM LIKY';
$stmt = $pdo->query($query);

echo "<h2>Список ліків</h2>";

// Форма для додавання ліків
echo '<h3>Додати новий медикамент</h3>';
echo '<form method="POST">
        <label for="name">Назва:</label>
        <input type="text" name="name" required><br>
        <label for="category">Категорія:</label>
        <input type="text" name="category" required><br>
        <label for="price">Ціна:</label>
        <input type="number" name="price" required><br>
        <label for="stock">Кількість:</label>
        <input type="number" name="stock" required><br>
        <button type="submit" name="add">Додати</button>
      </form>';

echo "<table>
        <tr><th>ID</th><th>Назва</th><th>Категорія</th><th>Ціна</th><th>Кількість</th><th>Операції</th></tr>";

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>
            <td>{$row['ID_LIKY']}</td>
            <td>{$row['NAME']}</td>
            <td>{$row['CATEGORY']}</td>
            <td>{$row['PRICE']}</td>
            <td>{$row['STOCK']}</td>
            <td>
                <a href='update_liky.php?id={$row['ID_LIKY']}'>Редагувати</a> | 
                <a href='?delete_id={$row['ID_LIKY']}'>Видалити</a>
            </td>
          </tr>";
}
echo "</table>";

include('../includes/footer.php');
?>
