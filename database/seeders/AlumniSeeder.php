<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AlumniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alumniData = [
            ['name' => 'Muhammad Ariff bin Zulkifli', 'student_id' => '2014582', 'graduation_year' => 2024, 'program' => 'BCS', 'state' => 'Selangor', 'current_position' => 'Junior Web Developer'],
            ['name' => 'Nurul Izzah binti Ahmad', 'student_id' => '1928471', 'graduation_year' => 2023, 'program' => 'BIT', 'state' => 'Johor', 'current_position' => 'System Analyst'],
            ['name' => 'Ahmad Syamil bin Roslan', 'student_id' => '1837492', 'graduation_year' => 2022, 'program' => 'BCS', 'state' => 'Kuala Lumpur', 'current_position' => 'Security Engineer'],
            ['name' => 'Siti Norhaliza binti Bakri', 'student_id' => '2119384', 'graduation_year' => 2025, 'program' => 'BIT', 'state' => 'Penang', 'current_position' => 'Intern IT Support'],
            ['name' => 'Muhammad Luqman bin Hakim', 'student_id' => '1728394', 'graduation_year' => 2021, 'program' => 'BCS', 'state' => 'Melaka', 'current_position' => 'Full Stack Developer'],
            ['name' => 'Nurul Syahirah binti Mazlan', 'student_id' => '2019283', 'graduation_year' => 2024, 'program' => 'BIT', 'state' => 'Pahang', 'current_position' => 'UI/UX Designer'],
            ['name' => 'Mohd Firdaus bin Abdul Rahman', 'student_id' => '1938475', 'graduation_year' => 2023, 'program' => 'BCS', 'state' => 'Terengganu', 'current_position' => 'Network Engineer'],
            ['name' => 'Anis Syaqila binti Idris', 'student_id' => '1827364', 'graduation_year' => 2022, 'program' => 'BIT', 'state' => 'Kedah', 'current_position' => 'IT Project Coordinator'],
            ['name' => 'Muhammad Hafiz bin Ismail', 'student_id' => '2028374', 'graduation_year' => 2024, 'program' => 'BCS', 'state' => 'Perak', 'current_position' => 'Mobile Developer'],
            ['name' => 'Nurul Hidayah binti Hassan', 'student_id' => '1738495', 'graduation_year' => 2021, 'program' => 'BIT', 'state' => 'Kelantan', 'current_position' => 'Database Admin'],
            ['name' => 'Ahmad Faiz bin Mustafa', 'student_id' => '1918273', 'graduation_year' => 2023, 'program' => 'BCS', 'state' => 'Perlis', 'current_position' => 'SOC Analyst'],
            ['name' => 'Siti Fatimah binti Rosli', 'student_id' => '1817263', 'graduation_year' => 2022, 'program' => 'BIT', 'state' => 'Negeri Sembilan', 'current_position' => 'IT Business Analyst'],
            ['name' => 'Muhammad Zaki bin Harun', 'student_id' => '2128374', 'graduation_year' => 2025, 'program' => 'BCS', 'state' => 'Sabah', 'current_position' => 'Software Engineer'],
            ['name' => 'Nurul Ain binti Mohammad', 'student_id' => '2038475', 'graduation_year' => 2024, 'program' => 'BIT', 'state' => 'Sarawak', 'current_position' => 'IT Consultant'],
            ['name' => 'Mohd Shahrul bin Zainal', 'student_id' => '1948576', 'graduation_year' => 2023, 'program' => 'BCS', 'state' => 'Putrajaya', 'current_position' => 'Penetration Tester'],
            ['name' => 'Farah Diana binti Azman', 'student_id' => '1847586', 'graduation_year' => 2022, 'program' => 'BIT', 'state' => 'Selangor', 'current_position' => 'Digital Marketer'],
            ['name' => 'Muhammad Amir bin Salleh', 'student_id' => '1748596', 'graduation_year' => 2021, 'program' => 'BCS', 'state' => 'Kuala Lumpur', 'current_position' => 'DevOps Engineer'],
            ['name' => 'Nurhayati binti Kamaruddin', 'student_id' => '2017263', 'graduation_year' => 2024, 'program' => 'BIT', 'state' => 'Johor', 'current_position' => 'Helpdesk Lead'],
            ['name' => 'Ahmad Ridzuan bin Yusof', 'student_id' => '1928374', 'graduation_year' => 2023, 'program' => 'BCS', 'state' => 'Penang', 'current_position' => 'Forensic Specialist'],
            ['name' => 'Siti Aminah binti Sulaiman', 'student_id' => '1829384', 'graduation_year' => 2022, 'program' => 'BIT', 'state' => 'Perak', 'current_position' => 'Systems Administrator'],
            ['name' => 'Muhammad Danish bin Rizal', 'student_id' => '2117263', 'graduation_year' => 2025, 'program' => 'BCS', 'state' => 'Selangor', 'current_position' => 'Application Developer'],
            ['name' => 'Nurul Farah binti Zahari', 'student_id' => '2029384', 'graduation_year' => 2024, 'program' => 'BIT', 'state' => 'Melaka', 'current_position' => 'Web Content Manager'],
            ['name' => 'Mohd Khairul bin Anuar', 'student_id' => '1939485', 'graduation_year' => 2023, 'program' => 'BCS', 'state' => 'Pahang', 'current_position' => 'IT Auditor'],
            ['name' => 'Sharifah binti Syed Ali', 'student_id' => '1839485', 'graduation_year' => 2022, 'program' => 'BIT', 'state' => 'Kedah', 'current_position' => 'IT Executive'],
            ['name' => 'Muhammad Ikram bin Ibrahim', 'student_id' => '1739485', 'graduation_year' => 2021, 'program' => 'BCS', 'state' => 'Johor', 'current_position' => 'Backend Developer'],
            ['name' => 'Nurul Syazwani binti Osman', 'student_id' => '2049586', 'graduation_year' => 2024, 'program' => 'BIT', 'state' => 'Terengganu', 'current_position' => 'Systems Support'],
            ['name' => 'Ahmad Taufiq bin Rahman', 'student_id' => '1959687', 'graduation_year' => 2023, 'program' => 'BCS', 'state' => 'Kelantan', 'current_position' => 'Cloud Specialist'],
            ['name' => 'Siti Khadijah binti Ismail', 'student_id' => '1859687', 'graduation_year' => 2022, 'program' => 'BIT', 'state' => 'Selangor', 'current_position' => 'Data Analyst'],
            ['name' => 'Muhammad Alif bin Azahar', 'student_id' => '2129384', 'graduation_year' => 2025, 'program' => 'BCS', 'state' => 'Kuala Lumpur', 'current_position' => 'Game Developer'],
            ['name' => 'Nurul Batrisya binti Hamzah', 'student_id' => '2059687', 'graduation_year' => 2024, 'program' => 'BIT', 'state' => 'Sabah', 'current_position' => 'IT Trainer'],
        ];

        foreach ($alumniData as $data) {
            // Generate basic email from name
            $email = strtolower(str_replace(' ', '.', $data['name'])) . '@example.com';

            User::create([
                'name' => $data['name'],
                'email' => $email,
                'password' => Hash::make('password123'),
                'role' => 'alumni',
                'student_id' => $data['student_id'],
                'graduation_year' => $data['graduation_year'],
                'program' => $data['program'],
                'state' => $data['state'],
                'current_position' => $data['current_position'],
                'race' => 'Malay', // Since they are Muslim names
                'gender' => strpos($data['name'], 'binti') !== false ? 'Female' : 'Male',
            ]);
        }
    }
}
