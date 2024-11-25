<?php
include('../includes/db.php');
include('../includes/header.php');
?>

<h2>Пошук</h2>
<form method="GET" action="search.php">
    <label for="search_term">Шукати:</label>
    <input type="text" id="search_term" name="search_term" required>
    <button type="submit">Пошук</button>
</form>

<?php
// Якщо є запит на пошук
if (isset($_GET['search_term'])) {
    $search_term = $_GET['search_term'];

    // Пошук по ліках
    $query_liky = 'SELECT * FROM LIKY WHERE NAME LIKE :search_term';
    $stmt_liky = $pdo->prepare($query_liky);
    $stmt_liky->execute(['search_term' => "%" . $search_term . "%"]);

    echo "<h3>Ліки</h3>";
    if ($stmt_liky->rowCount() > 0) {
        echo "<table>
                <tr><th>Назва</th><th>Категорія</th><th>Ціна</th></tr>";
        while ($row = $stmt_liky->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                    <td>{$row['NAME']}</td>
                    <td>{$row['CATEGORY']}</td>
                    <td>{$row['PRICE']}</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "Нічого не знайдено в категорії ліків.";
    }

    // Пошук по аптеках
    $query_apteka = 'SELECT * FROM APTEKA WHERE NAME LIKE :search_term OR LOCATION LIKE :search_term';
    $stmt_apteka = $pdo->prepare($query_apteka);
    $stmt_apteka->execute(['search_term' => "%" . $search_term . "%"]);

    echo "<h3>Аптеки</h3>";
    if ($stmt_apteka->rowCount() > 0) {
        echo "<table>
                <tr><th>Назва</th><th>Місцезнаходження</th></tr>";
        while ($row = $stmt_apteka->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                    <td>{$row['NAME']}</td>
                    <td>{$row['LOCATION']}</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "Нічого не знайдено в аптеках.";
    }

    // Пошук по замовленнях
    $query_zamovlennya = 'SELECT * FROM ZAMOVLENNYA WHERE DATE LIKE :search_term';
    $stmt_zamovlennya = $pdo->prepare($query_zamovlennya);
    $stmt_zamovlennya->execute(['search_term' => "%" . $search_term . "%"]);

    echo "<h3>Замовлення</h3>";
    if ($stmt_zamovlennya->rowCount() > 0) {
        echo "<table>
                <tr><th>Дата</th><th>Клієнт</th><th>Сума</th></tr>";
        while ($row = $stmt_zamovlennya->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                    <td>{$row['DATE']}</td>
                    <td>{$row['ID_POKUPEC']}</td>
                    <td>{$row['TOTAL_SUM']}</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "Нічого не знайдено в замовленнях.";
    }
}
?>

<?php include('../includes/footer.php'); ?>
