<link rel="stylesheet" href="../terminal.css" />
<h3>Lab 2 - Task 2 - HTML Tables and PHP</h3>
<?php
$table = [
    ["Aaaa Bbbbb", "Programmer",        35000],
    ["Ccc Dddddd", "Software Engineer", 50000],
    ["Eeee Fffff", "Group Lead",        55000]
];
?>
<table>
    <tr>
        <th>Name</th>
        <th>Title</th>
        <th>Salary</th>
    </tr>
    <?php foreach ($table as $row) { ?>
        <tr>
            <td><?php echo $row[0]; ?></td>
            <td><?php echo $row[1]; ?></td>
            <td>£<?php echo number_format($row[2]); ?></td>
        </tr>
    <?php } ?>
</table>