<?php
global $pdo;
include('../includes/db.php');
include('../includes/header.php');

// Запит на вибір всього персоналу
$query = 'SELECT * FROM PERSONNEL';
$stmt = $pdo->query($query);

echo "<h2>Список персоналу</h2>";
echo "<table>
        <tr><th>ID</th><th>Ім'я</th><th>Посада</th><th>Операції</th></tr>";

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>
            <td>{$row['ID_PERSONNEL']}</td>
            <td>{$row['NAME']}</td>
            <td>{$row['POSITION']}</td>
            <td>
                <a href='update_personnel.php?id={$row['ID_PERSONNEL']}'>Оновити</a> | 
                <a href='delete_personnel.php?id={$row['ID_PERSONNEL']}'>Видалити</a>
            </td>
          </tr>";
}
echo "</table>";

// Кнопка для додавання нового персоналу
echo "<br><a href='add_personnel.php'><button>Додати новий персонал</button></a>";

include('../includes/footer.php');
?>
