<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Support\Facades\DB;

class LoginModel extends Model
{
    use HasFactory;
    public function validate($data){
        $existAcc = DB::select("SELECT id FROM taikhoan WHERE username = ? AND password = ?", [$data[0], $data[1]]);

        if($existAcc != null){
            return $existAcc[0]->id; //đúng
        }
        else{
            return false; // sai
        }
    }
    public function register($data){
        DB::table('taikhoan')->insert(
            [
                'username' => $data[1],
                'password' => $data[2],
                'hovaten' => $data[0]
            ]
        );
    }
    public function getUserInfo($data)
    {
        $UserInfo = DB::table('taikhoan')
            ->select('taikhoan.hovaten')
            ->where('taikhoan.id', '=', $data)
            ->get();
        return $UserInfo;
    }
}
