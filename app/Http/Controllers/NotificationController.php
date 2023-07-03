<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MyPNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $use_id = Auth::user()->id;
        $notifications = DB::table('notification')
            ->join(
                'users',
                'notification.user_id',
                '=',
                'users.id'
            )
            ->where('notification.user_id', $use_id)
            ->orderBy('notification.created_at', 'desc')
            ->take(4)
            ->select('notification.id as notification_id', 'notification.subject as subject', 'notification.message as message', 'notification.is_read as status', 'notification.created_at as created_at', 'users.id as user_id', 'users.name as user_name', 'users.email as user_email')
            ->get();
        $records = DB::table('notification')
            ->join(
                'users',
                'notification.user_id',
                '=',
                'users.id'
            )
            ->where('notification.user_id', $use_id)
            ->orderBy('notification.created_at', 'desc')
            ->take(4)
            ->select('notification.id as notification_id', 'notification.subject as subject', 'notification.message as message', 'notification.is_read as status', 'notification.created_at as created_at', 'users.id as user_id', 'users.name as user_name', 'users.email as user_email')
            ->get();

        return view('notifications', ['notificationrecords' => $records, 'notifications' => $notifications]);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user_id = Auth::user()->id;
        $notifications = DB::table('notification')
            ->join(
                'users',
                'notification.user_id',
                '=',
                'users.id'
            )
            ->where('notification.user_id', $user_id)
            ->orderBy('notification.created_at', 'desc')
            ->take(4)
            ->select('notification.id as notification_id', 'notification.subject as subject', 'notification.message as message', 'notification.is_read as status', 'notification.created_at as created_at', 'users.id as user_id', 'users.name as user_name', 'users.email as user_email')
            ->get();


        $record = DB::table('notification')
            ->join(
                'users',
                'notification.user_id',
                '=',
                'users.id'
            )
            ->where('notification.id', $id)
            ->select(
                'notification.id as notification_id',
                'notification.subject as subject',
                'notification.message as message',
                'notification.created_at as created_at',
                'notification.is_read as status',
                'users.id as user_id',
                'users.name as user_name',
                'users.email as user_email'
            )
            ->first();


        return view('notification', ['notification' => $record, 'notifications' => $notifications]);
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
        $updateNoteStatus = MyPNotification::where('id', $id)->first();
        $value=1;
        $updateNoteStatus->is_read = (int)$value;
        $updateNoteStatus->save();
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
        $mynotification = MyPNotification::find($id);
        if ($mynotification) {
            $mynotification->delete();
            // Redirect to the devices index page
            return redirect()->route('notification')->with('success', 'notification deleted successfully');
        } else {
            return redirect()->route('notification')->with('failure', 'Failed to delete');
        }
    }
}
