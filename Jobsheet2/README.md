# Jobsheet 2 — Basic CSS3 Styling (SIMPUS-Mini)

Sub-CPMK: Mengimplementasikan styling dasar dengan CSS3.

## Perubahan dari Jobsheet 1

- File baru `assets/css/style.css` — CSS reset & box model, Flexbox untuk navbar,
  CSS Grid untuk kartu statistik di halaman Beranda, styling tabel, form, dan footer.
- Setiap halaman `.html` ditambah satu baris `<link rel="stylesheet">` di dalam `<head>`,
  dengan path relatif menyesuaikan kedalaman folder file tersebut.
- **Struktur HTML tidak diubah sama sekali** — hanya tampilannya.

## Path CSS per file

| File | Lokasi | href |
|---|---|---|
| `index.html` | folder root | `assets/css/style.css` |
| `books/list.html` | dalam `books/` | `../assets/css/style.css` |
| `books/add.html` | dalam `books/` | `../assets/css/style.css` |
| `members/list.html` | dalam `members/` | `../assets/css/style.css` |
| `members/add.html` | dalam `members/` | `../assets/css/style.css` |

## Cara menjalankan

Buka `index.html` langsung di browser. Belum butuh web server.

## Catatan

- Kartu statistik di Beranda memakai selektor `main section:nth-of-type(2)`
  sebagai grid 3 kolom — berbasis posisi, bukan `class`.
- Selektor dibuat generik (tag semantic + pseudo-class posisi) supaya styling yang sama
  otomatis berlaku juga di halaman Members tanpa menduplikasi class.
- Warna tema `#1d5b8a` dipakai berulang di header, judul section, angka kartu statistik,
  header tabel, dan tombol submit.
