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
            <h2>Penilaian</h2>
            <div class="ml-2">
                <select onchange="pilih(this)" id="kriteria" class="form-control">
                    <option value="0">--memuat data--</option>
                </select>
            </div>
        </div>
        <div class="card-body card-table mb-2">

            <table id="add-row" class="text-center table no-footer" style="width:auto">
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
let data = <?= json_encode($list); ?>;
const aspek = <?= json_encode($kriteria); ?>;
window.onload = function() {
    kriteria = document.getElementById("kriteria");
    kriteria.innerHTML = ` <option value="0">--pilih Aspek--</option>`;
    for (d of aspek) {
        opt = document.createElement("option");
        opt.value = d.id_kriteria;
        opt.innerHTML = d.nama_kriteria;
        kriteria.appendChild(opt);
    }
}

function pilih(t) {
    let tipe = "";
    for (a of aspek) {
        if (a.id_kriteria == t.value)
            tipe = a.jenis
    }
    fetch("/Sistem/refresh2")
        .then(res => res.json())
        .then(res => {
            data = res.prep;
            table = document.getElementById("add-row");
            th = table.querySelector("thead");
            th.innerHTML = "<tr></tr>";
            tb = table.querySelector("tbody");
            tb.innerHTML = "";
            if (t.value > 0) {
                const list = res.list;
                const header = list[0]['data'];
                th.querySelector("tr").innerHTML = "<th>Siswa</th>";
                for (h of header) {
                    if (t.value == h.k) {
                        head = document.createElement("th");
                        head.innerText = h.nama;
                        th.querySelector("tr").appendChild(head);
                    }
                }

                for (l of list) {
                    tr = document.createElement("tr");
                    siswa = document.createElement("td");
                    siswa.setAttribute("class", "text-right");
                    siswa.innerText = l.siswa;
                    tr.appendChild(siswa);
                    for (dat of l.data) {
                        if (dat.k == t.value) {
                            td = document.createElement("td");
                            td.style.minWidth = "120px";
                            if (tipe == "angka") {
                                input = document.createElement("input");
                                input.value = dat.nilai;
                            } else {
                                input = document.createElement("select");
                                input.innerHTML = `
                                <option value="A"` + (dat.nilai == "A" ? "selected" : "") + `>A</option>
                                <option value="B"` + (dat.nilai == "B" ? "selected" : "") + `>B</option>
                                <option value="C"` + (dat.nilai == "C" ? "selected" : "") + `>C</option>
                                <option value="D"` + (dat.nilai == "D" ? "selected" : "") + `>D</option>
                                <option value="E"` + (dat.nilai == "E" ? "selected" : "") + `>E</option>
                                `;
                            }
                            input.setAttribute("class", "form-control my-1");
                            input.setAttribute("oninput", "change(" + dat.sk + "," + dat.siswa + ",this)");
                            td.appendChild(input);
                            tr.appendChild(td);
                        }
                    }
                    tb.appendChild(tr);
                }


            }
        });
}

function change(sub, siswa, t) {
    tt = t.value == "" ? 0 : t.value;
    fetch(`/Sistem/nilai/${sub}/${siswa}/${tt}`)
        .then(res => res.json())
        .then(r => {
            console.log(r);
        });
}
</script>
<?= $this->endSection() ?>