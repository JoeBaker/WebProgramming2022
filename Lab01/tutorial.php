<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        .topnav {
            overflow: hidden;
            background-color: #333;
        }

        .topnav a {
            float: left;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        .topnav a.active {
            background-color: #04AA6D;
            color: white;
        }

        @media screen and (max-width: 600px) {
            body {
                background-color: lightblue;
            }

            .topnav a {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <div class="topnav">
        <a class="active" href="#home">Home</a>
        <a href="#news">News</a>
        <a href="#contact">Contact</a>
        <a href="#about">About</a>
    </div>

    <div style="padding-left:16px">
        <p>My name is <?php echo "Joe"; ?> and I am <?php echo 19; ?> years old.</p>
    </div>
    
    <ul>
        <?php
            $arr = array("Paul", "Deniz", "Bob", "Holly");
            $i = 1;
            foreach ($arr as $value) {
                echo "<li>Person $i: $value</li>";
                $i++;
            }
        ?>
    </ul>

</body>

</html>