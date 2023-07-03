<?php

namespace App\Http\Controllers;

use App\Models\NotificationConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\New_;

class NotificationConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $user_id = Auth::user()->id;

        // $notificationConfigs=DB::table('notification_config')->where('id', $user_id);
        // return view('settings',['notificationConfigs'=> $notificationConfigs]);
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
            $config = new NotificationConfig();
            if ($request->filled('notify_by')) {
                $config->notify_by = $request->notify_by;
            }
            if ($request->filled('at_level')) {
                $config->at_level = $request->at_level;
            }
            if ($request->filled('how_frequent')) {
                $config->how_frequent = $request->how_frequent;
            }
            $user_id = Auth::user()->id;
            if ($user_id) {
                $config->user_id = $user_id;
            }

            $config->save();
            return redirect('settings')->with('success', 'configuration saved successfully');
        } catch (\Exception $e) {
            return redirect('settings')->with('failure', 'configuration failed to save' . $e->getMessage());
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
        $config = DB::table('notification_config')->where('id', $id)->get();
        return view('settings', ['config' => $config]);
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
        // $config = DB::table('notification_config')->where('user_id', $id)->first();

        try {
            $config= NotificationConfig::find($id);
            if ($request->filled('notify_by')) {
                $config->notify_by = $request->notify_by;
            }
            if ($request->filled('at_level')) {
                $config->at_level = $request->at_level;
            }
            if ($request->filled('how_frequent')) {
                $config->how_frequent = $request->how_frequent;
            }

            $config->save();
            return redirect('settings')->with('success', 'configuration saved successfully');
        } catch (\Exception $e) {
            return redirect('settings')->with('failure', 'configuration failed to save' . $e->getMessage());
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
    }
}
