<?php

namespace App\Services\Telegram;

use App\Exceptions\CommandErrorException;
use Illuminate\Http\Request;
use Telegram\Bot\Api;
use Telegram\Bot\Objects\Message;

class TelegramResponseService
{
   protected static $commands = [];
   private $telegram;

   public function __construct()
   {
      $this->telegram = new Api(env('bot_token'));
   }

   public function createResponse(Request $request)
   {
      foreach (static::$commands as $command) {
         try {
            $response = $command::parse($request);
         } catch (CommandErrorException $th) {
            $response = $th->getMessage();
         }
      }
      return $response;
   }

   public function sendResonse(Request $request): Message
   {
      $response = $this->createResponse($request);
      return $this->telegram->sendMessage($response);
   }
}
