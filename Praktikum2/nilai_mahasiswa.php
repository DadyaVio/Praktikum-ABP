<?php
// ============================================
// DATA MAHASISWA (Array Asosiatif)
// ============================================
$mahasiswa = [
    [
        "nama"        => "Jordan Angkawijaya",
        "nim"         => "2023001",
        "nilai_tugas" => 85,
        "nilai_uts"   => 78,
        "nilai_uas"   => 82,
    ],
    [
        "nama"        => "Denny Budiansyach",
        "nim"         => "2311101",
        "nilai_tugas" => 70,
        "nilai_uts"   => 65,
        "nilai_uas"   => 60,
    ],
    [
        "nama"        => "Dadya Vio Hendraksa",
        "nim"         => "2311102",
        "nilai_tugas" => 92,
        "nilai_uts"   => 88,
        "nilai_uas"   => 95,
    ],
    [
        "nama"        => "Dian Maharani",
        "nim"         => "2311103",
        "nilai_tugas" => 57,
        "nilai_uts"   => 50,
        "nilai_uas"   => 43,
    ],
    [
        "nama"        => "Axandio Biyanatul Lizan",
        "nim"         => "2311104",
        "nilai_tugas" => 79,
        "nilai_uts"   => 80,
        "nilai_uas"   => 74,
    ],
];

// ============================================
// FUNCTION: Hitung Nilai Akhir
// Bobot: Tugas 30%, UTS 35%, UAS 35%
// ============================================
function hitungNilaiAkhir($tugas, $uts, $uas) {
    return round(($tugas * 0.30) + ($uts * 0.35) + ($uas * 0.35), 2);
}

// ============================================
// FUNCTION: Tentukan Grade (if/else)
// ============================================
function tentukanGrade($nilai) {
    if ($nilai >= 85)      return "A";
    elseif ($nilai >= 75)  return "B";
    elseif ($nilai >= 65)  return "C";
    elseif ($nilai >= 55)  return "D";
    else                   return "E";
}

// ============================================
// FUNCTION: Tentukan Status Kelulusan
// ============================================
function tentukanStatus($nilai) {
    return ($nilai >= 60) ? "Lulus" : "Tidak Lulus";
}

// ============================================
// PROSES DATA
// ============================================
$total_nilai     = 0;
$nilai_tertinggi = 0;
$nama_terbaik    = "";
$jumlah_lulus    = 0;

foreach ($mahasiswa as &$mhs) {
    $mhs["nilai_akhir"] = hitungNilaiAkhir($mhs["nilai_tugas"], $mhs["nilai_uts"], $mhs["nilai_uas"]);
    $mhs["grade"]       = tentukanGrade($mhs["nilai_akhir"]);
    $mhs["status"]      = tentukanStatus($mhs["nilai_akhir"]);

    $total_nilai += $mhs["nilai_akhir"];
    if ($mhs["nilai_akhir"] > $nilai_tertinggi) {
        $nilai_tertinggi = $mhs["nilai_akhir"];
        $nama_terbaik    = $mhs["nama"];
    }
    if ($mhs["status"] === "Lulus") $jumlah_lulus++;
}
unset($mhs);

$jumlah_mahasiswa = count($mahasiswa);
$rata_rata        = round($total_nilai / $jumlah_mahasiswa, 2);
$pct_lulus        = round(($jumlah_lulus / $jumlah_mahasiswa) * 100);

function barColor($nilai) {
    if ($nilai >= 85) return '#22c55e';
    if ($nilai >= 75) return '#3b82f6';
    if ($nilai >= 65) return '#f59e0b';
    if ($nilai >= 55) return '#f97316';
    return '#ef4444';
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Rekap Nilai Mahasiswa</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;600&display=swap" rel="stylesheet">
<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

:root {
    --bg:        #f8fafc;
    --surface:   #ffffff;
    --border:    #e2e8f0;
    --text:      #0f172a;
    --muted:     #64748b;
    --accent:    #2563eb;
    --accent-lt: #eff6ff;
    --grade-a: #16a34a; --grade-a-bg: #f0fdf4;
    --grade-b: #2563eb; --grade-b-bg: #eff6ff;
    --grade-c: #d97706; --grade-c-bg: #fffbeb;
    --grade-d: #ea580c; --grade-d-bg: #fff7ed;
    --grade-e: #dc2626; --grade-e-bg: #fef2f2;
    --radius: 14px;
    --shadow: 0 1px 3px rgba(0,0,0,.06), 0 4px 16px rgba(0,0,0,.06);
    --shadow-md: 0 4px 6px rgba(0,0,0,.05), 0 10px 30px rgba(0,0,0,.08);
}

body {
    font-family: 'Plus Jakarta Sans', sans-serif;
    background: var(--bg);
    color: var(--text);
    min-height: 100vh;
    padding: 36px 20px 60px;
}

.wrap { max-width: 980px; margin: 0 auto; }

/* ── HEADER ── */
.page-header {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: var(--radius);
    padding: 28px 32px;
    margin-bottom: 20px;
    box-shadow: var(--shadow);
    display: flex;
    align-items: center;
    gap: 18px;
    flex-wrap: wrap;
}

.header-icon {
    width: 52px; height: 52px;
    background: var(--accent);
    border-radius: 12px;
    display: grid; place-items: center;
    font-size: 24px;
    flex-shrink: 0;
}

.header-text h1 { font-size: 20px; font-weight: 800; }
.header-text p  { font-size: 13px; color: var(--muted); margin-top: 3px; }

.bobot-pills { margin-left: auto; display: flex; gap: 8px; flex-wrap: wrap; justify-content: flex-end; }

.pill {
    background: var(--accent-lt);
    color: var(--accent);
    font-size: 12px; font-weight: 700;
    padding: 5px 12px; border-radius: 99px;
}

/* ── STATS ── */
.stats {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 14px;
    margin-bottom: 20px;
}

.stat-card {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: var(--radius);
    padding: 20px 22px;
    box-shadow: var(--shadow);
    position: relative;
    overflow: hidden;
}

.stat-card::before {
    content: '';
    position: absolute; top: 0; left: 0; right: 0; height: 3px;
    background: var(--bar, var(--accent));
}

.stat-label { font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: .7px; color: var(--muted); margin-bottom: 8px; }
.stat-value { font-size: 30px; font-weight: 800; font-family: 'JetBrains Mono', monospace; line-height: 1; }
.stat-sub   { font-size: 12px; color: var(--muted); margin-top: 6px; }

/* ── TABLE CARD ── */
.table-card {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: var(--radius);
    box-shadow: var(--shadow-md);
    overflow: hidden;
    margin-bottom: 20px;
}

.table-title {
    padding: 16px 22px;
    border-bottom: 1px solid var(--border);
    font-size: 14px; font-weight: 700;
    display: flex; align-items: center; gap: 8px;
}
.table-title span { color: var(--muted); font-weight: 500; }

.table-wrap { overflow-x: auto; }

table { width: 100%; border-collapse: collapse; font-size: 13.5px; }

thead th {
    background: #f8fafc;
    padding: 11px 16px;
    text-align: center;
    font-size: 11px; font-weight: 700;
    text-transform: uppercase; letter-spacing: .5px;
    color: var(--muted);
    border-bottom: 1px solid var(--border);
    white-space: nowrap;
}
thead th:nth-child(2) { text-align: left; }

tbody tr { border-bottom: 1px solid #f1f5f9; transition: background .15s; }
tbody tr:last-child { border-bottom: none; }
tbody tr:hover { background: #f8fafc; }
tbody td { padding: 13px 16px; vertical-align: middle; text-align: center; }
tbody td:nth-child(2) { text-align: left; }

/* ── CELLS ── */
.nama-cell { display: flex; flex-direction: column; gap: 2px; }
.nama-cell strong { font-weight: 700; }
.nim-tag { font-size: 11.5px; color: var(--muted); font-family: 'JetBrains Mono', monospace; }

.score-wrap { display: flex; flex-direction: column; align-items: center; gap: 5px; }
.score-num  { font-family: 'JetBrains Mono', monospace; font-weight: 600; font-size: 14px; }
.bar-track  { width: 48px; height: 4px; background: #e2e8f0; border-radius: 99px; overflow: hidden; }
.bar-fill   { height: 100%; border-radius: 99px; }

.akhir-num   { font-family: 'JetBrains Mono', monospace; font-weight: 700; font-size: 15px; }
.akhir-track { width: 60px; height: 5px; background: #e2e8f0; border-radius: 99px; overflow: hidden; margin: 4px auto 0; }

.grade-badge {
    display: inline-flex; align-items: center; justify-content: center;
    width: 34px; height: 34px; border-radius: 8px;
    font-weight: 800; font-size: 15px;
}
.grade-A { background: var(--grade-a-bg); color: var(--grade-a); }
.grade-B { background: var(--grade-b-bg); color: var(--grade-b); }
.grade-C { background: var(--grade-c-bg); color: var(--grade-c); }
.grade-D { background: var(--grade-d-bg); color: var(--grade-d); }
.grade-E { background: var(--grade-e-bg); color: var(--grade-e); }

.status-badge {
    display: inline-flex; align-items: center; gap: 5px;
    padding: 5px 12px; border-radius: 99px;
    font-size: 12px; font-weight: 700;
}
.status-badge::before { content: ''; width: 6px; height: 6px; border-radius: 50%; display: inline-block; }
.status-lulus  { background: #f0fdf4; color: #16a34a; }
.status-lulus::before  { background: #16a34a; }
.status-tidak  { background: #fef2f2; color: #dc2626; }
.status-tidak::before  { background: #dc2626; }

/* ── GRADE KEY ── */
.grade-key {
    background: var(--surface); border: 1px solid var(--border);
    border-radius: var(--radius); padding: 16px 22px;
    box-shadow: var(--shadow);
    display: flex; align-items: center; gap: 20px; flex-wrap: wrap;
}
.grade-key-title { font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: .7px; color: var(--muted); flex-shrink: 0; }
.grade-key-items { display: flex; gap: 12px; flex-wrap: wrap; }
.gk-item { display: flex; align-items: center; gap: 7px; font-size: 12.5px; color: var(--muted); }
.gk-badge {
    display: inline-flex; align-items: center; justify-content: center;
    width: 24px; height: 24px; border-radius: 5px; font-weight: 800; font-size: 12px;
}

@media (max-width: 680px) {
    .stats { grid-template-columns: repeat(2, 1fr); }
    .page-header { flex-direction: column; align-items: flex-start; }
    .bobot-pills { margin-left: 0; }
}
</style>
</head>
<body>
<div class="wrap">

    <header class="page-header">
        <div class="header-icon">📋</div>
        <div class="header-text">
            <h1>Rekap Nilai Mahasiswa</h1>
            <p>Sistem Penilaian Akademik — Semester Genap 2025/2026</p>
        </div>
        <div class="bobot-pills">
            <span class="pill">Tugas 30%</span>
            <span class="pill">UTS 35%</span>
            <span class="pill">UAS 35%</span>
        </div>
    </header>

    <div class="stats">
        <div class="stat-card" style="--bar:#2563eb">
            <div class="stat-label">Mahasiswa</div>
            <div class="stat-value"><?= $jumlah_mahasiswa ?></div>
            <div class="stat-sub">Total peserta</div>
        </div>
        <div class="stat-card" style="--bar:#16a34a">
            <div class="stat-label">Rata-rata Kelas</div>
            <div class="stat-value"><?= $rata_rata ?></div>
            <div class="stat-sub">Nilai akhir rata-rata</div>
        </div>
        <div class="stat-card" style="--bar:#f59e0b">
            <div class="stat-label">Nilai Tertinggi</div>
            <div class="stat-value"><?= $nilai_tertinggi ?></div>
            <div class="stat-sub"><?= htmlspecialchars($nama_terbaik) ?></div>
        </div>
        <div class="stat-card" style="--bar:#8b5cf6">
            <div class="stat-label">Tingkat Lulus</div>
            <div class="stat-value"><?= $pct_lulus ?>%</div>
            <div class="stat-sub"><?= $jumlah_lulus ?> dari <?= $jumlah_mahasiswa ?> lulus</div>
        </div>
    </div>

    <div class="table-card">
        <div class="table-title">
            🎓 Data Nilai <span>&nbsp;·&nbsp; <?= $jumlah_mahasiswa ?> mahasiswa</span>
        </div>
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Mahasiswa</th>
                        <th>Tugas</th>
                        <th>UTS</th>
                        <th>UAS</th>
                        <th>Nilai Akhir</th>
                        <th>Grade</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no = 1; foreach ($mahasiswa as $mhs): ?>
                <?php
                    $na          = $mhs["nilai_akhir"];
                    $col         = barColor($na);
                    $gradeClass  = "grade-" . $mhs["grade"];
                    $statusClass = ($mhs["status"] === "Lulus") ? "status-lulus" : "status-tidak";
                ?>
                <tr>
                    <td style="color:var(--muted);font-size:12px;font-family:'JetBrains Mono',monospace">
                        <?= str_pad($no++, 2, '0', STR_PAD_LEFT) ?>
                    </td>
                    <td>
                        <div class="nama-cell">
                            <strong><?= htmlspecialchars($mhs["nama"]) ?></strong>
                            <span class="nim-tag"><?= htmlspecialchars($mhs["nim"]) ?></span>
                        </div>
                    </td>
                    <?php foreach (["nilai_tugas","nilai_uts","nilai_uas"] as $key): ?>
                    <td>
                        <div class="score-wrap">
                            <span class="score-num"><?= $mhs[$key] ?></span>
                            <div class="bar-track">
                                <div class="bar-fill" style="width:<?= $mhs[$key] ?>%;background:<?= barColor($mhs[$key]) ?>"></div>
                            </div>
                        </div>
                    </td>
                    <?php endforeach; ?>
                    <td>
                        <span class="akhir-num" style="color:<?= $col ?>"><?= $na ?></span>
                        <div class="akhir-track">
                            <div class="bar-fill" style="width:<?= $na ?>%;background:<?= $col ?>"></div>
                        </div>
                    </td>
                    <td><span class="grade-badge <?= $gradeClass ?>"><?= $mhs["grade"] ?></span></td>
                    <td><span class="status-badge <?= $statusClass ?>"><?= $mhs["status"] ?></span></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="grade-key">
        <span class="grade-key-title">Keterangan Grade</span>
        <div class="grade-key-items">
            <div class="gk-item"><span class="gk-badge grade-A">A</span> ≥ 85 — Sangat Baik</div>
            <div class="gk-item"><span class="gk-badge grade-B">B</span> 75–84 — Baik</div>
            <div class="gk-item"><span class="gk-badge grade-C">C</span> 65–74 — Cukup</div>
            <div class="gk-item"><span class="gk-badge grade-D">D</span> 55–64 — Kurang</div>
            <div class="gk-item"><span class="gk-badge grade-E">E</span> &lt;55 — Gagal</div>
        </div>
    </div>

</div>
</body>
</html>
