<?php

namespace LoginApp\Models;

use Illuminate\Database\Eloquent\Model;
use LoginApp\Models\User;

class Comment extends Model
{
    protected $table = 'user_comments';
    protected $primaryKey = 'uuid';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'uuid',
        'user_uuid',
        'comment_text',
    ];

    public function user() {
      return $this->belongsTo(User::class);
    }
}
