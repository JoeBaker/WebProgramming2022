<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Joe Baker @ BU</title>
    <meta name="author" content="Joe Baker">
    <meta name="description" content="Joe Baker Web Programming Labs 2022">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <link href="fontawesome/all.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
</head>

<body>
    <header>
        <h1>Joe Baker<br />Web Programming</h1>
        <div id="socialMediaButtons">
            <a href="mailto:s5411045@bournemouth.ac.uk" class="email" title="Email">
                <i class="fa-regular fa-envelope"></i></a>
            <a href="https://github.com/JoeBlakeB/" class="github" title="GitHub">
                <i class="fa-brands fa-github"></i></a>
            <a href="https://www.linkedin.com/in/joeblakeb/" class="linkedin" title="LinkedIn">
                <i class="fa-brands fa-linkedin-in"></i></a>
            <a href="portfolio" class="edge edge-right" title="Portfolio">
            <i class="fa-solid fa-file"></i></a>
        </div>
    </header>
    <div class="content">
<?php

// List all files in root directory and only add lab directories
foreach (scandir(".") as $dir) {
    if ("Lab" == substr($dir, 0, 3) && strlen($dir) == 5) {
        $number = intval(substr($dir, 3, 2));
        echo "<div><div class=\"boxTitle\"><h2>Lab $number</h2></div>";
        // Add tutorial files for a lab
        foreach (scandir($dir) as $file) {
            if (substr($file, 0, 8) == "tutorial" && (substr($file, -4) == ".php" || substr($file, -5) == ".html")) {
                if (strlen($file) > 12) {
                    $title = "Tutorial " . substr($file, 8, 1) . ": " . str_replace("-", " ", explode(".", substr($file, 10))[0]);
                }
                else {
                    $title = "Tutorial";
                }
                echo "<p><a href=\"$dir/$file\">$title</a></p>";
            }
        }
        // Add task files for a lab
        foreach (scandir($dir) as $file) {
            if (substr($file, 0, 4) == "task" && (substr($file, -4) == ".php" || substr($file, -5) == ".html")) {
                $title = "Task " . substr($file, 4, 1) . ": " . str_replace("-", " ", explode(".", substr($file, 6))[0]);
                echo "<p><a href=\"$dir/$file\">$title</a></p>";
            }
        }
        echo "</div>";
    }
}

?>
</body>

</html>
