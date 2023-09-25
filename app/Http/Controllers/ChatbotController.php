<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;

class ChatbotController extends Controller
{
    public function handle(Request $request)
    {
        $botman = app('botman');

        $botman->hears('Bonjour', function (BotMan $bot) {
            $bot->reply('Salut! Je suis votre chatbot.');
        });

        $botman->listen();
    }
}
