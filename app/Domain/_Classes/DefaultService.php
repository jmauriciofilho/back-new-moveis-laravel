<?php

namespace App\Domain\_Classes;

use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DefaultService
{
    public static function setBelongsToMany(array $data, $field, $method, $object)
    {
        $list = key_exists($field, $data) ? $data[$field] : [];
        return $object->{$method}()->sync($list);
    }

    public static function sendEmail($view, $subject, $to, $data)
    {
        try
        {
            $authUser = Auth::user();

            //$body = view('admin.users.emails.' . $view, compact('transfer'))->render();

            Mail::send($view, $data, function (Message $message) use ($authUser, $subject, $to) {
                $message->from($authUser->email, $authUser->name);
                $message->to($to);
                $message->subject($subject);
                $message->replyTo($authUser->email);
            });

            return empty(Mail::failures());
        }
        catch (\Exception $e)
        {
            return false;
        }
    }
}