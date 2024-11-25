<?php
global $pdo;
include('../includes/db.php');
include('../includes/header.php');

$query = 'SELECT * FROM APTEKA';
$stmt = $pdo->query($query);

echo "<h2>Список аптек</h2>";
echo "<table>
        <tr><th>ID</th><th>Назва</th><th>Місцезнаходження</th><th>Операції</th></tr>";

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>
            <td>{$row['ID_APTEKA']}</td>
            <td>{$row['NAME']}</td>
            <td>{$row['LOCATION']}</td>
            <td>
                <a href='update_apteka.php?id={$row['ID_APTEKA']}'>Оновити</a>
            </td>
          </tr>";
}
echo "</table>";

include('../includes/footer.php');
?>
