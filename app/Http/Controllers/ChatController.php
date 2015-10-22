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

    public function storeDeviceID() {
      $uname = Input::get("uname");
      $pwd = Input::get("pwd");
      $deviceid = Input::get("deviceid");

      if (Auth::attempt(['email' => $uname, 'password' => $pwd])) {
        $user_select = User::select('id')->where('email', '=', $uname)->get();

        foreach($user_select as $usr_select) {
          $user = User::find($usr_select->id);
          $user->device_id = $deviceid;
          $user->save();
        }

        $exec_curl =  $this->PushToDevice($deviceid, 1, "Authentication success");

        return Response::json(array(
          'validation_failed' => 0,
          'return_value' => $exec_curl
        ));

      }
      else {
        return Response::json(array(
          'validation_failed' => 1,
          'return_value' => "Authentication failed"
        ));
      }
    }

    public function sendRequest($method, $url, $path, $device_id, $platform_id, $msg) {
      $appId = "5625b069177959565d8b456a";
      $appSecret = "e678f1e45bcae08d55a1b394420aae61";
      $device_id = "APA91bEKmgi64ZhkR1JDt35iNPX-qO3xXaaKHxise7vARhp2NHHL_oNc_gJNCg5unL5T328IiJDaz_OxLCTtOqtB6XSxEdcH9Ii90OXmwg4RclHCaOviYV7piJphDzt51hbasegP9q7o8Oh7jlaPsoTmZxC-n-B2Rw";
      //$push;
      $timeout = 0; 
      $connectTimeout = 0;
      $sslVerifypeer = 0;


      $data = array("platform" => $platform_id, "token" => $device_id, "msg" => $msg, "sound" => "ping.aiff");                                                                    
      $data_string = json_encode($data);
                                                                                                                           
      $ch = curl_init($url . $path);                                                                      
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
          'x-pushbots-appid: ' . $appId,
          'x-pushbots-secret: ' . $appSecret,
          'Content-Type: application/json',                                                                                
          'Content-Length: ' . strlen($data_string))                                                                       
      );                                                                                                                   
                                                                                                                           
      $result = curl_exec($ch);

      return $result;

      /*$this->push['platform'] = $platform_id;
      $this->push['token'] = $device_id;
      $this->push['msg'] = $msg;
      $this->push['sound'] = "ping.aiff";

      $jsonData = json_encode($this->push);
      $ci = curl_init();

      $headers = array(
        'x-pushbots-appid:' . $appId,
        'x-pushbots-secret:' . $appSecret,
        'Content-Type: application/json'
      );

      curl_setopt($ci, CURLOPT_CONNECTTIMEOUT, $connectTimeout); 
      curl_setopt($ci, CURLOPT_TIMEOUT, $timeout); 
      curl_setopt($ci, CURLOPT_RETURNTRANSFER, TRUE); 
      curl_setopt($ci, CURLOPT_SSL_VERIFYPEER, $sslVerifypeer);
      curl_setopt($ci, CURLOPT_HTTPHEADER, $headers );
      curl_setopt($ci, CURLOPT_HEADER, TRUE);

      switch ($method) { 
        case 'POST': 
            curl_setopt($ci, CURLOPT_POST, TRUE); 
            if (!empty($jsonData)) { 
                curl_setopt($ci, CURLOPT_POSTFIELDS, $jsonData); 
            }
            break; 
        case 'DELETE': 
            curl_setopt($ci, CURLOPT_CUSTOMREQUEST, 'DELETE'); 
            if (!empty($jsonData)) { 
                $url = "{$url}?{$jsonData}"; 
            } 
      }

      curl_setopt($ci, CURLINFO_HEADER_OUT, TRUE ); 
      curl_setopt($ci, CURLOPT_URL, $url . $path);

      $content = curl_exec($ci);

      $response = curl_getinfo($ci);

      $rtnVal;
      
      if($response['http_code'] != 200) { 
        //$res['status'] = 'ERROR';
        //$res['code'] = $response['http_code'];
        //$res['data'] = $response['message'];
      }
      else {
        //$res['status'] = 'OK';
        //$res['code'] = $response['http_code'];
        //$res['data'] = $content;
      }
    
      curl_close ($ci);
      return $content;
      //return $res;*/
    }

    public function PushToDevice($device_id, $platform_id, $msg) {
      $response = $this->sendRequest('POST', 'https://api.pushbots.com', '/push/all', $device_id, $platform_id, $msg);
      return $response;
    }
}


