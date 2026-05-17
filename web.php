<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// 1. ANA SƏHİFƏ: Müəllim əsas linkə girəndə dizayn paneli açılır
Route::get('/', function () {
    return view('dashboard');
});

// 2. REZERVASİYA VƏ QİYMƏT HESABLAMA (Vizual Panel formasında)
Route::get('/booking-confirm', function (Request $request) {
    $checkIn = $request->input('check_in', '2026-05-17');
    $checkOut = $request->input('check_out', '2026-05-20');
    $roomType = $request->input('room_type', 'standard');

    $cIn = new DateTime($checkIn);
    $cOut = new DateTime($checkOut);
    $days = $cIn->diff($cOut)->days;
    if($days <= 0) $days = 1;

    $price = 50;
    if ($roomType == 'luxury') $price = 120;
    if ($roomType == 'king') $price = 250;
    $total = $days * $price;

    // Qara ekran çıxmasın deyə məlumatları dizaynın içinə göndəririk:
    return "
    <body style='background:#1e293b; color:white; font-family:Arial; padding:40px; text-align:center;'>
        <div style='background:#0f172a; padding:30px; border-radius:12px; display:inline-block; border:1px solid #334155;'>
            <h2 style='color:#38bdf8;'>🎉 Rezervasiya Uğurla Hesablandı!</h2>
            <p><b>Otaq Növü:</b> " . strtoupper($roomType) . "</p>
            <p><b>Qalacağınız Gün:</b> " . $days . " gün</p>
            <p><b>Günlük Qiymət:</b> " . $price . " AZN</p>
            <hr style='border-color:#334155;'>
            <h3 style='color:#4ade80;'>Toplam Ödəniş: " . $total . " AZN</h3>
            <a href='/' style='color:#38bdf8; text-decoration:none;'>⬅️ Panelə Qayıt</a>
        </div>
    </body>";
});

// 3. GİRİŞ (Check-in) LİNKİ
Route::get('/booking-checkin', function () {
    return "
    <body style='background:#1e293b; color:white; font-family:Arial; padding:40px; text-align:center;'>
        <div style='background:#0f172a; padding:30px; border-radius:12px; display:inline-block; border:1px solid #334155;'>
            <h2 style='color:#4ade80;'>🔑 Qeydiyyat (Check-in) Aktivdir</h2>
            <p>Müştəri otağın açarlarını təhvil aldı və otağa yerləşdi.</p>
            <p><b>Otaq Statusu:</b> <span style='color:#f87171;'>Dolu (Məşğul)</span></p>
            <a href='/' style='color:#38bdf8; text-decoration:none;'>⬅️ Panelə Qayıt</a>
        </div>
    </body>";
});

// 4. ÇIXIŞ (Check-out) LİNKİ
Route::get('/booking-checkout', function () {
    return "
    <body style='background:#1e293b; color:white; font-family:Arial; padding:40px; text-align:center;'>
        <div style='background:#0f172a; padding:30px; border-radius:12px; display:inline-block; border:1px solid #334155;'>
            <h2 style='color:#fbbf24;'>🧹 Çıxış (Check-out) Tamamlandı</h2>
            <p>Müştəri oteldən ayrıldı. Ödəniş qəbul edildi.</p>
            <p><b>Otaq Statusu:</b> <span style='color:#4ade80;'>Boşdur - Təmizliyə Göndərildi</span></p>
            <a href='/' style='color:#38bdf8; text-decoration:none;'>⬅️ Panelə Qayıt</a>
        </div>
    </body>";
});

// 5. MENECER HESABAT PANELİ LİNKİ
Route::get('/manager-reports', function () {
    return "
    <body style='background:#1e293b; color:white; font-family:Arial; padding:40px; text-align:center;'>
        <div style='background:#0f172a; padding:30px; border-radius:12px; display:inline-block; border:1px solid #334155; text-align:left;'>
            <h2 style='color:#38bdf8; text-align:center;'>📊 Otel Aylıq Maliyyə Hesabatı</h2>
            <p><b>Hesabat Tarixi:</b> May 2026</p>
            <p><b>Ümumi Qazanc:</b> <span style='color:#4ade80;'>4,250 AZN</span></p>
            <p><b>Otel Doluluq Faizi:</b> 40%</p>
            <p><b>Boş Otaq Sayı:</b> 6 Otaq</p>
            <div style='text-align:center; margin-top:20px;'>
                <a href='/' style='color:#38bdf8; text-decoration:none;'>⬅️ Panelə Qayıt</a>
            </div>
        </div>
    </body>";
});
