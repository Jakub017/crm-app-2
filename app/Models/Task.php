<?php

namespace App\Models;

use App\Models\Client;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use Searchable;

    protected $fillable = ['name', 'description', 'client_id', 'priority', 'due_date', 'user_id', 'status', 'has_invoice'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function client() {
        return $this->belongsTo(Client::class);
    }
}
