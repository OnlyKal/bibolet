<?php
include './Config/queries.php';
include './Config/schema.php';


class ProductModel extends Queries
{
    public function createProduct(array $args)
    {
        Queries::addData(
            Schema::PRODUCT['tb'],
            [
                Schema::PRODUCT['id'],
                Schema::SHOP['id'],
                Schema::PRODUCT['name'],
                Schema::PRODUCT['mark'],
                Schema::PRODUCT['price'],
                Schema::PRODUCT['priceoff'],
                Schema::PRODUCT['prodImg'],
                Schema::PRODUCT['comment'],
            ],
            $args
        );
    }

    public function setIsvalid(array $args)
    {
        Queries::updateData(
            Schema::PRODUCT['tb'],
            [Schema::PRODUCT['isvalid']],
            Schema::PRODUCT['id'],
            $args
        );
    }
    public function setIsOffer(array $args)
    {
        Queries::updateData(
            Schema::PRODUCT['tb'],
            [Schema::PRODUCT['isOffer']],
            Schema::PRODUCT['id'],
            $args
        );
    }
    public function updatePrice(array $args)
    {
        Queries::updateData(
            Schema::PRODUCT['tb'],
            [Schema::PRODUCT['price']],
            Schema::PRODUCT['id'],
            $args
        );
    }
    public function updatePriceOffer(array $args)
    {
        Queries::updateData(
            Schema::PRODUCT['tb'],
            [Schema::PRODUCT['priceoff']],
            Schema::PRODUCT['id'],
            $args
        );
    }
    public function updateName(array $args)
    {
        Queries::updateData(
            Schema::PRODUCT['tb'],
            [Schema::PRODUCT['name']],
            Schema::PRODUCT['id'],
            $args
        );
    }
    public function  getAllProducts()
    {
        $query = Queries::myQuery('SELECT * FROM tProduct WHERE tProduct.isValid=?;', [1]);
        return $query;
    }
    

    public function  getAllProductsAdmin()
    {
        $query = Queries::myQuery('SELECT tshop.*,tproduct.* from tshop INNER JOIN tproduct ON tshop.shopId=tshop.prodId GROUP BY tshop.shopId;');
        return $query;
    }

}
