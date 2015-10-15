<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Inbox extends Model {

	protected $table = 'inboxes';

	protected $fillable = ['read', 'message', 'from_id', 'to_id'];

}
