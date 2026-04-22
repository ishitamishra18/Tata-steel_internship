<?php
include 'db.php';

if ($_FILES['file']['name']) {
    $file = fopen($_FILES['file']['tmp_name'], "r");

    while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
        $name = $data[0];
        $value = $data[1];

        $conn->query("INSERT INTO records (name, value) VALUES ('$name', '$value')");
    }

    fclose($file);
    echo "Data uploaded and inserted successfully!";
}
?>
