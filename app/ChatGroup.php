<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatGroup extends Model
{
    protected $table = 'chat_groups';

	protected $fillable = ['group_name', 'group_ids', 'createdby_id'];
}
