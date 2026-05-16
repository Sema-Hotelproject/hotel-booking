<?php

use Illuminate\Support\Facades\Route;

// 1. Mövcudluq və qiymət yoxlama linkimiz (Bayaq işlətdiyimiz)
Route::get('/test-room', function() {
    $date1 = \Carbon\Carbon::parse('2026-06-01');
    $date2 = \Carbon\Carbon::parse('2026-06-05');
    $days = $date1->diffInDays($date2); 
    $totalPrice = $days * 50; 

    return response()->json([
        'status' => 'success',
        'message' => 'Otaq boşdur. Rezervasiya edə bilərsiniz.',
        'total_price' => $totalPrice . ' AZN'
    ]);
});

// 2. REZERVASIYA TƏSDİQİ: Müştəri otağı təsdiqləyir və status "confirmed" olur
Route::get('/booking-confirm', function() {
    // Burada simulyasiya edirik: Müştəri "Məmməd" otağı tutdu
    return response()->json([
        'status' => 'confirmed',
        'message' => 'Rezervasiyanız uğurla təsdiqləndi!',
        'details' => [
            'customer' => 'Məmməd Əliyev',
            'room' => 'Otaq 101 (Standart)',
            'booking_status' => 'Confirmed (Təsdiqləndi)'
        ]
    ]);
});

// 3. CHECK-IN STATUSU: Müştəri otelə gəldi və otağa yerləşdi
Route::get('/booking-checkin', function() {
    // Menecer düyməyə basır və müştəri içəri girir
    return response()->json([
        'status' => 'checked_in',
        'message' => 'Müştəri otelə giriş etdi. Otaq açarları təhvil verildi.',
        'room_status' => 'Occupied (Dolu)',
        'booking_status' => 'Checked In (Giriş edildi)'
    ]);
});

// 4. CHECK-OUT STATUSU: Müştəri oteldən çıxır və otaq boşalır
Route::get('/booking-checkout', function() {
    // Müştəri hesabı ödəyib çıxır
    return response()->json([
        'status' => 'checked_out',
        'message' => 'Müştəri oteldən çıxış etdi. Rezervasiya tamamlandı.',
        'room_status' => 'Available (Boşdur - Təmizliyə göndərildi)',
        'booking_status' => 'Checked Out (Çıxış edildi)'
    ]);
});
// 5. MENECER PANELİ HESABATLARI: Qazanc və Doluluq Hesabatı
Route::get('/manager-reports', function() {
    // Burada menecer üçün simulyasiya datası hazırlayırıq
    $totalEarnings = 4250; // Ümumi qazanc (AZN)
    $totalRooms = 10;     // Oteldəki ümumi otaq sayı
    $occupiedRooms = 4;   // Hazırda dolu olan otaq sayı
    
    // Doluluq faizini hesablayırıq
    $occupancyRate = ($occupiedRooms / $totalRooms) * 100; // 40%

    return response()->json([
        'report_title' => 'OTEL MENECER HESABAT PANELİ',
        'generated_at' => 'May 2026',
        'financials' => [
            'total_revenue' => $totalEarnings . ' AZN',
            'average_revenue_per_room' => ($totalEarnings / $totalRooms) . ' AZN'
        ],
        'occupancy_stats' => [
            'total_rooms' => $totalRooms,
            'occupied_rooms' => $occupiedRooms,
            'free_rooms' => $totalRooms - $occupiedRooms,
            'occupancy_rate' => $occupancyRate . '%' // Doluluq faizi
        ],
        'popular_room_type' => 'Lyuks (Ən çox gəlir gətirən)'
    ]);
});