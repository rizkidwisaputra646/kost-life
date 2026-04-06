# 🥐 Kost-Life

**Kost-Life** adalah aplikasi manajemen keuangan cerdas yang dirancang khusus untuk mahasiswa dan anak kost. Dengan antarmuka yang modern, premium, dan intuitif, Kost-Life membantu Anda menjaga keseimbangan antara jajanan harian dan target tabungan bulanan.



## ✨ Fitur Unggulan

*   **🎯 Real-time Budgeting**: Tetapkan budget bulanan dan pantau sisa saldo "aman jajan" secara instan.
*   **📊 Statistik Visual**: Grafik interaktif yang memantau tren pengeluaran Anda selama 7 hari terakhir.
*   **📑 Laporan PDF Sekali Klik**: Unduh riwayat transaksi Anda dalam format PDF profesional untuk audit pribadi atau laporan bulanan.
*   **📱 Desain Mobile-First**: Antarmuka responsif yang dioptimalkan untuk perangkat mobile maupun desktop dengan tema gelap (*premium dark mode*).
*   **🚀 Notifikasi Elegan**: Integrasi SweetAlert2 untuk pengalaman interaksi yang halus dan modern.
*   **📸 Foto Profil Kustom**: Personalisasi akun Anda dengan unggahan foto langsung dari aplikasi.

## 🛠️ Tech Stack

*   **Backend**: Laravel (PHP)
*   **Frontend**: Tailwind CSS, Alpine.js
*   **Database**: MySQL / SQLite
*   **Library**:
    *   `barryvdh/laravel-dompdf` (PDF Generation)
    *   `SweetAlert2` (Alerts & Notifications)

## 🚀 Cara Instalasi

1.  **Clone Repository**
    ```bash
    git clone https://github.com/rizkidwisaputra646/kost-life.git
    cd kost-life
    ```

2.  **Install Dependensi**
    ```bash
    composer install
    npm install
    ```

3.  **Konfigurasi Environment**
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4.  **Migrasi Database**
    ```bash
    php artisan migrate
    ```

5.  **Penyimpanan & Build**
    ```bash
    php artisan storage:link
    npm run build
    ```

6.  **Jalankan Server**
    ```bash
    php artisan serve
    ```

## 📐 Logika Perhitungan (Budget-as-Balance)

Kost-Life menggunakan pendekatan unik di mana saldo yang ditampilkan adalah saldo **periode budget saat ini**.
*   **Saldo** = `(Budget Awal + Total Pemasukan) - Total Pengeluaran`
*   **Sisa Jatah Harian** = `Sisa Saldo / Sisa Hari di Periode Ini`

Hal ini memastikan Anda selalu tahu berapa banyak uang yang benar-benar bisa Anda habiskan setiap harinya agar tetap bertahan sampai akhir bulan.

---

> dikembangkan oleh **Developer** sebagai bagian dari **PKM-PI • Universitas Teknokrat Indonesia (UTI) 2026**.
