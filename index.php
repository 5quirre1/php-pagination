<?php
    include 'pagination.php';

    $data = [
        ["id" => "1", "thing" => "a"],
        ["id" => "2", "thing" => "b"],
        ["id" => "3", "thing" => "c"],
        ["id"=> "4", "thing"=> "d"],
        ["id"=> "5", "thing"=> "e"],
        ["id"=> "6", "thing"=> "f"],
    ];

    $itemsperpage = 3;
    $total = count($data);
    $totalpages = ceil($total / $itemsperpage);

    $currentpage = isset($_GET["page"]) ? intval($_GET["page"]) :1;
    $currentpage = max(1, $currentpage);
    $currentpage = min($totalpages, $currentpage);

    $offset = ($currentpage - 1) * $itemsperpage;
    if ($offset < 0) $offset = 0;

    $pageddata = array_slice($data, $offset, $itemsperpage);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {font-family: "ＭＳ Pゴシック","MS PGothic";}
        .pagination {display: flex; gap:8px;}
    </style>
</head>
<body>
    <ul>
        <?php foreach ($pageddata as $item) : ?>
            <li><?php echo htmlspecialchars($item['thing']); ?> id <?php echo htmlspecialchars($item['id']); ?></li>
        <?php endforeach; ?>
    </ul>

    <?php 
        render($currentpage, $totalpages)
    ?>
</body>
</html>
