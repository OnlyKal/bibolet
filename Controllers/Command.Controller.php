<?php


if (isset($_POST['action'])) {
    include('../Models/Command.Model.php');
    include('./Validator.php');

    class CommandController
    {
        static function createCommand()
        {
            $cmd_id = htmlspecialchars($_POST['cmd_id']);
            $product_id = htmlspecialchars($_POST['product_id']);
            $cmd_qt = htmlspecialchars($_POST['cmd_qt']);
            $cmd_price = htmlspecialchars($_POST['cmd_price']);
            $cmd_date = htmlspecialchars($_POST['cmd_date']);
            $cmd_delivery_adress = htmlspecialchars($_POST['cmd_delivery_adress']);
            $cmd_delLat = htmlspecialchars($_POST['cmd_delLat']);
            $cmd_delLng = htmlspecialchars($_POST['cmd_delLng']);

            try {
                $cmdModel = new CommandModel();
                $cmdModel->createCmd([
                    $cmd_id,
                    $product_id,
                    $cmd_qt,
                    $cmd_price,
                    $cmd_date,
                    $cmd_delivery_adress,
                    $cmd_delLat,
                    $cmd_delLng
                ]);
            } catch (\Throwable $th) {
                echo json_encode(["status" => "failure", "message" => "Quelque chose s'est mal passée....!"]);
            }
        }
        static function action()
        {
            $action = htmlspecialchars($_POST['action']);
            switch ($action) {
                case 'action-create-order':
                    CommandController::createCommand();
                    break;
                default:
                    break;
            }
        }
    }

    CommandController::action();
}
