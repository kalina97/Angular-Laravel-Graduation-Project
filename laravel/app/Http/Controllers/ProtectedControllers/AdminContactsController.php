<?php

namespace App\Http\Controllers\ProtectedControllers;

use App\Models\AdminModels\AdminContact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminContactsController extends Controller
{
    public function getAllContacts()
    {
        $model = new AdminContact();
        $items = $model->getAllContacts();
        if (!empty($items)) {
            return response()->json($items, 200);
        }
        return response()->json(null, 500);
    }

    public function getAllAnswers()
    {
        $model = new AdminContact();
        $items = $model->getAllAnswers();
        if (!empty($items)) {
            return response()->json($items, 200);
        }
        return response()->json(null, 500);
    }

    public function getOneQuestion($id)
    {
        $model = new AdminContact();
        $item = $model->getOneContact($id);
        if(!empty($item)){
            return $item;
        }
        return response()->json(null, 500);
    }

    public function insertAnswer(Request $request)
    {
        $id = $request->getContent();
        $model = new AdminContact();
        $question = $this->getOneQuestion($id);
        if(!empty($question)) {
            $name = $question->name;
            $email = $question->email;
            $subject = $question->subject;
            $message = $question->message;
            $contact_id = $question->id;
            $item = $model->insertAnswer($name,$email,$subject,$message,$contact_id);

        }
        if($item != 0) {
            $model->deleteOneContact($id);
            return response()->json(null, 204);
        }
        return response()->json(null, 500);
    }

    public function deleteContact(Request $request)
    {
        $model = new AdminContact();
        $id = $request->getContent();
        if($id != 0) {
            $model->deleteOneContact($id);
            return response()->json(204);
        }
        return response()->json(null, 500);
    }

    public function deleteAnswer(Request $request)
    {
        $model = new AdminContact();
        $id = $request->getContent();
        if($id != 0) {
            $model->deleteOneAnswer($id);
            return response()->json(204);
        }
        return response()->json(null, 500);
    }

}
