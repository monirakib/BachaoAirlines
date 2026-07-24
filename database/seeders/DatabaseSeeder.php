<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            ['user_id' => 32, 'first_name' => 'Imteshar', 'last_name' => 'Ahmed', 'email' => 'ia.yamin@gmail.com', 'password' => '$2y$10$E0suJsoKM5jpwsoWdS7SmOt0GuuGm76vU82186/8jU5yRA8Zxiq9G', 'date_of_birth' => '2002-02-05', 'gender' => 'male', 'phone' => '01855211622', 'user_type' => 'Admin', 'reward_point' => 1030, 'membership_level' => 'Gold', 'created_at' => '2025-01-03 10:47:34'],
            ['user_id' => 35, 'first_name' => 'Monir', 'last_name' => 'Akib', 'email' => 'monirakib@gmail.com', 'password' => '$2y$10$euRBKoWIS7zHOCmnBLuMfubyeiMJdCum5WBVUnGPGtlSe59X7mhce', 'date_of_birth' => '2001-09-09', 'gender' => 'male', 'phone' => '01705502194', 'user_type' => 'Admin', 'reward_point' => 1400, 'membership_level' => 'Gold', 'created_at' => '2025-01-03 12:07:19'],
            ['user_id' => 37, 'first_name' => 'Ifaz', 'last_name' => 'Alamgir', 'email' => 'ifaz@gmail.com', 'password' => '$2y$10$RWXr8bojQfZFOxZJ9zJz8.4e28VGpzs4wf0hv7Pqbjv0.CUEK9ZF2', 'date_of_birth' => '2002-01-07', 'gender' => 'male', 'phone' => '01818181811', 'user_type' => 'Customer', 'reward_point' => 140, 'membership_level' => 'Bronze', 'created_at' => '2025-01-03 17:51:43'],
            ['user_id' => 38, 'first_name' => 'Rabib', 'last_name' => 'Hasan', 'email' => 'rababechan@gmail.com', 'password' => '$2y$10$ln/xbzkILUysuetdVAoMqeIkEkqEPIjFWZTh0KTNEaDvp3RAiTNfG', 'date_of_birth' => '2002-10-15', 'gender' => 'male', 'phone' => '01739933678', 'user_type' => 'Customer', 'reward_point' => 160, 'membership_level' => 'Bronze', 'created_at' => '2025-01-03 18:17:57'],
            ['user_id' => 40, 'first_name' => 'Mini', 'last_name' => 'Clips', 'email' => 'mini@gmail.com', 'password' => '$2y$10$o4to6ptDH7M7mvKusNn9nOLOhIYHq0YkOFUYJzcnT2eFpF1GX.WiK', 'date_of_birth' => '2025-01-08', 'gender' => 'male', 'phone' => '01818181811', 'user_type' => 'Customer', 'reward_point' => 340, 'membership_level' => 'Bronze', 'created_at' => '2025-01-05 13:07:33'],
        ]);
        DB::statement('ALTER TABLE users AUTO_INCREMENT = 41');

        DB::table('flights')->insert([
            ['Start_time' => '19:00:00', 'Duration' => '45min', 'End_time' => '19:45:00', 'Flight_from' => 'CGP', 'Type' => 'Non-stop', 'Flight_to' => 'DHK', 'Start_date' => '2024-12-30', 'Land_date' => '2024-12-30', 'Flight_ID' => 'TBACAO001', 'Price' => 3500],
            ['Start_time' => '14:00:00', 'Duration' => '45min', 'End_time' => '14:45:00', 'Flight_from' => 'DHK', 'Type' => 'Non-stop', 'Flight_to' => 'CGP', 'Start_date' => '2024-12-31', 'Land_date' => '2024-12-31', 'Flight_ID' => 'TBACAO002', 'Price' => 3205],
            ['Start_time' => '20:00:00', 'Duration' => '30min', 'End_time' => '20:30:00', 'Flight_from' => 'DHK', 'Type' => 'Non-stop', 'Flight_to' => 'COX', 'Start_date' => '2025-01-01', 'Land_date' => '2025-01-01', 'Flight_ID' => 'TBACAO003', 'Price' => 3870],
            ['Start_time' => '15:30:00', 'Duration' => '1hour 15min', 'End_time' => '16:45:00', 'Flight_from' => 'COX', 'Type' => 'Non-stop', 'Flight_to' => 'DHK', 'Start_date' => '2025-01-02', 'Land_date' => '2025-01-02', 'Flight_ID' => 'TBACAO004', 'Price' => 3750],
            ['Start_time' => '19:00:00', 'Duration' => '45min', 'End_time' => '19:45:00', 'Flight_from' => 'DHK', 'Type' => 'Non-stop', 'Flight_to' => 'CGP', 'Start_date' => '2025-01-02', 'Land_date' => '2025-01-02', 'Flight_ID' => 'TBACAO005', 'Price' => 3905],
            ['Start_time' => '08:00:00', 'Duration' => '55min', 'End_time' => '20:55:00', 'Flight_from' => 'CGP', 'Type' => 'Non-stop', 'Flight_to' => 'DHK', 'Start_date' => '2025-01-03', 'Land_date' => '2025-01-03', 'Flight_ID' => 'TBACAO006', 'Price' => 3205],
            ['Start_time' => '09:35:00', 'Duration' => '1hour', 'End_time' => '10:35:00', 'Flight_from' => 'DHK', 'Type' => 'Non-stop', 'Flight_to' => 'SYL', 'Start_date' => '2025-01-04', 'Land_date' => '2025-01-04', 'Flight_ID' => 'TBACAO007', 'Price' => 4000],
            ['Start_time' => '20:00:00', 'Duration' => '1hour', 'End_time' => '21:00:00', 'Flight_from' => 'SYL', 'Type' => 'Non-stop', 'Flight_to' => 'DHK', 'Start_date' => '2025-01-04', 'Land_date' => '2025-01-04', 'Flight_ID' => 'TBACAO008', 'Price' => 4310],
            ['Start_time' => '02:00:00', 'Duration' => '20hours 10min', 'End_time' => '22:10:00', 'Flight_from' => 'DHK', 'Type' => 'Non-stop', 'Flight_to' => 'SYD', 'Start_date' => '2025-01-09', 'Land_date' => '2025-01-09', 'Flight_ID' => 'TBACAO010', 'Price' => 130000],
        ]);

        DB::table('transactions')->insert([
            ['id' => 76, 'user_id' => 35, 'flight_id' => 'TBACAO001', 'passenger_name' => 'Monir Akib', 'email' => 'monirakib@gmail.com', 'phone' => '01705502194', 'passport_number' => '15123637372', 'seat_number' => '1A', 'seat_type' => 'window', 'payment_method' => 'bkash', 'payment_number' => '01705502194', 'amount' => 3325.00, 'total_amount' => 5325.00, 'status' => 'pending', 'created_at' => '2025-01-04 14:35:55', 'insurance_amount' => 2000],
            ['id' => 77, 'user_id' => 32, 'flight_id' => 'TBACAO001', 'passenger_name' => 'Imteshar Ahmed', 'email' => 'ia.yamin@gmail.com', 'phone' => '01855211622', 'passport_number' => '15123637372', 'seat_number' => '1F', 'seat_type' => 'window', 'payment_method' => 'bkash', 'payment_number' => '01855211622', 'amount' => 3500.00, 'total_amount' => 4000.00, 'status' => 'pending', 'created_at' => '2025-01-04 14:36:44', 'insurance_amount' => 500],
            ['id' => 79, 'user_id' => 35, 'flight_id' => 'TBACAO003', 'passenger_name' => 'Monir Akib', 'email' => 'monirakib@gmail.com', 'phone' => '01705502194', 'passport_number' => '15123637372', 'seat_number' => '6B', 'seat_type' => 'middle', 'payment_method' => 'bkash', 'payment_number' => '01705502194', 'amount' => 3676.00, 'total_amount' => 3676.00, 'status' => 'pending', 'created_at' => '2025-01-04 17:15:49', 'insurance_amount' => 0],
            ['id' => 81, 'user_id' => 40, 'flight_id' => 'TBACAO001', 'passenger_name' => 'Mini Clips', 'email' => 'mini@gmail.com', 'phone' => '01818181811', 'passport_number' => '15123637372', 'seat_number' => '1C', 'seat_type' => 'aisle', 'payment_method' => 'credit', 'payment_number' => '01855211622', 'amount' => 3500.00, 'total_amount' => 4000.00, 'status' => 'pending', 'created_at' => '2025-01-05 13:08:31', 'insurance_amount' => 500],
            ['id' => 82, 'user_id' => 40, 'flight_id' => 'TBACAO002', 'passenger_name' => 'Mini Clips', 'email' => 'mini@gmail.com', 'phone' => '01739933678', 'passport_number' => '15123637372', 'seat_number' => '1A', 'seat_type' => 'window', 'payment_method' => 'bkash', 'payment_number' => '01705502194', 'amount' => 3205.00, 'total_amount' => 5205.00, 'status' => 'pending', 'created_at' => '2025-01-05 13:08:51', 'insurance_amount' => 2000],
        ]);
        DB::statement('ALTER TABLE transactions AUTO_INCREMENT = 83');

        DB::table('seats')->insert([
            ['id' => 52, 'flight_id' => 'TBACAO001', 'seat_number' => '1A', 'status' => 'booked', 'transaction_id' => 76],
            ['id' => 53, 'flight_id' => 'TBACAO001', 'seat_number' => '1F', 'status' => 'booked', 'transaction_id' => 77],
            ['id' => 55, 'flight_id' => 'TBACAO003', 'seat_number' => '6B', 'status' => 'booked', 'transaction_id' => 79],
            ['id' => 57, 'flight_id' => 'TBACAO001', 'seat_number' => '1C', 'status' => 'booked', 'transaction_id' => 81],
            ['id' => 58, 'flight_id' => 'TBACAO002', 'seat_number' => '1A', 'status' => 'booked', 'transaction_id' => 82],
        ]);
        DB::statement('ALTER TABLE seats AUTO_INCREMENT = 59');

        DB::table('feedback')->insert([
            ['id' => 5, 'name' => 'Saad', 'contact' => '01705502194', 'email' => '', 'country' => '', 'flight_number' => null, 'rating' => 5, 'comments' => 'Exquisite', 'created_at' => '2025-01-03 12:31:45'],
            ['id' => 6, 'name' => 'Ifaz', 'contact' => '135136126', 'email' => '', 'country' => '', 'flight_number' => null, 'rating' => 3, 'comments' => 'Immaculate', 'created_at' => '2025-01-03 17:52:56'],
            ['id' => 7, 'name' => ' Zawad', 'contact' => '01705502194', 'email' => '', 'country' => '', 'flight_number' => null, 'rating' => 5, 'comments' => 'Verrrrrryyyyyyyyy Goooooood', 'created_at' => '2025-01-04 17:14:00'],
        ]);
        DB::statement('ALTER TABLE feedback AUTO_INCREMENT = 8');
    }
}
