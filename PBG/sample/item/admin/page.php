<?php
    include ('connection.php');

    $limit = 10;
    $page = isset($_GET['page']) ? S_GET['page'] : 1;
    $start = ($page - 1) * $limit;
    $result = mysqli_query($db, "SELECT * FROM item LIMIT $start, $limit");
    $item = $result->fetch_all(MYSQLI_ASSOC);

    $result1 = mysqli_query($db, "SELECT count(item_id) AS item_id FROM item");
    $custCount = $result1->fetch_all(MYSQLI_ASSOC);
    $total = $custCount[0]['item_id'];
    $pages = ceil( $total / $limit);

    $Previous = $page - 1;
    $Next = $page + 1;

?>