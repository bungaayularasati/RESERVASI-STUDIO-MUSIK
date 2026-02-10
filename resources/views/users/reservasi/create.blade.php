@extends('layouts.user')

@section('content')
<div class="max-w-5xl mx-auto mt-8">

    <div class="bg-slate-900 border border-slate-800 rounded-2xl shadow-lg overflow-hidden">

        <!-- HEADER -->
<div class="p-6 border-b border-slate-800 text-center">
    <h1 class="text-2xl font-bold text-white">
        Pemesanan Studio
    </h1>
    <p class="text-sm text-slate-400 mt-1">
        Jam operasional: 09.00 – 22.00
    </p>
</div>


        <!-- FORM -->
        <form method="POST"
              action="{{ route('users.reservasi.store') }}"
              class="p-6 space-y-5"
              id="formReservasi">

            @csrf
            <input type="hidden" name="studio_id" value="{{ $studio->id }}">

            {{-- TANGGAL --}}
            <div>
                <label class="text-sm text-slate-300 mb-1 block">
                    Tanggal
                </label>
                <input type="date" name="tanggal" id="tanggal" required
                    class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white focus:ring-2 focus:ring-indigo-500">
            </div>

            {{-- INFO JAM TERBOOKING --}}
            <div id="jadwalTerbooking"
                class="hidden rounded-lg bg-yellow-500/10 border border-yellow-500/30 px-4 py-2 text-sm text-yellow-300">
            </div>

            {{-- JAM --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="text-sm text-slate-300 mb-1 block">
                        Jam Mulai
                    </label>
                    <input type="time" name="jam_dimulai" id="jam_dimulai" min="09:00" max="22:00" required
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>

                <div>
                    <label class="text-sm text-slate-300 mb-1 block">
                        Jam Selesai
                    </label>
                    <input type="time" name="jam_selesai" id="jam_selesai" min="09:00" max="22:00" required
                        class="w-full rounded-lg bg-slate-800 border border-slate-700 px-3 py-2 text-sm text-white">
                </div>
            </div>

            <div id="info"
                class="hidden rounded-lg bg-red-500/10 border border-red-500/30 px-4 py-2 text-sm text-red-300">
            </div>

            {{-- TOTAL --}}
            <div class="rounded-xl bg-slate-800 border border-slate-700 p-4 text-sm text-slate-200">
                <div class="flex justify-between mb-2">
                    <span>Lama Sewa</span>
                    <span class="font-semibold">
                        <span id="durasi">0</span> jam
                    </span>
                </div>

                <div id="diskonInfo" class="hidden flex justify-between mb-2 text-green-400">
                     <span>Diskon <span id="diskonPersen"></span>%</span>
                     <span>- Rp <span id="diskonNominal">0</span></span>
                </div>

                <div class="flex justify-between items-center">
                    <span>Total Bayar</span>
                    <span class="text-lg font-bold text-white">
                        Rp <span id="total">0</span>
                    </span>
                </div>
            </div>

            {{-- BUTTON --}}
            <div class="flex gap-3 pt-2">
                <a href="{{ url()->previous() }}"
                    class="w-1/2 text-center py-2.5 rounded-lg border border-slate-700 text-sm text-slate-300 hover:bg-slate-800 transition">
                    Kembali
                </a>

                <button type="submit" id="btnPesan"
                    class="w-1/2 py-2.5 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-sm font-semibold text-white transition">
                    Pesan Sekarang
                </button>
            </div>

        </form>
    </div>
</div>


<script>
const hargaPerJam = {{ $studio->harga_per_jam }};
const diskon = {{ $diskon ?? 0 }};
const jamMulai   = document.getElementById('jam_dimulai');
const jamSelesai = document.getElementById('jam_selesai');
const tanggal    = document.getElementById('tanggal');
const durasiEl   = document.getElementById('durasi');
const totalEl    = document.getElementById('total');
const infoEl     = document.getElementById('info');
const btnPesan   = document.getElementById('btnPesan');
const jadwalEl   = document.getElementById('jadwalTerbooking');
const form       = document.getElementById('formReservasi');

function jamKeMenit(jam){
    const [j, m] = jam.split(':');
    return (parseInt(j) * 60) + parseInt(m);
}

function cekBentrok(){
    if(!tanggal.value || !jamMulai.value || !jamSelesai.value) return;

    fetch("{{ route('users.reservasi.jadwal') }}",{
        method:'POST',
        headers:{
            'X-CSRF-TOKEN':'{{ csrf_token() }}',
            'Content-Type':'application/json'
        },
        body: JSON.stringify({
            studio_id: {{ $studio->id }},
            tanggal: tanggal.value
        })
    })
    .then(res => res.json())
    .then(data => {
        let bentrok = false;

        data.forEach(j => {
            const mulaiDB   = jamKeMenit(j.jam_dimulai);
            const selesaiDB = jamKeMenit(j.jam_selesai);

            const mulaiUser   = jamKeMenit(jamMulai.value);
            const selesaiUser = jamKeMenit(jamSelesai.value);

            if (mulaiUser < selesaiDB && selesaiUser > mulaiDB) {
                bentrok = true;
            }
        });

        if(bentrok){
            infoEl.innerText = '❌ Jam tersebut sudah dibooking';
            infoEl.classList.remove('hidden');
            btnPesan.disabled = true;
        } else {
            infoEl.classList.add('hidden');
            btnPesan.disabled = false;
        }
    });
}

function hitungTotal(){
    infoEl.classList.add('hidden');
    btnPesan.disabled = false;

    if(!jamMulai.value || !jamSelesai.value){
        durasiEl.innerText = 0;
        totalEl.innerText = 0;
        return;
    }

    const mulaiMenit = jamKeMenit(jamMulai.value);
    const selesaiMenit = jamKeMenit(jamSelesai.value);

    if(mulaiMenit < 540 || selesaiMenit > 1320 || selesaiMenit <= mulaiMenit){
        infoEl.innerText = '❌ Jam tidak valid (09.00 – 22.00)';
        infoEl.classList.remove('hidden');
        btnPesan.disabled = true;
        durasiEl.innerText = 0;
        totalEl.innerText = 0;
        return;
    }

    const durasi = (selesaiMenit - mulaiMenit) / 60;
    durasiEl.innerText = durasi;

    let total = durasi * hargaPerJam;

    if (diskon > 0) {
        const nominalDiskon = total * diskon;

        document.getElementById('diskonInfo').classList.remove('hidden');
        document.getElementById('diskonPersen').innerText = (diskon * 100);
        document.getElementById('diskonNominal').innerText = nominalDiskon.toLocaleString('id-ID');

        total = total - nominalDiskon;
    } else {
        document.getElementById('diskonInfo').classList.add('hidden');
    }

    totalEl.innerText = total.toLocaleString('id-ID');

    cekBentrok();
}

function tampilkanJadwalTerbooking(){
    if(!tanggal.value) return;

    jadwalEl.classList.add('hidden');
    jadwalEl.innerHTML = '';

    fetch("{{ route('users.reservasi.jadwal') }}",{
        method:'POST',
        headers:{
            'X-CSRF-TOKEN':'{{ csrf_token() }}',
            'Content-Type':'application/json'
        },
        body: JSON.stringify({
            studio_id: {{ $studio->id }},
            tanggal: tanggal.value
        })
    })
    .then(res => res.json())
    .then(data => {
        if(data.length){
            let html = '<strong>❌ Jam tidak tersedia:</strong><br>';
            data.forEach(j => {
                html += `• ${j.jam_dimulai} – ${j.jam_selesai}<br>`;
            });
            jadwalEl.innerHTML = html;
            jadwalEl.classList.remove('hidden');
        }
    });
}

tanggal.addEventListener('change', () => {
    tampilkanJadwalTerbooking();
    hitungTotal();
});

jamMulai.addEventListener('change', hitungTotal);
jamSelesai.addEventListener('change', hitungTotal);

form.addEventListener('submit', e => {
    if(btnPesan.disabled){
        e.preventDefault();
        alert('Silakan pilih jam yang valid dan tidak bentrok');
    }
});
</script>
@endsection
