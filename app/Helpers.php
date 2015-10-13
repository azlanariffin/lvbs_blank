<?php
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use App\User;

class AppHelper extends Model
{
    public static function generatecode($type = 0, $extension = "")
    {
        if ($type == 1) {
            $code = md5(substr(str_shuffle("abcdefghijk" . rand(111111, 999999) . "lmnopqrstuvwxyz"), 0, 15));
            $user = User::where('email_verify_code', '=', $code)->first();
            if (count($user) > 0)
            {
                return self::generatecode($type);
            } else {
                return $code;
            }
        }
        elseif ($type == 2) {
            $code = md5(substr(str_shuffle("abcdefghijk" . rand(111111, 999999) . "lmnopqrstuvwxyz"), 0, 15));
            if (File::exists("profiles/" . $code . "." . $extension)) {
                return self::generatecode($type, $extension);
            } else {
                return $code;
            }
        }
        elseif ($type == 3)
        {
            $code = md5(substr(str_shuffle("abcdefghijk" . rand(111111, 999999) . "lmnopqrstuvwxyz"), 0, 15));
            if (File::exists("uploads/".$code.".".$extension))
            {
                return self::generatecode($type, $extension);
            } else {
                return $code;
            }
        }
        elseif ($type == 4)
        {
            $code = md5(substr(str_shuffle("abcdefghijk" . rand(111111, 999999) . "lmnopqrstuvwxyz"), 0, 15));
            if (File::exists("promo/".$code.".".$extension))
            {
                return self::generatecode($type, $extension);
            } else {
                return $code;
            }
        } else {
            if (rand(0, 3) == 0)
            {
                $code = strtolower(chr(97 + rand(0, 25)) . chr(97 + rand(0, 25)) . rand(0, 9) . rand(0, 9));
            }
            elseif (rand(0, 3) == 1)
            {
                $code = strtolower(rand(0, 9) . rand(0, 9) . chr(97 + rand(0, 25)) . chr(97 + rand(0, 25)));
            }
            elseif (rand(0, 3) == 2)
            {
                $code = strtolower(chr(97 + rand(0, 25)) . rand(0, 9) . chr(97 + rand(0, 25)) . rand(0, 9));
            }
            else
            {
                $code = strtolower(rand(0, 9) . chr(97 + rand(0, 25)) . rand(0, 9) . chr(97 + rand(0, 25)));
            }
            return $code;
        }
    }
}