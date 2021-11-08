<!DOCTYPE HTML>
<html lang="en">

<head>
    <title>Movie Design</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css"/>
    
</head>

<body>
    <div class="navbar">
        <div class="navbar-container">
            <div class="logo-container">
                <h1 class="logo"><a href="main.php">Cenime</h1>
            </div>
            <div class="menu-container">
                <ul class="menu-list">
                    <li class="menu-list-item"><a href="main.php">Home</a></li>
                    <li class="menu-list-item"><a href="now-showing.php">Now Showing</a></li>
                    <li class="menu-list-item"><a href="upcoming.php">Upcoming</a></li>
                    <div>
                        <form class="searchForm" method="POST" action="search.php">
                            <input type="text" placeholder="Try search morning" id="movieName" name="searchitem" size="45">
                            <button type="submit" id="searchButton" value="Search">Search</button>
                        </form>
                    </div>
                </ul>
            </div>
            <div class="profile-container">
                <img class="profile-picture" src="pics/profile.png" alt="">
                <div class="profile-text-container">
                    <span class="profile-text">Login</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="content-container">
            <div class="featured-content"
                style="background: linear-gradient(to bottom, rgba(0,0,0,0), #151515), url('pics/no-time-to-die.jpg');">
                <h1 class="movie-list-title">NO TIME TO DIE</h1>
            </div>
            <div class="movie-list-container">
                <h1 class="movie-list-title">UPCOMING</h1>
                <div class="movie-list-wrapper">
                    <?php
                        $servername = "localhost";
                        $username = "f32ee";
                        $password = "f32ee";
                        $dbname = "f32ee";

                        // Create connection
                        $conn = mysqli_connect($servername, $username, $password, $dbname);
                        // Check connection
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        $sql = " SELECT MovieID,MovieName,Poster FROM Movies where ReleaseStatus=0";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            $count = 0;
                            while ($row = mysqli_fetch_assoc($result)) {
                                if ($count % 4 == 0) {
                                    echo '<div class="movie-list">';
                                }
                                echo '<form id="'.$row["MovieID"].'" class="movie-list-item" method="post" action="theMovie.php">';
                                echo '<div class ="movie-list-item"'.$row[MovieID].'>';
                                echo '<a onclick="document.getElementById(\''.$row["MovieID"].'\').submit();"><img class="movie-list-item-img" src="'.$row["Poster"].'" alt="" /></a>';
                                echo '<div class="movie-list-item-title">'.$row["MovieName"].'</div>';
                                echo '</div>';
                                echo '</form>';
                                $count = $count + 1;
                                if ($count % 4 == 0) {
                                    echo '</div>';
                                }
                            }
                            if($count%3!=0){
                                echo '</div>';
                            }
                        } else {
                            echo "sql error";
                        }
                        mysqli_close($conn);
                        ?>
                </div>  
            </div>
        </div> 
    </div>
    <script src="app.js"></script>
</body>

</html>