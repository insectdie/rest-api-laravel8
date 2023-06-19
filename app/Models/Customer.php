<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'customer';

    protected $cst_dob = 'dd/mm/yyyy';
    protected $primaryKey = 'cst_id';
}