<?php


if (isset($_GET['bigbangtheories'])) {
    $mainRoute = $_GET['bigbangtheories'];

    switch ($mainRoute) {
        case 'stargeteatalantissg1universoriginkalex0':
            include './Controllers/Category.Controller.php';
            break;
        case 'stargeteatalantissg1universoriginkalex1':
            include './Controllers/Product.Controller.php';
            break;
        case 'stargeteatalantissg1universoriginkalex2':
            include './Controllers/Shop.Controller.php';
            break;
        case 'stargeteatalantissg1universoriginkalex':
            include './Controllers/Command.Controller.php';
            break;
        default:
            echo json_encode(["status" => "failure", "message" => "Page n;existe pAS ", "data" => null]);
            break;
    }
} else {
    echo json_encode(["status" => "failure", "message" => "Page routye introuveble", "data" => null]);
}
