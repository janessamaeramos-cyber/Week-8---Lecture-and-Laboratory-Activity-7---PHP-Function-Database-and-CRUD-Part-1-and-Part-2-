<?php

require_once "db.php";
require_once "functions.php";

$message = "";

if (isset($_POST["save"])) {

    $name = cleanInput($_POST["name"]);
    $email = cleanInput($_POST["email"]);
    $course = cleanInput($_POST["course"]);

    if (empty($name) || empty($email) || empty($course)) {

        $message = "Please complete all fields.";

    } else {

        $stmt = $conn->prepare(
            "INSERT INTO students (name, email, course) VALUES (?, ?, ?)"
        );

        $stmt->bind_param("sss", $name, $email, $course);

        if ($stmt->execute()) {
            header("Location: index.php");
            exit;
        }
    }
}

require_once "includes/header.php";
?>

<h2>Add Student</h2>

<?php if ($message != "") { ?>
    <p><?php echo $message; ?></p>
<?php } ?>

<form method="POST" action="create.php">

    <label>Name:</label><br>
    <input type="text" name="name"><br><br>

    <label>Email:</label><br>
    <input type="text" name="email"><br><br>

    <label>Course:</label><br>
    <input type="text" name="course"><br><br>

    <button type="submit" name="save">Save Student</button>

</form>

</body>
</html>