<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductModel extends Model
{
    use HasFactory;
    public function getAllProduct($data)
    {
        $product = DB::table('sanpham')
            ->join('loaisanpham', 'sanpham.idloaisanpham', '=', 'loaisanpham.id')
            ->select('sanpham.tensanpham', 'loaisanpham.tenloaisanpham', 'sanpham.soluong','sanpham.id')
            ->paginate($data);
        return $product;
    }
    public function insertProduct($data)
    {
        $existIdProductType = DB::table('loaisanpham')->where('loaisanpham.tenloaisanpham', '=', $data[2])->get();
        if ($existIdProductType ->isEmpty()) {
            $idNewProductType = DB::table('loaisanpham')->insertGetId([
                'tenloaisanpham' => $data[2]
            ]);
            DB::table('sanpham')
                ->insert(
                    [
                        'tensanpham' => $data[0],
                        'soluong' => $data[1],
                        'idloaisanpham' => $idNewProductType,
                    ]
                );
        }
        else{
            $firstItem = $existIdProductType->first();
            DB::table('sanpham')
                ->insert(
                    [
                        'tensanpham' => $data[0],
                        'soluong' => $data[1],
                        'idloaisanpham' => $firstItem->id
                    ]
                );
        }
    }
    public function getSingleProduct($data){
        $product = DB::table('sanpham')
            ->join('loaisanpham', 'sanpham.idloaisanpham', '=', 'loaisanpham.id')
            ->select('sanpham.tensanpham', 'loaisanpham.tenloaisanpham', 'sanpham.soluong')
            ->where('sanpham.id','=',$data)
            ->get();
        return $product;
    }
    public function editProduct($data){
        $existIdProductType = DB::table('loaisanpham')->where('loaisanpham.tenloaisanpham', '=', $data[3])->get();
        if($existIdProductType ->isEmpty()){
            $idNewProductType = DB::table('loaisanpham')->insertGetId([
                'tenloaisanpham' => $data[3]
            ]);
            DB::table('sanpham')
            ->where('sanpham.id','=',$data[0])
                ->update(
                    [
                        'tensanpham' => $data[1],
                        'soluong' => $data[2],
                        'idloaisanpham' => $idNewProductType,
                    ]
                );
        }
        else {
            $firstItem = $existIdProductType->first();
            DB::table('sanpham')
            ->where('sanpham.id','=',$data[0])
                ->update(
                    [
                        'tensanpham' => $data[1],
                        'soluong' => $data[2],
                        'idloaisanpham' => $firstItem->id,
                    ]
                );
        }
    }
    public function deleteProduct($data){
        DB::table('sanpham')
        ->where('sanpham.id','=',$data)
        ->delete();
    }
    // public function checkAddProductQuantity($id,$quanity){
    //     $productMaxQuantity = DB::table('sanpham')
    //     ->where('sanpham.id','=',$id)->get();
    //     if($productMaxQuantity->soluong <= $quanity){
    //         return true;
    //     }
    //     else{
    //         return false;
    //     }
    // }
}
