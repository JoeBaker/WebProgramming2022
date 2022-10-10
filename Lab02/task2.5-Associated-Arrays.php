<link rel="stylesheet" href="/terminal.css" />
<h3>Lab 2 - Task 2.5 - HTML Tables and PHP with Associated Arrays</h3>
<?php
$table = [
    [
        "name" => "Aaaa Bbbbb",
        "title" => "Programmer",
        "salary" => 35000
    ],
    [
        "name" => "Ccc Dddddd",
        "title" => "Software Engineer",
        "salary" => 50000
    ],
    [
        "name" => "Eeee Fffff",
        "title" => "Group Lead",
        "salary" => 55000
    ]
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
            <td><?php echo $row["name"]; ?></td>
            <td><?php echo $row["title"]; ?></td>
            <td>£<?php echo number_format($row["salary"]); ?></td>
        </tr>
    <?php } ?>
</table>

<p class="comment">
        // [
    <br>// "name" => "Aaaa Bbbbb",
    <br>// "title" => "Programmer",
    <br>// "salary" => 35000
    <br>// ]
    <br>// instead of ["Aaaa Bbbbb", "Programmer", 35000]
    <br>// So you can do $row["name"] instead of $row[0]
</p>