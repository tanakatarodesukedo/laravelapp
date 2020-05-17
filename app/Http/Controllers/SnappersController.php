<?php

namespace App\Http\Controllers;

use App\Image;
use App\Mail\MailSender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Validator;

class SnappersController extends Controller
{
    private const UPLOAD_FILE = 'upload/現物送付用紙.PNG';

    public function index()
    {
        return view('snappers.index');
    }

    public function about()
    {
        return view('snappers.about');
    }

    public function contact()
    {
        // 前日までのデータを削除
        $delCnt = Image::untilYesterday()->delete();
        if ($delCnt > 0) {
            Storage::disk('public')->delete(self::UPLOAD_FILE);
        }

        return view('snappers.contact');
    }

    public function photograph()
    {
        return view('snappers.photograph');
    }

    public function video()
    {
        return view('snappers.video');
    }

    public function send(Request $request)
    {
        $retJson = ['errors' => null];
        
        // バリデーションチェック
        $validator = Validator::make($request->all(), Image::$rules, Image::$messages);
        if ($validator->fails()) {
            // エラーメッセージを取得
            $retJson['errors'] = $validator->messages();
        } else {
            $attachment = $_FILES['attachment'];
            $filename = $attachment['tmp_name'];
            if (is_uploaded_file($filename)) {
                // 新規登録
                $image = new Image;
                $image->type = $attachment['type'];
                $image->convertImageToBinary($filename)->save();
            }

            if (isset($request->email)) {
                // メール送信
                Mail::send(
                    new MailSender(
                        $_REQUEST['email'],
                        '判定のご依頼',
                        $_REQUEST['message'],
                        $_FILES['attachment']
                    )
                );
            }
        }
        return $retJson;
    }

    public function recieve()
    {
        // 最新データを取得
        $image = Image::orderBy('updated_at', 'desc')->first(['type', 'bin_image']);
        if (isset($image)) {
            $binImage = $image->bin_image;
            $encodedImage = Image::convertBinaryToImage($binImage);
            $image->encodedImage = $encodedImage;
            $image->bin_image = '';
            // ファイルアップロード
            Storage::disk('public')->putStream(
                self::UPLOAD_FILE,
                $binImage
            );
        }
        return ['image' => $image];
    }

    public function download()
    {
        return Storage::disk('public')->download(self::UPLOAD_FILE);
    }
}
