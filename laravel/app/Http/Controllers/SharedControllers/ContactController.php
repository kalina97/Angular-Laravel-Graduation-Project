<?php

namespace App\Http\Controllers\SharedControllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ContactController extends Controller
{

    #Contact Logic
    public function insertContact(Request $request) {
        $model = new Contact();

        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required|min:2|max:15',
            'message' => 'required'
        ];
        $message =[];
        $validator = \Validator::make($request->all(), $rules, $message);
        $validator->validate();

        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $message = $request->message;
        try {
            $model->insert($name, $email, $subject, $message);
            return response()->json(201);

        }
        catch (\Exception $e){
            return response()->json(['error'=>$e->getMessage()],500);
        }
        }
}
