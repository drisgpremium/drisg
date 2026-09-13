DR. İSG TANITIM SİTESİ V3

İçerik:
- index.html
- Dr-ISG.apk
- assets/app-icon.jpg
- assets/logo.jpg

Yayınlama:
1) Klasörün tamamını hosting alanınıza yükleyin.
2) index.html ana sayfa olarak çalışır.
3) APK indirme butonu aynı klasördeki Dr-ISG.apk dosyasını indirir.

Google Play:
index.html içindeki:
const PLAY_STORE_URL = "";
satırına Play Store bağlantısını eklediğinizde:
- Google Play butonu aktif olur.
- QR kodu otomatik olarak Play Store adresini gösterir.

QR:
Play Store adresi girilmezse QR kod mevcut web sayfasını açar.
