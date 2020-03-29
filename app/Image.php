<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'attachment' => 'image|mimes:jpeg,bmp,png',
        'email' => 'nullable|email'
    );

    public static $messages = array(
        'attachment.required' => '画像ファイルを添付してください',
        'attachment.mimes' => '添付画像はjpeg,bmp,pngのいずれかの形式としてください'
    );

    public function scopeUntilYesterday($query)
    {
        return $query->whereDate('updated_at', '<', Carbon::now());
    }

    public function convertImageToBinary(string $filename)
    {
        $this->bin_image = file_get_contents($filename);
        return $this;
    }

    public static function convertBinaryToImage(string $binImage)
    {
        return base64_encode($binImage);
    }
}
