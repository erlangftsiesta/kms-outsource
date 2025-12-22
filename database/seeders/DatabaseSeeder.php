<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CommonRequirement;
use App\Models\Job;
use App\Models\JobLocation;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        // Create Categories
        $categories = [
            ['name' => 'Marketing', 'description' => 'Marketing and brand management positions', 'icon' => '📢', 'order' => 1],
            ['name' => 'Technology', 'description' => 'IT and software development roles', 'icon' => '💻', 'order' => 2],
            ['name' => 'Finance', 'description' => 'Financial and accounting positions', 'icon' => '💰', 'order' => 3],
            ['name' => 'Operations', 'description' => 'Operations and logistics roles', 'icon' => '⚙️', 'order' => 4],
            ['name' => 'Human Resources', 'description' => 'HR and talent management', 'icon' => '👥', 'order' => 5],
            ['name' => 'Sales', 'description' => 'Sales and business development', 'icon' => '💼', 'order' => 6],
        ];

        foreach ($categories as $categoryData) {
            Category::create($categoryData);
        }

        // Create Common Requirements
        $requirements = [
            'Pendidikan minimal D3/S1 semua jurusan',
            'Memiliki keterampilan komunikasi yang baik',
            'Mampu bekerja dalam tim',
            'Menguasai Microsoft Office',
            'Bersedia ditempatkan di seluruh Indonesia',
            'Target oriented dan berorientasi pada hasil',
            'Memiliki kendaraan pribadi dan SIM A/C',
            'Pengalaman minimal 1 tahun di bidang terkait',
            'Dapat bekerja di bawah tekanan',
            'Jujur, disiplin, dan bertanggung jawab',
            'Memiliki kemampuan analisis yang baik',
            'Berorientasi pada kepuasan pelanggan',
            'Mampu berbahasa Inggris aktif',
            'Bersedia bekerja shift',
            'Memiliki networking yang luas',
        ];

        foreach ($requirements as $req) {
            CommonRequirement::create([
                'text' => $req,
                'usage_count' => rand(5, 50)
            ]);
        }

        // Create Sample Jobs
        $this->createSampleJobs();
    }

    private function createSampleJobs(): void
    {
        $marketingCategory = Category::where('slug', 'marketing')->first();
        $techCategory = Category::where('slug', 'technology')->first();
        $financeCategory = Category::where('slug', 'finance')->first();

        // Job 1: Digital Marketing Specialist
        $job1 = Job::create([
            'category_id' => $marketingCategory->id,
            'title' => 'Digital Marketing Specialist',
            'position' => 'Specialist',
            'salary_min' => 6000000,
            'salary_max' => 9000000,
            'requirements' => [
                'Minimal S1 Marketing/Komunikasi',
                'Pengalaman 2 tahun di digital marketing',
                'Menguasai Google Ads, Facebook Ads, Instagram Ads',
                'Paham SEO/SEM dan Google Analytics',
                'Kreatif dan up-to-date dengan tren digital',
            ],
            'descriptions' => [
                'Merancang dan melaksanakan kampanye digital marketing',
                'Mengelola media sosial perusahaan',
                'Analisis performa campaign dan membuat laporan',
                'Membuat konten marketing yang engaging',
                'Riset kompetitor dan tren pasar',
            ],
            'is_urgent' => true,
            'is_active' => true,
            'closed_at' => now()->addDays(30),
        ]);

        JobLocation::create([
            'job_id' => $job1->id,
            'city' => 'Jakarta Selatan',
            'province' => 'DKI Jakarta',
        ]);

        // Job 2: Full Stack Developer
        $job2 = Job::create([
            'category_id' => $techCategory->id,
            'title' => 'Full Stack Developer',
            'position' => 'Senior Developer',
            'salary_min' => 10000000,
            'salary_max' => 15000000,
            'requirements' => [
                'Minimal S1 Teknik Informatika/Ilmu Komputer',
                'Pengalaman 3+ tahun sebagai Full Stack Developer',
                'Menguasai Laravel, Vue.js/React, dan Tailwind CSS',
                'Paham database MySQL/PostgreSQL',
                'Familiar dengan Git, Docker, dan CI/CD',
            ],
            'descriptions' => [
                'Develop dan maintain aplikasi web',
                'Code review dan dokumentasi teknis',
                'Kolaborasi dengan tim product dan designer',
                'Implementasi best practices dan clean code',
                'Troubleshooting dan bug fixing',
            ],
            'is_urgent' => false,
            'is_active' => true,
            'closed_at' => now()->addDays(45),
        ]);

        JobLocation::create([
            'job_id' => $job2->id,
            'city' => 'Jakarta Pusat',
            'province' => 'DKI Jakarta',
        ]);

        // Job 3: Accounting Staff
        $job3 = Job::create([
            'category_id' => $financeCategory->id,
            'title' => 'Accounting Staff',
            'position' => 'Staff',
            'salary_min' => 4500000,
            'salary_max' => 6500000,
            'requirements' => [
                'Minimal D3 Akuntansi',
                'Fresh graduate welcome to apply',
                'Menguasai jurnal umum dan laporan keuangan',
                'Familiar dengan software akuntansi (Accurate/Zahir)',
                'Teliti dan detail oriented',
            ],
            'descriptions' => [
                'Membuat jurnal transaksi harian',
                'Rekonsiliasi bank bulanan',
                'Membuat laporan keuangan',
                'Filing dokumen keuangan',
                'Support untuk audit internal/eksternal',
            ],
            'is_urgent' => false,
            'is_active' => true,
            'closed_at' => now()->addDays(20),
        ]);

        JobLocation::create([
            'job_id' => $job3->id,
            'city' => 'Bandung',
            'province' => 'Jawa Barat',
        ]);

        // Job 4: Sales Executive
        $job4 = Job::create([
            'category_id' => Category::where('slug', 'sales')->first()->id,
            'title' => 'Sales Executive',
            'position' => 'Executive',
            'salary_min' => 5000000,
            'salary_max' => 8000000,
            'requirements' => [
                'Minimal D3 semua jurusan',
                'Pengalaman minimal 1 tahun di sales B2B/B2C',
                'Memiliki kendaraan pribadi dan SIM C',
                'Komunikatif dan persuasif',
                'Target oriented',
            ],
            'descriptions' => [
                'Mencari dan menjalin relasi dengan klien baru',
                'Melakukan presentasi produk/jasa',
                'Negosiasi dan closing deal',
                'Mencapai target penjualan',
                'Membuat laporan aktivitas penjualan',
            ],
            'is_urgent' => true,
            'is_active' => true,
            'closed_at' => now()->addDays(15),
        ]);

        JobLocation::create([
            'job_id' => $job4->id,
            'city' => 'Surabaya',
            'province' => 'Jawa Timur',
        ]);

        JobLocation::create([
            'job_id' => $job4->id,
            'city' => 'Semarang',
            'province' => 'Jawa Tengah',
        ]);

        // Job 5: HR Generalist
        $job5 = Job::create([
            'category_id' => Category::where('slug', 'human-resources')->first()->id,
            'title' => 'HR Generalist',
            'position' => 'Generalist',
            'salary_min' => 6000000,
            'salary_max' => 9000000,
            'requirements' => [
                'Minimal S1 Psikologi/Manajemen SDM',
                'Pengalaman minimal 2 tahun sebagai HR',
                'Paham recruitment dan onboarding process',
                'Familiar dengan HR software',
                'Good interpersonal skills',
            ],
            'descriptions' => [
                'Melakukan proses rekrutmen end-to-end',
                'Mengelola administrasi kepegawaian',
                'Training & development karyawan',
                'Employee relation dan performance management',
                'Payroll dan benefit administration',
            ],
            'is_urgent' => false,
            'is_active' => true,
            'closed_at' => now()->addDays(25),
        ]);

        JobLocation::create([
            'job_id' => $job5->id,
            'city' => 'Yogyakarta',
            'province' => 'DI Yogyakarta',
        ]);
    }
}