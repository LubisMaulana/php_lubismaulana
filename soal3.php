<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form style="width:350px; border-style:solid; padding:10px; margin-left: 30px; margin-top:50px; margin-bottom: 20px;" method="post" id="formulir" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div style="display: flex; align-items:center; gap: 10px; margin-bottom: 30px">
            <label for="nama">Nama :</label><br>
            <input type="text" id="nama" name="nama"><br><br>
        </div>
        <div style="display: flex; align-items:center; gap: 10px; margin-bottom: 30px">
            <label for="alamat">Alamat :</label><br>
            <input type="text" id="alamat" name="alamat"><br><br>
        </div>
        <div style="display: flex; align-items:center; gap: 10px; margin-bottom: 30px">
            <label for="hobi">Hobi :</label><br>
            <input type="text" id="hobi" name="hobi"><br><br>
        </div>
        <input type="submit" id="btnHobi" style="margin-left: 20px;">
    </form>
    
    <table style="margin-left: 30px;" border="1">
        <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Hobi</th>
        </tr>
        <?php
            $servername = "localhost";
            $username = "root";
            $dbname = "import";
            $password = "";
            
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }


            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nama = $_POST["nama"];
                $alamat = $_POST["alamat"];
                $hobiInput = $_POST["hobi"];

                

                $sql = "SELECT * FROM person WHERE nama LIKE '%$nama%' AND alamat LIKE '%$alamat%'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $sql = "SELECT hobi FROM hobi WHERE person_id = ".$row['id']." AND hobi LIKE '%$hobiInput%'";
                        $result2 = $conn->query($sql);
                        $hobi = '';
                        if ($hobiInput != ""){
                            if ($result2->num_rows > 0){
                                echo "<tr>\n";
                                echo "<td>".$row["nama"]."</td>\n<td>".$row["alamat"]."</td>\n";
                                while($row2 = $result2->fetch_assoc()) {
                                    $hobi = $hobi.$row2['hobi'].", ";
                                }
                                $hobi = rtrim($hobi, ", ");
                                echo "<td>$hobi</td>\n";
                                echo "</tr>\n";
                            }
                        }else{
                            echo "<tr>\n";
                            echo "<td>".$row["nama"]."</td>\n<td>".$row["alamat"]."</td>\n";
                            $sql = 'SELECT hobi FROM hobi WHERE person_id = '.$row['id'];
                            $result2 = $conn->query($sql);
                            $hobi = '';
                            while($row2 = $result2->fetch_assoc()) {
                                $hobi = $hobi.$row2['hobi'].", ";
                            }
                            $hobi = rtrim($hobi, ", ");
                            echo "<td>$hobi</td>\n";
                            echo "</tr>\n";
                        }
                    }
                }
            }else{
                $sql = "SELECT * FROM person";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>\n";
                        echo "<td>".$row["nama"]."</td>\n<td>".$row["alamat"]."</td>\n";
                        $sql = 'SELECT hobi FROM hobi WHERE person_id = '.$row['id'];
                        $result2 = $conn->query($sql);
                        $hobi = '';
                        while($row2 = $result2->fetch_assoc()) {
                            $hobi = $hobi.$row2['hobi'].", ";
                        }
                        $hobi = rtrim($hobi, ", ");
                        echo "<td>$hobi</td>\n";
                        echo "</tr>\n";
                    }
                }
            }
        ?>
    </table>
</body>
</html>