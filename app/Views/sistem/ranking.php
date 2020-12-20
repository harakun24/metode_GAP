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
</style>
<div class="row d-flex justify-content-center align-items-center">
    <div class="card col-11 mt-4">
        <div class="card-header d-flex justify-content-start">
            <h2>Perangkingan</h2>
        </div>
        <div class="card-body mb-2">
            <?php foreach ($hasil[0]['kriteria'] as $kriteria) : ?>
            <div class="card">
                <div class="card-header bg-success text-white">
                    <div class="col-12 d-flex justify-content-between align-item-center">
                        <h2><?= $kriteria['nama']; ?></h2>
                        <span class="drop" style="font-size:150%;cursor:pointer">
                            <i class="fa fa-caret-down"></i>
                        </span>
                    </div>
                </div>
                <div class="card-body">


                    <div class="col-12 card-table">

                        <table class="text-center table no-footer" style="width:1%">
                            <thead>
                                <tr>
                                    <th>siswa</th>
                                    <?php
                                        $sub = new \App\Controllers\Sistem();
                                        $sub = $sub->sub->findAll();
                                        foreach ($sub as $sk) : ?>
                                    <th><?= $sk['nama_subkriteria']; ?></th>
                                    <?php endforeach ?>
                                    <th>NC</th>
                                    <th>NF</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($hasil as $h) : ?>
                                <tr>
                                    <td><?= $h['siswa']; ?></td>
                                    <?php foreach ($sub as $sk) : ?>
                                    <?php foreach ($h['kriteria'] as $hk) : ?>
                                    <?php foreach ($hk['tipe'] as $tipe) : ?>
                                    <?php foreach ($tipe['list'] as $list) : ?>
                                    <?php if ($list['sub'] == $sk['id_subkriteria']) : ?>
                                    <td><?= $list['nilai']; ?></td>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                    <?php endforeach ?>

                                    <?php endforeach ?>

                                    <?php endforeach ?>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-12 card-table mt-2">

                        <table class="text-center table no-footer" style="width:1%">
                            <h3>Perhitungan pemetaan GAP</h3>
                            <thead>
                                <tr>
                                    <th>siswa</th>
                                    <?php
                                        $sub = new \App\Controllers\Sistem();
                                        $sub = $sub->sub->findAll();
                                        foreach ($sub as $sk) : ?>
                                    <th><?= $sk['nama_subkriteria']; ?></th>
                                    <?php endforeach ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($hasil as $h) : ?>
                                <tr>
                                    <td><?= $h['siswa']; ?></td>
                                    <?php foreach ($sub as $sk) : ?>
                                    <?php foreach ($h['kriteria'] as $hk) : ?>
                                    <?php foreach ($hk['tipe'] as $tipe) : ?>
                                    <?php foreach ($tipe['list'] as $list) : ?>
                                    <?php if ($list['sub'] == $sk['id_subkriteria']) : ?>
                                    <td><?= $list['nilai'] . " - " . $list['target'] . " = " . $list['selisih']; ?>
                                    </td>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                    <?php endforeach ?>

                                    <?php endforeach ?>

                                    <?php endforeach ?>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-12 card-table mt-2">

                        <table class="text-center table no-footer" style="width:1%">
                            <h3>Pembobotan nilai GAP</h3>
                            <thead>
                                <tr>
                                    <th>siswa</th>
                                    <?php
                                        $sub = new \App\Controllers\Sistem();
                                        $sub = $sub->sub->findAll();
                                        foreach ($sub as $sk) : ?>
                                    <th><?= $sk['nama_subkriteria']; ?></th>
                                    <?php endforeach ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($hasil as $h) : ?>
                                <tr>
                                    <td><?= $h['siswa']; ?></td>
                                    <?php foreach ($sub as $sk) : ?>
                                    <?php foreach ($h['kriteria'] as $hk) : ?>
                                    <?php foreach ($hk['tipe'] as $tipe) : ?>
                                    <?php foreach ($tipe['list'] as $list) : ?>
                                    <?php if ($list['sub'] == $sk['id_subkriteria']) : ?>
                                    <td><?= $list['bobot']; ?>
                                    </td>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                    <?php endforeach ?>

                                    <?php endforeach ?>

                                    <?php endforeach ?>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-12 card-table mt-2">

                        <table class="text-center w-auto table no-footer" style="width:1%">
                            <h3>Total <?= $kriteria['nama']; ?></h3>
                            <thead>
                                <tr>
                                    <th>siswa</th>
                                    <?php
                                        $sub = new \App\Controllers\Sistem();
                                        $sub = $sub->kriteria->findAll();
                                        foreach ($sub as $sk) : ?>
                                    <th><?= $sk['nama_kriteria']; ?></th>
                                    <?php endforeach ?>
                                    <!-- <th>NC</th>
<th>NF</th>
<th>Total</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($hasil as $h) : ?>
                                <tr>
                                    <td><?= $h['siswa']; ?></td>
                                    <?php foreach ($sub as $sk) : ?>
                                    <?php foreach ($h['kriteria'] as $k) : ?>
                                    <?php if ($k['nama'] == $sk['nama_kriteria']) : ?>
                                    <td>
                                        <?php
                                                            $i = 0;
                                                            $j = count($k['tipe']);
                                                            ?>
                                        <?php foreach ($k['tipe'] as $tipe) : ?>
                                        (<?= $tipe['faktor'] . " x  " . $tipe['bobot'] . "%"; ?>)
                                        <?php
                                                                if ($i++ < $j - 1)
                                                                    echo "+";
                                                                else
                                                                    echo "= ";
                                                                ?>
                                        <?php endforeach ?>
                                        <b class="text-danger"><?= $k['total']; ?></b>
                                    </td>

                                    <?php endif ?>

                                    <?php endforeach ?>
                                    <?php endforeach ?>
                                </tr>

                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <?php endforeach ?>
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2>Hasil akhir</h2>
                </div>
                <div class="card-body">
                    <div class="col-12 card-table">

                        <table class="w-100 text-center table no-footer" style="width:1%">
                            <thead>
                                <tr>
                                    <th>Siswa</th>
                                    <th>Total</th>
                                    <th>Ranking</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($data as $d) : ?>
                                <tr>
                                    <td><?= $d['siswa']; ?></td>
                                    <td><?= $d['total']; ?></td>
                                    <td><?= ++$i; ?></td>
                                </tr>

                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- hasil akhir -->

        </div>

    </div>
</div>

<!-- tambah data -->
<script>
window.onload = function() {
    $(".drop").click(function() {
        console.log();
        $state = $(this).parent().parent().next().css("display");
        $(this).parent().parent().next().css("display", $state == "none" ? "block" : "none");
    })
}
</script>
<?= $this->endSection() ?>