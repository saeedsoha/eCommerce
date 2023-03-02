<?php

namespace App\Http\Controllers\Home;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use Illuminate\Support\Carbon;
use Image;


class PortfolioController extends Controller
{
    //
    public function AllPortfolio(){

        // $portfolio = Portfolio::latest()->get();
        $portfolio = Portfolio::all();
        return view('admin.portfolio.portfolio_all', compact('portfolio'));

    } // End Method


    public function AddPortfolio(){

        // $portfolio = Portfolio::latest()->get();
        return view('admin.portfolio.portfolio_add');

    } // End Method


    public function StorePortfolio(Request $request){

        $request->validate([
            'portfolio_name' => 'required',
            'portfolio_title' => 'required',
            'portfolio_image' => 'required',

        ],[
            'portfolio_name.required' => 'Portfolio Name is Required',
            'portfolio_title.required' => 'Portfolio Title is Required',

        ]);

        $image = $request->file('portfolio_image');

        if(!empty($image)){

            $name_gen = hexdec(uniqid().'.'.$image->getClientOriginalExtension());

            Image::make($image)->resize(1020,519)->save('upload/portfolio/'.$name_gen);
            $save_url = 'upload/portfolio/'.$name_gen;

            Portfolio::insert([
                'portfolio_image' => $save_url,
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_description' => $request->portfolio_description,
                'created_at' => Carbon::now(),

                
            ]);
            $notification = array(
                'message' => 'Portfolioo Added successfully with Image',
                'alert-type' => 'success',
            );
            $portfolio = Portfolio::all();
            return view('admin.portfolio.portfolio_all', compact('portfolio'))->with($notification );

        } else {
            Portfolio::insert([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_description' => $request->portfolio_description,
                'created_at' => Carbon::now(),
                
            ]);
            $notification = array(
                'message' => 'Portfolioo Added successfully without Image',
                'alert-type' => 'success',
            );

            return view('admin.portfolio.portfolio_all', compact('portfolio'))->with($notification );

        }

        

    } // End Method


    public function EditProfile($id){

        $profileData = Portfolio::find($id);
        return view('admin.portfolio.edit_portfolio', compact('profileData') );


    }

    public function UpdateProfile(Request $request){

        

        if(!empty($request->file('portfolio_image'))){



            $image = $request->file('portfolio_image');
            
            $name_gen = hexdec(uniqid().'.'.$image->getClientOriginalExtension());

            Image::make($image)->resize(1020,519)->save('upload/portfolio/'.$name_gen);

            $save_url = 'upload/portfolio/'.$name_gen;

            Portfolio::find($request->id)->update([
                'portfolio_image' => $save_url,
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_description' => $request->portfolio_description,
                'created_at' => Carbon::now(),

                
            ]);
            $notification = array(
                'message' => 'Portfolioo Added successfully with Image',
                'alert-type' => 'success',
            );
            $portfolio = Portfolio::all();
            return redirect()->route('all.portfolio' ,compact('portfolio'))->with($notification );

        } else {
            Portfolio::find($request->id)->update([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_description' => $request->portfolio_description,
                'created_at' => Carbon::now(),

                
            ]);
            $notification = array(
                'message' => 'Portfolioo Added successfully without Image',
                'alert-type' => 'success',
            );

            $portfolio = Portfolio::all();
            return redirect()->route('all.portfolio' ,compact('portfolio'))->with($notification );

        }


    }



    public function DeleteProfile($id){

        $portfolio = Portfolio::FindOrFail($id);
        $delete = $portfolio->portfolio_image;
        unlink($delete);
    
        Portfolio::FindOrFail($id)->delete();
    
    
    
        $notification = array(
            'message' => 'Portfolio Successfully Deleted',
            'alert-type' => 'success',
        );
    
        return redirect()->route('all.portfolio')->with($notification );
    
    
    
       } // End Method



}
