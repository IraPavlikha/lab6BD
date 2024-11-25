<?php
include('../includes/db.php');
include('../includes/header.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = 'SELECT * FROM POKUPEC WHERE ID_POKUPEC = :id';
    $stmt = $pdo->prepare($query);
    $stmt->execute([':id' => $id]);

    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $contact = $_POST['contact'];

            if (!empty($name) && !empty($contact)) {
                $query = 'UPDATE POKUPEC SET NAME = :name, CONTACT = :contact WHERE ID_POKUPEC = :id';
                $stmt = $pdo->prepare($query);
                $stmt->execute([
                    ':name' => $name,
                    ':contact' => $contact,
                    ':id' => $id
                ]);

                header('Location: pokupec_list.php');
                exit();
            } else {
                echo "Будь ласка, заповніть всі поля.";
            }
        }
    } else {
        echo "Покупець не знайдений.";
    }
} else {
    echo "ID покупця не вказано.";
}
?>

<h2>Оновити покупця</h2>
<form method="POST" action="">
    <label for="name">Ім'я:</label>
    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($row['NAME']); ?>" required><br><br>

    <label for="contact">Телефон:</label>
    <input type="text" id="contact" name="contact" value="<?php echo htmlspecialchars($row['CONTACT']); ?>" required><br><br>

    <input type="submit" value="Оновити покупця">
</form>

<a href="pokupec_list.php"><button>Назад до списку</button></a>

<?php
include('../includes/footer.php');
?>
