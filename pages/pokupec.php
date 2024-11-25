<?php
global $pdo;
include('../includes/db.php');
include('../includes/header.php');

// Запит на вибір всіх покупців
$query = 'SELECT * FROM POKUPEC';
$stmt = $pdo->query($query);

echo "<h2>Список покупців</h2>";
echo "<table>
        <tr><th>ID</th><th>Ім'я</th><th>Телефон</th><th>Операції</th></tr>";

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>
            <td>{$row['ID_POKUPEC']}</td>
            <td>{$row['NAME']}</td>
            <td>{$row['CONTACT']}</td>
            <td>
                <a href='update_pokupec.php?id={$row['ID_POKUPEC']}'>Оновити</a> | 
                <a href='delete_pokupec.php?id={$row['ID_POKUPEC']}'>Видалити</a>
            </td>
          </tr>";
}
echo "</table>";

// Кнопка для додавання нового покупця
echo "<br><a href='add_pokupec.php'><button>Додати нового покупця</button></a>";

include('../includes/footer.php');
?>
