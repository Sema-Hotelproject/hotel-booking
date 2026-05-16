# Otel Rezervasiya Sistemi (Backend)

Bu layihə Laravel 11 ilə hazırlanmış otel rezervasiya sisteminin əsas məntiqini əhatə edir.

## Layihəni İşə Salmaq Üçün Sifarişlər:
1. composer install
2. .env faylını yaradın və baza tənzimləmələrini edin.
3. php artisan migrate
4. php artisan db:seed --class=HotelSeeder
5. php artisan serve

## Test Linkləri:
* Rezervasiya və Qiymət Hesablama: http://127.0.0.1:8000/test-room
* Rezervasiya Təsdiqi: http://127.0.0.1:8000/booking-confirm
* Giriş (Check-in): http://127.0.0.1:8000/booking-checkin
* Çıxış (Check-out): http://127.0.0.1:8000/booking-checkout
* Menecer Hesabat Paneli: http://127.0.0.1:8000/manager-reports