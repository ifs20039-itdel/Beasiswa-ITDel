@extends('layouts.app')
@section('title','Seleksi')
@section('background', 'bg-white')
@section('content')
<html>

<head>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <style>
        .form-container {
            display: none;
        }

        .menu-icon {
            cursor: pointer;
            display: block;
            margin-bottom: 10px;
        }

        .form-container.show {
            display: block;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('.menu-icon').click(function() {
                $('.form-container').toggleClass('show');
            });
        });
    </script>
</head>

<body>
    <div class="container mx-auto my-4">
        <h1 class="text-center text-4xl font-bold py-10">Seleksi</h1>
        <div class="menu-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="3" y1="12" x2="21" y2="12" />
                <line x1="3" y1="6" x2="21" y2="6" />
                <line x1="3" y1="18" x2="21" y2="18" />
            </svg>
        </div>

        <form class="my-4 form-container" action="{{ route('seleksi') }}" method="GET">
            <table>
                <tr>
                    <td>
                        <label for="prodi" class="font-bold">Program Studi</label>
                    </td>
                    <td>
                        <select id="prodi" name="prodi" class="form-select block w-full max-w-xs">
                            <option value="">Semua</option>
                            <option value="DIII Teknologi Informasi" {{ request()->query('prodi') == 'DIII Teknologi Informasi' ? 'selected' : '' }}>D3 - TI</option>
                            <option value="DIII Teknologi Komputer" {{ request()->query('prodi') == 'DIII Teknologi Komputer' ? 'selected' : '' }}>D3 - TK</option>
                            <option value="DIV Sarjana Terapan Teknologi Rekayasa Perangkat Lunak" {{ request()->query('prodi') == 'DIV Sarjana Terapan Teknologi Rekayasa Perangkat Lunak' ? 'selected' : '' }}>D4 - TRPL</option>
                            <option value="S1 Informatika" {{ request()->query('prodi') == 'S1 Informatika' ? 'selected' : '' }}>S1 - IF</option>
                            <option value="S1 Sistem Informasi" {{ request()->query('prodi') == 'S1 Sistem Informasi' ? 'selected' : '' }}>S1 - SI</option>
                            <option value="S1 Teknik Elektro" {{ request()->query('prodi') == 'S1 Teknik Elektro' ? 'selected' : '' }}>S1 - TE</option>
                            <option value="S1 Manajemen Rekayasa" {{ request()->query('prodi') == 'Manajemen Rekayasa' ? 'selected' : '' }}>S1 - MR</option>
                            <option value="S1 Teknik Bioproses" {{ request()->query('prodi') == 'Teknik Bioproses' ? 'selected' : '' }}>S1 - TB</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="jenis" class="font-bold">Jenis Beasiswa</label>
                    </td>
                    <td>
                        <select id="jenis" name="jenis" class="form-select block w-full max-w-xs">
                            <option value="">Semua</option>
                            <option value="internal" {{ request()->query('jenis') == 'internal' ? 'selected' : '' }}>Internal</option>
                            <option value="eksternal" {{ request()->query('jenis') == 'eksternal' ? 'selected' : '' }}>Eksternal</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="status" class="font-bold">Status Beasiswa</label>
                    </td>
                    <td>
                        <select id="status" name="status" class="form-select block w-full max-w-xs">
                            <option value="">Semua</option>
                            <option value="sedang diproses" {{ request()->query('status') == 'sedang diproses' ? 'selected' : '' }}>Sedang Diproses</option>
                            <option value="diterima" {{ request()->query('status') == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                            <option value="ditolak" {{ request()->query('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                        </select>
                    </td>
                </tr>
            </table>
            <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded my-4">Filter</button>
        </form>
        @if ($data->isEmpty())
        <x-carbon-warning height=" 50px" color="red" class="w-1/4 m-auto mb-2" />
        <h1 class="text-center font-bold text-1xl border w-1/4 mx-auto my-7 py-2 rounded-xl bg-red-600 text-white">Tidak ada data yang dapat ditampilkan!</h1>
        @else
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">No</th>
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">NIM</th>
                    <th class="px-4 py-2">Program Studi</th>
                    <!-- <th class="px-4 py-2">Angkatan</th> -->
                    <th class="px-4 py-2">Beasiswa</th>
                    <th class="px-4 py-2">Status Beasiswa</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no = 1;
                @endphp
                @foreach ($data as $beasiswa)
                @if (Auth::user()->role == "Mahasiswa")
                @if (Auth::user()->email == $beasiswa->emailMhs)
                <tr>
                    <td class="border px-4 py-2">{{ $no++ }}</td>
                    <td class="border px-4 py-2">{{ $beasiswa->nama }}</td>
                    <td class="border px-4 py-2">{{ $beasiswa->nim }}</td>
                    <td class="border px-4 py-2">{{ $beasiswa->prodi }}</td>
                    <!-- <td class="border px-4 py-2">{{ $beasiswa->year }}</td> -->
                    <td class="border px-4 py-2">{{ $beasiswa->jenis_Beasiswa }}</td>
                    <td class="border px-4 py-2">{{ $beasiswa->status_beasiswa }}</td>
                </tr>
                @endif
                @elseif (Auth::user()->role == "Admin")
                <tr onclick="window.location='{{ route('detail', ['nim' => $beasiswa->nim]) }}'">
                    <td class="border px-4 py-2">{{ $no++ }}</td>
                    <td class="border px-4 py-2">{{ $beasiswa->nama }}</td>
                    <td class="border px-4 py-2">{{ $beasiswa->nim }}</td>
                    <td class="border px-4 py-2">{{ $beasiswa->prodi }}</td>
                    <!-- <td class="border px-4 py-2">{{ $beasiswa->year }}</td> -->
                    <td class="border px-4 py-2">{{ $beasiswa->jenis_Beasiswa }}</td>
                    <td class="border px-4 py-2 flex justify-center">
                        @if ($beasiswa->status_beasiswa == 'diterima')
                        <button class="bg-transparent hover:bg-green-500 text-green-700 font-semibold hover:text-white py-2 px-4 border border-green-500 hover:border-transparent rounded">
                            Diterima
                        </button>
                        @elseif ($beasiswa->status_beasiswa == 'ditolak')
                        <button class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">
                            Ditolak
                        </button>
                        @else
                        {{ $beasiswa->status_beasiswa }}
                        @endif
                    </td>
                </tr>

                @endif
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</body>

</html>
@endsection