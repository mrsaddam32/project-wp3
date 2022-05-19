<?php
require_once 'vendor/autoload.php';

defined('BASEPATH') or exit('No direct script access allowed');

class DataFaker extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PasienModel');
    }

    public function index()
    {
        $faker = Faker\Factory::create('id_ID');

        for ($i = 0; $i <= 30; $i++) {
            $data = [
                'no_pendaftaran' => random_string('numeric', 10),
                'nama_pasien' => $faker->name,
                'tgl_lahir' => $faker->date('Y-m-d', 'now'),
                'keluhan' => $faker->randomElement(['Telinga Berdengung', 'Flu & Batuk Berdahak', 'Kulit Alergi', 'Hidung Tersumbat']),
                'kategori' => $faker->randomElement(['UMUM', 'THT', 'KULIT & KELAMIN']),
                'umur' => $faker->numberBetween(10, 70),
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
            ];

            $this->PasienModel->tambahPasien($data);
        }
    }
}
