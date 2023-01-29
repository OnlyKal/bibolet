<?php


if (isset($_GET['jdsyudyvufdsyvvd'])) {
    $mainRoute = $_GET['jdsyudyvufdsyvvd'];

    switch ($mainRoute) {
        case 'STARYUEHDUIDODJDJDODODKDHDJJD':
            include './Controllers/CategoryController.php';
            break;
        case '7UIE873UYUERHJDFIUIUE489':
            include './Controllers/Product.Controller.php';
            break;
        case '784IUERHJHJDFHJDFUIDFIUIUDER':
            include './Controllers/Shop.Controller.php';
            break;
        case 'SUYDUY878734UIJDFHJDFJH':
            include './Controllers/Command.Controller.php';
            break;
        default:
            echo json_encode(["status" => "failure", "message" => "Page n;existe pAS ", "data" => null]);
            break;
    }
} else {
    echo json_encode(["status" => "failure", "message" => "Page routye introuveble", "data" => null]);
}
