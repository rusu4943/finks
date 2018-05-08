<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="Login.css">
    <link rel="stylesheet" type="text/css" href="Homepage.css">
    <title> Homepage </title>
</head>

<?php
    session_start();
    $servername = "localhost";
    $db_username = "root";
    $db_password = "root";
    $dbname = "finks";

    $filtered = FALSE;
    $filter = NULL;

    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    if ($_POST)
    {
        if ($_POST["keyword"])
        {
            $filtered = TRUE;
            $filter = $_POST["keyword"];
        }
    }
    
    if($_GET)
    {
        $getsql = "SELECT * FROM images WHERE imageid=" . $_GET["imageid"];
        $result = $conn->query($getsql);
        $currvotes = 0;
        if (mysqli_num_rows($result))
        {
            while ($row = $result->fetch_assoc())
            {
                $currvotes = $row["votes"];
            }
        }
        $setsql = "UPDATE images SET votes=" . ($currvotes + 1) . " WHERE imageid=" . $_GET["imageid"];
        $conn->query($setsql);
        header("Location: homepage.php"); 
    }

    $sql = "SELECT * FROM images ORDER BY votes";
    $result = $conn->query($sql);
?>

<body class="align">
<div class="navbar">
        <?php 
            if ($_SESSION["username"])
            {
                echo "<a href='logout.php' id='login'>LOGOUT</a>";
                echo "<a href='homepage.php' id='login'>Welcome, " . $_SESSION["username"] . "</a>";
            }
            else
            {
                echo "<a href='Login.php' id='login'>LOGIN</a>";
            }
        ?>
        <a href="upload.php" id="login">UPLOAD</a>
        <a href="search.php" id="login">SEARCH</a>
        <a href="homepage.php" id="login">BROWSE</a>
        <a href="homepage.php" id="finks">FINKS</a>
    </div>

    <div class="content">
        <?php
            if (mysqli_num_rows($result))
            {
                while ($row = $result->fetch_assoc())
                {
                    
                    if ($filtered)
                    {
                        if (strpos($row["title"], $filter) === FALSE)
                        {
                            echo $row["title"];
                            echo $filter;
                            continue;
                        }
                    }
                    
                    echo "<div class='titlebar'><h1>" . $row["title"] . "</h1></div>";
                    echo "<div class='imagecontent'><img class='subimagecontent' src=" . $row["url"] . "></div>";
                    echo "<a href='homepage.php?votes=" . $row["imageid"] . "'><div class='infobar'><h1>Votes: " . $row["votes"] . "</h1></div></a>";
                }
            }
        ?>
    </div>
</body>
</html>
