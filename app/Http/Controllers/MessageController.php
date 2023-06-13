<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Events\NewMessageEvent;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $receiverId = 3;
        $messageContent = 'testing';
        $message = Message::create([
            'receiver_id' => $receiverId,
            'sender_id' => 2,
            'message' => $messageContent
        ]);
        event(new NewMessageEvent($receiverId, $messageContent));

        dd(session()->all());
    }

    public function scrap()
    {
        $link = 'https://store.pakbuyers.pk/';
        $curl = curl_init($link);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $curl,
            CURLOPT_USERAGENT,
            "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13",
        );

        $page = curl_exec($curl);
        $pokemon_doc = new \DOMDocument();
        libxml_use_internal_errors(true);
        $pokemon_doc->loadHTML($page);
        libxml_clear_errors();

        $pokemon_xpath = new \DOMXPath($pokemon_doc);
        $price = $pokemon_xpath->evaluate(
            'string(//div[@id="products-grid-1"])'
        );
        dd($price);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        //
    }
}
