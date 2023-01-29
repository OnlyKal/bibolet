<?php


if (isset($_POST['action'])) {
    include('../Models/Category.Model.php');
    include('./Validator.php');

    class CategoryController
    {

        static function addCategory()
        {
            $category_id = htmlspecialchars($_POST['category_id']);
            $category_name = htmlspecialchars($_POST['category_name']);
            $categoryModel = new CategoryModel();
            $categoryModel->createCategory([
                $category_id,
                $category_name
            ]);
        }
        static function action()
        {
            $action = htmlspecialchars($_POST['action']);
            switch ($action) {
                case 'action-add-category':
                    CategoryController::addCategory();
                    break;
                default:
                    break;
            }
        }
    }
    CategoryController::action();
}
