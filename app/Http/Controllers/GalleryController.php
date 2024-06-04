<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Dotenv\Validator;
use Illuminate\Http\Request;

class GalleryController extends Controller
{


    public function index(){
        $gallery  = Gallery::all();
        return view("gallery.index",
         [
            'gallery'=> $gallery,
        ]);
    }

    public function create(){
        return view ("gallery.create");
    }

    public function store(Request $request){

        $messages = [
            'file.required' => 'Please select a file to upload.',
            'file.file' => 'The uploaded item must be a file.',
            'file.mimes' => 'This file type cannot be uploaded. Only PDF, DOC, DOCX, XLS, and XLSX files are allowed.',
            'file.max' => 'File size greater than 2MB.',
        ];

        // Validate the file input with custom error messages
        $request->validate([
            'file' => 'required|file|mimes:pdf,doc,docx,xlsx,xls|max:2048', // max size in kilobytes
        ], $messages);

        if ($request->hasFile('file')) {
        //     // Validate the file input
        //     $request->validate([
        //         'file' => 'required|file|mimes:pdf,doc,docx,xlsx,xls|max:2048', // max size in kilobytes
        //     ]);

            $uploadPath = "uploads/gallery/";

            $file = $request->file('file');

            $extension = $file->getClientOriginalExtension();
            $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

            $filename = $file->getClientOriginalName(); // Get the original filename

            $fileSizeBytes = $file->getSize();
            if ($fileSizeBytes >= 1048576) {
                           // Convert bytes to MB
                           $fileSize = number_format($fileSizeBytes / 1048576, 2) . ' MB';
                       } else {
                           // Convert bytes to KB
                           $fileSize = number_format($fileSizeBytes / 1024, 2) . ' KB';
                       }
            $owner = auth()->user()->name;

            $file->move($uploadPath, $filename);

            $finalImageName = $filename;

            Gallery::create([
                //'image' => $finalImageName,
                'fileName' => $filename,
                'fileSize' =>$fileSize,
                'owner' =>$owner,
            ]);

            return response()->json(['success' => 'file Uploaded Successfully']);
        } else {
            return response()->json(['error' => 'File upload failed.']);
        }
    }

    public function delete($id)
    {
        // Find the gallery image by ID
        $galleryImage = Gallery::find($id);

        if ($galleryImage) {
            // Delete the gallery image
            $galleryImage->delete();

            return redirect()->back()->with('success', 'file deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'file not found.');
        }
    }
    // public function store(Request $request){
    //     if ($request->hasFile('file')) {
    //         // Validate the file input
    //         $request->validate([
    //             'file' => 'required|mimes:jpeg,png,jpg,gif,txt,csv,docx,pdf|max:2048', // Include desired file types
    //         ]);

    //         $uploadPath = "uploads/gallery/";

    //         $file = $request->file('file');
    //         $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
    //         $extension = $file->getClientOriginalExtension();

    //         // Generate a unique filename to avoid overwriting existing files
    //         $filename = uniqid() . '_' . time() . '.' . $extension;
    //         $filename = $originalFilename . '_' . uniqid() . '.' . $extension;
    //         $fileSizeBytes = $file->getSize();
    //         $file->move($uploadPath, $filename);


    //        // Convert file size to KB or MB
    //        if ($fileSizeBytes >= 1048576) {
    //            // Convert bytes to MB
    //            $fileSize = number_format($fileSizeBytes / 1048576, 2) . ' MB';
    //        } else {
    //            // Convert bytes to KB
    //            $fileSize = number_format($fileSizeBytes / 1024, 2) . ' KB';
    //        }

    //         // Assuming you have an authenticated user
    //         $owner = auth()->user()->name;

    //         try {
    //             $file->move($uploadPath, $filename);

    //             $finalImageName = $uploadPath . $filename;


    //             //$image =Image::make ($finalImageName);


    //             Gallery::create([
    //                 // 'image' => $finalImageName,
    //                 'fileName' => $finalImageName,
    //                 'fileSize' => $fileSize,
    //                 'owner' => $owner,
    //             ]);

    //             return response()->json(['success' => 'Image Uploaded Successfully']);
    //         } catch (\Exception $e) {
    //             return response()->json(['error' => 'File upload failed: ' . $e->getMessage()]);
    //         }
    //     } else {
    //         return response()->json(['error' => 'No file was uploaded.']);
    //     }
    // }
    }

