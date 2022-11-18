<link rel="stylesheet" href="../terminal.css" />
<h3>Lab 3 - Product Management Basics</h3>

<?php
// Load
$file = file_get_contents('./task1.json', true);
$data = json_decode($file, true);
if (empty($data)) {
    $data = array();
}
// Add
if (!empty($_POST)) {
    $new = [uniqid(), $_POST['name'], $_POST['desc'], $_POST['price']];
    array_push($data, $new);
}
// Delete
if (!empty($_GET['delete'])) {
    $id = $_GET['delete'];
    foreach ($data as $key => $value) {
        if ($value[0] == $id) {
            unset($data[$key]);
        }
    }
}
// Save
$jsonOut = fopen("./task1.json", "w");
fwrite($jsonOut, json_encode($data));
fclose($jsonOut);
?>

<form style="margin-top:16px;" method="post">
    <label for="name">Product Name:</label><br>
    <input type="text" id="name" name="name" value=""><br><br>
    <label for="desc">Product Description:</label><br>
    <input type="text" id="desc" name="desc" value=""><br><br>
    <label for="price">Product Price:</label><br>
    <input type="number" step="0.01" id="price" name="price" value=""><br><br>
    <input type="submit" value="Add Product">
</form>

<table>
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Delete</th>
    </tr>
    <?php foreach ($data as $row) { ?>
        <tr>
            <td><?php echo $row[1]; ?></td>
            <td><?php echo $row[2]; ?></td>
            <td>£<?php echo $row[3]; ?></td>
            <td><a href="task1-Product-Management-Basics.php?delete=<?php echo $row[0]; ?>">Delete</a></td>
        </tr>
    <?php } ?>
</table>