<?php
global $pdo;
include('../includes/db.php');
include('../includes/header.php');

$query = 'SELECT * FROM ZAMOVLENNYA';
$stmt = $pdo->query($query);

echo "<h2>Список замовлень</h2>";
echo "<table>
        <tr><th>ID</th><th>Дата</th><th>Клієнт</th><th>Сума</th></tr>";

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>
            <td>{$row['ID_ZAMOVLENNYA']}</td>
            <td>{$row['DATE']}</td>
            <td>{$row['ID_POKUPEC']}</td>
            <td>{$row['TOTAL_SUM']}</td>
          </tr>";
}
echo "</table>";

include('../includes/footer.php');
?>
