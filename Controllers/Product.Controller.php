<?php


if (isset($_POST['action'])) {
    include('../Models/Product.Model.php');
    include('./Validator.php');

    class ProductController
    {
        static function addProduct()
        {
            $shop_id = htmlspecialchars($_POST['shop_id']);
            $product_id = htmlspecialchars($_POST['product_id']);
            $product_name = htmlspecialchars($_POST['product_name']);
            $product_mark = htmlspecialchars($_POST['product_mark']);
            $product_price = htmlspecialchars($_POST['product_price']);
            $product_priceoff = htmlspecialchars($_POST['product_priceoff']);
            $product_img = htmlspecialchars($_POST['product_img']);
            $product_comment = htmlspecialchars($_POST['product_comment']);
           
            $shopModel = new ShopModel();
            $shopModel->createShop([
                $shop_id,
                $product_id,
                $product_name,
                $product_mark,
                $product_price,
                $product_priceoff,
                $product_img,
                $product_comment
            ]);
        }

        static function getValidProducts()
        {
            $productModel = new ProductModel();
            $data = $productModel->getAllProducts()->fetchAll();
            echo json_encode(["status" => "success", "data" => $data]);
        }
        static function getAllProducts()
        {
            $productModel = new ProductModel();
            $data = $productModel->getAllProductsAdmin()->fetchAll();
            echo json_encode(["status" => "success", "data" => $data]);
        }
       
        static function updatePrice()
        {
            $productModel = new ProductModel();
            $product_id = htmlspecialchars($_POST['product_id']);
            $product_price = htmlspecialchars($_POST['product_price']);

            try {
                $productModel->updatePrice([
                    $product_price,
                    $product_id
                ]);
                echo json_encode(["status" => "success", "message" => "Mis a jour reussi"]);
            } catch (\Throwable $th) {
                echo json_encode(["status" => "failure", "message" => "Quelque chose s'est mal passée....!"]);
            }
        }
        static function updateIsvalid()
        {
            $productModel = new ProductModel();
            $product_id = htmlspecialchars($_POST['product_id']);
            $isValid = htmlspecialchars($_POST['isValid']);

            try {
                $productModel->setIsvalid([
                    $isValid,
                    $product_id
                ]);
                echo json_encode(["status" => "success", "message" => "Mis a jour reussi"]);
            } catch (\Throwable $th) {
                echo json_encode(["status" => "failure", "message" => "Quelque chose s'est mal passée....!"]);
            }
        }
        static function updateIsOffer()
        {
            $productModel = new ProductModel();
            $product_id = htmlspecialchars($_POST['product_id']);
            $isOffer = htmlspecialchars($_POST['isOffer']);

            try {
                $productModel->setIsOffer([
                    $isOffer,
                    $product_id
                ]);
                echo json_encode(["status" => "success", "message" => "Mis a jour reussi"]);
            } catch (\Throwable $th) {
                echo json_encode(["status" => "failure", "message" => "Quelque chose s'est mal passée....!"]);
            }
        }
        static function updateOfferPrice()
        {
            $productModel = new ProductModel();
            $product_id = htmlspecialchars($_POST['product_id']);
            $offer_price = htmlspecialchars($_POST['offer_price']);

            try {
                $productModel->updatePriceOffer([
                    $offer_price,
                    $product_id
                ]);
                echo json_encode(["status" => "success", "message" => "Mis a jour reussi"]);
            } catch (\Throwable $th) {
                echo json_encode(["status" => "failure", "message" => "Quelque chose s'est mal passée....!"]);
            }
        }
        
    
        static function action()
        {
            $action= htmlspecialchars($_POST['action']);
            switch ($action) {
                case 'action-add-product':
                    ProductController::addProduct();
                    break;
                case 'action-get-products':
                    ProductController::getValidProducts();
                    break;
                case 'action-get-all-products':
                    ProductController::getAllProducts();
                    break;
                case 'action-update-Price':
                    ProductController::updatePrice();
                    break;
                case 'action-update-offerPrice':
                    ProductController::updateOfferPrice();
                    break;
                case 'action-setIsOffer':
                    ProductController::updateIsOffer();
                    break;
                case 'action-setIsValid':
                    ProductController::updateIsvalid();
                    break;
                default:
                    break;
            }
        }
    }
}
