<?php
// Tambahkan header agar browser tahu ini adalah JSON
header('Content-Type: application/json');
// Izinkan akses dari origin mana saja (opsional, berguna saat development)
header('Access-Control-Allow-Origin: *');

// "Database" sederhana berupa array of arrays
$profil = [
    [
        'nama'      => 'Davis',
        'pekerjaan' => 'Wiraswasta',
        'lokasi'    => 'Madiun'
    ],
    [
        'nama'      => 'Jordan',
        'pekerjaan' => 'Investor',
        'lokasi'    => 'Purwokerto'
    ],
    [
        'nama'      => 'Nadya',
        'pekerjaan' => 'TNI',
        'lokasi'    => 'Surabaya'
    ],
    [
        'nama'      => 'Febby',
        'pekerjaan' => 'Konsultan',
        'lokasi'    => 'Yogyakarta'
    ]
];

// Ubah array PHP menjadi format JSON lalu tampilkan
echo json_encode($profil);
?>
