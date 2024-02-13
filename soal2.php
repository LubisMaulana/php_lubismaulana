<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form PHP</title>
</head>
<body>
    <?php
    
    $nama = $email = $message = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST["nama"];
        $umur = $_POST["umur"];
        $hobi = $_POST["hobi"];

        echo "<div style='width:350px; border-style:solid; padding:10px;'>\n";
        echo "<p>Nama: $nama</p>";
        echo "<p>Umur: $umur</p>";
        echo "<p>Hobi: $hobi</p>";
        echo "</div>";
    }

    ?>
    <form method="post" id="formulir" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div id="formNama" style="width:350px; border-style:solid; padding:10px;">
            <div style="display: flex; align-items:center; gap: 10px; margin-bottom: 30px">
                <label for="nama">Nama Anda :</label><br>
                <input type="text" id="nama" name="nama" required><br><br>
            </div>
            <button id="btnNama" style="margin-left: 20px;">Submit</button>
        </div>

        <div id="formUmur" style="width:350px; border-style:solid; padding:10px;" hidden>
            <div style="display: flex; align-items:center; gap: 10px; margin-bottom: 30px">
                <label for="umur">Umur Anda :</label><br>
                <input type="number" id="umur" name="umur" required><br><br>
            </div>
            <button id="btnUmur" style="margin-left: 20px;">Submit</button>
        </div>

        <div id="formHobi" style="width:350px; border-style:solid; padding:10px;" hidden>
            <div style="display: flex; align-items:center; gap: 10px; margin-bottom: 30px">
                <label for="hobi">Hobi Anda :</label><br>
                <input type="text" id="hobi" name="hobi" required><br><br>
            </div>
            <input type="submit" id="btnHobi" style="margin-left: 20px;">
        </div>
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "<script>document.getElementById('formulir').hidden = true;</script>";
        }
    ?>

    <script>
        document.getElementById('btnNama').addEventListener('click', function() {
            document.getElementById('formNama').hidden = true;
            document.getElementById('formUmur').hidden = false;
        });
        document.getElementById('btnUmur').addEventListener('click', function() {
            document.getElementById('formUmur').hidden = true;
            document.getElementById('formHobi').hidden = false;
        });
    </script>
</body>
</html>
