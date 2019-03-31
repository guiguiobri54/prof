<?php

namespace App\Http\Controllers;

use App\Document;
use App\Study;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Redirect;

class FileController extends Controller
{
    public function showUploadForm($idStudy)
    {
        //dd($idStudy);
        return view('File.DocumentUpload',compact('idStudy'));
    }

    public function saveFile(Request $request)
    {
        $this->validate($request,[
            'file'=>'required'
            ]);

        $directory = config('users.path');
        $studyId = $request->study_id;
        //$studyName = Study::find($studyId)->name;
        //dd($studyName);

        $id = Auth::user()->id;
        $userName = User::find($id)->name;



        $path = $directory . '/' . $userName . '/' . $studyId;

        if(!File::exists($path)){
            File::makeDirectory($path);
        }



        $filename = $request -> file -> getClientOriginalName();
        $filemime = $request -> file -> getClientMimeType();
        $filesize = $request -> file -> getClientSize();
        //$doc = $request -> file;
        $file= $path . '/' . $filename;

        if(File::exists($file)){

            return Redirect::back()->withErrors([$file => [ 'Un fichier ' . $filename . ' existe déjà. Renommer votre fichier ou supprimer le fichier existant.']]);
        }

        $request -> file -> move($path,$filename);


        $file = new Document();
        $file -> filename = $filename;
        $file -> mime = $filemime;
        $file -> size = $filesize;
        $file -> path = $path;
        $file -> full_path = $path . '/' . $filename;
        $file -> category = $request -> category;
        $file -> study_id = $request -> study_id;
        $file -> save();

        $id = $file->study_id;

        return Redirect::route('Study.show', $id)->with('message', 'State saved correctly!!!');

    }

    public function destroy($id)
    {
        $doc=Document::find($id);
        $path=$doc->path;
        $filename=$doc->filename;
        $file= $path . '/' . $filename;

        if (File::exists($file)) {
            File::delete($file);
        }

        $doc->delete();

        return back();
    }
}
