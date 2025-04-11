<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Client extends Model
{
    use Searchable;

    protected $fillable = ['company', 'nip', 'type', 'country', 'street', 'city', 'zip_code', 'person', 'email', 'phone', 'note', 'user_id'];

    public function toSearchableArray()
    {
        return [
            'company' => $this->company,
            'person' => $this->person,
            'nip' => $this->nip,
        ];
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function tasks() {
        return $this->hasMany(Task::class);
    }
}
