<!DOCTYPE HTML>
<html>
<head>
    <title>Database Connectivity</title>
    <style>
        body
         {
            background-image: url('sathyabama.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
    </style>
</head>
<body>
    <center>
        <font color="white">
            <h1>DATABASE CONNECTIVITY</h1>
            <br><br>
            <form method="post">
                <b>Name: </b><input type="text" name="name" id="name" required><br><br>
                <b>RegNo: </b><input type="text" name="regno" id="regno" required><br><br>
                <input type="submit" name="submit" value="Submit">
            </form>
        </font>
    </center>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $name = $_POST['name'];
        $regno = $_POST['regno'];
        $conn = new mysqli('localhost', 'root', '', 'register');
        if ($conn->connect_error) 
        {
            die('Connection failed: ' . $conn->connect_error);
        } else
         {
            $stmt = $conn->prepare("INSERT INTO datainfo (Name, RegNo) VALUES (?, ?)");
            $stmt->bind_param("si", $name, $regno);
            $stmt->execute();
            echo "<center><font color='white'>Registration successful</font></center><br>";
            $stmt->close();
            $sql = "SELECT Name, RegNo FROM datainfo";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) 
            {
                echo "<center><font color='white'>";
                while ($row = $result->fetch_assoc()) 
                {
                    echo "Name: " . $row["Name"] . "<br>RegNo: " . $row["RegNo"] . "<br><br>";
                }
                echo "</font></center>";
            } else 
            {
                echo "<center><font color='white'>0 results</font></center>";
            }
        }
        $conn->close();
    }
    ?>
             // databse creation: mysql -u root -p , CREATE DATABASE register; , USE register; ,CREATE TABLE datainfo (id INT(11) AUTO_INCREMENT PRIMARY KEY, Name VARCHAR(100), RegNo INT(11)); , SHOW TABLES; , DESCRIBE datainfo; //
</body>
</html>
