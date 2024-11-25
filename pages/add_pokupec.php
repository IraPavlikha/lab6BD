<?php
include('../includes/db.php');
include('../includes/header.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $contact = $_POST['contact'];

    if (!empty($name) && !empty($contact)) {
        $query = 'INSERT INTO POKUPEC (NAME, CONTACT) VALUES (:name, :contact)';
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            ':name' => $name,
            ':contact' => $contact
        ]);

        header('Location: pokupec_list.php');
        exit();
    } else {
        echo "Будь ласка, заповніть всі поля.";
    }
}
?>

<h2>Додати нового покупця</h2>
<form method="POST" action="">
    <label for="name">Ім'я:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="contact">Телефон:</label>
    <input type="text" id="contact" name="contact" required><br><br>

    <input type="submit" value="Додати покупця">
</form>

<a href="pokupec_list.php"><button>Назад до списку</button></a>

<?php
include('../includes/footer.php');
?>
