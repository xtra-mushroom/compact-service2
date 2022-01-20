Login
username : admin
password : admin

Pendaftaran
1. Nomor pendaftaran tidak perlu diisi karena auto increment
2. Input data akan masuk ke table pendaftaran, dengan nomor sambungan masih kosong, karena calon pelanggan belum terdaftar di pemasangan

Pemasangan
1. Generate nomor sambungan menghitung num_rows dari table pelanggan
2. input data akan masuk ke table pemasangan dan table pelanggan, nomor sambungan yang diperoleh akan masuk ke kolom no_ds di table pendaftaran dan table pelanggan
3. Input nama, kecamatan, desa, akan otomatis terisi jika nik / nomor ktp yang diinput telah terdaftar di tahap pendaftaran, bila nik belum terdaftar maka data tidak akan muncul

Buka tutup
1. Input nama, alamat dll akan otomatis terisi jika no_ds sudah terdaftar di table pelanggan, keterangan diisi sesuai kondisi dan tanggal diisi sesuai hari penginputan data
2. Input data bisa sekaligus digunakan untuk cek status (terbuka atau tertutup), jadi tidak perlu form cari data lagi
3. Cetak surat perintah akan sesuai dengan status, jika status tertutup maka yang akan dicetak adalah surat perintah penutupan, dan sebaliknya
4. Input data akan masuk ke table pembukaan / penutupan, sesuai menu yang dipilih

Balik nama
1. Input ds akan otomatis mengisi data pelanggan semula, data-data pelanggan baru diisi manual
2. Data pelanggan semula dan data pelanggan baru akan tersimpan di table baliknama
