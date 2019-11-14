<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\ImageManagerStatic as ImageSize;

class Image extends Model
{
    protected $fillable = [
        'event_id', 'image_url', 'user_id',
    ];
    
    public $timestamps= false;
    public $primaryKey = 'image_id';

    static function storeImageProduct($imageName)
    {
        $image = $imageName;
        $imageExtension = $imageName->getClientOriginalExtension();
        $imageName = time() . '.' . $imageExtension;
        $image->storeAs('image', $imageName, 'public');
        $imageResize = ImageSize::make(public_path('storage/image/'.$imageName))->resize(300,300)->save();
        $storedImage = Image::create([
            'image_url' => $imageName,
            'event_id' => null,
            'user_id' => session('id'),
        ]);
        return $storedImage->image_id;
    }

    static function storeImageEvent($imageName, $event_id)
    {
        $image = $imageName;
        $imageExtension = $imageName->getClientOriginalExtension();
        $imageName = time() . '.' . $imageExtension;
        $image->storeAs('image', $imageName, 'public');
        $imageResize = ImageSize::make(public_path('storage/image/'.$imageName))->resize(300,300)->save();
        $storedImage = Image::create([
            'image_url' => $imageName,
            'event_id' => $event_id,
            'user_id' => session('id'),
        ]);
        return $storedImage->image_id;
    }

    public function event(){
        return $this->hasMany('App\Event', 'event_id', 'event_id');
    }
}
