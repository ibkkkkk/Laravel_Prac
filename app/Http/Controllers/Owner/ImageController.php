<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;
use App\Http\Requests\UploadImageRequest;
use App\Services\ImageService;

class ImageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:owners');

        $this->middleware(function ($request, $next) {

            $id = $request->route()->parameter('image');
            if (!is_null($id)) {
                $imageOwnerId = Image::findOrFail($id)->owner->id;
                $imageId = (int)$imageOwnerId;
                $ownerId = Auth::id();
                if ($imageId !== $ownerId) {
                    abort(404);
                }
            }
            return $next($request);
        });
    }


    public function index()
    {
        $images = Image::where('owner_id', Auth::id())
            ->orderBy('updated_at', 'desc')->paginate(20);

        return view('owner.images.index', compact('images'));
    }

    public function create()
    {
        return view('owner.images.create');
    }


    public function store(UploadImageRequest $request)
    {
        // dd($request);
        $imageFiles = $request->file('files');
        if (!is_null($imageFiles)) {
            foreach ($imageFiles as $imageFile) {
                $fileNameToStore = imageService::upload($imageFile, 'products');
                Image::create([
                    'owner_id' => Auth::id(),
                    'filename' => $fileNameToStore
                ]);
            }
        }

        return redirect()->route('owner.images.index')->with([
            'message' => '登録しました。',
            'status' => 'info'
        ]);
    }


    // public function show($id)
    // {
    //     //
    // }


    public function edit($id)
    {
        $image = Image::findOrFail($id);

        return view('owner.images.edit', compact('image'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'string|max:50'
        ]);

        $image = Image::findOrFail($id);
        $image->title = $request->title;
        $image->save();

        return redirect()->route('owner.images.index')->with([
            'message' => "更新しました。",
            'status' => 'info'
        ]);
        dd("dfdfd");
    }


    public function destroy($id)
    {

        $image = Image::findOrFail($id);
        $filePath = 'public/products/' . $image->filename;

        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
        }

        Image::findOrFail($id)->delete();

        return redirect()->route('owner.images.index');
    }
}
