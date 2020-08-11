<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotificationRequest;
use App\Notifications\SampleNotification;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{
    //
    public function index()
    {
        $user = User::find(Auth::user()->id);

        return view('notification.index', [
            'sent' => false,
            'notifications' => $user->notifications,
            'unreadNotifications' => $user->unreadNotifications,
        ]);
    }

    public function notify(NotificationRequest $req)
    {
        $user = User::find(Auth::user()->id);

        $user->notify(new SampleNotification(
            $user,
            $req->input('title'),
            $req->input('message')
        ));

        return redirect()->action('NotificationController@index', [
            'sent' => true,
            'notifications' => $user->notifications,
            'unreadNotifications' => $user->unreadNotifications,
        ]);
    }

    public function read($id)
    {
        $user = User::find(Auth::user()->id);

        foreach ($user->notifications as $notification) {
            if ($notification->id === $id) {
                $notification->markAsRead();

                return view('notification.read', [
                    'name' => $notification->data['name'],
                    'title' => $notification->data['title'],
                    'message' => $notification->data['message'],
                ]);
            }
        }

        return abort(404);
    }
}
