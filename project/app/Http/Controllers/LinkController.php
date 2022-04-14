<?php

namespace App\Http\Controllers;

use App\Http\Requests\LinkRequest;
use App\Models\Link;

class LinkController extends Controller
{
    public function createShortLink(LinkRequest $request)
    {
        if ($request->link && filter_var($request->link, FILTER_VALIDATE_URL)) {
            $isExist = Link::where('old_link', $request->link)->first();

            if ($isExist) {
                $data = $isExist;
            } else {
                $chars = '0123456789abcdefghijklmnopqrstuvwxyz';
                $countChars = strlen($chars);
                $time = time();
                $code = '';

                // Формирование уникального кода
                for ($i = 0; $i < 4; $i++) {
                    $index = $time % $countChars;
                    $time = ($time - $index) / $countChars;
                    $code .= $chars[$index];
                }

                $new_link = 'http://' . $_SERVER['HTTP_HOST'] . '/' . $code;

                $data = Link::create([
                    'old_link' => $request->link,
                    'new_link' => $new_link,
                    'code' => $code
                ]);
            }
            return response()->json($data, 200);
        } else {
            $data = [
                'errors' => [
                    'link' => ['Некорректная ссылка']
                ]
            ];

            return response()->json($data, 422);
        }
    }

    public function redirectLink($code)
    {
        $fields = ['old_link'];
        $original_link = Link::select($fields)->where('code', $code)->first();

        if ($original_link) {
            return redirect($original_link->old_link);
        }
    }
}
