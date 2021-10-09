<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Broadcast extends Model
{
    use HasFactory;

    protected $table = 'broadcasts';
    protected $fillable = [
        'target',
        'template_email_id',
        'status',
    ];

    public function template_email(){
        return $this->belongsTo(TemplateEmail::class);
    }
}
