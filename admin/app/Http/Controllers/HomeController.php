<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoginModel;
use App\Models\ProductModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;


class HomeController extends Controller
{
    private $LoginModel;
    private $product;
    public function __construct()
    {
        $this->LoginModel = new LoginModel();
        $this->product = new ProductModel();
    }
    public function home()
    {
        return view('Backends.home');
    }
    public function viewLogin()
    {
        return view('FrontEnds.loginMaster');
    }
    public function login(Request $req)
    {
        $dataInsert = [
            $req->input('email'),
            $req->input('password')
        ];
        $LoginCheck = $this->LoginModel->validate($dataInsert);

        if ($LoginCheck != false) {
            $UserInfo = $this->LoginModel->getUserInfo($LoginCheck)->first();
            //dd($UserInfo);
            $req->session()->put('UserInfo', [
                'hovaten' => $UserInfo->hovaten
            ]);

            return redirect('/product');
        } else if ($LoginCheck == false) {
            Session::flash('message', 'Đăng nhập không thành công');
            return redirect()->back();
        }
    }
    public function viewRegister()
    {
        return view('FrontEnds.registerMaster');
    }
    public function register(Request $req)
    {
        $dataInsert = [
            $req->input('hovaten'),
            $req->input('email'),
            $req->input('password'),
        ];
        if ($req->input('retypepassword') == $dataInsert[2]) {
            $this->LoginModel->register($dataInsert);
            Session::flash('message', 'Đăng kí thành công');
            return redirect('/');
        } else {
            Session::flash('messageregister', 'Nhập lại mật khẩu');
            return redirect()->back();
        }
    }
    public function search(Request $request)
    {
        if ($request->ajax()) {
            $AllProduct = DB::table('sanpham')
                ->join('loaisanpham', 'sanpham.idloaisanpham', '=', 'loaisanpham.id')
                ->select('loaisanpham.tenloaisanpham', 'sanpham.id', 'sanpham.tensanpham', 'sanpham.soluong')
                ->where('tensanpham', 'like', '%' . $request->search . '%')
                ->orwhere('loaisanpham.tenloaisanpham', 'like', '%' . $request->search . '%')->get();
            $output = '';
            if ($request->search == null) {
                $AllProduct = $this->product->getAllProduct($request->quantity);
                //dd($AllProduct);
                return view('ShareContent.searchProduct', compact('AllProduct'));
            }
            if ($AllProduct->isNotEmpty()) {
                //dd($data);
                return view('ShareContent.searchProduct', compact('AllProduct'));
            }
            else { // nếu không có dữ liệu
                $output .= '<div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i
                                        class="material-icons">&#xE147;</i> <span>Thêm mới sản phẩm</span></a>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>
                                    STT
                                </th>
                                <th>Tên sản phẩm </th>
                                <th>Loại sản phẩm</th>
                                <th>Số lượng</th>
                                <th></th>
                                <th>Chỉnh sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                 Không có sản phẩm nào tên la:  "' . $request->search . '"
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>';
                return $output;
            }
        }
    }
    public function logout(Request $req)
    {
        $req->session()->flush();
        return redirect('/');
    }

}
