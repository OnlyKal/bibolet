<?php
include './Config/queries.php';
include './Config/schema.php';


class ShopModel extends Queries
{
    public function createNewShop(array $args)
    {
        Queries::addData(
            Schema::SHOP['tb'],
            [
                Schema::SHOP['id'],
                Schema::SHOP['owner'],
                Schema::SHOP['phone'],
                Schema::SHOP['email'],
                Schema::SHOP['brand']

            ],
            $args
        );
    }

    public function  getMyShop($shopId)
    {
        $query = Queries::myQuery('SELECT * FROM tshop WHERE tshop.shopId=?;', [$shopId]);
        return $query;
    }
    public function  getMyShopLogin($element, $password)
    {
        $query = Queries::myQuery('SELECT * FROM tshop WHERE tshop.shopEmail=? or tshop.shopPhone=? and tshop.shopPassword=?;', [$element, $element, $password]);
        return $query;
    }

    public function  getAllShopAdmin()
    {
        $query = Queries::myQuery('SELECT * FROM tshop;');
        return $query;
    }
    public function updateShop(array $args)
    {
        Queries::updateData(
            Schema::SHOP['tb'],
            [
                Schema::SHOP['owner'],
                Schema::SHOP['email'],
                Schema::SHOP['phone'],
                Schema::SHOP['address'],
                Schema::SHOP['slogan'],
                Schema::SHOP['latitude'],
                Schema::SHOP['longitude'],
            ],
            Schema::SHOP['id'],
            $args
        );
    }
    public function updatePassword(array $args)
    {
        Queries::updateData(
            Schema::SHOP['tb'],
            [Schema::SHOP['password']],
            Schema::SHOP['id'],
            $args
        );
    }
    public function suspendShop(array $args)
    {
        Queries::updateData(
            Schema::SHOP['tb'],
            [Schema::SHOP['isSuspended']],
            Schema::SHOP['id'],
            $args
        );
    }
    public function setIsSeller(array $args)
    {
        Queries::updateData(
            Schema::SHOP['tb'],
            [Schema::SHOP['isSeller']],
            Schema::SHOP['id'],
            $args
        );
    }
    public function updateBrand(array $args)
    {
        Queries::updateData(
            Schema::SHOP['tb'],
            [Schema::SHOP['brand']],
            Schema::SHOP['id'],
            $args
        );
    }
    public function setCover(array $args)
    {
        Queries::updateData(
            Schema::SHOP['tb'],
            [Schema::SHOP['cover']],
            Schema::SHOP['id'],
            $args
        );
    }
}
