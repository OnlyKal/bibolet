<?php

include '../Config/config.php';

class Queries
{
    protected function addData(string $table, array $fields, array $args)
    {
        $fields_array = [];
        $values = [];
        foreach ($fields as $value) {
            $fields_array[] = $value;
            $values[] = "?";
        }
        $fields_list = implode(', ', $fields_array);
        $value_list = implode(',', $values);
        return $this->myQuery("INSERT INTO {$table} ({$fields_list}) VALUES ({$value_list})", $args);
    }



    protected function updateData(string $table, array $fields, string $whereCloseField, array $args)
    {
        $fields_array = [];
        foreach ($fields as $value) {
            $fields_array[] = "$value=?";
        }
        $fields_list = implode(',', $fields_array);
        $whereField_list = "$whereCloseField";


        return $this->myQuery("UPDATE {$table} SET {$fields_list} WHERE {$whereField_list}=?", $args);
    }


    protected function getData(string $table,  string $whereField, array $args)
    {

        return  $this->myQuery("SELECT * FROM {$table} WHERE {$whereField}=?", $args);
    }

    protected function getDataLimit(string $table, string $whereField, string $order, array $args)
    {

        return  $this->myQuery("SELECT * FROM {$table} where {$whereField}=? ORDER BY {$order} DESC limit 1", $args);
    }

    protected function myQuery(string $query, array $attributes = null)
    {

        $database = Database::getInstance();

        if ($attributes != null) {
            $sql_statement = $database->prepare($query);
            $sql_statement->execute($attributes);
            return $sql_statement;
        } else {
            $sql_statement = $database->prepare($query);
            $sql_statement->execute();
            return $sql_statement;
        }
    }

    protected function findAll(string $table, array $criteria)
    {


        $fields = [];
        $values = [];

        foreach ($criteria as $field => $value) {

            $fields[] = "$field = ?";
            $values[] = $value;
        }

        $fields_list = implode('AND ', $fields);

        return $this->myQuery("SELECT * FROM " . $table . " WHERE " . $fields_list, $values);
    }

    protected function findDiff(string $table, array $criteria)
    {

        $fields = [];
        $values = [];

        foreach ($criteria as $field => $value) {

            $fields[] = "$field != ?";
            $values[] = $value;
        }

        $fields_list = implode('AND ', $fields);

        return $this->myQuery("SELECT * FROM " . $table . " WHERE " . $fields_list, $values);
    }
    protected function findSpecificFields(string $table, array $criteria)
    {

        $values = [];

        foreach ($criteria as $field => $value) {

            $fields[] = $field;
            $values[] = $value;
        }

        $fields_list = implode(',', $fields);

        return $this->myQuery("SELECT " . $fields_list . " FROM " . $table . " WHERE " . $values);
    }
}
