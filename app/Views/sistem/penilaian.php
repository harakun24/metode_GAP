<?= $this->extend('template') ?>
<?= $this->section('content') ?>
<style>
/* .swal-footer {
    display: none;
} */
.card-table {
    overflow-x: scroll;
}

.table td.fit,
.table th.fit {
    white-space: nowrap;
    width: 1%;
}
</style>
<div class="row d-flex justify-content-center align-items-center">
    <div class="card col-11 mt-4">
        <div class="card-header d-flex justify-content-between">
            <h2>Penilaian</h2>
            <div>
                <select onchange="pilih(this)" id="kriteria" class="form-control">
                    <option value="0">--memuat data--</option>
                </select>
            </div>
        </div>
        <div class="card-body card-table mb-2">

            <table id="add-row" class="table no-footer" style="width:1%">
                <thead>
                    <tr>

                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>

    </div>
</div>

<!-- tambah data -->
<script>
const data = <?= json_encode($prep); ?>;
console.log(data);
window.onload = function() {
    kriteria = document.getElementById("kriteria");
    kriteria.innerHTML = ` <option value="0">--pilih kriteria--</option>`;
    for (d of data.kriteria) {
        opt = document.createElement("option");
        opt.value = d.id_kriteria;
        opt.innerHTML = `<b>[K-${d.id_kriteria}]</b> ` + d.nama_kriteria;
        kriteria.appendChild(opt);
    }
}

function pilih(t) {
    table = document.getElementById("add-row");
    th = table.querySelector("thead");
    th.innerHTML = "<tr><th class='fit'>Alternatif</th></tr>";
    tb = table.querySelector("tbody");
    tb.innerHTML = "";
    if (t.value > 0) {
        for (sk of data.subkriteria) {
            if (sk.id_kriteria == t.value) {
                tr = th.querySelector("tr");
                head = document.createElement("th");
                head.innerHTML = sk.nama_subkriteria + "<br> (" + sk.tipe + ")";
                head.setAttribute("class", "fit");
                tr.appendChild(head);
            }
        }
        const k = [];
        for ([key, val] of Object.entries(data.res)) {
            tr = document.createElement("tr");
            if (!k.includes(key)) {
                td = document.createElement("td");
                td.innerText = key;
                tr.appendChild(td);
                k.push(key);
            }
            for (p of val) {
                if (p.idk == t.value) {
                    dat = document.createElement("td");
                    dat.setAttribute("class", "fit");
                    input = document.createElement("select");
                    input.setAttribute("class", "form-control m-2");
                    input.setAttribute("onchange", `change(${p.idsub},${p.idsiswa},this)`);
                    for (i = 0; i < 6; i++) {
                        o = document.createElement("option");
                        o.value = i;
                        o.innerText = i;
                        if (p.nilai == i)
                            o.setAttribute("selected", "selected");
                        input.appendChild(o);
                    }
                    dat.appendChild(input);
                    tr.appendChild(dat);
                }
            }

            tb.appendChild(tr);

        }
    }
}

function change(sub, siswa, t) {
    fetch(`/Sistem/nilai/${sub}/${siswa}/${t.value}`)
        .then(res => res.json())
        .then(r => {
            console.log(r);
        });
}
</script>
<?= $this->endSection() ?>