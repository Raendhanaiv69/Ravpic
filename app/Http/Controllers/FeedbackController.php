<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FeedbackController extends Controller
{
    public function sendToTelegram(Request $request)
    {
        $request->validate([
            'sender_name' => 'nullable|string|max:50',
            'category'    => 'required|string',
            'message'     => 'required|string|max:1000',
        ]);

        $botToken = env('TELEGRAM_BOT_TOKEN');
        $chatId   = env('TELEGRAM_CHAT_ID');

        // Jika tidak diisi, otomatis Anonim / Nama samaran
        $sender = $request->filled('sender_name') ? $request->sender_name : 'Anonim (Dirahasiakan)';

        $text = "💌 *PESAN BARU - MAWSNAPBOOTH*\n"
              . "━━━━━━━━━━━━━━━━━━━━━━\n"
              . "👤 *Dari:* " . htmlspecialchars($sender) . "\n"
              . "📌 *Kategori:* " . htmlspecialchars($request->category) . "\n"
              . "⏰ *Waktu:* " . now()->setTimezone('Asia/Jakarta')->format('d M Y, H:i') . " WIB\n"
              . "━━━━━━━━━━━━━━━━━━━━━━\n"
              . "💬 *Pesan:*\n"
              . "_" . htmlspecialchars($request->message) . "_\n"
              . "━━━━━━━━━━━━━━━━━━━━━━";

        try {
            $response = Http::post("https://api.telegram.org/bot{$botToken}/sendMessage", [
                'chat_id'    => $chatId,
                'text'       => $text,
                'parse_mode' => 'Markdown',
            ]);

            if ($response->successful()) {
                return response()->json([
                    'status'  => 'success',
                    'message' => 'Pesan kamu berhasil terkirim ke Telegram dev! Makasih ya 💖'
                ]);
            }

            return response()->json([
                'status'  => 'error',
                'message' => 'Gagal mengirim ke Telegram. Coba lagi nanti ya!'
            ], 500);

        } catch (\Exception $e) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Terjadi kesalahan sistem: ' . $e->getMessage()
            ], 500);
        }
    }
}