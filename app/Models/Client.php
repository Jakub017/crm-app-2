<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['company', 'nip', 'type', 'country', 'street', 'city', 'zip_code', 'person', 'email', 'phone', 'note', 'user_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
