<?php

namespace App\Http\Controllers;

use App\Models\testimonail;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TestimonailController extends Controller
{
    public function index()
    {
        try {
            $testimonails = testimonail::orderBy('id', 'desc')->where('hidden','yes')->get();

            if ($testimonails->isEmpty()) {
                return response()->json(['message' => 'No testimonail found'], 404);
            }

            return response()->json($testimonails);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch testimonail'], 500);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=> 'server error testimonail'], 404);
        }
    }

    public function store(Request $request)
    {

        $admin = User::find(Auth::user()->id);
        if (!$admin) {
            return response()->json(['message' => 'un Authorized'], 401);
        }

       $validations =  Validator::make($request->all(), [
            'Name' => 'required|max:255',
            'image' => 'required|mimes:jpeg,png,jpg|max:51200',
            'discribution'=>'required|',
        ]);


        try {
            if ($request->hasFile('image')) {
                $image = time() . '.' . $request->image->extension();
                $request->image->move(public_path('PreviousWorkImage'), $image);
                $image_src = 'PreviousWorkImage/'.$image;

                $testimonails = $admin->testimonail()->create([
                    'Name' => $request->Name,
                    'discribution' =>$request->discribution,
                    'image' => $image_src,
                    'created_at'=>Carbon::now(),
                ]);

                return response()->json(['message' => 'new testimonial added successfully'], 201);
            } else {
                return response()->json(['message' => 'Please upload image'], 422);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create testimonail '], 500);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=> 'server error testimonail'], 404);
        }
    }

    public function hidden(Request $request){
        $testimonails = $request->id;
       try{
         foreach($testimonails as $testimonail){
            $gettestimonail =  testimonail::findOrFail($testimonail);
            $gettestimonail->hidden = 'no';
            $gettestimonail->updated_at = Carbon::now();
            $gettestimonail->save();
        }
        return response()->json(['message'=> 'The testimonail is removed'], 200);
       } catch (ModelNotFoundException $e) {
        return response()->json(['message'=> 'server error'], 404);
       }catch (\Exception $e) {
        return response()->json(['error'=> 'please tray again'], 500);
       }
    }
}
