<?php

namespace Models;



use DTO\CreateRequestProductDTO;

class ProductModel extends DataBaseConnect
{
    public function getTableName(): string
    {
        return 'products';
    }

    public function getAll(): array
    {
        try {
            $pdo = $this->connectToDb();
            $sql = "SELECT * FROM `" . $this->getTableName() . "`";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            $stmt->setFetchMode(\PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
        }catch (\Throwable $e) {
            echo $e->getMessage();
        }
    }

    public function findByCode(string $code)
    {
        $pdo = $this->connectToDb();
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM `$tableName` WHERE $tableName.CODE = '$code'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    public function add(CreateRequestProductDTO $product)
    {
        $pdo = $this->connectToDb();
        $tableName = $this->getTableName();
        $sql = "INSERT INTO `$tableName` (`NAME`, `CODE`, `PRICE`, `COLOUR`) 
            VALUES ('$product->name', '$product->code', $product->price, '$product->colour')";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    }

    public function update(array $params)
    {
        $pdo = $this->connectToDb();
        $tableName = $this->getTableName();
        $sql = "INSERT INTO `$tableName` SET  WHERE `ID` = ".$params['ID'];
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    }
}