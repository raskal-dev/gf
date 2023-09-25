<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;

class WebhookController extends Controller
{
    public function verify(Request $request)
    {
        $hubVerifyToken = 'EAAL5ZBOl7IuABO1hmZAruMBpEYxEM8KqT1mVGeYyno0jx1HmktsTPIt9ghubIhj0lYOtImZC4NHPgMweBH2xMadvDjOsoJXf1116XLcJbR1Fbk5e6bXitvZCoNVZCHa23ZBXfNrgWCtoZAFNYMjwYcUoQvLNdwEZCRwA1hXYLGdqIoTA2pZBAf93YMu0Di7Qi4zIj'; // Remplacez par votre VERIFY_TOKEN

        $mode = $request->input('hub_mode');
        $token = $request->input('hub_verify_token');

        if ($mode === 'subscribe' && $token === $hubVerifyToken) {
            return response($request->input('hub_challenge'));
        }

        return response('Token de vérification invalide', 403);
    }

    public function handle(Request $request)
    {
        $botman = app('botman');

        $botman->hears('Bonjour', function (BotMan $bot) {
            $bot->reply('Salut! Je suis votre chatbot.');
        });

        $botman->listen();
    }
}
