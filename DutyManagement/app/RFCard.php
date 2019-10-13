<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RFCard extends Model
{
    public function employee()
    {
        return $this->hasOne('App\Employee', 'r_f_card_id');
    }
}
