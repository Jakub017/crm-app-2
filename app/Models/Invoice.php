<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use Searchable;

    protected $fillable = ['reference_number', 'tax_rate', 'client_id', 'task_id', 'amount', 'payment_date', 'notes', 'user_id', 'currency', 'issue_date', 'due_date', 'status', 'created_at', 'updated_at'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function client() {
        return $this->belongsTo(Client::class);
    }

    public function task() {
        return $this->belongsTo(Task::class);
    }
}
