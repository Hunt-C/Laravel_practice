<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Models\Home;

class HomeController extends Controller
{
    //
    public function edit()
    {
        $home = Home::find(1);
        if (empty($home))
            return view('backend.home.edit');
        else
            return view('backend.home.edit', compact('home'));
    }
    public function update(Request $request)
    {
        // echo('In home update xxx');
        // echo('???');
        // 如果路徑不存在，就自動建立
        if (!file_exists('uploads/home')) {
            // echo('dir');
            mkdir('uploads/home', 0755, true);
        }
        // echo('before home find');
        // 因為沒有特別建立create頁面，所以特別判斷資料庫中是否有資料可以更新
        $home = Home::find(1);
        if (empty($home)) {
            // echo('In home update empty');
            // 沒有資料 -> 新增
            $home = new Home;
            $fileName = 'default.jpg';
        }
        // echo($request->hasFile('image'));
        // if ($request->hasFile('image')=='')
        //     echo('empty');
        // elseif ($request->hasFile('image')==NULL)
        //     echo("NULL");
        // else
        //     echo("???");


        if ($request->hasFile('image')) {
            // echo('update img');
            // 先刪除原本的圖片
            if ($home->image != 'default.jpg')
                @unlink('uploads/home/' . $home->image);
            $file = $request->file('image');
            $path = public_path() . '\uploads\home\\';
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $fileName);

            if ($fileName) {
                // echo('In home update in FN');
                $home->image = $fileName;
            }
        }
        else{
            // echo('no update img');
        }
        $home->content_1 = $request->input('content_1');
        $home->content_2 = $request->input('content_2');

        $home->save();
        // echo('In home update DONE');


        return redirect()->route('admin.home.edit');
    }
}
