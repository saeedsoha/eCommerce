<?php

namespace App\Http\Controllers\Home;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\MultiImage;
use Illuminate\Support\Carbon;
use Image;

class AboutController extends Controller
{
   public function AboutPage()
   {
    $aboutData = About::find(1);

    return view('admin.about_page.about_page_all', compact('aboutData'));

   }





   public function UpdateAbout(Request $request)
   {

      $about_id = $request->id;

      if($request->file('about_image')) {
          $image = $request->file('about_image');
          $name_generate = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
          
          Image::make($image)->resize(1000, 972)->save('upload/about_page/'.$name_generate);

              $save_url = 'upload/about_page/'.$name_generate;
          
          About::findOrFail($about_id)->update([
              'title' => $request->title,
              'short_title' => $request->short_title,
              'short_description' => $request->short_description,
              'long_description' => $request->long_description,
              'about_image' => $save_url,
          ]);

          $notification = array(
              'message' => 'About Page updated with Image Successfully',
              'alert-type' => 'success',
          );
  

          return redirect()->back()->with($notification );
      } else {

         About::findOrFail($about_id)->update([
            'title' => $request->title,
            'short_title' => $request->short_title,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
        ]);

        $notification = array(
            'message' => 'About Page updated without Image Successfully',
            'alert-type' => 'success',
        );
          return redirect()->back()->with($notification );
      }

   }


   public function HomeAbout(){

    return view('frontend.about_page');

   }

   public function AboutMultiImage(){

    return view('admin.about_page.multiImage');

   }


   public function StoreMultiImage(Request $request){

    $image = $request->file('multiImage');

    // If We Have Image to Add
    if(!empty($image)){

        foreach ($image as  $multi_image) {
    
            $name_generate = hexdec(uniqid()).'.'.$multi_image->getClientOriginalExtension();
            
            Image::make($multi_image)->resize(220, 220)->save('upload/multi/'.$name_generate);
    
                $save_url = 'upload/multi/'.$name_generate;
    
    
                MultiImage::insert([
                    'multi_image' => $save_url,
                    'created_at' => Carbon::now(),
                ]);
    
        } // End of the Foreach
        $notification = array(
                'message' => 'Multi Image Inserted Successfully',
                'alert-type' => 'success',
        );
        
    
        return redirect()->back()->with($notification );
         
       }


       // If we havent Image to Add
       $notification = array(
        'message' => 'No Igame added!',
        'alert-type' => 'info',
    );


        return redirect()->back()->with($notification );


    } // End Method






   public function AllMultiImage()
   {
        $multiImages = MultiImage::all();
        return view('admin.about_page.all_multi_image', compact('multiImages'));
   }




   public function EditMultiImage($id)
   {
       $selectesImage = MultiImage::FindOrFail($id);

       return view('admin.about_page.edit_multi_image', compact('selectesImage'));
   } // End Method



   public function UpdateMultiImage(Request $request)
   {

    $image_id = $request->id;

      if($request->file('multiImage')) {


          $image = $request->file('multiImage');
          $name_generate = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
          
          Image::make($image)->resize(220, 220)->save('upload/multi/'.$name_generate);

              $save_url = 'upload/multi/'.$name_generate;
          
          MultiImage::findOrFail($image_id)->update([
              'multi_image' => $save_url,
          ]);

          $notification = array(
              'message' => 'Image Sucsseccfully Updated',
              'alert-type' => 'success',
          );
  

          return redirect()->route('all.multi.image')->with($notification );
      }

   } // End Method


   public function DeleteMultiImage($id){

    $multi = MultiImage::FindOrFail($id);
    $img = $multi->multi_image;
    unlink($img);

    MultiImage::FindOrFail($id)->delete();



    $notification = array(
        'message' => 'Image Successfully Deleted',
        'alert-type' => 'success',
    );

    return redirect()->route('all.multi.image')->with($notification );



   } // End Method


}
