<?php

defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ApiProduct extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->call->database();
        $this->call->model('ProductsModel');
        $this->call->library('api');
    }

    public function api_status()
    {
        $this->api->require_method('GET');

        $this->api->respond([
            'message' => 'LavaLust API is running successfully.',
            'status' => 'online'
        ], 200);
    }

    public function index()
    {
        $this->api->require_method('GET');
        $this->api->require_jwt();

        $products = $this->ProductsModel->all();

        $this->api->respond([
            'message' => 'Products retrieved successfully.',
            'data' => $products
        ], 200);
    }

    public function create()
    {
        $this->api->require_method('POST');
        $this->api->require_jwt();

        $data = $this->api->body();

        $product_name = $data['product_name'] ?? null;
        $description  = $data['description'] ?? null;
        $price        = $data['price'] ?? null;
        $quantity     = $data['quantity'] ?? null;

        if (
            !$product_name ||
            $description === null ||
            $price === null ||
            $quantity === null
        ) {
            $this->api->respond_error(
                'Product name, description, price, and quantity are required.',
                400
            );
        }

        $product_data = [
            'product_name' => $product_name,
            'description'  => $description,
            'price'        => $price,
            'quantity'     => $quantity
        ];

        $this->ProductsModel->insert($product_data);

        $this->api->respond([
            'message' => 'Product created successfully.',
            'data' => $product_data
        ], 201);
    }

    public function update($id)
    {
        $this->api->require_method('PUT');

        $this->api->require_jwt();

        $product = $this->ProductsModel->find($id);

        if (!$product) {
            $this->api->respond_error(
                'Product not found.',
                404
            );
        }

        $data = $this->api->body();

        $product_name = $data['product_name'] ?? null;
        $description  = $data['description'] ?? null;
        $price        = $data['price'] ?? null;
        $quantity     = $data['quantity'] ?? null;

        if (
            !$product_name ||
            $description === null ||
            $price === null ||
            $quantity === null
        ) {
            $this->api->respond_error(
                'Product name, description, price, and quantity are required.',
                400
            );
        }

        $product_data = [
            'product_name' => $product_name,
            'description'  => $description,
            'price'        => $price,
            'quantity'     => $quantity
        ];

        $this->ProductsModel->update($id, $product_data);

        $this->api->respond([
            'message' => 'Product updated successfully.',
            'data' => [
                'id' => $id,
                'product_name' => $product_name,
                'description' => $description,
                'price' => $price,
                'quantity' => $quantity
            ]
        ], 200);
    }

    public function delete($id)
    {
        $this->api->require_method('DELETE');
        $this->api->require_jwt();

        $product = $this->ProductsModel->find($id);

        if (!$product) {
            $this->api->respond_error(
                'Product not found.',
                404
            );
        }

        $this->ProductsModel->delete($id);

        $this->api->respond([
            'message' => 'Product deleted successfully.'
        ], 200);
    }
}
?>