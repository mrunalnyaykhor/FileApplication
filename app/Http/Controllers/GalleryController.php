<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File as FacadesFile;

class GalleryController extends Controller
{

    public function index()
    {

      $user = Auth::user();
      $gallery = Gallery::where('email', $user->email)->paginate(5);
      return view('gallery.index', ['gallery' => $gallery])->with('alert-success', ' successful...!');
    }
  public function galleryindex(){
      $gallery = Gallery::paginate(5);
    return view('gallery.admin', ['gallery' => $gallery])->with('alert-success', ' successful...!');
  }
    public function create(){
       $user = Auth::user();
       $gallery = Gallery::where('email', $user->email)->paginate(5);
       return view('gallery.create',compact('gallery'));
    }

    public function store(Request $request){

        $messages = [
            'file.required' => 'Please select a file to upload.',
            'file.file' => 'The uploaded item must be a file.',
            'file.mimes' => 'This file type cannot be uploaded. Only PDF, DOC, DOCX, XLS, and XLSX files are allowed.',
            'file.max' => 'File size greater than 2MB.',
        ];

        $request->validate([
            'file' => 'required|file|mimes:pdf,doc,docx,xlsx,xls|max:2048', // max size in kilobytes
        ], $messages);

        if ($request->hasFile('file')) {

            $uploadPath = "uploads/gallery/";

            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $counter = 1;
            $filename = $file->getClientOriginalName(); // Get the original filename
            while (file_exists($uploadPath . $filename)) {
                $filename = $originalFilename . '(' . $counter . ').' . $extension;
                $counter++;
            }

            $fileSizeBytes = $file->getSize();
            if ($fileSizeBytes >= 1048576) {
                           // Convert bytes to MB
                           $fileSize = number_format($fileSizeBytes / 1048576, 2) . ' MB';
                       } else {
                           // Convert bytes to KB
                           $fileSize = number_format($fileSizeBytes / 1024, 2) . ' KB';
                       }
            $owner = auth()->user()->name;
            $email = auth()->user()->email;

            $file->move($uploadPath, $filename);

            Gallery::create([
                'fileName' => $filename,
                'fileSize' =>$fileSize,
                'owner' =>$owner,
                'email' =>$email,
            ]);

            return response()->json(['success' => 'file Uploaded Successfully']);
        } else {
            return response()->json(['error' => 'File upload failed.']);
        }
    }

    public function delete($id)
    {
        $user = Auth::user();
       $gallery = Gallery::where('email', $user->email)->paginate(5);
        $gallery = Gallery::findOrFail($id);
        $filePath = public_path('uploads/gallery/' . $gallery->fileName);
        if (FacadesFile::exists($filePath)) {
            FacadesFile::delete($filePath);
        }
        $gallery->delete();
        return redirect()->back()->with('success', 'File deleted successfully.');
   }

public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        $filePath = public_path('uploads/gallery/' . $gallery->fileName);
        if (FacadesFile::exists($filePath)) {
            FacadesFile::delete($filePath);
        }
        $gallery->delete();

        return redirect()->back()->with('success', 'File deleted successfully.');
    }
   public function deleteFile($id){
    $gallery = Gallery::findOrFail($id);
    $filePath = public_path('uploads/gallery/' . $gallery->fileName);
    if (FacadesFile::exists($filePath)) {
        FacadesFile::delete($filePath);
    }
    $gallery->delete();

   return response()->json(['success' => 'File deleted successfully.', 'redirect' => url('/admin/login')]);

   }

   public function adminGallery()
   {
       $admin = Auth::user();
       $gallery = Gallery::where('email', $admin->email)->paginate(5);
       return view('gallery.admingallery', compact('gallery'));
   }

}

