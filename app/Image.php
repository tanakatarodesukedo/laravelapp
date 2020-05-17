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
        $now = Carbon::now();
        return $query->whereDate('updated_at', '<', Carbon::now());
    }

    public function convertImageToBinary(string $filename)
    {
        // 画像のバイナリデータを16進表現に変換
        $this->bin_image = pg_escape_string('\x' . bin2hex(file_get_contents($filename)));
        return $this;
    }

    public static function convertBinaryToImage($binImage)
    {
        // 画像リソースを文字列に保存してからエンコード
        return base64_encode(stream_get_contents($binImage));
    }
}
