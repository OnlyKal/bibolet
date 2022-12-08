<?php
include './Config/queries.php';
include './Config/schema.php';


class CategoryModel extends Queries
{
    public function createCategory(array $args)
    {
        Queries::addData(
            Schema::CATEGORY['tb'],
            [
                Schema::CATEGORY['id'],
                Schema::CATEGORY['name']
            ],
            $args
        );
    }
}
