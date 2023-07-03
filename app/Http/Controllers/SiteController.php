<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\SiteLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user_type = Auth::user()->type_id;
        $user_addedby = Auth::user()->added_by;
        $our_sites = DB::table('sites')->paginate(20);

        return view('site', ['our_sites' => $our_sites, 'user_type'=> $user_type]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try {
            $site = new Site();
            $site->site_name = $request->input('name');
            $site->save();

            return redirect()->route('site')->with('success', 'site Added successfully');

        } catch (\Exception $e) {
            // Log the error message or do something else to handle the error
            return redirect()->route('site')->with('failure', 'failed to Add site'.$e->getMessage());
        }
    }

    public function addSiteLocations(Request $request)
    {
        //
        try {
            $site = new SiteLocation();
            $mysiteID=$request->input('site_id');
            $site->location = $request->input('name');
            $site->site_id=$request->input('site_id');
            $site->save();

            return redirect()->back()->with('success', 'site location Added successfully');
        } catch (\Exception $e) {
            // Log the error message or do something else to handle the error
            return redirect()->back()->with('failure', 'failed to Add site location' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_type = Auth::user()->type_id;
        $user_addedby = Auth::user()->added_by;
        //
        $our_sites = DB::table('sites')

            ->join(
                'location',
                'sites.id',
                '=',
                'location.site_id'
            )
            ->where('sites.id', $id)
            ->orderBy('sites.site_name')
            ->select('*', 'location.id as location_id ')
            ->paginate(20);

        return view('site_details', ['our_sites' => $our_sites,'current_id'=> $id, 'user_type'=> $user_type]);
    }

    public function locationsInASite($id)
    {
        //
        $locations_on_Site = DB::table('location')

            ->where('site_id', $id)
            ->select('*')
            ->get();

        return response()->json($locations_on_Site);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        try {
            $site = Site::where('id', $id)->first();
            $site->site_name = $request->input('name');
            $site->save();

            return redirect()->route('site')->with('success', 'site updated successfully');

        } catch (\Exception $e) {
            // Log the error message or do something else to handle the error
            return redirect()->route('Site')->with('failure', 'failed to update site');

        }
    }

    public function siteDetailsUpdate(Request $request, $id)
    {
        //
        try {
            $location = SiteLocation::where('id', $id)->first();
            $location->location = $request->input('name');
            $location->save();

            return redirect()->back()->with('success', 'location updated successfully');
        } catch (\Exception $e) {
            // Log the error message or do something else to handle the error
            return redirect()->back()->with('failure', 'failed to update location' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $site = Site::find($id);
        if ($site) {
            // delete locations registered to this site

            DB::table('location')->where('site_id', $id)->delete();
            // delete the site
            $site->delete();
            // Redirect to the devices index page
            return redirect()->route('site-locations-details')->with('success', 'site deleted successfully');
        } else {
            return redirect()->route('site-locations-details')->with('failure', 'Failed to delete');
        }
    }


    public function delSiteLocations($id)
    {
        //

        // $site = Site::find($id);
        try {
            // delete locations registered to this site

            DB::table('location')->where('id', $id)->delete();
            // delete the site
            // Redirect to the devices index page
            return redirect()->back()->with('success', 'site location deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('failure', 'Failed to delete' . $e->getMessage());
        }
    }
}
