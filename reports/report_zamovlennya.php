<?php
global $pdo;
include('../includes/db.php');
include('../includes/header.php');

$query = 'SELECT Z.*, A.NAME as Apteka, L.NAME as Liky, P.NAME as Pokupets FROM ZAMOVLENNYA Z
          JOIN APTEKA A ON Z.ID_APTEKA = A.ID_APTEKA
          JOIN LIKY L ON Z.ID_LIKY = L.ID_LIKY
          JOIN POKUPEC P ON Z.ID_POKUPEC = P.ID_POKUPEC';
$stmt = $pdo->query($query);

echo "<h2>Звіт по замовленням</h2>";
echo "<table border='1'>
        <tr><th>Дата</th><th>Аптека</th><th>Лік</th><th>Покупець</th><th>Кількість</th></tr>";

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>
            <td>{$row['DATE']}</td>
            <td>{$row['Apteka']}</td>
            <td>{$row['Liky']}</td>
            <td>{$row['Pokupets']}</td>
            <td>{$row['QUANTITY']}</td>
          </tr>";
}
echo "</table>";

include('../includes/footer.php');
?>
