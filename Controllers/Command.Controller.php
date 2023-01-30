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
                echo json_encode(["status" => "success", "message" => "Your order is successfully created", "data" => null]);
            } catch (\Throwable $th) {
                echo json_encode(["status" => "failure", "message" => "Error while creating order", "data" => null]);
            }
        }

        static function setConfirmed()
        {
            $commandModel = new CommandModel();
            $cmd_id = htmlspecialchars($_POST['cmd_id']);
            $isConfirmed = htmlspecialchars($_POST['isConfirmed']);

            try {
                $commandModel->isConfirmed([
                    $isConfirmed,
                    $cmd_id
                ]);
                echo json_encode(["status" => "success", "message" => $isConfirmed == 1 ? "Your order is confirmed" : "Your order is unconfirmed", "data" => null]);
            } catch (\Throwable $th) {
                echo json_encode(["status" => "failure", "message" => "Error while confiming order", "data" => null]);
            }
        }
        static function setPaidOrder()
        {
            $commandModel = new CommandModel();
            $cmd_id = htmlspecialchars($_POST['cmd_id']);
            $isPaid = htmlspecialchars($_POST['isPaid']);

            try {
                $commandModel->isConfirmed([
                    $isPaid,
                    $cmd_id
                ]);
                echo json_encode(["status" => "success", "message" => $isPaid == 1 ? "Payment confirmed" : "Payment unconfirmed", "data" => null]);
            } catch (\Throwable $th) {
                echo json_encode(["status" => "failure", "message" => "Error while making payement", "data" => null]);
            }
        }
        static function setReceived()
        {
            $commandModel = new CommandModel();
            $cmd_id = htmlspecialchars($_POST['cmd_id']);
            $isReceived = htmlspecialchars($_POST['isReceived']);

            try {
                $commandModel->isConfirmed([
                    $isReceived,
                    $cmd_id
                ]);
                echo json_encode(["status" => "success", "message" => $isReceived == 1 ? "Order delivring confirmed" : "Order delivring is unconfirmed", "data" => null]);
            } catch (\Throwable $th) {
                echo json_encode(["status" => "failure", "message" => "Error while confirming delivery", "data" => null]);
            }
        }

        static function getAllOrders()
        {
            try {
                $cmdModel = new CommandModel();
                $data = $cmdModel->getCommadDate()->fetchAll();
                echo json_encode(["status" => "success", "message" => null, "data" => $data]);
            } catch (\Throwable $th) {
                echo json_encode(["status" => "failure", "message" => "Error while fetching all orders", "data" => null]);
            }
        }
        static function action()
        {
            $action = htmlspecialchars($_POST['action']);
            switch ($action) {
                case 'action-create-order':
                    CommandController::createCommand();
                    break;
                case 'action-isConfirmedOrder':
                    CommandController::setConfirmed();
                    break;
                case 'action-isPaid':
                    CommandController::setPaidOrder();
                    break;
                case 'action-isReceived':
                    CommandController::setReceived();
                    break;
                case 'action-get-orders':
                    CommandController::getAllOrders();
                    break;
                default:
                    break;
            }
        }
    }

    CommandController::action();
}
