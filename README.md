
# OniRoom





![logo](https://github.com/AditRizkii/RunDev/assets/111619251/a78937e1-cadf-4021-a24c-53d111b51769)
# Anggota

| Nama        | NPM           |
| ------------- |:-------------:|
| Aditya Rizki Ramadhan      | 2108107010002 |
| Putri Ulfayani      | 2108107010004 |
| Sofia      | 2108107010006 |
| Khairul Auni | 2108107010016 |
| Tyara Raynasari | 2108107010030 |
| Teuku Rifal Aulia | 2108107010064 | 

## About OniRoom

OniRoom merupakan sebuah aplikasi berbasis website yang dibuat untuk memudahkan komunikasi antar Organisasi Mahasiswa (ORMAWA) di dalam ruang lingkup Fakultas MIPA (FMIPA) Universitas Syiah Kuala. Website ini dapat digunakan oleh mahasiswa sebagai viewer, lalu DPH dari tiap himpunan dan Ormawa nya sebagai editor dan viewer. Untuk mahasiswa yang belum bisa mengedit, dapat dijadikan editor oleh admin. 


## Installation

pre-requisite
- Install aplikasi XAMPP untuk menghidupkan web server dan db server
- Install Composer 
- Install Node.js 

#### Clone repositori ini terlebih dahulu di dalam folder htdocs
```bash
  https://github.com/AditRizkii/RunDev.git
```
#### Masuk ke dalam folder
```bash
  cd RunDev
```
#### Jalankan composer Install
```bash
  composer install
```
#### Jalankan npm update
```bash
  npm update
```
#### Copy file .env.example menjadi .env
```bash
  cp .env.example .env
```
#### Aktifkan kunci menggunakan command artisan
```bash
  php artisan key:generate
```
#### Di dalam file .env ubahlah nama database menjadi rundev dan sesuaikan username dengan password    
```bash
  DB_DATABASE=rundev
  DB_USERNAME=<username mysql>
  DB_PASSWORD=<password>
```
#### Buatlah database menggunakan mysql/ RDBMS    
```bash
  create database rundev
```
#### Install package Alert    
```bash
  composer require realrashid/sweet-alert
```
#### Migration    
```bash
  php artisan migrate:fresh --seed
```
#### Menjalankan vite assets    
```bash
  npm run dev
```
#### Buka terminal baru dan jalankan     
```bash
  php artisan serve
```
## Tech Stack

**Framework:** BootStrap, Laravel, JQuery

**Server:** NodeJS



## Features

- Informasi Kontak Ormawa
- Post Flyer Event
- Chat 
- Kirim Surat
- Forum Antar Ormawa
