<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Channel;
use App\Models\Feed;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PostInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = DB::select("
                SELECT * FROM channels2
                JOIN feeds2 
                ON channels2.id=feeds2.channel_id");

        return response($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    
    {
       
        // Assign API data to validated data
        $validatedData = [
            'id' => $request->channel["id"],
            'name' => $request->channel["name"],
            'description' => $request->channel["description"],
            'latitude' => $request->channel["latitude"],
            'longitude' => $request->channel["longitude"],
            'field1' => $request->channel["field1"],
        ];
        // Validate the input
        $validator = Validator::make($validatedData, [
            'id' =>'max:255',
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'field1' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ]);
        }



        $feedsDatas = $request->feeds;
        DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('secret'),
        ]);
       
        DB::transaction(function () use ($request, $validatedData,$feedsDatas) {
            
            // Create a new channel
            $channel = new Channel();
            $channel->id = $validatedData['id'];
            $channel->name = $validatedData['name'];
            $channel->description = $validatedData['description'];
            $channel->latitude = $validatedData['latitude'];
            $channel->longitude = $validatedData['longitude'];
            $channel->field1 = $validatedData['field1'];
            $channel->created_at = now();
            $channel->updated_at = now();
            $channel->last_entry_id = 0;

            
            $channel->save();
          
            // Create new feeds
            foreach ($feedsDatas as $feedData) {
                
                $feed = new Feed();
                $feed->created_at = $feedData['created_at'];
                $feed->entry_id = $feedData['entry_id'];
                $feed->field1 = $feedData['field1'];
                $feed->channel_id = $validatedData['id'];
                $feed->save();
            }
        });

        return response()->json([
            'success' => true,
            'message' => 'Channel created successfully.'
        ]);    
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
