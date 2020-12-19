<?= $this->extend('template') ?>
<?= $this->section('content') ?>
<style>
/* .swal-footer {
    display: none;
} */
.card-table {
    overflow-x: scroll;
}
</style>
<div class="d-none">
    <div id="div-ubah">

        <form id="ubah" method="POST" action="#" class="col-12">
            <h2 class="mb-3">Tambah data</h2>
            <div class="form-group form-group-default">
                <label>kriteria</label>
                <input name="nama" type="text" class="form-control" placeholder="ex: Kecerdasan">
            </div>
            <div class="form-group form-group-default">
                <label>bobot</label>
                <input name="bobot" type="number" min="1" value="0" class="form-control"
                    placeholder="ex: Angga ramadhan">
            </div>
            <div class="form-group form-group-default">
                <label>bobot core</label>
                <input name="core" type="number" min="1" value="0" class="form-control">
            </div>
            <div class="form-group form-group-default">
                <label>bobot secondary</label>
                <input name="secodnary" type="number" min="1" value="0" class="form-control">
            </div>
            <div class="form-group mb-3 p-0 d-flex justify-content-end">
                <input class="btn btn-primary" type="submit" value="simpan">
            </div>
        </form>
    </div>
    <!-- edit -->
    <form id="tambah" method="POST" action="<?= route_to('add_kriteria'); ?>" class="col-12">
        <h2 class="mb-3">Tambah data</h2>
        <div class="form-group form-group-default">
            <label>kriteria</label>
            <input name="nama" type="text" class="form-control" placeholder="ex: Kecerdasan">
        </div>
        <div class="form-group form-group-default">
            <label>bobot</label>
            <input name="bobot" type="number" class="form-control" placeholder="ex: Angga ramadhan">
        </div>
        <div class="form-group form-group-default">
            <label>bobot core</label>
            <input name="core" type="number" class="form-control">
        </div>
        <div class="form-group form-group-default">
            <label>bobot secondary</label>
            <input name="secodnary" type="number" class="form-control">
        </div>

        <div class="form-group mb-3 p-0 d-flex justify-content-end">
            <input class="btn btn-primary" type="submit" value="simpan">
        </div>
    </form>
</div>
<div class="row d-flex justify-content-center align-items-center">
    <div class="card col-11 mt-4">
        <div class="card-header d-flex justify-content-between">
            <h2>Kriteria</h2>
            <div style="font-size: 80%;">
                <button onclick="tambah()" class="btn m-1 btn-primary btn-rounded">
                    Tambah data &nbsp;<i class="fa fa-plus"></i>
                </button>
                <button onclick="batch()" class="btn m-1 btn-danger btn-rounded">Hapus semua &nbsp;<i
                        class="fa fa-trash"></i></button>
            </div>
        </div>
        <div class="card-body card-table mb-2">

            <table id="add-row" class="table table-striped table-hover dataTable no-footer">
                <thead>
                    <tr>
                        <th>Kriteria</th>
                        <th>bobot</th>
                        <th>bobot core</th>
                        <th>bobot secondary</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($kriteria as $k) : ?>

                    <tr>
                        <td><?= $k['nama_kriteria']; ?></td>
                        <td><?= $k['bobot_kriteria']; ?>%</td>
                        <td><?= $k['bobot_core']; ?>%</td>
                        <td><?= $k['bobot_secondary']; ?>%</td>
                        <td class="text-center">
                            <button onclick="edit(<?= $k['id_kriteria']; ?>)"
                                class="m-1 btn btn-sm btn-success px-2 py-1">
                                <i class="fa fa-edit"></i> </button>
                            <button onclick="hapus(<?= $k['id_kriteria']; ?>)"
                                class="m-1 btn btn-sm btn-danger px-2 py-1">
                                <im-2 class="fa fa-trash"></im-2>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
        </div>

    </div>
</div>

<!-- tambah data -->
<script>
window.onload = function() {
    <?php if (session()->getFlashData('insert')) : ?>
    swal({
        icon: "success",
        title: "Tambah data",
        text: "berhasi menambah data baru",
        buttons: {
            confirm: {
                text: 'tutup',
                className: 'btn btn-primary'
            },
        }
    })
    <?php endif ?>
    <?php if (session()->getFlashData('update')) : ?>
    swal({
        icon: "success",
        title: "Ubah data",
        text: "berhasi memperbarui data",
        buttons: {
            confirm: {
                text: 'tutup',
                className: 'btn btn-primary'
            },
        }
    })
    <?php endif ?>
    <?php if (session()->getFlashData('delete')) : ?>
    swal({
        icon: "success",
        title: "Data terhapus",
        text: "berhasi menghapus data",
        buttons: {
            confirm: {
                text: 'tutup',
                className: 'btn btn-primary'
            },
        }
    })
    <?php endif ?>
    $('#add-row').DataTable({
        "pageLength": 4,
    });
}

function tambah() {
    swal({
        buttons: false,
        content: document.getElementById('tambah')
    })
}

function edit(id) {
    fetch('/Sistem/get_kriteria/' + id)
        .then(res => res.json())
        .then(res => {
            const ubah = document.getElementById("ubah");
            console.log(ubah);
            const baru = ubah.cloneNode(true);
            let temp = ubah.querySelector("input[name=nama]");
            temp.value = res.nama_kriteria;
            temp = ubah.querySelector("input[name=bobot]")
            temp.value = res.bobot_kriteria;
            temp = ubah.querySelector("input[name=core]")
            temp.value = res.bobot_core;
            temp = ubah.querySelector("input[name=secodnary]")
            temp.value = res.bobot_secondary;
            ubah.setAttribute("action", "/Sistem/kriteria/ubah/" + id)
            swal({
                buttons: false,
                content: ubah
            })
            document.getElementById("div-ubah").append(baru)

        });
}

function hapus(id) {
    swal({
        icon: 'warning',
        title: 'Yakin ingin menghapus data? ',
        text: 'tekan cancel jika ingin membatalkan',
        buttons: {
            confirm: {
                text: 'Hapus',
                className: 'btn btn-danger'
            },
            cancel: {
                visible: 'true',
                className: 'btn btn-success'
            }
        }
    }).then((result) => {
        if (result)
            document.location.href = '/Sistem/kriteria/hapus/' + id;

    });
}

function batch() {
    swal({
        icon: 'error',
        title: 'Yakin ingin menghapus semua data? ',
        text: 'tekan cancel jika ingin membatalkan',
        buttons: {
            confirm: {
                text: 'Hapus',
                className: 'btn btn-danger'
            },
            cancel: {
                visible: 'true',
                className: 'btn btn-success'
            }
        }
    }).then((result) => {
        if (result)
            document.location.href = '<?= route_to("batch_kriteria"); ?>';
    });
}
</script>
<?= $this->endSection() ?>