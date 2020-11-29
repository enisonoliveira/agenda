<?php 

namespace ContactApp\SDK\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactModel  extends Model 
{
    use SoftDeletes;
    protected $table = 'contact';
    protected $fillable = ['idcontact','persons_id'];
    protected $dates = ['deleted_at'];
    public $primaryKey = 'idcontact';

}