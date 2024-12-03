<?php

namespace Service;

use DTO\CreateRequestProductDTO;
use Models\ProductModel;
class ProductService
{

    private ProductModel $model;

    public function __construct()
    {
        $this->model = new ProductModel();
    }
    public function getProducts()
    {
        return $this->model->getAll();
    }

    public function findByCode(string $code)
    {
        $result = [];
        $product = $this->model->findByCode($code);
        foreach ($product as $item) {
            $result[] = [
                'id' => $item['ID'],
                'product_code' => $item['CODE'],
                'product_name' => $item['NAME'],
                'price' => (int)$item['PRICE'],
                'colour' => $item['COLOUR']
            ];
        }
        return $result;
    }

    public function createProduct(CreateRequestProductDTO $product)
    {
        $arProduct = $this->model->findByCode($product->code);
        if (!empty($arProduct)) {
            throw new \Exception('Продукт с таким кодом уже существует');
        }
        $this->model->add($product);
        return 'ok';
    }

    public function updatePrice()
    {

    }
}