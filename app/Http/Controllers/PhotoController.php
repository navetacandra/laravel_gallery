<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class PhotoController extends Controller
{
    public function index($photo_id)
    {
        $data = Photo::find($photo_id)
            ->with('user')
            ->withCount('likes')
            ->withExists('likedByUser', function($query) {
                $query->where('user_id', auth()->user()->id);
            })
            ->first();
        return view('pages.photo', compact('data'));
    }

    public function postPhoto()
    {
        return view('pages.post_photo');
    }

    public function postPhotoProcess(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'photo' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:4096'],
            'judul_foto' => ['required', 'max:255'],
            'deskripsi_foto' => ['required', 'min:3'],
        ]);

        $photo = $request->file('photo');
        $photo_path = $photo->store('photos', ['disk' => 'public']);
        
        if($photo_path == null) {
            Alert::error('Foto gagal di-upload!');
            return redirect()->back();
        }
        
        $photo_post = Photo::create([
            ...$request->only(['judul_foto', 'deskripsi_foto']),
            'user_id' => auth()->user()->id,
            'lokasi_file' => $photo_path
        ]);
        if($photo_post) {
            Alert::success('Foto berhasil di-upload!');
            return redirect()->route('home');
        } else {
            Alert::error('Foto gagal di-upload!');
            Storage::delete($photo_path);
            return redirect()->back();
        }
    }
}
