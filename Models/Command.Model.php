<?php
include './Config/queries.php';
include './Config/schema.php';


class CommandModel extends Queries
{
    public function createCmd(array $args)
    {
        Queries::addData(
            Schema::CMD['tb'],
            [
                Schema::CMD['id'],
                Schema::PRODUCT['id'],
                Schema::CMD['qt'],
                Schema::CMD['tprice'],
                Schema::CMD['date'],
                Schema::CMD['delPoint'],
                Schema::CMD['delLat'],
                Schema::CMD['delLng']
            ],
            $args
        );
    }

    public function isConfirmed(array $args)
    {
        Queries::updateData(
            Schema::CMD['tb'],
            [Schema::CMD['confirmed']],
            Schema::CMD['id'],
            $args
        );
    }
    public function isPaid(array $args)
    {
        Queries::updateData(
            Schema::CMD['tb'],
            [Schema::CMD['isPaid']],
            Schema::CMD['id'],
            $args
        );
    }
    public function isReceived(array $args)
    {
        Queries::updateData(
            Schema::CMD['tb'],
            [Schema::CMD['isReceived']],
            Schema::CMD['id'],
            $args
        );
    }

    public function  getCommadDate()
    {
        $query = Queries::myQuery('SELECT tproduct.*,tcommand.* FROM tcommand INNER JOIN tproduct ON tproduct.prodId=tcommand.prodId;');
        return $query;
    }
    public function  getCommadDateShop()
    {
        $query = Queries::myQuery('SELECT tproduct.*,tcommand.* FROM tcommand INNER JOIN tproduct ON tproduct.prodId=tcommand.prodId WHERE tcommand.shopId=?;', [1]);
        return $query;
    }
    public function  getIsConfirmedDate()
    {
        $query = Queries::myQuery('SELECT tproduct.*,tcommand.* FROM tcommand INNER JOIN tproduct ON tproduct.prodId=tcommand.prodId WHERE tcommand.iscmdConfirmed=?;', [1]);
        return $query;
    }
    public function  getIsNotConfirmedDate()
    {
        $query = Queries::myQuery('SELECT tproduct.*,tcommand.* FROM tcommand INNER JOIN tproduct ON tproduct.prodId=tcommand.prodId WHERE tcommand.iscmdConfirmed=?;', [0]);
        return $query;
    }
    public function  getIsPaidDate()
    {
        $query = Queries::myQuery('SELECT tproduct.*,tcommand.* FROM tcommand INNER JOIN tproduct ON tproduct.prodId=tcommand.prodId WHERE tcommand.isPaid=?;', [1]);
        return $query;
    }
    public function  getIsNotPaidDate()
    {
        $query = Queries::myQuery('SELECT tproduct.*,tcommand.* FROM tcommand INNER JOIN tproduct ON tproduct.prodId=tcommand.prodId WHERE tcommand.isPaid=?;', [0]);
        return $query;
    }
    public function  getIsReceived()
    {
        $query = Queries::myQuery('SELECT tproduct.*,tcommand.* FROM tcommand INNER JOIN tproduct ON tproduct.prodId=tcommand.prodId WHERE tcommand.isCustormerReceived=?;', [1]);
        return $query;
    }
    public function  getIsNotReceived()
    {
        $query = Queries::myQuery('SELECT tproduct.*,tcommand.* FROM tcommand INNER JOIN tproduct ON tproduct.prodId=tcommand.prodId WHERE tcommand.isCustormerReceived=?;', [0]);
        return $query;
    }
}
