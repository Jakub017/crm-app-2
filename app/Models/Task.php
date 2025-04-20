<?php

namespace App\Models;

use App\Models\Client;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use Searchable;

    protected $fillable = ['name', 'description', 'client', 'priority', 'due_date', 'user_id', 'status', 'has_invoice'];

    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
        ];
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function client() {
        return $this->belongsTo(Client::class);
    }

    public function invoice() {
        return $this->belongsTo(Invoice::class);
    }
}
