
<?php


if (isset($_POST['action'])) {

    include('./Models/Category.Model.php');
    include('./Validator.php');

    class Category
    {

        static function addCategory()
        {


            $category_id = htmlspecialchars($_POST['category_id']);
            $category_name = htmlspecialchars($_POST['category_name']);

            try {
                $categoryModel = new CategoryModel();
                $categoryModel->createCategory([
                    $category_id,
                    $category_name
                ]);
                echo json_encode(["status" => "success", "message" => "Mis a jour reussi", "data" => null]);
            } catch (\Throwable $th) {
                echo json_encode(["status" => "failure", "message" => "Page routye introuveble", "data" => null]);
            }
        }

        static function action()
        {
            $action = htmlspecialchars($_POST['action']);

            switch ($action) {
                case 'action-add-category':
                    Category::addCategory();
                    break;
                default:
                    break;
            }
        }
    }

    Category::action();
}
?>