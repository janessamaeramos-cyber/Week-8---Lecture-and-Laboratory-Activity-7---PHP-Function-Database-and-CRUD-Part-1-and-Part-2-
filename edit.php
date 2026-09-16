<?php

require_once "db.php";
require_once "functions.php";

$message = "";

if (!isset($_GET["id"])) {
    die("Student ID is missing.");
}

$id = (int) $_GET["id"];

$stmt = $conn->prepare("SELECT * FROM students WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$student = $result->fetch_assoc();

if (!$student) {
    die("Student not found.");
}

if (isset($_POST["save"])) {

    $name = cleanInput($_POST["name"]);
    $email = cleanInput($_POST["email"]);
    $course = cleanInput($_POST["course"]);

    if (empty($name) || empty($email) || empty($course)) {

        $message = "Please complete all fields.";

    } else {

        $stmt = $conn->prepare(
            "UPDATE students SET name = ?, email = ?, course = ? WHERE id = ?"
        );

        $stmt->bind_param("sssi", $name, $email, $course, $id);

        if ($stmt->execute()) {
            header("Location: index.php");
            exit;
        }
    }
}

require_once "includes/header.php";
?>

<h2>Edit Student</h2>

<?php if ($message != "") { ?>
    <p><?php echo $message; ?></p>
<?php } ?>

<form method="POST" action="edit.php?id=<?php echo $id; ?>">

    <label>Name:</label><br>
    <input type="text" name="name"
           value="<?php echo displayValue($student["name"]); ?>">
    <br><br>

    <label>Email:</label><br>
    <input type="text" name="email"
           value="<?php echo displayValue($student["email"]); ?>">
    <br><br>

    <label>Course:</label><br>
    <input type="text" name="course"
           value="<?php echo displayValue($student["course"]); ?>">
    <br><br>

    <button type="submit" name="save">Save Changes</button>

</form>

</body>
</html>