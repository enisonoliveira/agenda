<?php

namespace ContactApp\SDK\services;

use  ContactApp\SDK\models\AddressModel;
use stdClass;

class AddressService
{
    public function save($object)
    {
        $model=  AddressModel::create($object);
        return $model->idaddress;
    }

   public function find($id)
   {
       $model= AddressModel::find($id);
       return $model->attributesToArray();

   }

   public function delete($id)
   {
        $model= AddressModel::find($id);
        $model->delete();
        
   }
}