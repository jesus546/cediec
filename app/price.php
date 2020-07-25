<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\aseguradora;
use App\regime;
class price extends Model
{
    protected $fillable = [
        'precio'
   ];

   public function regime()
   {
       return $this->belongsToMany(regime::class, 'price_insurance')->withTimestamps();
   }

   public function aseguradora()
   {
       return $this->belongsToMany(aseguradora::class, 'price_insurance')->withTimestamps();
   }


   public function store($request)
    {
        return self::create($request->all());
    }
    public function my_update($request)
    {
        $price = self::update($request->all());
        return  $price;
    }

    public function has_aseguradora($id)
    {
       foreach ($this->aseguradora as $asegurador) {
           if ($asegurador->id == $id ) return true;
       }
       return false;
    }

}
