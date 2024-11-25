<?php
include('../includes/db.php');
include('../includes/header.php');

// Отримуємо ID персоналу з URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Отримуємо дані персоналу для редагування
    $query = 'SELECT * FROM PERSONNEL WHERE ID_PERSONNEL = :id';
    $stmt = $pdo->prepare($query);
    $stmt->execute([':id' => $id]);

    // Перевіряємо, чи є такий персонал
    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Якщо форма відправлена, оновлюємо дані
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $position = $_POST['position'];

            if (!empty($name) && !empty($position)) {
                // Запит для оновлення персоналу
                $query = 'UPDATE PERSONNEL SET NAME = :name, POSITION = :position WHERE ID_PERSONNEL = :id';
                $stmt = $pdo->prepare($query);
                $stmt->execute([
                    ':name' => $name,
                    ':position' => $position,
                    ':id' => $id
                ]);

                // Перенаправлення на основну сторінку після оновлення
                header('Location: personnel_list.php');
                exit();
            } else {
                echo "Будь ласка, заповніть всі поля.";
            }
        }
    } else {
        echo "Персонал не знайдений.";
    }
} else {
    echo "ID персоналу не вказано.";
}
?>

<h2>Оновити персонал</h2>
<form method="POST" action="">
    <label for="name">Ім'я:</label>
    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($row['NAME']); ?>" required><br><br>

    <label for="position">Посада:</label>
    <input type="text" id="position" name="position" value="<?php echo htmlspecialchars($row['POSITION']); ?>" required><br><br>

    <input type="submit" value="Оновити персонал">
</form>

<a href="personnel_list.php"><button>Назад до списку</button></a>

<?php
include('../includes/footer.php');
?>
