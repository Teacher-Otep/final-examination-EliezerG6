<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operations</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar">
        <img src="../images/Ellie.svg" id="logo" style="cursor:pointer;">
        <button class="navbarbuttons" onclick="showSection('create')"> Create </button>
        <button class="navbarbuttons" onclick="showSection('read')"> Read </button>
        <button class="navbarbuttons" onclick="showSection('update')"> Update </button>
        <button class="navbarbuttons" onclick="showSection('delete')"> Delete </button>
    </nav>

    <section id="home" class="homecontent">
        <h1 class="splash">Welcome to Student Management System</h1>
        <h2 class="splash">A Project in Integrative Programming Technologies</h2>
    </section>

    <section id="create" class="content">
        <h1 class="contenttitle"> Insert New Student </h1>
        <form action="../includes/insert.php" method="POST">
            <label for="surname" class="label">Surname</label>
            <input type="text" name="surname" id="surname" class="field" required><br />
            <label for="name" class="label">Name</label>
            <input type="text" name="name" id="name" class="field" required><br />
            <label for="middlename" class="label">Middle name</label>
            <input type="text" name="middlename" id="middlename" class="field"><br />
            <label for="address" class="label">Address</label>
            <input type="text" name="address" id="address" class="field"><br />
            <label for="contact" class="label">Mobile Number</label>
            <input type="text" name="contact" id="contact" class="field"><br />
            <div id="btncontainer">
                <button type="button" id="clrbtn" class="btns">Clear Fields</button><br />
                <button type="submit" id="savebtn" class="btns">Save</button>
            </div>
        </form>
    </section>

    <section id="read" class="content">
        <h1 class="contenttitle">Student Records</h1>
        <?php include '../includes/fetch_students.php'; ?>
    </section>

    <section id="update" class="content">
        <h1 class="contenttitle">Update Student</h1>
        <?php
        if (!isset($_GET['update_id'])) { ?>
            <form action="index.php" method="GET">
                <label class="label">Enter Student ID:</label>
                <input type="number" name="update_id" class="field" required>
                <button type="submit" class="btns">Select Student</button>
            </form>
        <?php } else {
            require_once '../includes/db.php';
            $stmt = $pdo->prepare("SELECT * FROM students WHERE id = :id");
            $stmt->execute([':id' => $_GET['update_id']]);
            $student = $stmt->fetch();
            if ($student) { ?>
                <form action="../includes/update_student.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $student['id']; ?>">
                    <label class="label">Surname:</label> <input type="text" name="surname"
                        value="<?php echo htmlspecialchars($student['surname']); ?>" class="field" required><br>
                    <label class="label">Name:</label> <input type="text" name="name"
                        value="<?php echo htmlspecialchars($student['name']); ?>" class="field" required><br>
                    <label class="label">Middle Name:</label> <input type="text" name="middlename"
                        value="<?php echo htmlspecialchars($student['middlename']); ?>" class="field"><br>
                    <label class="label">Address:</label> <input type="text" name="address"
                        value="<?php echo htmlspecialchars($student['address']); ?>" class="field"><br>
                    <label class="label">Contact Number:</label> <input type="text" name="contact_number"
                        value="<?php echo htmlspecialchars($student['contact_number']); ?>" class="field"><br>
                    <button type="submit" name="update_record" class="btns">Update Record</button>
                    <a href="index.php" class="btns"
                        style="text-decoration:none; display:inline-block; text-align:center; padding: 5px;">Cancel</a>
                </form>
            <?php } else {
                echo "<p>Student not found.</p>";
                echo '<a href="index.php">Back</a>';
            }
        } ?>
    </section>

    <section id="delete" class="content">
        <h1 class="contenttitle">Delete Student</h1>
        <form action="../includes/delete_student.php" method="POST">
            <label class="label">Enter Student ID:</label>
            <input type="number" name="id" class="field" required>
            <button type="submit" class="btns">Delete Record</button>
        </form>
    </section>

    <div id="success-toast" class="toast-hidden">Operation Successful!</div>
    <script src="script.js"></script>
</body>

</html>