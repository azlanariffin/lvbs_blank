<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Input;
use App\User;
use Response;

class ChatController extends Controller
{
    public function setUserOnline() {
      $user_id = Input::get('user_id');
      $user = User::find($user_id);
      $user->active = 1;
      $user->save();
    }

    public function setUserChatId() {
      $user_id = Input::get('user_id');
      $chat_id = Input::get('chat_id');
      $user = User::find($user_id);
      $user->active = 1;
      $user->chat_id = $chat_id;
      $user->save();
    }

    public function getUsersOnline() {
      $users = User::select('id', 'name')->where('active', '=', 1)->orderBy('id')->get();

      $rtnVal = "";

      foreach ($users as $user) {
        $rtnVal .= $user->name . "|" . $user->id . ";";
      }

      $rtnVal = rtrim($rtnVal, ";");

      return Response::json(array(
          'validation_failed' => 0,
          'return_value' => $rtnVal
      ));
    }

    public function removeUsersOffline() {
      $chat_id = Input::get("chat_id");
      $user_select = User::select('id')->where('chat_id', '=', $chat_id)->get();

      $rtnVal = "";

      foreach($user_select as $usr_select) {
        $rtnVal = $usr_select->id;
      }

      return Response::json(array(
          'validation_failed' => 0,
          'return_value' => $rtnVal
      ));
    }

    public function getUserName() {
        $inputId = Input::get("user_id");

        $user = User::find($inputId);

        return Response::json(array(
            'validation_failed' => 0,
            'return_value' => $user->name,
            'is_active' => $user->active
        ));
    }

    public function postMessageToUser() {
      $from_id = Input::get("from_id");
      $to_id = Input::get("to_id");
      $message = Input::get("message");

      $inbox = new Inbox();
      $inbox->from_id = $from_id;
      $inbox->to_id = $to_id;
      $inbox->message = $message;
      $inbox->read = 0;
      $inbox->save();
    }
}


