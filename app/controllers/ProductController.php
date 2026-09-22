<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/** 
 * Controller: ProductController
 * 
 * Automatically generated via CLI.
 */
class ProductController extends Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->call->model('ProductModel');
    }

    public function before_action()
    {
        $this->call->library('session');

        if (!$this->session->userdata('user_id')) {
            redirect('/login');
        }
    }

    public function producttable()
    {
        $products = $this->ProductModel->all();
        $this->call->view('Product views', [
            'products' => $products,
            'is_admin' => $this->is_admin(),
            'username' => $this->session->userdata('username'),
            'role' => $this->session->userdata('role') ?? 'user',
        ]);
    }

    public function create()
    {
        $this->require_admin();
        $this->call->view('Product views', ['form' => true, 'product' => []]);
    }

    public function store()
    {
        $this->require_admin();
        $data = $this->product_data();
        if ($data['product_name'] === '' || $data['price'] === '') {
            redirect('/products/create');
        }

        $this->ProductModel->insert($data);
        redirect('/products');
    }

    public function edit($id)
    {
        $this->require_admin();
        $product = $this->ProductModel->find((int) $id);
        if (!$product) {
            show_403();
        }

        $this->call->view('Product views', ['form' => true, 'product' => $product]);
    }

    public function update($id)
    {
        $this->require_admin();
        $data = $this->product_data();
        if ($data['product_name'] === '' || $data['price'] === '') {
            redirect('/products/edit/' . (int) $id);
        }

        $this->ProductModel->update((int) $id, $data);
        redirect('/products');
    }

    public function delete($id)
    {
        $this->require_admin();
        $this->ProductModel->delete((int) $id);
        redirect('/products');
    }

    private function is_admin()
    {
        return strtolower((string) $this->session->userdata('role')) === 'admin';
    }

    private function require_admin()
    {
        if (!$this->is_admin()) {
            show_error('403 Forbidden', 'You do not have permission to manage products.', 'error_general', 403);
        }
    }

    private function product_data()
    {
        $price = trim((string) $this->request->post('price', ''));

        return [
            'product_name' => trim((string) $this->request->post('product_name', '')),
            'description' => trim((string) $this->request->post('description', '')),
            'price' => $price === '' ? 0 : (float) $price,
            'quantity' => max(0, (int) $this->request->post('quantity', 0)),
        ];
    }
}
