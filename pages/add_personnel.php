<?php
include('../includes/db.php');
include('../includes/header.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Перевірка наявності всіх необхідних полів
    $name = $_POST['name'];
    $position = $_POST['position'];

    if (!empty($name) && !empty($position)) {
        // Запит для додавання нового персоналу
        $query = 'INSERT INTO PERSONNEL (NAME, POSITION) VALUES (:name, :position)';
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            ':name' => $name,
            ':position' => $position
        ]);

        // Перенаправлення на основну сторінку після додавання
        header('Location: personnel_list.php');
        exit();
    } else {
        echo "Будь ласка, заповніть всі поля.";
    }
}

?>

<h2>Додати нового персоналу</h2>
<form method="POST" action="">
    <label for="name">Ім'я:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="position">Посада:</label>
    <input type="text" id="position" name="position" required><br><br>

    <input type="submit" value="Додати персонал">
</form>

<a href="personnel_list.php"><button>Назад до списку</button></a>

<?php
include('../includes/footer.php');
?>
