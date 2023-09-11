<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use Exception;
use Twilio\Rest\Client;
use Twilio\TwiML\MessagingResponse;
use Illuminate\Http\Request;


class TwilioSMS extends Controller
{
    public function index()
    {
        $receiverNumber = "+261343697048";
        $message = "SMS to Twilio Laravel by Ras Kal";

        try {

            $account_sid = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_TOKEN");
            $twilio_number = getenv("TWILIO_FROM");

            $client = new Client($account_sid, $auth_token);
            $client->messages->create($receiverNumber, [
                'from' => $twilio_number,
                'body' => $message]);

            dd('SMS Sent Successfully.');

        } catch (Exception $e) {
            dd("Error: ". $e->getMessage());
        }
    }

    public function processIncomingSMS(Request $request, MessagingResponse $response)
    {
        $from = $request->input('From');
        $body = $request->input('Body');

        // Extraire les données du SMS
        $data = $this->extractDataFromSMS($body);

        // Insérer les données dans la base de données
        $sms = new Demande();
        $sms->nom = $data['Nom'];
        $sms->prenom = $data['Prenom'];
        $sms->mail = $data['Email'];
        $sms->num_tel = $data['Tel'];
        $sms->date_nais = $data['DN'];
        $sms->cin = $data['CIN'];
        $sms->sexe = $data['Sexe'];
        $sms->demande = $data['Demande'];
        $sms->save();

        // Répondre au SMS avec un message de confirmation
        $response->message('Merci, vos données ont été enregistrées avec succès.');

        return $response;
    }

    private function extractDataFromSMS($body)
    {
        $data = [];

        // Extraire les attributs du SMS
        $lines = explode("\n", $body);
        foreach ($lines as $line) {
            $parts = explode(':', $line);
            if (count($parts) === 2) {
                $key = trim($parts[0]);
                $value = trim($parts[1]);
                $data[$key] = $value;
            }
        }

        return $data;
    }
}
