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
                                <h2><?= $kriteria; ?></h2>
                                <h6 class="fw-bold mt-3 mb-0">Kriteria</h6>
                            </div>
                        </a>

                        <a href="<?= route_to('list_subkriteria'); ?>"
                            class="px-2 pb-2 pb-md-0 text-center card bg-warning text-white col-2">
                            <div class="card-body">
                                <h2><?= $sub; ?></h2>
                                <h6 class="fw-bold mt-3 mb-0">Sub kriteria</h6>
                            </div>
                        </a>

                        <a href="<?= route_to('list_alternatif'); ?>"
                            class="px-2 pb-2 pb-md-0 text-center card bg-success text-white col-2">
                            <div class="card-body">
                                <h2><?= $siswa; ?></h2>
                                <h6 class="fw-bold mt-3 mb-0">Alternatif</h6>
                            </div>
                        </a>
                        <a href="<?= route_to('list_alternatif'); ?>"
                            class="px-2 pb-2 pb-md-0 text-center card bg-info text-white col-2">
                            <div class="card-body">
                                <h2><?= (int)$nilai / (int)$sub; ?></h2>
                                <h6 class="fw-bold mt-3 mb-0">Nilai</h6>
                            </div>
                        </a>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- statistik -->


</div>
<?= $this->endSection() ?>