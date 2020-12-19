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
            <h2 class="mb-3">Ubah data</h2>
            <div class="form-group form-group-default">
                <label>NISN</label>
                <input name="nis" type="text" class="form-control" placeholder="ex: 03314">
            </div>
            <div class="form-group form-group-default">
                <label>nama</label>
                <input name="nama" type="text" class="form-control" placeholder="ex: Angga ramadhan">
            </div>
            <div class="form-group form-group-default">
                <label>jenis kelamin</label>
                <select name="jk" class="form-control">
                    <option value="laki-laki">laki-laki</option>
                    <option value="perempuan">perempuan</option>
                </select>
            </div>
            <div class="form-group mb-3 p-0 d-flex justify-content-end">
                <input class="btn btn-primary" type="submit" value="simpan">
            </div>
        </form>
    </div>
    <!-- edit -->
    <form id="tambah" method="POST" action="<?= route_to('add_alternatif'); ?>" class="col-12">
        <h2 class="mb-3">Tambah data</h2>
        <div class="form-group form-group-default">
            <label>NISN</label>
            <input name="nis" type="text" class="form-control" placeholder="ex: 03314">
        </div>
        <div class="form-group form-group-default">
            <label>nama</label>
            <input name="nama" type="text" class="form-control" placeholder="ex: Angga ramadhan">
        </div>
        <div class="form-group form-group-default">
            <label>jenis kelamin</label>
            <select name="jk" class="form-control">
                <option value="laki-laki">laki-laki</option>
                <option value="perempuan">perempuan</option>
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
            <h2>Alternatif</h2>
            <div>
                <button onclick="tambah()" class="btn m-1 btn-primary btn-rounded">
                    Tambah data &nbsp;<i class="fa fa-plus"></i>
                </button>
                <button onclick="batch()" class="btn m-1 btn-danger btn-rounded">Hapus semua &nbsp;<i
                        class="fa fa-trash"></i></button>
            </div>
        </div>
        <div class="card-body card-table mb-2">
            <table id="add-row" class="display table table-striped table-hover dataTable no-footer">
                <thead>
                    <tr>
                        <th>NIS</th>
                        <th>Nama siswa</th>
                        <th>Jenis kelamin</th>
                        <th style="width:20%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($siswa as $s) : ?>

                    <tr>
                        <td><?= $s['nisn']; ?></td>
                        <td><?= $s['nama_siswa']; ?></td>
                        <td><?= $s['jenis_kelamin']; ?></td>
                        <td class="text-center">
                            <button onclick="edit(<?= $s['id_alternatif']; ?>)"
                                class="m-1 btn btn-sm btn-success px-2 py-1">
                                <i class="fa fa-pen"></i> </button>
                            <button onclick="hapus(<?= $s['id_alternatif']; ?>)"
                                class="m-1 btn btn-sm btn-danger px-2 py-1">
                                <im-2 class="fa fa-trash-alt"></im-2>
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
    const ubah = document.getElementById("tambah");
    const baru = ubah.cloneNode(true);
    swal({
        buttons: false,
        content: baru
    })
}

function edit(id) {
    fetch('/Sistem/get_siswa/' + id)
        .then(res => res.json())
        .then(res => {
            const ubah = document.getElementById("ubah");
            console.log(ubah);
            const baru = ubah.cloneNode(true);
            let temp = ubah.querySelector("input[name=nis]");
            temp.value = res.nisn;
            temp = ubah.querySelector("input[name=nama]")
            temp.value = res.nama_siswa;
            temp = ubah.querySelector("select")
            temp.selectedIndex = res.jenis_kelamin == "laki-laki" ? 0 : 1;
            ubah.setAttribute("action", "/Sistem/alternatif/ubah/" + id)
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
            document.location.href = '/Sistem/alternatif/hapus/' + id;

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
            document.location.href = '<?= route_to("batch_alternatif"); ?>';
    });
}
</script>
<?= $this->endSection() ?>