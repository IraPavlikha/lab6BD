<?php
global $pdo;
include('../includes/db.php');
include('../includes/header.php');

$query = 'SELECT CATEGORY, COUNT(*) AS COUNT FROM LIKY GROUP BY CATEGORY';
$stmt = $pdo->query($query);

echo "<h2>Звіт по категоріям ліків</h2>";
echo "<table>
        <tr><th>Категорія</th><th>Кількість</th></tr>";

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>
            <td>{$row['CATEGORY']}</td>
            <td>{$row['COUNT']}</td>
          </tr>";
}
echo "</table>";

include('../includes/footer.php');
?>
