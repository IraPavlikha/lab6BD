<?php
global $pdo;
include('../includes/db.php');
include('../includes/header.php');

$query = 'SELECT * FROM POSTACHALNYK';
$stmt = $pdo->query($query);

echo "<h2>Список постачальників</h2>";
echo "<table>
        <tr><th>ID</th><th>Назва</th><th>Телефон</th></tr>";

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>
            <td>{$row['ID_POSTACHALNYK']}</td>
            <td>{$row['NAME']}</td>
            <td>{$row['PHONE']}</td>
          </tr>";
}
echo "</table>";

include('../includes/footer.php');
?>
