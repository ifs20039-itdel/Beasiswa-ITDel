@extends('layouts.app')
@section('title', 'Data Pendaftar')
@section('background', 'bg-white')
@section('content')
<div class="text-center" style="background-color: #0D285F; padding:115px;">
    <div>
        <h1 class="font-bold font-sans text-4xl text-white">DATA PENDAFTAR</h1>
    </div>
</div>
<div class="w-3/4 border rounded-lg mx-auto my-24 shadow-2xl bg-white" style="margin-top: -80px;">
    <div class="my-10 w-3/4 mx-auto">
        <div class="mb-10">
            <label class="text-xl p-1 tracking-wide" for="email">Email</label>
            <label class="block w-full px-4 py-3 text-black border border-gray-300 bg-gray-100 rounded leading-tight focus:outline-none focus:bg-white hover:shadow-md" id="email" name="email" type="email" readonly>{{ $beasiswa->emailMhs }}
            </label>
        </div>
        <div class="mb-10">
            <label class="text-xl p-1 tracking-wide" for="nama">Nama Mahasiswa (sesuai data di CIS)</slabel>
                <label class="block w-full px-4 py-3 text-black border border-gray-300 bg-gray-100 rounded leading-tight focus:outline-none focus:bg-white hover:shadow-md" id="nama" name="nama" type="text" readonly>{{ $beasiswa->nama }}
                </label>
        </div>
        <div class="mb-10">
            <label class="text-xl p-1 tracking-wide" for="nim">NIM (sesuai data di CIS)</label>
            <label class="block w-full px-4 py-3 text-black border border-gray-300 bg-gray-100 rounded leading-tight focus:outline-none focus:bg-white hover:shadow-md " id="nim" name="nim" type="text" readonly>{{ $beasiswa->nim}}
            </label>
        </div>
        <div class="mb-10">
            <label class="text-xl p-1 tracking-wide" for="prodi">Prodi</label>
            <label class="block w-full px-4 py-3 text-black border border-gray-300 bg-gray-100 rounded leading-tight focus:outline-none focus:bg-white hover:shadow-md" id="prodi" name="prodi" type="text" readonly>{{ $beasiswa->prodi }}</label>
        </div>
        <div class="mb-10">
            <label class="text-xl p-1 tracking-wide" for="tipe">Jenis Beasiswa</label>
            <div class="block w-full px-4 py-3 text-black border border-gray-300 bg-gray-100 rounded leading-tight focus:outline-none focus:bg-white hover:shadow-md">
                {{ $beasiswa->jenis_Beasiswa }}
            </div>
        </div>
        <div class="mb-10">
            <label class="text-xl p-1 tracking-wide" for="emailPribadi">Alamat Email Pribadi</label>
            <label class="block w-full px-4 py-3 text-black border border-gray-300 bg-gray-100 rounded leading-tight focus:outline-none focus:bg-white hover:shadow-md" id="emailPribadi" name="emailPribadi" type="email" readonly>{{ $beasiswa->emailPribadi }}
            </label>
        </div>
        <div class="mb-10">
            <label class="text-xl p-1 tracking-wide" for="hp">No. Handphone</label>
            <label class="block w-full px-4 py-3 text-black border border-gray-300 bg-gray-100 rounded leading-tight focus:outline-none focus:bg-white hover:shadow-md" id="hp" name="hp" type="text" readonly>{{ $beasiswa->noHp }}
            </label>
        </div>
        <div class="mb-10">
            <label class="text-xl p-1 tracking-wide" for="tgl">Tanggal Lahir</label>
            <label class="block w-full px-4 py-3 text-black border border-gray-300 bg-gray-100 rounded leading-tight focus:outline-none focus:bg-white hover:shadow-md" id="tgl" name="tgl" type="date" readonly>{{ $beasiswa->tanggalLahir }}
            </label>
        </div>
        <div class="mb-10">
            <label class="text-xl p-1 tracking-wide" for="live">Alamat Tempat Tinggal</label>
            <label class="block w-full px-4 py-3 text-black border border-gray-300 bg-gray-100 rounded leading-tight focus:outline-none focus:bg-white hover:shadow-md" id="live" name="live" type="text" readonly>{{ $beasiswa->tempatTinggal }}</label>
        </div>
        <div class="mb-10">
            <label class="text-xl p-1 tracking-wide" for="ipk">IPK</label>
            <label class="block w-full px-4 py-3 text-black border border-gray-300 bg-gray-100 rounded leading-tight focus:outline-none " id="ipk" name="ipk" type="text" readonly>{{ $beasiswa->ipk }}</label>
        </div>
        <div class="mb-10">
            <label class="text-xl p-1 tracking-wide" for="live">Nilai Perilaku</label>
            <label class="block w-full px-4 py-3 text-black border border-gray-300 bg-gray-100 rounded leading-tight focus:outline-none focus:bg-white hover:shadow-md" id="nilaiPerilaku" name="nilaiPerilaku" type="text" readonly>{{ $beasiswa->nilaiPerilaku }}</label>
        </div>
        <div class="mb-10">
            <label class="text-xl p-1 tracking-wide" for="ktm">Formulir Pendaftaran (pdf)</label>
            <label class="block w-full px-4 py-3 text-black border border-gray-300 bg-gray-100 rounded leading-tight focus:outline-none focus:bg-white hover:shadow-md" id="ktm" name="ktm" type="file" readonly><a href="{{ asset('storage/' . $beasiswa->formulir_pendaftaran) }}" target="_blank">Formulir Pendaftaran.pdf</a>
            </label>
        </div>
        <div class="mb-10">
            <label class="text-xl p-1 tracking-wide" for="ktm">Softcopy KTM (pdf)</label>
            <label class="block w-full px-4 py-3 text-black border border-gray-300 bg-gray-100 rounded leading-tight focus:outline-none focus:bg-white hover:shadow-md" id="ktm" name="ktm" type="file" readonly><a href="{{ asset('storage/' . $beasiswa->ktm) }}" target="_blank">Softcopy KTM.pdf</a></label>
        </div>
        <div class="mb-10">
            <label class="text-xl p-1 tracking-wide" for="ktp">Softcopy KTP (pdf)</label>
            <label class="block w-full px-4 py-3 text-black border border-gray-300 bg-gray-100 rounded leading-tight focus:outline-none focus:bg-white hover:shadow-md" id="ktp" name="ktp" type="file" readonly><a href="{{ asset('storage/' . $beasiswa->ktp) }}" target="_blank">Softcopy KTP.pdf</a>
            </label>

        </div>
        <div class="mb-10">
            <label class="text-xl p-1 tracking-wide" for="kks">Transkrip Nilai (pdf)</label>
            <label class="block w-full px-4 py-3 text-black border border-gray-300 bg-gray-100 rounded leading-tight focus:outline-none focus:bg-white hover:shadow-md" id="kks" name="kks" type="file"><a href="{{ asset('storage/' . $beasiswa->transkrip) }}" target="_blank">Transkrip Nilai (pdf)</a>
            </label>
        </div>
        <div class="mb-10">
            <label class="text-lg p-1 tracking-wide" for="sptmb">Softcopy Surat Pernyataan Tidak Menerima Beasiswa Lain Bermaterai 10000(pdf)</label>
            <label class="block w-full px-4 py-3 text-black border border-gray-300 bg-gray-200 rounded leading-tight focus:outline-none focus:bg-white hover:shadow-md" id="sptmb" name="sptmb" type="file"><a href="{{ asset('storage/' . $beasiswa->ktp) }}" target="_blank">Softcopy Surat Pernyataan.pdf</a>
            </label>
        </div>
        <div class="mt-10">
            <form action="/detail/{{ $beasiswa->nim }}" method="POST">
                @csrf
                <button class="bg-green-500 mx-1 px-5 py-2 text-white font-semibold rounded" type="submit" name="submit" value="diterima">Diterima
                </button>
                <button class="bg-red-500 mx-1 px-5 py-2 text-white font-semibold rounded" type="submit" name="submit" value="ditolak">Ditolak
                </button>
            </form>
        </div>

    </div>
</div>

@endsection