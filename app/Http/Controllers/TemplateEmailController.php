<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\TemplateEmail;
use http\Exception\RuntimeException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class TemplateEmailController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index(){
        $template_email = TemplateEmail::all();


        return view('admin/EmailTemplate/read', ['data'=>$template_email]);
    }

    public function create(){

        return view('admin/EmailTemplate/create');
    }

    public function store(Request $request){

        $file = $request->file('file_banner');
        // Mendapatkan Nama File
        $nama_judul = $request->judul;
        $nama_file = $file->getClientOriginalName();
        $file_name = str_replace(' ', '_', $nama_file);


        // Mendapatkan Extension File
        $extension = $file->getClientOriginalExtension();

        // Mendapatkan Ukuran File
        $ukuran_file = $file->getSize();

        // Proses Upload File
        $destinationPath = 'BannerEmail';
        $file->move($destinationPath,$file_name);


        $create = new TemplateEmail();
        $create->title = $request->title;
        $create->voucher = $request->voucher;
        $create->description = $request->description;
        $create->link = $request->link;
        $create->banner = $file_name;
        $create->save();

        return redirect(url('/'));

    }

    public function edit($id){
        $template_email = TemplateEmail::where('id',$id)->first();


        return view('admin/EmailTemplate/edit',['template_email'=>$template_email]);
    }

    public function update(Request $request, $id){
        $data_lama = TemplateEmail::where('id', $id)->first();


        if ($request->file_banner != null){

            $file = $request->file('file_banner');

            // Mendapatkan Nama File
            $nama_judul = $request->judul;
            $nama_file = $file->getClientOriginalName();
            $file_name = str_replace(' ', '_', $nama_file);

            // Mendapatkan Extension File
            $extension = $file->getClientOriginalExtension();

            // Mendapatkan Ukuran File
            $ukuran_file = $file->getSize();

            //delete file lama
            File::delete('BannerEmail/'.$data_lama->banner);
            //Storage::delete('skema/'.$data_lama[0]->file);

            // Proses Upload File
            $destinationPath = 'BannerEmail';
            $file->move($destinationPath,$file_name);

            TemplateEmail::where('id', $id)
                ->update([
                    'title' => $request->title,
                    'voucher' => $request->voucher,
                    'description' => $request->description,
                    'link' => $request->link,
                    'banner' => $file_name
                ]);

            return redirect(url('/'));
        }else{
            TemplateEmail::where('id', $id)
                ->update([
                    'title' => $request->title,
                    'voucher' => $request->voucher,
                    'description' => $request->description,
                    'link' => $request->link
                ]);

            return redirect(url('/'));
        }
    }

    public function delete($id){

        $data_lama = TemplateEmail::where('id', $id)->first();

        //delete file lama
        File::delete('BannerEmail/'.$data_lama->banner);

        $delete = TemplateEmail::find($id);
        $delete->delete();

        return redirect(url('/'));

    }

}
