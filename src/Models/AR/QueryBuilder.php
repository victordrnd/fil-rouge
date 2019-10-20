<?php

namespace Models\AR;

use Models\City;
use Models\Singleton;
use Models\AR\QBTrait;

abstract class QueryBuilder
{
    use QBTrait;

    /**
     * Find object with selected id
     *
     * @param int $id
     * @return void
     */
    public static function find($id)
    {
        $SQL = "SELECT * FROM " . static::$table . " WHERE " . static::$primaryKey . " = :id";
        $statement = Singleton::getInstance()->cnx->prepare($SQL);
        $statement->bindParam('id', $id);
        $statement->execute();
        $object = $statement->fetchObject(get_called_class());
        return $object;
    }


    /**
     *
     * @param int $id
     * @return void
     */
    public function remove(): void
    {
        $SQL = "DELETE FROM " . static::$table . " WHERE " . static::$primaryKey . " =:id";
        $statement = $this->cnx->prepare($SQL);
        $statement->bindParam("id", $this->getPrimaryKeyValue());
        if ($statement->execute()) {
            $this->setPrimaryKeyValue(0);
        }
    }


    /**
     * Save the calling entity
     *
     * @return void
     */
    public function save(): void
    {
        if ($this->getPrimaryKeyValue() != 0) {
            $values = [];
            $columns = $this->attributes;
            foreach ($columns as $column) {
                if ($column != $this->primaryKey) {
                    $values[$column] = $this->{$this->$column};
                }
            }
            $this->update($values);
        }
        $values = [];
        $SQL = "INSERT INTO " . static::$table . " VALUES (";
        foreach ($this->attributes as $index => $attribut) {
            if ($index + 1 == count($this->attributes)) {
                $SQL .= "?)";
            } else {
                $SQL .= "?,";
            }
            $values[] = $this->{$attribut};
        }
        $statement = $this->cnx->prepare($SQL);
        $code = $statement->execute($values);
        if ($code) {
            $this->setPrimaryKeyValue($this->cnx->lastInsertId());
        }
    }



    /**
     * Update the calling entity
     * 
     * @param array $columns
     * @return void
     */
    public function update(array $columns): void
    {
        if ($this->getPrimaryKeyValue() == 0) {
            $this->save();
        }
        $primaryKey = static::$primaryKey;
        $SQL = "UPDATE " . static::$table . " SET ";
        $last_key = end(array_keys($columns));
        foreach ($columns as $key => $value) {
            if ($key != $last_key) {
                $SQL .= "$key = ?, ";
            } else {
                $SQL .= "$key = ? ";
             }
            $this->{$key} = $value;
        }
        $SQL .= "WHERE " . static::$primaryKey . " = ?";
        $values = array_values($columns);
        foreach ($values as &$value) {
            $value = htmlspecialchars($value);
        }
        $id = $this->getPrimaryKeyValue();
        $values[] = $id;
        $statement = $this->cnx->prepare($SQL);
        $statement->execute($values);
    }


    /**
     *
     * @return array
     */
    public static function all(): array
    {
        $SQL = "SELECT * FROM " . static::$table;
        $statement = Singleton::getInstance()->cnx->prepare($SQL);
        $statement->execute();
        $statement->setFetchMode(\PDO::FETCH_CLASS, get_called_class());
        $array = $statement->fetchAll();
        return $array;
    }



    /**
     *
     * @return integer
     */
    public static function count(): int
    {
        $SQL = "SELECT COUNT(*) as count FROM " . static::$table;
        $statement = Singleton::getInstance()->cnx->prepare($SQL);
        $statement->execute();
        $res = $statement->fetchObject();
        return $res->count;
    }
}
