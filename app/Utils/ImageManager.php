<?php
namespace App\Utils;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ImageManager {
    // public static function UploadImages($request, $user=null, $post=null)
    // {
    // // Implement images upload logic here
    //     if($request->hasFile('images'))
    //         {//multi images
    //             foreach($request->images as $image)
    //             {
    //                 $imageName = self::generateImageName($image);
    //                 $path = self::storeImageInLocal($image, $imageName, 'posts');
    //                 $post->images()->create([
    //                     'path'=>$path
    //                 ]);
    //             }
    //         }
    //     // Upload single image for User image
    //     if($request->hasFile('image'))
    //     {
    //         $image = $request->file('image');
    //         // delete the image from the local
    //         self::deleteImageFromLocal($user->image);
    //         $imageName = self::generateImageName($image);
    //         $path = self::storeImageInLocal($image, $imageName, 'users');
    //         //update image in database
    //         $user->update([
    //             'image'=>$path
    //     ]);
    //     }
    // }
    // public static function deleteImages($post)
    // {
    //     if ($post->images->count() > 0)
    //     {
    //         foreach ($post->images as $image)
    //         {
    //             self::deleteImageFromLocal($image->path);
    //             $image->delete();
    //         }
    //     }
    // }
    public function uploadSingleImage($image, $path, $disk)
    {
        $fileName = self::generateImageName($image);
        self::storeImageInLocal($image, $path, $fileName, $disk);
        return $fileName;
    }
    public function uploadMultipleImages($images, $model, $disk)
    {
        foreach ($images as $image) {
            $fileName = self::generateImageName($image);
            self::storeImageInLocal($image, '/', $fileName, $disk);
            $model->images()->create([
                'file_name' => $fileName
            ]);
        }
    }

    private function generateImageName($image)
    {
        return Str::uuid() . time() . $image->getClientOriginalExtension();
    }

    private function storeImageInLocal($image, $path, $fileName, $disk)
    {
        $image->storeAs($path, $fileName, ['disk' => $disk]);
    }

    public static function deleteImageFromLocal($image_path)
    {
        if (file_exists(public_path($image_path))) {
            File::delete(public_path($image_path));
        }

        //TODO: anthor way to delete
        // if (Storage::disk('brands')->exists($image_path)) {
        //     Storage::disk('brands')->delete($image_path);
        // }
    }
}
