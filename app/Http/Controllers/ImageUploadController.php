<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Crypt;



class ImageUploadController extends Controller

{


    public function imageUpload()
    {
        return view('imageUpload');
    }
    public function imageUploadPost()
    {
        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        $encrypted = Crypt::encryptString($imageName);
        request()->image->move(public_path('images'), $imageName);

        return back()

            ->with('success','You have successfully upload image.')
            ->with('image',$imageName);
    }

}