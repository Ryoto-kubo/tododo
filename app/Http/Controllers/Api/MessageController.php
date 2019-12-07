<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Comment;


class MessageController extends Controller
{
    public function postForm(Request $request)
    {   
        $payload = array();
        $message = new Message();

        $con = \DB::connection();
        try{
            $con->beginTransaction();
            $message->title     = $request->title;
            $message->contents  = $request->contents;
            $message->save();
            $con->commit();
            $payload['success'] = 'success';

        } catch (\Exception $e){
            $con->rollback();
            throw $e;
        }
        return $payload;
    }

    public function getMessage()
    {
        $payload = [];
        $payload['message_objects'] = Comment::orderBy('id', 'desc')->get();
        return response()->json($payload);

    }
}
