<?php

namespace ContactApp\SDK\services;

use  ContactApp\SDK\models\ContactModel As ContactModel;
use Illuminate\Support\Facades\DB;

class ContactService
{

    public function save($object)
    {
        $model= new ContactModel($object);
        $model->save();
        return $model->idcontact;
    }

   public function find($id)
   {
       $model= ContactModel::find($id);
       if($model)
            return $model->attributesToArray();
        return null;

   }

   public function delete($id)
   {
        $model= ContactModel::find($id);
        $model->delete();
   }

   public function phone($idcontact)
   {
     return   DB::table('phone')
        ->where('contact_id',$idcontact)    
        ->where(['deleted_at'=>null])    
        ->get();   

   }

   public function findWitOuthPhone()
   {
       $json=array();
        $model=DB::table('contact')
            ->join('persons','persons.idpersons','contact.persons_id')
            ->join('address','address.idaddress','persons.address_id')
            ->where(['persons.deleted_at'=>null])       
            ->get();
        foreach($model as $array){
             $phone=self::phone($array->idcontact);
            if($phone->count()==0){
                $json[]=json_decode(json_encode($array), true);
            }
        }
        return $json;
   }

   public function findWithPhone()
   {
        $json=array();
        $model=DB::table('contact')
            ->join('persons','persons.idpersons','contact.persons_id')
            ->join('address','address.idaddress','persons.address_id')
            ->where(['persons.deleted_at'=>null])    
            ->get();
        foreach($model as $array){
            $phone=self::phone($array->idcontact);
            if($phone->count()>0){
                $array=json_decode(json_encode($array), true);
                $phone=json_decode(json_encode($phone), true);
                $array["phone"]=$phone;
                $json[]=$array;
            }
        }
        return $json;
   }

   public function all()
   {
        $json=array();
        $model=DB::table('contact')
            ->join('persons','persons.idpersons','contact.persons_id')
            ->join('address','address.idaddress','persons.address_id')
            ->where(['persons.deleted_at'=>null])    
            ->get();
        foreach($model as $array){
            $phone=self::phone($array->idcontact);
            $array=json_decode(json_encode($array), true);
            $phone=json_decode(json_encode($phone), true);
            $array["phone"]=$phone;
            $json[]=$array;
        }
        return $json;
   }
}