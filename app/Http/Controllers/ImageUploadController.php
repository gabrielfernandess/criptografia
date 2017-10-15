<?php



namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Crypt;



class ImageUploadController extends Controller

{

    public function __construct()
    {
        $this->middleware('auth');
    }

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
        
        request()->image->move(public_path('images'), $imageName);
        
        return back()

            ->with('success','Você conseguiu upar sua imagem com sucesso!!!!')
            ->with('image',$imageName);
            
    }

    protected function create(array $data)
    {
        return User::create([
            'foto' => $data['foto'],
            
        ]);
    }

}