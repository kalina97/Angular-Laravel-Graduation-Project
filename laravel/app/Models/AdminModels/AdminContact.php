<?php
/**
 * Created by PhpStorm.
 * User: Kale
 * Date: 14.12.2019
 * Time: 17:33
 */

namespace App\Models\AdminModels;
use Illuminate\Support\Facades\DB;

class AdminContact
{
    public function getAllContacts()
    {
        return DB::table('contacts')
            ->get();
    }
    public function getAllAnswers()
    {
        return DB::table('answers')
            ->get();
    }
    public function getOneContact($id)
    {
        return DB::table('contacts')
            ->where('id', $id)
            ->get()
            ->first();
    }
    public function deleteOneContact($id)
    {
        return DB::table('contacts')
            ->where('id', $id)
            ->delete();
    }
    public function deleteOneAnswer($id)
    {
        return DB::table('answers')
            ->where('id', $id)
            ->delete();
    }
    public function insertAnswer($name,$email,$subject,$message,$contact_id)
    {
        return DB::table('answers')
            ->insertGetId([
                'name' => $name,
                'email' => $email,
                'subject' => $subject,
                'message' => $message,
                'answered' => date('Y-m-d H:i:s'),
                'contact_id' => $contact_id
            ]);
    }

}