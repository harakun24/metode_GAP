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
            <h2 class="mb-3">Edit data</h2>
            <div class="form-group form-group-default">
                <label>Aspek</label>
                <select name="kriteria" class="form-control">
                    <?php foreach ($kriteria as $k) : ?>
                    <option value="<?= $k['id_kriteria']; ?>"><?= $k['nama_kriteria']; ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group form-group-default">
                <label>Kriteria</label>
                <input name="sub" type="text" class="form-control">
            </div>
            <div class="form-group form-group-default">
                <label>profil ideal</label>
                <input type="text" name="bobot" class="form-control">
            </div>
            <div class="form-group form-group-default">
                <label>tipe</label>
                <select name="tipe" class="form-control">
                    <option value="core">core</option>
                    <option value="secondary">secondary</option>
                </select>
            </div>
            <div class="form-group mb-3 p-0 d-flex justify-content-end">
                <input class="btn btn-primary" type="submit" value="simpan">
            </div>
        </form>
    </div>
    <!-- edit -->
    <form id="tambah" method="POST" action="<?= route_to('add_subkriteria'); ?>" class="col-12">
        <h2 class="mb-3">Tambah data</h2>
        <div class="form-group form-group-default">
            <label>Aspek</label>
            <select name="kriteria" class="form-control">
                <?php foreach ($kriteria as $k) : ?>
                <option value="<?= $k['id_kriteria']; ?>"><?= $k['nama_kriteria']; ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group form-group-default">
            <label>Kriteria</label>
            <input name="sub" type="text" class="form-control">
        </div>
        <div class="form-group form-group-default">
            <label>profil ideal</label>
            <input type="text" name="bobot" class="form-control">
        </div>
        <div class="form-group form-group-default">
            <label>tipe</label>
            <select name="tipe" class="form-control">
                <option value="core">core</option>
                <option value="secondary">secondary</option>
            </select>
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
                        <th>Aspek</th>
                        <th>Kriteria</th>
                        <th>Profil ideal</th>
                        <th>jenis</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($subkriteria as $sk) :
                    ?>

                    <tr>
                        <td><?= '<b class="text-info">[A-' . $sk['id_kriteria'] . ']</b> ' . $sk['kriteria']; ?></td>
                        <td><?= $sk['nama_subkriteria']; ?></td>
                        <td><?= $sk['nilai_target']; ?></td>
                        <td>
                            <div>
                                <?= $sk['tipe'] . ' '; ?>
                            </div>
                        </td>
                        <td class="text-center">
                            <button onclick="edit(<?= $sk['id_subkriteria']; ?>)"
                                class="m-1 btn btn-sm btn-success px-2 py-1">
                                <i class="fa fa-edit"></i> </button>
                            <button onclick="hapus(<?= $sk['id_subkriteria']; ?>)"
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
        "pageLength": 16,
    });
}

function tambah() {
    const ubah = document.getElementById("tambah");
    const baru = ubah.cloneNode(true);
    swal({
        buttons: false,
        content: baru
    })
}

function edit(id) {
    fetch('/Sistem/get_subkriteria/' + id)
        .then(res => res.json())
        .then(res => {
            console.log(res)
            const ubah = document.getElementById("ubah");
            console.log(ubah);
            const baru = ubah.cloneNode(true);
            let temp = ubah.querySelector("select[name=kriteria]");
            let opt = temp.querySelectorAll("option");
            for (o of opt) {
                if (o.value == res.id_kriteria)
                    o.setAttribute("selected", "selected");
            }
            temp = ubah.querySelector("input[name=sub]");
            temp.value = res.nama_subkriteria;

            temp = ubah.querySelector("input[name=bobot]");
            temp.value = res.nilai_target;

            temp = ubah.querySelector("select[name=tipe]");
            opt = temp.querySelectorAll("option");
            for (o of opt) {
                if (o.value == res.tipe)
                    o.setAttribute("selected", "selected");
            }
            // temp.value = res.nama_subkriteria;
            ubah.setAttribute("action", "/Sistem/subkriteria/ubah/" + id)
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
            document.location.href = '/Sistem/subkriteria/hapus/' + id;

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
            document.location.href = '<?= route_to("batch_subkriteria"); ?>';
    });
}
</script>
<?= $this->endSection() ?>