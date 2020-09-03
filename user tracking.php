<?php session_start(); ?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>User Tracking</title>

    <style>
        * {
            box-sizing: border-box;
        }

        header {
            background-color: rgba(0, 0, 153, 0.25);
        }

        nav{
            margin-top: 10px; 
        }

        #filter{
            background-color: rgba(0, 0, 153, 0.25);
            padding: 20px;
            color: whitesmoke;
            margin-top: 10px; 
            font-size: 20px;
        }

        body {
            background-image: url("wallpaper3.jpg");
            background-attachment: fixed;
            background-size: cover;
            background-repeat: no-repeat;
        }

        #utplogo {
            width: 400px;
        }

        #logodiv, #titlediv {
            float: left;
        }

        #logodiv {
            width: 35%;
            padding: 15px;
        }

        #titlediv {
            width: 65%;
            font-size: 30px;
            font-family: 'Goudy Stout';
            color: goldenrod;
        }

        #headerdiv:after, nav:after{
            content: "";
            display: table;
            clear: both;
        }

        a.navlink{
            width: 50%;
            float:left;
        }

        a.navlink:link, a.navlink:visited {
            background-color: rgba(50, 50, 153, 0.5);
            padding: 15px;
            color: yellow;
            text-decoration: none;
            text-align: center;
            font-size: 25px;
        }

        a.navlink:hover, a.navlink:active {
            background-color: rgb(0, 0, 153);
            color: greenyellow;
            font-weight: bold;
        }

        a.stickybot:link, a.stickybot:visited{
            position: fixed;
            right: 0;
            bottom: 0;
            width: 300px; 
            background-color: rgba(0, 0, 153, 0.25);
            padding: 15px;
            color: lightseagreen;
            text-decoration: none;
            text-align: center;
            font-size: 25px;
        }

        a.stickybot:hover, a.stickybot:active{
            background-color: rgb(0, 0, 153);;
            color: greenyellow;
            font-weight: bold;
        }

        a.stickybot2:link, a.stickybot2:visited{
            position: fixed;
            left: 0;
            bottom: 0;
            width: 300px; 
            background-color: rgba(0, 0, 153, 0.25);
            padding: 15px;
            color: lightseagreen;
            text-decoration: none;
            text-align: center;
            font-size: 25px;
        }

        a.stickybot2:hover, a.stickybot2:active{
            background-color: rgb(0, 0, 153);;
            color: greenyellow;
            font-weight: bold;
        }

        #noresults{
            text-align: center;
            background-color: blue;
            padding: 15px;
            color: red;
            font-size: 20px;
            border: 2px solid red; 
        }

        #tabledisplay{
            margin-top: 10px;
        }

        table.table1{
            width: 100%; 
            background-color: rgba(200, 200, 200, 0.40);
        }

        caption.table1{
            background-color: rgba(200, 200, 200, 0.40);
            padding: 20px;
            font-size: 25px;
            font-weight: bold;
        }

        .table1{
            border-collapse: collapse;
            border: 1px solid black;

        }

        td.table1, th.table1{
            text-align: center; 
            padding: 5px;
            font-size: 20px;
        }

        @media(max-width:1200px) {
            #logodiv, #titlediv {
                width: 100%;
            }
        }

        @media(max-width:600px) {
            body {
                background-image: url("yukka/3.jpg");
                background-attachment: fixed;
                background-size: cover;
                background-repeat: no-repeat;
            }

            #logodiv, #titlediv {
                width: 100%;
            }

            #utplogo {
                width: 200px;
            }

            #titlediv {
                width: 70%;
                font-size: 20px;
                font-family: 'Goudy Stout';
                color: goldenrod;
                padding-left: 20px;
            }

            a.navlink{
                width:100%; 
            }

            a.stickybot:link, a.stickybot:visited, a.stickybot2:link, a.stickybot2:visited {
                width: 100%; 
            }

            #footer:after{
                content: "";
                display: table;
                clear: both;
            }

            a.stickybot2:link, a.stickybot2:visited{
            position: fixed;
            bottom: 60px;
        }
    }
    </style>

</head>

<body>

    <div id="preheader">
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "isdpdb";

            $conn = new mysqli($servername, $username, $password, $database);
            $_SESSION["conn"] = new mysqli($servername, $username, $password, $database);
        ?>

        <center>
            <text style="color:white;">
                <?php
                    if ($conn -> connect_error){
                        echo nl2br("Connection Failed: ".$conn -> connect_error);
                    } else
                        echo nl2br("Database Connected Successfully!");
                ?>
            </text>
        </center>    
    </div>


    <header>
        <div id="headerdiv">
            <div id="logodiv">
                <img id="utplogo" src="utplogo.png" />
            </div>
            <div id="titlediv">
                <p>HAWA 2.0: SMART Headband <br /> User Tracking</p>
                <p id="userwlcp">WELCOME <u><?php echo $_SESSION["user"]; ?></u></p>
            </div>
        </div>
    </header>

    <nav>
        <a class="navlink" href="user tracking.php">Table</a>
        <a class="navlink" href="user tracking2.php">Graph</a>
    </nav>


    <div id="filter">
        <form action="user tracking.php">
            <label for="filterdate">Date Filter (YEAR-MONTH-DAY): </label>
            <input type="text" name="filterdate" placeholder="1997-05-23"/>
            <input type="submit" value="Filter"/>
        </form>
        <text>Type * to reset filter.</text> <br />
        <?php     
            if (isset($_GET["filterdate"])){
                echo nl2br("Filter Date: ".$_GET["filterdate"]);
            }             
        ?>
    </div>

    <div id="resetfilter"></div>
    
    <div id="tabledisplay">
        <?php
            if (isset($_GET["filterdate"])) {
                $_SESSION["filterdate"] = $_GET["filterdate"];
                if ($_GET["filterdate"] == "*")
                    $displayrec = "SELECT * FROM ".$_SESSION["user"];
                else
                    $displayrec = "SELECT * FROM ".$_SESSION["user"]." WHERE recdate = '".$_GET["filterdate"]."'; ";
            } 
            else 
                $displayrec = "SELECT * FROM ".$_SESSION["user"];
            
            $results =  $_SESSION["conn"]->query($displayrec);
            
            
            if ($results->num_rows > 0) {
            // output data of each row
                echo "<center>";
                echo "<table class=\"table1\">";
                echo "<caption class=\"table1\">".$_SESSION["user"]."'s Tracking </caption>";
                echo "<tr class=\"table1\">
                        <th class=\"table1\">Date</th>
                        <th class=\"table1\">Time</th>
                        <th class=\"table1\">Position X (m)</th>
                        <th class=\"table1\">Position Y (m)</th>
                        <th class=\"table1\">Position</th>
                        <th class=\"table1\">Heartbeats Per Minute (BPM)</th>
                        <th class=\"table1\">Temperature (&#8451)</th>
                        <th class=\"table1\">Battery Percentage (%)</th>
                        <th class=\"table1\">Power (W)</th>
                    </tr>";
                while($row = $results->fetch_assoc()) {
                    echo "<tr class=\"table1\">";
                    echo "<td class=\"table1\">".$row["recdate"]."</td>".
                         "<td class=\"table1\">".$row["rectime"]."</td>".
                         "<td class=\"table1\">".$row["posx"]."</td>".
                         "<td class=\"table1\">".$row["posy"]."</td>".
                         "<td class=\"table1\">".$row["pos"]."</td>".
                         "<td class=\"table1\">".$row["bpm"]."</td>".
                         "<td class=\"table1\">".$row["temp"]."</td>".
                         "<td class=\"table1\">".$row["bat"]."</td>".
                         "<td class=\"table1\">".$row["power"]."</td>".
                        "</tr>";
                    }
                echo "</table>";
                echo "</center>";
                } else {
                    echo '<p id="noresults">Oops! No Results!</p>';
            }
        
        ?>

    </div>
    
    <div id="footer">
        <a class="stickybot" href="logout.php">Logout</a>
        <a class="stickybot2" href="deleteaccount.php">Delete Account</a>
    </div>
    
</body>

</html>
