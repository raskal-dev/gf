<?php

namespace App\Http\Controllers;

use App\Models\Message;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    public function receive(Request $request)
    {
        // Code pour recevoir un message du modem GSM (à adapter à votre matériel)
        $sender = $request->input('sender');
        $messageText = $request->input('message');

        // Enregistrez le message dans la base de données
        Message::create([
            'sender' => $sender,
            'message' => $messageText,
        ]);

        return response()->json(['message' => 'Message enregistré avec succès']);
    }

    public function receiveSms()
    {
        // URL de l'interface Web du modem où les SMS sont exposés
        $modemUrl = 'http://192.168.8.1'; // Remplacez par l'URL correcte de votre modem

        // Créez un client Guzzle pour effectuer une requête GET vers l'interface Web du modem
        $client = new Client();

        // Effectuez une requête GET pour récupérer les SMS (l'URL exacte dépendra de votre modem)
        $response = $client->get($modemUrl . '/api/sms/sms-list');

        // Obtenez le contenu de la réponse
        $smsList = json_decode($response->getBody(), true);

        // Traitez les SMS (enregistrez-les dans la base de données, par exemple)
        foreach ($smsList['Messages']['Message'] as $sms) {
            // Insérez le SMS dans la base de données (à adapter selon votre modèle)
            // Message::create(['sender' => $sms['Phone'], 'content' => $sms['Content']]);
            Message::create(['sender' => $sms['Phone'], 'content' => $sms['Content']]);
        }

        // Répondez avec une réponse JSON
        return response()->json(['message' => 'SMS reçus traités avec succès']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
