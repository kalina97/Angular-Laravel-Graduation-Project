<?php
/**
 * Created by PhpStorm.
 * User: Kale
 * Date: 14.12.2019
 * Time: 17:33
 */

namespace App\Models\AdminModels;
use Illuminate\Support\Facades\DB;

class AdminUser
{

    public function getAllUsers()
    {
        return DB::table('users as u')
            ->join('roles as r', 'u.role_id', '=', 'r.id')
            ->select('u.*', 'r.role_name as role_name')
            ->get();
    }

    public function insertUser($first_name,$last_name,$email,$password,$address,$role_id)
    {
        return DB::table('users')
            ->insertGetId([
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'password' => bcrypt($password),
                'address' => $address,
                'role_id' => $role_id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')

            ]);
    }

    public function deleteUser($id)
    {
        return DB::table('users')
            ->where('id', $id)
            ->delete();
    }

    public function getOneUser($id)
    {
        return DB::table('users')
            ->where('id', $id)
            ->first();
    }

    public function updateUser($id,$first_name,$last_name,$email,$password,$address,$role_id)
    {
        $update = [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'password' => bcrypt($password),
            'address' => $address,
            'role_id' => $role_id,
            'updated_at' => date('Y-m-d H:i:s')
        ];
        return DB::table('users')
            ->where('id', $id)
            ->update($update);
    }
}