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
   
}
