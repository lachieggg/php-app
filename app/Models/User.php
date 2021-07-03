<?php

namespace LoginApp\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'uuid',
        'email',
        'first_name',
        'last_name',
        'full_name',
        'password',
    ];

    public function comments() {
      return $this->hasMany(Comments::class);
    }
}
