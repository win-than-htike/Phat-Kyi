<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ImageUploadController extends Controller
{
    //
    public function upload(Request $request) {

        if ($request->hasFile('image')) {

            //Image store code
            $image = $request->file('image');
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $input['imagename']);


            return response()->json([
                'code' => 200,
                'message' => 'Image Upload Success.',
                'data' => url(('images/'.$input['imagename']))
            ]);

        } else {

            return response()->json([
                'code' => Response::HTTP_UNPROCESSABLE_ENTITY,
                'message' => 'File Empty!'
            ]);

        }

    }

}
