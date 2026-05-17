<!DOCTYPE html>
<html lang="az">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Otel Menecer Paneli</title>
    <style>
        /* İnternetsiz işləyən daxili dizayn kodları */
        body {
            font-family: Arial, sans-serif;
            background-color: #1e293b;
            color: #f8fafc;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-w: 900px;
            margin: 0 auto;
            background-color: #0f172a;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.3);
        }
        h1 { color: #38bdf8; text-align: center; margin-bottom: 5px; }
        .subtitle { text-align: center; color: #94a3b8; margin-bottom: 30px; font-size: 14px; }
        
        /* Kartların düzülüşü */
        .grid {
            display: flex;
            gap: 20px;
            justify-content: space-between;
            margin-bottom: 30px;
        }
        .card {
            background-color: #1e293b;
            padding: 20px;
            border-radius: 8px;
            width: 30%;
            text-align: center;
            border: 1px solid #334155;
        }
        .card h3 { margin: 0; font-size: 14px; color: #94a3b8; text-transform: uppercase; }
        .card p { margin: 10px 0 0 0; font-size: 24px; font-weight: bold; color: #4ade80; }
        
        /* Forma dizaynı */
        .form-box {
            background-color: #1e293b;
            padding: 20px;
            border-radius: 8px;
            border: 1px solid #334155;
        }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-size: 14px; color: #cbd5e1; }
        input, select {
            width: 100%;
            padding: 10px;
            background-color: #0f172a;
            border: 1px solid #475569;
            color: white;
            border-radius: 6px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #0284c7;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }
        button:hover { background-color: #0369a1; }
    </style>
</head>
<body>

    <div class="container">
        <h1>🏨 GRAND HOTEL</h1>
        <p class="subtitle">Avtomatlaşdırılmış Menecer və Analitika Paneli</p>

        <div class="grid">
            <div class="card">
                <h3>Toplam Gəlir</h3>
                <p>12,450 AZN</p>
            </div>
            <div class="card">
                <h3>Aktiv Rezervasiya</h3>
                <p style="color: #38bdf8;">18 Otaq</p>
            </div>
            <div class="card">
                <h3>Boş Otaqlar</h3>
                <p style="color: #fbbf24;">7 Otaq</p>
            </div>
        </div>

        <div class="form-box">
            <h3 style="margin-top:0; color:#38bdf8;">🔮 Canlı Qiymət Hesablama Testi (Alqoritm)</h3>
            <form action="/booking-confirm" method="GET">
                <div class="form-group">
                    <label>Giriş Tarixi</label>
                    <input type="date" name="check_in" required>
                </div>
                <div class="form-group">
                    <label>Çıxış Tarixi</label>
                    <input type="date" name="check_out" required>
                </div>
                <div class="form-group">
                    <label>Otaq Kateqoriyası</label>
                    <select name="room_type">
                        <option value="standard">Standard Oda (50 AZN / gün)</option>
                        <option value="luxury">Lüks Oda (120 AZN / gün)</option>
                        <option value="king">Kral Dairəsi (250 AZN / gün)</option>
                    </select>
                </div>
                <button type="submit">Rezervasiya Et və Qiyməti Hesabla</button>
            </form>
        </div>
    </div>

</body>
</html>
