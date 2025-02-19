<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    // public function view()
    // {
    //     // Ambil semua pengguna yang memiliki pesan dengan pengguna yang sedang login (Auth::id())
    //     $usersWithLastMessage = User::where('id', '!=', Auth::id()) // Jangan ambil user yang sedang login
    //         ->whereHas('messages', function ($query) {
    //             $query->where('from_user_id', Auth::id())
    //                 ->orWhere('to_user_id', Auth::id());
    //         })
    //         ->get();

    //     // Ambil pesan terakhir untuk masing-masing user
    //     $usersWithLastMessage = $usersWithLastMessage->map(function ($user) {
    //         $lastMessage = Message::where(function ($q) use ($user) {
    //             $q->where('from_user_id', Auth::id())->where('to_user_id', $user->id);
    //         })
    //             ->orWhere(function ($q) use ($user) {
    //                 $q->where('from_user_id', $user->id)->where('to_user_id', Auth::id());
    //             })
    //             ->orderBy('created_at', 'desc')
    //             ->first();

    //         // Menambahkan pesan terakhir ke data user
    //         $user->lastMessage = $lastMessage;
    //         return $user;
    //     });

    //     $users = User::where('id', '!=', Auth::id())->get();

    //     return view('messages', compact('usersWithLastMessage', 'users'));
    // }

    public function view()
    {
        $authId = Auth::id();

        // Ambil semua pengguna yang memiliki pesan dengan Auth::id()
        $usersWithLastMessage = User::where('id', '!=', $authId)
            ->whereIn('id', function ($query) use ($authId) {
                $query->select('from_user_id')
                    ->from('messages')
                    ->where('to_user_id', $authId)
                    ->union(
                        DB::table('messages')
                            ->select('to_user_id')
                            ->where('from_user_id', $authId)
                    );
            })
            ->get();

        // Ambil pesan terakhir untuk masing-masing user
        $usersWithLastMessage = $usersWithLastMessage->map(function ($user) use ($authId) {
            $lastMessage = Message::where(function ($q) use ($user, $authId) {
                $q->where('from_user_id', $authId)->where('to_user_id', $user->id);
            })
                ->orWhere(function ($q) use ($user, $authId) {
                    $q->where('from_user_id', $user->id)->where('to_user_id', $authId);
                })
                ->orderBy('created_at', 'desc')
                ->first();

            // Menambahkan pesan terakhir ke data user
            $user->lastMessage = $lastMessage;
            return $user;
        });

        // Urutkan berdasarkan waktu pesan terakhir (dari yang terbaru)
        $usersWithLastMessage = $usersWithLastMessage->sortByDesc(function ($user) {
            return $user->lastMessage ? $user->lastMessage->created_at : null;
        });

        $users = User::where('id', '!=', Auth::id())->get();


        return view('messages', compact('usersWithLastMessage', 'users'));
    }

    public function messagingWith($username)
    {
        $receiver = User::where('username', $username)->firstOrFail();
        // Ambil semua pengguna yang memiliki pesan dengan pengguna yang sedang login (Auth::id())
        $authId = Auth::id();

        // Ambil semua pengguna yang memiliki pesan dengan Auth::id()
        $usersWithLastMessage = User::where('id', '!=', $authId)
            ->whereIn('id', function ($query) use ($authId) {
                $query->select('from_user_id')
                    ->from('messages')
                    ->where('to_user_id', $authId)
                    ->union(
                        DB::table('messages')
                            ->select('to_user_id')
                            ->where('from_user_id', $authId)
                    );
            })
            ->get();

        // Ambil pesan terakhir untuk masing-masing user
        $usersWithLastMessage = $usersWithLastMessage->map(function ($user) use ($authId) {
            $lastMessage = Message::where(function ($q) use ($user, $authId) {
                $q->where('from_user_id', $authId)->where('to_user_id', $user->id);
            })
                ->orWhere(function ($q) use ($user, $authId) {
                    $q->where('from_user_id', $user->id)->where('to_user_id', $authId);
                })
                ->orderBy('created_at', 'desc')
                ->first();

            // Menambahkan pesan terakhir ke data user
            $user->lastMessage = $lastMessage;
            return $user;
        });

        // Urutkan berdasarkan waktu pesan terakhir (dari yang terbaru)
        $usersWithLastMessage = $usersWithLastMessage->sortByDesc(function ($user) {
            return $user->lastMessage ? $user->lastMessage->created_at : null;
        });
        $users = User::where('id', '!=', Auth::id())->get();


        return view('messages', compact('receiver', 'usersWithLastMessage', 'users'));
    }

    // Fetch chat messages (untuk AJAX)
    // public function fetchMessages($username)
    // {
    //     $receiver = User::where('username', $username)->firstOrFail();

    //     $messages = Message::where(function ($query) use ($receiver) {
    //         $query->where('from_user_id', Auth::id())
    //             ->where('to_user_id', $receiver->id);
    //     })
    //         ->orWhere(function ($query) use ($receiver) {
    //             $query->where('from_user_id', $receiver->id)
    //                 ->where('to_user_id', Auth::id());
    //         })
    //         ->orderBy('created_at', 'asc')
    //         ->get()
    //         ->map(function ($msg) {
    //             return [
    //                 'from_user_id' => $msg->from_user_id,
    //                 'from_user_name' => $msg->fromUser->name,
    //                 'message' => $msg->message,
    //                 'created_at' => $msg->created_at->format('h:i A')
    //             ];
    //         });

    //     return response()->json($messages);
    // }


    // public function fetchMessages(Request $request, $username)
    // {
    //     $receiver = User::where('username', $username)->firstOrFail();
    //     $query = Message::where(function ($q) use ($receiver) {
    //         $q->where('from_user_id', Auth::id())->where('to_user_id', $receiver->id);
    //     })
    //         ->orWhere(function ($q) use ($receiver) {
    //             $q->where('from_user_id', $receiver->id)->where('to_user_id', Auth::id());
    //         });

    //     // Ambil hanya pesan baru berdasarkan waktu terakhir
    //     if ($request->has('last_time')) {
    //         $query->where('created_at', '>', $request->last_time);
    //     }

    //     $messages = $query->orderBy('created_at', 'asc')->get()->map(function ($msg) {
    //         return [
    //             'from_user_id' => $msg->from_user_id,
    //             'from_user_name' => $msg->fromUser->name,
    //             'message' => $msg->message,
    //             'created_at' => $msg->created_at->format('Y-m-d H:i:s')
    //         ];
    //     });

    //     return response()->json($messages);
    // }

    public function fetchMessages(Request $request, $username)
    {
        $receiver = User::where('username', $username)->firstOrFail();
        $query = Message::where(function ($q) use ($receiver) {
            $q->where('from_user_id', Auth::id())->where('to_user_id', $receiver->id);
        })
            ->orWhere(function ($q) use ($receiver) {
                $q->where('from_user_id', $receiver->id)->where('to_user_id', Auth::id());
            });

        // Ambil hanya pesan baru berdasarkan waktu terakhir
        if ($request->has('last_time')) {
            $query->where('created_at', '>', $request->last_time);
        }

        $messages = $query->orderBy('created_at', 'asc')->get()->map(function ($msg) {
            // Mengambil URL gambar profil pengguna
            $profilePicture = 'img/profilePicture/' . $msg->fromUser->profile_picture ?? 'img/profilePicture/default.jpg';
            return [
                'from_user_id' => $msg->from_user_id,
                'from_user_name' => $msg->fromUser->name,
                'profile_picture' => asset($profilePicture), // Menambahkan URL gambar profil
                'message' => $msg->message,
                'created_at' => $msg->created_at->format('Y-m-d H:i:s')
            ];
        });

        return response()->json($messages);
    }


    // Kirim pesan baru
    public function sendMessage(Request $request)
    {
        $request->validate([
            'to_user_id' => 'required|exists:users,id',
            'message' => 'required|string'
        ]);

        Message::create([
            'from_user_id' => Auth::id(),
            'to_user_id' => $request->to_user_id,
            'message' => $request->message
        ]);

        return response()->json(['success' => true]);
    }
}
