<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use \Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    private $product;
    public function __construct(){
        $this->product = new ProductModel();
    }
    public function index(Request $req){
        $AllProduct = $this->product->getAllProduct(5);
        return view('BackEnds.productList',compact('AllProduct'));
    }
    public function addProduct(Request $req){
        $insertData = [
            $req->input('tensanpham'),
            $req->input('soluong'),
            $req->input('tenloaisanpham')
        ];
        $this->product->insertProduct($insertData);
        //dd($insertData);
        return redirect('/product');
    }
    public function viewFormEditProduct($id, Request $req){
        $productInfo = $this->product->getSingleProduct($id)->first();

        $req->session()->put('productViewEdit',[
            'id' => $id,
            'tensanpham' => $productInfo->tensanpham,
            'tenloaisanpham' => $productInfo->tenloaisanpham,
            'soluong' => $productInfo->soluong
        ]);
        //dd($productInfo);
        return view('ShareContent.editProduct');
    }
    public function editProduct(Request $req){
        $insertData = [
            $req->input('idsanpham'),
            $req->input('tensanpham'),
            $req->input('soluong'),
            $req->input('tenloaisanpham')
        ];
        //dd($insertData);
        $ProductModel = new ProductModel();
        $ProductModel->editProduct($insertData);
        return redirect('/product');
    }
    public function viewDeleteProduct($id, Request $req){
        $productInfo = $this->product->getSingleProduct($id)->first();

        $req->session()->put('productViewDelete',[
            'id' => $id,
            'tensanpham' => $productInfo->tensanpham,
            'tenloaisanpham' => $productInfo->tenloaisanpham,
            'soluong' => $productInfo->soluong
        ]);
        //dd($req->session()->get());
        return view('ShareContent.deleteProduct');
    }
    public function deleteProduct(Request $req){
        $id = $req->input('idsanphamxoa');
        $this->product->deleteProduct($id);
        return redirect('/product');
    }
}
