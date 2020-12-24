<?= $this->extend('template') ?>
<?= $this->section('content') ?>
<style>
a:hover {
    text-decoration: none;
}
</style>
<div class="panel-header bg-dark-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                <h5 class="text-white op-7 mb-2">Sistem Penunjang Keputusan - Metode GAP</h5>
            </div>
        </div>
    </div>
</div>
<div class="page-inner mt--5">
    <!-- Statistik -->
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-title">Data Statistik</div>
                    <div class="card-category">Jumlah semua data yang dimiliki sistem</div>
                    <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                        <a href="<?= route_to('list_kriteria'); ?>"
                            class="px-2 pb-2 pb-md-0 text-center card bg-danger text-white col-2">
                            <div class="card-body">
                                <h2 id="aspek">0</h2>
                                <h6 class="fw-bold mt-3 mb-0">ASPEK</h6>
                            </div>
                        </a>

                        <a href="<?= route_to('list_subkriteria'); ?>"
                            class="px-2 pb-2 pb-md-0 text-center card bg-warning text-white col-2">
                            <div class="card-body">
                                <h2 id="kriteria">0</h2>
                                <h6 class="fw-bold mt-3 mb-0">KRITERIA</h6>
                            </div>
                        </a>

                        <a href="<?= route_to('list_alternatif'); ?>"
                            class="px-2 pb-2 pb-md-0 text-center card bg-success text-white col-2">
                            <div class="card-body">
                                <h2 id="siswa">0</h2>
                                <h6 class="fw-bold mt-3 mb-0">SISWA</h6>
                            </div>
                        </a>
                        <a href="Sistem/penilaian" class="px-2 pb-2 pb-md-0 text-center card bg-info text-white col-2">
                            <div class="card-body">
                                <h2 id="nilai">0</h2>
                                <h6 class="fw-bold mt-3 mb-0">NILAI</h6>
                            </div>
                        </a>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- statistik -->
    <script>
    window.onload = function() {
        const aspek = <?= $kriteria; ?>;
        const kriteria = <?= $sub; ?>;
        const siswa = <?= $siswa; ?>;
        const nilai = <?= $nilai; ?>;
        loadNum("#aspek", aspek);
        loadNum("#kriteria", kriteria, 30);
        loadNum("#siswa", siswa);
        loadNum("#nilai", nilai, 10);

    }

    function loadNum(target, until, speed = 100) {
        let i = 0;
        setInterval(() => {
            if (i > until) {
                return;
            }
            $(target).html(i++);
        }, speed);
    }
    </script>

</div>
<?= $this->endSection() ?>