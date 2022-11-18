<link rel="stylesheet" href="../terminal.css" />
<h3>Lab 5 - Tutorial - SQL CRUD</h3>
<p class="comment">
<?php
    /*
     * Pretty much this entire file is shit
     * do not think this is a good example of anything.
     * Actually, dont even look at this, it is so bad.
     * There is nothing to see here.
     *
     * This place is not a place of honor...
     * no highly esteemed deed is commemorated here...
     * nothing valued is here.
     * 
     * What is here was dangerous and repulsive to me.
     * This message is a warning about danger.
     * 
     * The danger is in a particular location...
     * it increases towards a center...
     * the center of danger is here...
     * of a particular size and shape, and below us. 
     * 
     * The danger is to the sanity, and it can kill.
     * 
     * The form of the danger is an emanation of bad code.
     * 
     * The danger is unleashed only if you substantially
     * look at this code. This code is best shunned
     * and left unread.
     */

    require "../utils.php";

    try {
        // Connect to the database
        $dbh = sqlConnect();
        echo "// Connected to server<br>";

        // Create products table
        $sql = "
    CREATE TABLE IF NOT EXISTS l5_products (
        id          INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name        VARCHAR(128) NOT NULL,
        description VARCHAR(128) NOT NULL,
        price       decimal(5, 2) NOT NULL
    );";
        $dbh->exec($sql);

        if (!empty($_POST["name"]) && !empty($_POST["desc"]) && !empty($_POST["price"])) {
            // Edit a product
            if (!empty($_POST["updateID"])) {
                $sql = "UPDATE l5_products SET name = :name, description = :desc, price = :price WHERE id = :id";
                $stmt = $dbh->prepare($sql);
                $stmt->bindParam(":name", $_POST["name"]);
                $stmt->bindParam(":desc", $_POST["desc"]);
                $stmt->bindParam(":price", $_POST["price"]);
                $stmt->bindParam(":id", $_POST["updateID"]);
                $stmt->execute();
                echo "// Updated product with id: " . $_POST["updateID"] . "<br>";
            }
            // Add a product
            else {
                $name = $_POST["name"];
                $description = $_POST["desc"];
                $price = $_POST["price"];
                $sql = "INSERT INTO l5_products (name, description, price)
                    VALUES (:name, :description, :price);";
                $stmt = $dbh->prepare($sql);
                $stmt->bindParam(":name", $name);
                $stmt->bindParam(":description", $description);
                $stmt->bindParam(":price", $price);
                $stmt->execute();
                echo "// Added product: $name<br>";
            }
        }

        // Delete a product
        if (!empty($_GET["delete"])) {
            $id = $_GET["delete"];
            $sql = "DELETE FROM l5_products WHERE id = :id;";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            echo "// Deleted product with id: $id<br>";
        }

        // Fetch all products
        $sql = "SELECT * FROM l5_products;";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $products = $stmt->fetchAll();
        echo "// Fetched all products<br>";

        // Disconnect from the database
        $dbh = null;
        echo "// Disconnected from server<br>";
    } catch (PDOException $e) {
        echo '// Error: ' . $e->getMessage();
        exit();
    }

?>
</p>


<form id="form" style="margin-top:16px;" method="post" action="task1-SQL-CRUD.php">
    <label for="name">Product Name:</label><br>
    <input type="text" id="name" name="name" value=""><br><br>
    <label for="desc">Product Description:</label><br>
    <textarea id="desc" name="desc" value=""></textarea><br><br>
    <label for="price">Product Price:</label><br>
    <input type="number" step="0.01" id="price" name="price" value=""><br><br>
    <input id="updateID" name="updateID" style="display: none;">
    <input id="submit" type="submit" value="Add Product">
</form>

<table>
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
    <?php foreach ($products as $row) { ?>
        <tr>
            <td><?php echo $row[1]; ?></td>
            <td><?php echo $row[2]; ?></td>
            <td>£<?php echo $row[3]; ?></td>
            <td onclick="update(<?php echo $row[0]; ?>,'<?php echo $row[1]; ?>','<?php echo $row[2]; ?>','<?php echo $row[3]; ?>');">✏️</td>
            <td onclick="window.location.replace('task1-SQL-CRUD.php?delete=<?php echo $row[0]; ?>')">🚮</td>
        </tr>
    <?php } ?>
</table>

<style>
    td:nth-child(1) {
        max-width: 150px;
    }

    td:nth-child(4),
    td:nth-child(5) {
        text-align: center;
        cursor: pointer;
    }

    input:not([type="submit"]),
    textarea {
        width: 100%;
    }

    textarea {
        height: 128px;
        background: #2f3438;
        color: #fff;
        border: 1px solid #585858;
    }

    input[type="submit"] {
        margin: auto;
        display: block;
        padding: 8px 12px;
    }
</style>

<script>
    function update(id, name, desc, price) {
        document.getElementById("name").value = name;
        document.getElementById("desc").value = desc;
        document.getElementById("price").value = price;
        document.getElementById("updateID").value = id;
        document.getElementById("submit").value = "Update Product: " + name;
    }
</script>