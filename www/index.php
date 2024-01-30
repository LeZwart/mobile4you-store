<?php

require 'database.php';

$sql = "SELECT * FROM devices";

if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql .= " WHERE name LIKE '%$search%'";
}

if (isset($_GET['sort'])) {
    $sort = $_GET['sort'];
    $sql .= " ORDER BY $sort";
}

if (isset($_GET['order'])) {
    $order = $_GET['order'];
    $sql .= " $order";
}

$result = mysqli_query($conn, $sql);

?>

<form action="index.php" method="get">
    <input type="text" name="search" placeholder="Search..." />
    <select name="sort">
        <option value="name">Name</option>
        <option value="brand">Brand</option>
        <option value="price">Price</option>
    </select>

    <select name="order">
        <option value="ASC">Ascending</option>
        <option value="DESC">Descending</option>
    </select>
    <input type="submit" value="Search" />
</form>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Brand</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['device_id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['brand']; ?></td>
                <td>€ <?php echo $row['price']; ?></td>
                <td><a href="detail_device.php?id=<?php echo $row['device_id']; ?>">Detail</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

