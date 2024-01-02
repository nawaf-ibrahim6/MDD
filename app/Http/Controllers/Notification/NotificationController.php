<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Registery;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::query()->where('recipient_id', '=', auth()->user()->id)->get();
        return view('notifications.index_notifications')->with('notifications', $notifications);
    }
    public function store(Request $request)
    {
        if (auth()->user()->role !== 'doctor') {
            $registry  = Registery::query()->findOrFail($request->registry);
            $notification = Notification::query()->create([
                'description' => "You have a new medical consultation,the patient sayed : " . $registry->text,
                'predicted_class' => $registry->predicted_class,
                'rates' => json_encode($registry->probabilities),
                'sender_id' => auth()->user()->id,
                'recipient_id' => $request->doctor
            ]);
        } else {
            $notification = Notification::query()->create(
                [
                    'description' => 'doctor said :' . $request->description,
                    'predicted_class' => null,
                    'rates' => null,
                    'sender_id' => auth()->user()->id,
                    'recipient_id' => $request->recipient_id
                ]

            );
        }
        return redirect()->route('home');
    }
}
