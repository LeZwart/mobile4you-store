<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header("Location: index.php");
    exit();
}

require 'database.php';

$sql = "SELECT * FROM devices WHERE device_id = $id";

$result = mysqli_query($conn, $sql);
$device = mysqli_fetch_assoc($result);

?>

<a href="index.php">terug naar index</a>
<a href="delete_device.php?id=<?php echo $id ?>">DELETE DEVICE</a>

<?php

foreach ($device as $key => $value) {
    if ($key == 'image_url') {
        // echo "<img src='$value' />";
        ?>
        <img style="height: 400px; width: 400px;" src="images/image4.jpg"/>
        <?php
    } else {
        echo "<p>$key: $value</p>";
    }
}



