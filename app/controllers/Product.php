<?php

defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Product extends Controller
{
    public function index()
    {
        $this->call->database();
        $this->call->model('ProductsModel');

        $products = $this->ProductsModel->all();

        $this->call->view('products/index', [
            'products' => $products
        ]);
    }

    public function create()
    {
        $this->call->database();
        $this->call->model('ProductsModel');

        if ($this->io->method() === 'post') {

            $data = [
                'product_name' => $this->io->post('product_name'),
                'description'  => $this->io->post('description'),
                'price'        => $this->io->post('price'),
                'quantity'     => $this->io->post('quantity')
            ];

            $this->ProductsModel->insert($data);

            header('Location: http://localhost/LavaLust/products');
            exit;
        }

        $this->call->view('products/create');
    }

    public function edit($id)
    {
        $this->call->database();
        $this->call->model('ProductsModel');

        $product = $this->ProductsModel->find($id);

        if (!$product) {
            header('Location: http://localhost/LavaLust/products');
            exit;
        }

        if ($this->io->method() === 'post') {

            $data = [
                'product_name' => $this->io->post('product_name'),
                'description'  => $this->io->post('description'),
                'price'        => $this->io->post('price'),
                'quantity'     => $this->io->post('quantity')
            ];

            $this->ProductsModel->update($id, $data);

            header('Location: http://localhost/LavaLust/products');
            exit;
        }

        $this->call->view('products/edit', [
            'product' => $product
        ]);
    }

    public function delete($id)
    {
        $this->call->database();
        $this->call->model('ProductsModel');

        $this->ProductsModel->delete($id);

        header('Location: http://localhost/LavaLust/products');
        exit;
    }
}

?>