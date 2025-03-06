<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\ListPoin;
use App\Models\SubKategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PoinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $kategori = [
            'Make Up',
            'Kostum',
            'PBB',
            'Vafor',
            'Danpas',
            'Administrasi'
        ];

        foreach ($kategori as $key => $value) {
            Kategori::create([
                'nama' => $value,
                'jml_juri' => $faker->numberBetween(0, 3)
            ]);
        }

        $subkategori = [
            'Make Up' => [
                [
                    'nama' => 'Make Up Harian',
                    'urutan' => 1,
                ],
                [
                    'nama' => 'Make Up Pesta',
                    'urutan' => 2,
                ],
                [
                    'nama' => 'Make Up Pengantin',
                    'urutan' => 3,
                ],
                [
                    'nama' => 'Make Up Wisuda',
                    'urutan' => 4,
                ],
                [
                    'nama' => 'Make Up Fashion Show',
                    'urutan' => 5,
                ]
            ],
            'Kostum' => [
                [
                    'nama' => 'Kostum Anak',
                    'urutan' => 1,
                ],
                [
                    'nama' => 'Kostum Dewasa',
                    'urutan' => 2,
                ],
                [
                    'nama' => 'Kostum Pengantin',
                    'urutan' => 3,
                ],
                [
                    'nama' => 'Kostum Wisuda',
                    'urutan' => 4,
                ],
                [
                    'nama' => 'Kostum Fashion Show',
                    'urutan' => 5,
                ],
            ],
            'PBB' => [
                [
                    'nama' => 'PBB Harian',
                    'urutan' => 1,
                ],
                [
                    'nama' => 'PBB Pesta',
                    'urutan' => 2,
                ],
                [
                    'nama' => 'PBB Wisuda',
                    'urutan' => 3,
                ],
                [
                    'nama' => 'PBB Fashion Show',
                    'urutan' => 4,
                ],
            ],
            'Vafor' => [
                [
                    'nama' => 'Vafor Harian',
                    'urutan' => 1,
                ],
                [
                    'nama' => 'Vafor Pesta',
                    'urutan' => 2,
                ],
                [
                    'nama' => 'Vafor Wisuda',
                    'urutan' => 3,
                ],
                [
                    'nama' => 'Vafor Fashion Show',
                    'urutan' => 4,
                ],
            ],
            'Danpas' => [
                [
                    'nama' => 'Danpas Harian',
                    'urutan' => 1,
                ],
                [
                    'nama' => 'Danpas Pesta',
                    'urutan' => 2,
                ],
                [
                    'nama' => 'Danpas Wisuda',
                    'urutan' => 3,
                ],
                [
                    'nama' => 'Danpas Fashion Show',
                    'urutan' => 4,
                ],
            ],
            'Administrasi' => [
                [
                    'nama' => 'Administrasi Harian',
                    'urutan' => 1,
                ],
                [
                    'nama' => 'Administrasi Pesta',
                    'urutan' => 2,
                ],
                [
                    'nama' => 'Administrasi Wisuda',
                    'urutan' => 3,
                ],
                [
                    'nama' => 'Administrasi Fashion Show',
                    'urutan' => 4,
                ],
            ],
        ];

        foreach ($subkategori as $key => $value) {
            $kategori = Kategori::where('nama', $key)->first();
            foreach ($value as $key2 => $value2) {
                SubKategori::create([
                    'kategori_id' => $kategori->id,
                    'nama' => $value2['nama'],
                    'urutan' => $value2['urutan'],
                ]);
            }
        }

        $listpoin = [
            [
                'sub_kategori_id' => 1,
                'min_poin' => 10,
                'max_poin' => 10,
                'level' => 1,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 1,
                'min_poin' => 15,
                'max_poin' => 18,
                'level' => 2,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 1,
                'min_poin' => 25,
                'max_poin' => 25,
                'level' => 3,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 1,
                'min_poin' => 30,
                'max_poin' => 30,
                'level' => 4,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 1,
                'min_poin' => 40,
                'max_poin' => 40,
                'level' => 5,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 2,
                'min_poin' => 10,
                'max_poin' => 10,
                'level' => 1,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 2,
                'min_poin' => 15,
                'max_poin' => 18,
                'level' => 2,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 2,
                'min_poin' => 25,
                'max_poin' => 25,
                'level' => 3,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 2,
                'min_poin' => 30,
                'max_poin' => 30,
                'level' => 4,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 2,
                'min_poin' => 40,
                'max_poin' => 40,
                'level' => 5,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 3,
                'min_poin' => 10,
                'max_poin' => 10,
                'level' => 1,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 3,
                'min_poin' => 15,
                'max_poin' => 18,
                'level' => 2,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 3,
                'min_poin' => 25,
                'max_poin' => 25,
                'level' => 3,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 3,
                'min_poin' => 30,
                'max_poin' => 30,
                'level' => 4,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 3,
                'min_poin' => 40,
                'max_poin' => 40,
                'level' => 5,
                'is_minus' => false,

            ],
            [
                'sub_kategori_id' => 4,
                'min_poin' => 10,
                'max_poin' => 10,
                'level' => 1,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 4,
                'min_poin' => 15,
                'max_poin' => 18,
                'level' => 2,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 4,
                'min_poin' => 25,
                'max_poin' => 25,
                'level' => 3,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 4,
                'min_poin' => 30,
                'max_poin' => 30,
                'level' => 4,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 4,
                'min_poin' => 40,
                'max_poin' => 40,
                'level' => 5,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 5,
                'min_poin' => 10,
                'max_poin' => 10,
                'level' => 1,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 5,
                'min_poin' => 15,
                'max_poin' => 18,
                'level' => 2,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 5,
                'min_poin' => 25,
                'max_poin' => 25,
                'level' => 3,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 5,
                'min_poin' => 30,
                'max_poin' => 30,
                'level' => 4,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 5,
                'min_poin' => 40,
                'max_poin' => 40,
                'level' => 5,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 6,
                'min_poin' => 10,
                'max_poin' => 10,
                'level' => 1,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 6,
                'min_poin' => 15,
                'max_poin' => 18,
                'level' => 2,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 6,
                'min_poin' => 25,
                'max_poin' => 25,
                'level' => 3,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 6,
                'min_poin' => 30,
                'max_poin' => 30,
                'level' => 4,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 6,
                'min_poin' => 40,
                'max_poin' => 40,
                'level' => 5,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 7,
                'min_poin' => 10,
                'max_poin' => 10,
                'level' => 1,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 7,
                'min_poin' => 15,
                'max_poin' => 18,
                'level' => 2,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 7,
                'min_poin' => 25,
                'max_poin' => 25,
                'level' => 3,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 7,
                'min_poin' => 30,
                'max_poin' => 30,
                'level' => 4,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 7,
                'min_poin' => 40,
                'max_poin' => 40,
                'level' => 5,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 8,
                'min_poin' => 10,
                'max_poin' => 10,
                'level' => 1,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 8,
                'min_poin' => 15,
                'max_poin' => 18,
                'level' => 2,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 8,
                'min_poin' => 25,
                'max_poin' => 25,
                'level' => 3,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 8,
                'min_poin' => 30,
                'max_poin' => 30,
                'level' => 4,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 8,
                'min_poin' => 40,
                'max_poin' => 40,
                'level' => 5,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 9,
                'min_poin' => 10,
                'max_poin' => 10,
                'level' => 1,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 9,
                'min_poin' => 15,
                'max_poin' => 18,
                'level' => 2,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 9,
                'min_poin' => 25,
                'max_poin' => 25,
                'level' => 3,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 9,
                'min_poin' => 30,
                'max_poin' => 30,
                'level' => 4,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 9,
                'min_poin' => 40,
                'max_poin' => 40,
                'level' => 5,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 10,
                'min_poin' => 10,
                'max_poin' => 10,
                'level' => 1,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 10,
                'min_poin' => 15,
                'max_poin' => 18,
                'level' => 2,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 10,
                'min_poin' => 25,
                'max_poin' => 25,
                'level' => 3,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 10,
                'min_poin' => 30,
                'max_poin' => 30,
                'level' => 4,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 10,
                'min_poin' => 40,
                'max_poin' => 40,
                'level' => 5,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 11,
                'min_poin' => 10,
                'max_poin' => 10,
                'level' => 1,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 11,
                'min_poin' => 15,
                'max_poin' => 18,
                'level' => 2,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 11,
                'min_poin' => 25,
                'max_poin' => 25,
                'level' => 3,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 11,
                'min_poin' => 30,
                'max_poin' => 30,
                'level' => 4,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 11,
                'min_poin' => 40,
                'max_poin' => 40,
                'level' => 5,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 12,
                'min_poin' => 10,
                'max_poin' => 10,
                'level' => 1,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 12,
                'min_poin' => 15,
                'max_poin' => 18,
                'level' => 2,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 12,
                'min_poin' => 25,
                'max_poin' => 25,
                'level' => 3,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 12,
                'min_poin' => 30,
                'max_poin' => 30,
                'level' => 4,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 12,
                'min_poin' => 40,
                'max_poin' => 40,
                'level' => 5,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 13,
                'min_poin' => 10,
                'max_poin' => 10,
                'level' => 1,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 13,
                'min_poin' => 15,
                'max_poin' => 18,
                'level' => 2,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 13,
                'min_poin' => 25,
                'max_poin' => 25,
                'level' => 3,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 13,
                'min_poin' => 30,
                'max_poin' => 30,
                'level' => 4,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 13,
                'min_poin' => 40,
                'max_poin' => 40,
                'level' => 5,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 14,
                'min_poin' => 10,
                'max_poin' => 10,
                'level' => 1,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 14,
                'min_poin' => 15,
                'max_poin' => 18,
                'level' => 2,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 14,
                'min_poin' => 25,
                'max_poin' => 25,
                'level' => 3,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 14,
                'min_poin' => 30,
                'max_poin' => 30,
                'level' => 4,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 14,
                'min_poin' => 40,
                'max_poin' => 40,
                'level' => 5,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 15,
                'min_poin' => 10,
                'max_poin' => 10,
                'level' => 1,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 15,
                'min_poin' => 15,
                'max_poin' => 18,
                'level' => 2,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 15,
                'min_poin' => 25,
                'max_poin' => 25,
                'level' => 3,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 15,
                'min_poin' => 30,
                'max_poin' => 30,
                'level' => 4,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 15,
                'min_poin' => 40,
                'max_poin' => 40,
                'level' => 5,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 16,
                'min_poin' => 10,
                'max_poin' => 10,
                'level' => 1,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 16,
                'min_poin' => 15,
                'max_poin' => 18,
                'level' => 2,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 16,
                'min_poin' => 25,
                'max_poin' => 25,
                'level' => 3,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 16,
                'min_poin' => 30,
                'max_poin' => 30,
                'level' => 4,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 16,
                'min_poin' => 40,
                'max_poin' => 40,
                'level' => 5,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 17,
                'min_poin' => 10,
                'max_poin' => 10,
                'level' => 1,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 17,
                'min_poin' => 15,
                'max_poin' => 18,
                'level' => 2,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 17,
                'min_poin' => 25,
                'max_poin' => 25,
                'level' => 3,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 17,
                'min_poin' => 30,
                'max_poin' => 30,
                'level' => 4,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 17,
                'min_poin' => 40,
                'max_poin' => 40,
                'level' => 5,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 18,
                'min_poin' => 10,
                'max_poin' => 10,
                'level' => 1,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 18,
                'min_poin' => 15,
                'max_poin' => 18,
                'level' => 2,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 18,
                'min_poin' => 25,
                'max_poin' => 25,
                'level' => 3,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 18,
                'min_poin' => 30,
                'max_poin' => 30,
                'level' => 4,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 18,
                'min_poin' => 40,
                'max_poin' => 40,
                'level' => 5,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 19,
                'min_poin' => 10,
                'max_poin' => 10,
                'level' => 1,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 19,
                'min_poin' => 15,
                'max_poin' => 18,
                'level' => 2,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 19,
                'min_poin' => 25,
                'max_poin' => 25,
                'level' => 3,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 19,
                'min_poin' => 30,
                'max_poin' => 30,
                'level' => 4,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 19,
                'min_poin' => 40,
                'max_poin' => 40,
                'level' => 5,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 20,
                'min_poin' => 10,
                'max_poin' => 10,
                'level' => 1,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 20,
                'min_poin' => 15,
                'max_poin' => 18,
                'level' => 2,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 20,
                'min_poin' => 25,
                'max_poin' => 25,
                'level' => 3,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 20,
                'min_poin' => 30,
                'max_poin' => 30,
                'level' => 4,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 20,
                'min_poin' => 40,
                'max_poin' => 40,
                'level' => 5,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 21,
                'min_poin' => 10,
                'max_poin' => 10,
                'level' => 1,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 21,
                'min_poin' => 15,
                'max_poin' => 18,
                'level' => 2,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 21,
                'min_poin' => 25,
                'max_poin' => 25,
                'level' => 3,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 21,
                'min_poin' => 30,
                'max_poin' => 30,
                'level' => 4,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 21,
                'min_poin' => 40,
                'max_poin' => 40,
                'level' => 5,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 22,
                'min_poin' => 10,
                'max_poin' => 10,
                'level' => 1,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 22,
                'min_poin' => 15,
                'max_poin' => 18,
                'level' => 2,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 22,
                'min_poin' => 25,
                'max_poin' => 25,
                'level' => 3,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 22,
                'min_poin' => 30,
                'max_poin' => 30,
                'level' => 4,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 22,
                'min_poin' => 40,
                'max_poin' => 40,
                'level' => 5,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 23,
                'min_poin' => 10,
                'max_poin' => 10,
                'level' => 1,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 23,
                'min_poin' => 15,
                'max_poin' => 18,
                'level' => 2,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 23,
                'min_poin' => 25,
                'max_poin' => 25,
                'level' => 3,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 23,
                'min_poin' => 30,
                'max_poin' => 30,
                'level' => 4,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 23,
                'min_poin' => 40,
                'max_poin' => 40,
                'level' => 5,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 24,
                'min_poin' => 10,
                'max_poin' => 10,
                'level' => 1,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 24,
                'min_poin' => 15,
                'max_poin' => 18,
                'level' => 2,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 24,
                'min_poin' => 25,
                'max_poin' => 25,
                'level' => 3,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 24,
                'min_poin' => 30,
                'max_poin' => 30,
                'level' => 4,
                'is_minus' => false,
            ],
            [
                'sub_kategori_id' => 24,
                'min_poin' => 40,
                'max_poin' => 40,
                'level' => 5,
                'is_minus' => false,
            ]
        ];

        foreach ($listpoin as $key => $value) {
            ListPoin::create([
                'sub_kategori_id' => $value['sub_kategori_id'],
                'min_poin' => $value['min_poin'],
                'max_poin' => $value['max_poin'],
                'level' => $value['level'],
                'is_minus' => $value['is_minus'],
            ]);
        }
    }
}
