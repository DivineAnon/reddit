<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Brand extends Model
{
    use Searchable;

    protected $table = "brand";
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'image'];
    public $timestamps = true;

    public function gadgets()
    {
        return $this->hasMany('App\Gadget', 'brand_id', 'id');
    }

    public function countGadget()
    {
        $count = Gadget::where('brand_id', $this->id)->count();
        return $count;
    }

    public function countThread()
    {
        $count = Thread::where('brand_id', $this->id)->count();
        return $count;
    }

    public static function getBrandName($id)
    {
         $brand = Brand::find($id);
         return $brand->name;
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();
        // Applies Scout Extended default transformations:
        $array = $this->transform($array);

        return $array;
    }
}
