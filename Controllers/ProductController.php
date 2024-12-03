<?php

namespace Controllers;

use Service\ProductService;
use Views\JsonResponse;
use DTO\CreateRequestProductDTO;
class ProductController extends AbstractController
{
    /**
     * @var ProductService
     */
    private ProductService $productService;

    /**
     *
     *
     */
    public function __construct()
    {
        $this->productService = new ProductService();
    }

    public function getProductList()
    {
        $result = $this->productService->getProducts();
        $response = new JsonResponse();
        return $response->setResponse($result);
    }

    public function getProductByCode()
    {
        $response = new JsonResponse();
        $code = $_POST['code'];
        if (!$this->checkMethod("POST") || empty($code)){
            return $response->setResponse(['result' => 'Error']);
        }


        $result = $this->productService->findByCode($code);
        return $response->setResponse($result);
    }

    public function createProduct() : false|string
    {
        $response = new JsonResponse();
        try {
            $request = $this->getRequestProduct();
            $result = $this->productService->createProduct($request);
            return $response->setResponse(['result' => $result]);
        } catch (\Throwable $exception) {
            return $response->setResponse([
                'result' => 'not ok',
                'error' => $exception->getMessage()
            ], 422);
        }

    }

    public function updatePrice()
    {
        $json = json_decode(file_get_contents('php://input'), true);

        var_dump($json);
    }

    private function getRequestProduct() : CreateRequestProductDTO
    {
            return new CreateRequestProductDTO(
                code: $_POST['code'],
                name: $_POST['name'],
                price: $_POST['price'],
                colour: $_POST['colour']
            );
    }
}