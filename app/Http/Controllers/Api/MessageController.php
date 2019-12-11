<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Comment;


class MessageController extends Controller
{
    public function postForm(Request $request)
    {   
        $payload = array();
        $message = new Message();

        // validationを行う
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:20',
            'contents' => 'required|max:140',
        ]);

        if (!$validator->fails()) {
            $con = \DB::connection();
            try{
                $con->beginTransaction();
                $message->title     = $request->title;
                $message->contents  = $request->contents;
                $message->save();
                $con->commit();
                $payload['result'] = true;
    
            } catch (\Exception $e){
                $con->rollback();
                throw $e;
            }
            return $payload;

        } else {
            $payload['result'] = false;
            return $payload;
        }

    }

    public function getMessage()
    {
        $payload = [];
        $payload['message_objects'] = Message::orderBy('id', 'desc')->get();
        return response()->json($payload);

    }
}
