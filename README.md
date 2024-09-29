# TECHNICAL TEST APLIKASI KLAIM LOB

## 1.Jalankan terlebih dahulu migrasinya

```bash
php artisan migrate
```

## 2.Setelah itu jalan terlebih dahulu seedernya 

```bash
php artisan db:seed --class=WilayahKerjaSeeder
```

```bash
php artisan db:seed --class=DataKlaimLobSeeder
```

## 3.Jalankan aplikasi
```bash
php artisan serve
```

# 4. Screen Shoot

### Berikut interface point no 4: 
![point4](https://github.com/user-attachments/assets/71c513b5-607c-47e0-987b-8c6631216852)

### Berikut screen shoot API untuk 
Berikut Endpoint API untuk mengirim data klaim LOB KUR dan PEN ke database penampungan :
paste di browser atau POSTMAN atau THUNDERCLIENT
```bash
http://localhost:8000/api/kirim-claim-ke-penampungan
```
![point5](https://github.com/user-attachments/assets/e99ba51f-458b-431f-92f7-64b75334fc10)


## 5.Untuk menjalankan unit testing 
```bash
php artisan test
```
