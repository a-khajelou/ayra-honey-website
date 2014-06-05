<?php
/**
 * Created by PhpStorm.
 * User: arash
 * Date: 6/5/14
 * Time: 5:18 AM
 */

class MessageController extends BaseController {
    public function postSave(){
        $message = new Message();
        $message->name=Input::get('name');
        $message->email=Input::get('email');
        $message->phone=Input::get('phone');
        $message->message=Input::get('message');
        $message->is_read=false;
        $message->save();
    }
} 