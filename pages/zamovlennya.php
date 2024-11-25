<?php
global $pdo;
include('../includes/db.php');
include('../includes/header.php');

// Запит для об'єднання таблиць ZAMOVLENNYA, APTEKA та POKUPEC
$query = 'SELECT Z.ID_ZAMOVLENNYA, Z.DATE, A.NAME AS APTEKA, P.NAME AS POKUPEC
          FROM ZAMOVLENNYA Z
          JOIN APTEKA A ON Z.ID_APTEKA = A.ID_APTEKA
          JOIN POKUPEC P ON Z.ID_POKUPEC = P.ID_POKUPEC';

$stmt = $pdo->query($query);

echo "<h2>Список замовлень</h2>";
echo "<table>
        <tr><th>ID</th><th>Дата</th><th>Аптека</th><th>Покупець</th></tr>";

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>
            <td>{$row['ID_ZAMOVLENNYA']}</td>
            <td>{$row['DATE']}</td>
            <td>{$row['APTEKA']}</td>
            <td>{$row['POKUPEC']}</td>
          </tr>";
}
echo "</table>";

include('../includes/footer.php');
?>
