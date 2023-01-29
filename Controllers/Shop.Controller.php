<?php


if (isset($_POST['action'])) {
    include('../Models/Shop.Model.php');
    include('./Validator.php');

    class ShopController
    {
        static function createShop()
        {
            $shop_id = htmlspecialchars($_POST['shop_id']);
            $shop_owner = htmlspecialchars($_POST['shop_owner']);
            $shop_phone = htmlspecialchars($_POST['shop_phone']);
            $shop_email = htmlspecialchars($_POST['shop_email']);
            $shop_password = hash("sha256", $_POST['shop_password']);
            $shopModel = new ShopModel();
            $shopModel->createShop([
                $shop_id,
                $shop_owner,
                $shop_phone,
                $shop_email,
                $shop_password
            ]);
        }

        static function getMyShopById()
        {
            $shopModel = new ShopModel();
            $shop_id = htmlspecialchars($_POST['shop_id']);
            $data = $shopModel->getMyShop($shop_id)->fetchAll();
            echo json_encode(["status" => "success", "data" => $data]);
        }
        static function getMyShopLogin()
        {
            $shopModel = new ShopModel();
            $shopElement = htmlspecialchars($_POST['shop_element']);
            $shopPassword = htmlspecialchars($_POST['shop_password']);
            $data = $shopModel->getMyShopLogin($shopElement, $shopPassword);
            echo json_encode(["status" => "success", "data" => $data]);
        }
        static function getAllUsersShops()
        {
            $shopModel = new ShopModel();
            $data = $shopModel->getAllShopAdmin();
            echo json_encode(["status" => "success", "data" => $data]);
        }
        static function updateShop()
        {
            $shopModel = new ShopModel();
            $shop_id = htmlspecialchars($_POST['shop_id']);
            $shop_owner = htmlspecialchars($_POST['shop_owner']);
            $shop_phone = htmlspecialchars($_POST['shop_phone']);
            $shop_email = htmlspecialchars($_POST['shop_email']);
            $shop_adress = htmlspecialchars($_POST['shop_adress']);
            $shop_slogan = htmlspecialchars($_POST['shop_slogan']);
            $shop_lat = htmlspecialchars($_POST['shop_lat']);
            $shop_lng = htmlspecialchars($_POST['shop_lng']);

            try {
                $shopModel->updateShop([
                    $shop_owner,
                    $shop_email,
                    $shop_phone,
                    $shop_adress,
                    $shop_slogan,
                    $shop_lat,
                    $shop_lng,
                    $shop_id
                ]);
                echo json_encode(["status" => "success", "message" => "Mis a jour reussi"]);
            } catch (\Throwable $th) {
                echo json_encode(["status" => "failure", "message" => "Quelque chose s'est mal passée....!"]);
            }
        }
        static function updateShopPassword()
        {
            $shopModel = new ShopModel();
            $shop_id = htmlspecialchars($_POST['shop_id']);
            $shop_password = htmlspecialchars($_POST['shop_password']);


            try {
                $shopModel->updatePassword([
                    $shop_password,
                    $shop_id
                ]);
                echo json_encode(["status" => "success", "message" => "Mis a jour reussi"]);
            } catch (\Throwable $th) {
                echo json_encode(["status" => "failure", "message" => "Quelque chose s'est mal passée....!"]);
            }
        }
        static function updateISseller()
        {
            $shopModel = new ShopModel();
            $shop_id = htmlspecialchars($_POST['shop_id']);
            $isSeller = htmlspecialchars($_POST['isSeller']);

            try {
                $shopModel->setIsSeller([
                    $isSeller,
                    $shop_id
                ]);
                echo json_encode(["status" => "success", "message" => "Mis a jour reussi"]);
            } catch (\Throwable $th) {
                echo json_encode(["status" => "failure", "message" => "Quelque chose s'est mal passée....!"]);
            }
        }
        static function updateCover()
        {
            $shopModel = new ShopModel();
            $shop_id = htmlspecialchars($_POST['shop_id']);
            $shop_cover = htmlspecialchars($_POST['shop_cover']);

            try {
                $shopModel->setCover([
                    $shop_cover,
                    $shop_id
                ]);
                echo json_encode(["status" => "success", "message" => "Mis a jour reussi"]);
            } catch (\Throwable $th) {
                echo json_encode(["status" => "failure", "message" => "Quelque chose s'est mal passée....!"]);
            }
        }

        static function action()
        {
            $action_shop = htmlspecialchars($_POST['action']);
            switch ($action_shop) {
                case 'action-add-shop':
                    ShopController::createShop();
                    break;
                case 'get-shop-by-id':
                    ShopController::getMyShopById();
                    break;
                case 'get-shop-login':
                    ShopController::getMyShopLogin();
                    break;
                case 'get-shops-admin':
                    ShopController::getAllUsersShops();
                    break;
                case 'update-shop-info':
                    ShopController::updateShop();
                    break;
                case 'update-password':
                    ShopController::updateShopPassword();
                    break;
                case 'update-isSeller':
                    ShopController::updateISseller();
                    break;
                case 'update-cover':
                    ShopController::updateCover();
                    break;
                default:
                    break;
            }
        }
    }
}
