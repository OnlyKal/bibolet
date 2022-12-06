<?php
include './Config/queries.php';
include './Config/schema.php';


class ShopModel extends Queries
{
    public function createShop(array $args)
    {
        Queries::addData(
            Schema::SHOP['tb'],
            [
                Schema::SHOP['id'],
                Schema::SHOP['owner'],
                Schema::SHOP['phone'],
                Schema::SHOP['email'],
                Schema::SHOP['password'],
            ],
            $args
        );
    }

    public function  getAllShop()
    {
        $query = Queries::myQuery('SELECT * FROM tshop WHERE tshop.isSuspended=?;', [1]);
        return $query;
    }
    public function  getAllShopAdmin()
    {
        $query = Queries::myQuery('SELECT * FROM tshop;');
        return $query;
    }
    public function updateShopInfos(array $args)
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
