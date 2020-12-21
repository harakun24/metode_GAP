<?= $this->extend('template') ?>
<?= $this->section('content') ?>
<style>
/* .swal-footer {
    display: none;
} */
.card-table {
    overflow-x: scroll;
}

/* .table td.fit,
.table th.fit {
    white-space: nowrap;
    width: 1%;
} */
.bg-success {
    background: #7bea7f !important;
}

.bg-info {
    background: #7bbbec !important;
}

.bg-warning {
    background: #f7fff9 !important;
}
</style>
<div class="row d-flex justify-content-center align-items-center">
    <div class="card col-11 mt-4">
        <div class="card-header d-flex justify-content-start">
            <h2>Perangkingan</h2>
        </div>
        <div class="card-body mb-2">

            <div class="card">
                <div class="card-header bg-success-gradient toggleHide" style="cursor:pointer">
                    <h3 class="text-white d-flex justify-content-between align-items-center">Pembobotan Kriteria <i
                            class="fa fa-caret-down text-white"></i></h3>

                </div>
                <div class="card-body">
                    <?php
                    $header = $hasil[0];
                    foreach ($header['aspek'] as $a) : ?>
                    <h4 class="mt-2"><?= $a['nama']; ?></h4>
                    <div class="col-12" style="overflow-x: scroll;">

                        <table class="table-bordered table" style="width: auto;">
                            <thead class="thead-light">
                                <tr>
                                    <th>Siswa</th>
                                    <th>aspek penilaian</th>
                                    <?php foreach ($a['faktor'] as $faktor) : ?>
                                    <th><?= $faktor['nama']; ?></th>
                                    <?php endforeach ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($hasil as $h) : ?>
                                <tr>
                                    <td rowspan="2"><?= $h['siswa']; ?></td>
                                    <td>nilai</td>
                                    <?php foreach ($h['aspek'] as $aspek) : ?>

                                    <?php if ($a['nama'] == $aspek['nama']) : ?>
                                    <?php foreach ($aspek['faktor'] as $faktor) : ?>
                                    <td><?= $faktor['nilai']; ?></td>
                                    <?php endforeach ?>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                </tr>
                                <tr class="bg-light">
                                    <td>bobot</td>

                                    <?php foreach ($h['aspek'] as $aspek) : ?>

                                    <?php if ($a['nama'] == $aspek['nama']) : ?>
                                    <?php foreach ($aspek['faktor'] as $faktor) : ?>
                                    <td><?= $faktor['bobot']; ?></td>
                                    <?php endforeach ?>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    <?php endforeach ?>

                </div>
            </div>

            <div class="card">
                <div class="card-header bg-success-gradient toggleHide" style="cursor:pointer">
                    <h3 class="text-white d-flex justify-content-between align-items-center">
                        Menghitung nilai gap
                        <i class="fa fa-caret-down text-white"></i>
                    </h3>

                </div>
                <div class="card-body">
                    <?php
                    $header = $hasil[0];
                    foreach ($header['aspek'] as $a) : ?>
                    <h4 class="mt-2"><?= $a['nama']; ?></h4>
                    <div class="col-12" style="overflow-x: scroll;">

                        <table class="table-bordered table" style="width: auto;">
                            <thead class="thead-light">
                                <tr>
                                    <th>Siswa</th>
                                    <th>aspek penilaian</th>
                                    <?php foreach ($a['faktor'] as $faktor) : ?>
                                    <th><?= $faktor['nama']; ?></th>
                                    <?php endforeach ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($hasil as $h) : ?>
                                <tr>
                                    <td rowspan="3"><?= $h['siswa']; ?></td>
                                    <td>bobot nilai</td>
                                    <?php foreach ($h['aspek'] as $aspek) : ?>

                                    <?php if ($a['nama'] == $aspek['nama']) : ?>
                                    <?php foreach ($aspek['faktor'] as $faktor) : ?>
                                    <td><?= $faktor['bobot']; ?></td>
                                    <?php endforeach ?>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                </tr>
                                <tr class="bg-light">
                                    <td>gap</td>

                                    <?php foreach ($h['aspek'] as $aspek) : ?>

                                    <?php if ($a['nama'] == $aspek['nama']) : ?>
                                    <?php foreach ($aspek['faktor'] as $faktor) : ?>
                                    <td><?= $faktor['gap']; ?></td>
                                    <?php endforeach ?>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                </tr>
                                <tr class="bg-light">
                                    <td>bobot gap</td>

                                    <?php foreach ($h['aspek'] as $aspek) : ?>

                                    <?php if ($a['nama'] == $aspek['nama']) : ?>
                                    <?php foreach ($aspek['faktor'] as $faktor) : ?>
                                    <td><?= $faktor['bg']; ?></td>
                                    <?php endforeach ?>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    <?php endforeach ?>

                </div>
            </div>

            <div class="card">
                <div class="card-header bg-success-gradient toggleHide" style="cursor:pointer">
                    <h3 class="text-white d-flex justify-content-between align-items-center">
                        NCF dan NSF
                        <i class="fa fa-caret-down text-white"></i>
                    </h3>

                </div>
                <div class="card-body">
                    <?php
                    $header = $hasil[0];
                    foreach ($header['aspek'] as $a) : ?>
                    <h4 class="mt-2"><?= $a['nama']; ?></h4>
                    <div class="col-12" style="overflow-x: scroll;">

                        <table class="table-bordered table" style="width: auto;">
                            <thead class="thead-light">
                                <tr>
                                    <th>Siswa</th>
                                    <?php foreach ($a['faktor'] as $faktor) : ?>
                                    <th><?= $faktor['nama']; ?></th>
                                    <?php endforeach ?>
                                    <th>NCF</th>
                                    <th>NSF</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($hasil as $h) : ?>
                                <tr>
                                    <td><?= $h['siswa']; ?></td>
                                    <?php foreach ($h['aspek'] as $aspek) : ?>

                                    <?php if ($a['nama'] == $aspek['nama']) : ?>
                                    <?php foreach ($aspek['faktor'] as $faktor) : ?>
                                    <td class="text-white bg-<?= $faktor['tipe'] == 'core' ? 'info' : 'success'; ?>">
                                        <?= $faktor['bg']; ?></td>
                                    <?php endforeach ?>
                                    <td class="bg-warning text-dark"><?= $aspek['ncf']['total']; ?></td>
                                    <td class="bg-warning text-dark"><?= $aspek['nsf']['total']; ?></td>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                </tr>

                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    <?php endforeach ?>

                </div>
            </div>
            <div class="card">
                <div class="card-header bg-primary-gradient text-white">
                    <h3>Hasil Akhir</h3>
                </div>
                <div class="card-body col-12" style="overflow-x: scroll;">
                    <table class="table table-bordered">
                        <thead>
                            <th>Siswa</th>
                            <?php
                            $header = $hasil[0]['aspek'];
                            foreach ($header as $h) : ?>
                            <th><?= $h['nama']; ?> <br>
                                (<?= $h['bobot']; ?>%)
                            </th>
                            <?php endforeach ?>
                            <th>Total</th>
                            <th>Ranking</th>
                        </thead>
                        <tbody>
                            <?php
                            $nomor = 0;
                            foreach ($ranking as $r) : ?>
                            <tr>
                                <td><?= $r['siswa']; ?></td>
                                <?php foreach ($r['aspek'] as $aspek) : ?>
                                <td><?= $aspek['total']; ?></td>
                                <?php endforeach ?>
                                <td><?= $r['total']; ?></td>
                                <td><?= ++$nomor; ?></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>


</div>

<!-- tambah data -->
<script>
window.onload = function() {
    $(".toggleHide").click(function() {
        console.log();
        $state = $(this).next().css("display");
        $(this).next().css("display", $state == "none" ? "block" : "none");
    })
    $(".toggleHide").click();
}
</script>
<?= $this->endSection() ?>