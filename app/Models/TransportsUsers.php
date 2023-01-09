<?php

namespace App\Models;

use App\Models\UserTypes;
use Illuminate\Database\Eloquent\Relations\Pivot;

class TransportsUsers extends Pivot
{
    public $table = 'transports_users';

    public function type()
    {
        return $this->belongsTo(UserTypes::class, 'user_types_id', 'user_id');
    }
}
