<link rel="stylesheet" href="../terminal.css" />
<h3>Lab 5 - Tutorial - SQL Demo</h3>
<?php
// Yes, a lot of the stuff is not what the guide says to do,
// but I cant be bothered to do all that, this does all of
// the basics covered in it though.

// Use the sql connect function I made for the assignment
require "../utils.php";

function showResults($table) { ?>
    <table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
    </tr>
    <?php foreach ($table as $row) { ?>
        <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["name"]; ?></td>
            <td><?php echo $row["email"]; ?></td>
            <td><?php echo $row["password"]; ?></td>
        </tr>
    <?php } ?>
    </table>
    <?php
}

try {
    // Connect to the database
    $dbh = sqlConnect();
    echo "Connected to server<br><br>";


    // Create users table
    $sql = "
    DROP TABLE IF EXISTS l5_users;
    CREATE TABLE l5_users (
        id          INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name        VARCHAR(128) NOT NULL,
        email       VARCHAR(128) NOT NULL,
        password    VARCHAR(128) NOT NULL
    );";
    $dbh->exec($sql);
    echo "Table created successfully<br><br>";


    // Insert some users
    function addUser($dbh, $name, $email, $password) {
        $sql = "INSERT INTO l5_users (name, email, password)
                VALUES (:name, :email, :password);";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(":name",       $name);
        $stmt->bindParam(":email",      $email);
        $stmt->bindParam(":password",   $password);
        $stmt->execute();
        echo "Added user: $name<br>";
    }
    echo "Inset some users into the table:<br>";
    addUser($dbh, "Chase Hunter",   "ChaseHunter@example.com",  "Password123");
    addUser($dbh, "TJ Hess",        "TobiasHess@test.com",      "wordPass321");
    addUser($dbh, "Jenna Begay",    "JennaBegay@test.com",      "123Password");
    addUser($dbh, "Carl Hendricks", "CarlH@example.com",        "P455w0rd");
    addUser($dbh, "Leo Alvaez",     "LeoAlvarez@example.net",   "BigChungus");


    // Fetch all users
    echo "<br>Fetch all users:<br>";
    $sql = "SELECT * FROM l5_users;";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $users = $stmt->fetchAll();
    showResults($users);


    // Fetch two users, page two
    echo "<br>Fetch users, max two, page two:<br>";
    $sql = "SELECT * FROM l5_users LIMIT 2 OFFSET 2;";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $users = $stmt->fetchAll();
    showResults($users);


    // Fetch user by id, 2
    echo "<br>Fetch user with ID of 2:<br>";
    $sql = "SELECT * FROM l5_users WHERE id = 2;";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $users = $stmt->fetchAll();
    showResults($users);


    // Fetch users ordered by password alphabetically
    echo "<br>Fetch all users ordered by password alphabetically:<br>";
    $sql = "SELECT * FROM l5_users ORDER BY password;";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $users = $stmt->fetchAll();
    showResults($users);


    // Fetch users with an email on example.com
    echo "<br>Fetch all users with email on the example.com domain:<br>";
    $sql = "SELECT * FROM l5_users WHERE email LIKE '%example.com';";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $users = $stmt->fetchAll();
    showResults($users);


    // Delete users table
    $sql = "DROP TABLE l5_users;";
    $dbh->exec($sql);
    echo "<br>Table deleted successfully<br>";


    // Disconnect from the database
    $dbh = null;
    echo "<br>Disconnected from server<br>";
} catch (PDOException $e) {
    echo '<br><br>Error: ' . $e->getMessage();
}

?>