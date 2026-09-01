# Jobsheet 1 — HTML5 Semantic Skeleton (SIMPUS-Mini)

Mata Kuliah: Web Programming — Semester 3
Studi kasus: SIMPUS-Mini (sistem perpustakaan mini)

## Isi tahap ini

| File | Fungsi |
|---|---|
| `index.html` | Halaman beranda + ringkasan statistik (data dummy) |
| `books/list.html` | Tabel daftar buku statis |
| `books/add.html` | Form tambah buku (belum diproses) |
| `members/list.html` | Tabel daftar anggota statis (tugas mandiri) |
| `members/add.html` | Form tambah anggota (tugas mandiri) |

## Cara menjalankan

Buka `index.html` langsung di browser (klik dua kali, atau klik kanan → Open with → browser).
Belum butuh web server, belum butuh database.

## Latihan bagian 7.4 yang sudah dikerjakan

1. **Konsistensi menu** — `<nav>` di kelima halaman kini memuat 5 link lengkap:
   Home, Book List, Add Book, Member List, Add Member.
2. **3 baris buku tambahan** di `books/list.html` (total 8 baris) — ditandai komentar HTML.
3. **Kolom baru "Gender"** di tabel `members/list.html`, lengkap dengan `<th>` dan `<td>` di setiap baris.
4. **Field baru "Email"** di `members/add.html` memakai `<input type="email">`, sehingga
   format alamat email divalidasi browser tanpa JavaScript.

## Catatan

- Belum ada CSS dan JavaScript — fokus tahap ini murni pada **struktur semantic**
  (`header`, `nav`, `main`, `section`, `article`, `footer`).
- Tombol Edit/Delete memakai `type="button"` sehingga **belum melakukan apa-apa**.
- `<form>` belum punya atribut `action`/`method`, jadi tombol Save hanya me-reload halaman.
- Penamaan atribut `id` dan `name` (`title`, `author`, `member_no`, `phone_no`, ...)
  sengaja dibuat konsisten karena akan dipakai ulang di jobsheet CSS, JavaScript,
  dan pemrosesan form di sisi server.
