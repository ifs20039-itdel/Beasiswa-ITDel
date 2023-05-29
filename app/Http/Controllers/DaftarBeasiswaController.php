<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registrar;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\BeasiswaEksternal;
use Alert;

class DaftarBeasiswaController extends Controller
{
    public function getIP($nim, $token)
    {
        //$token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiIsImp0aSI6IlVOSVFVRS1KV1QtSURFTlRJRklFUiJ9.eyJpc3MiOiJodHRwczpcL1wvYXBpLmV4YW1wbGUuY29tIiwiYXVkIjoiaHR0cHM6XC9cL2Zyb250ZW5kLmV4YW1wbGUuY29tIiwianRpIjoiVU5JUVVFLUpXVC1JREVOVElGSUVSIiwiaWF0IjoxNjc5OTc2NjQ4LCJleHAiOjE2Nzk5Nzk2NDgsInVpZCI6NDkwM30.YyTqf6i8x3qCVa_9C-NFtb1Sic6nOJ8OswPeJ_Ff9eU";
        //$token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiIsImp0aSI6IlVOSVFVRS1KV1QtSURFTlRJRklFUiJ9.eyJpc3MiOiJodHRwczpcL1wvYXBpLmV4YW1wbGUuY29tIiwiYXVkIjoiaHR0cHM6XC9cL2Zyb250ZW5kLmV4YW1wbGUuY29tIiwianRpIjoiVU5JUVVFLUpXVC1JREVOVElGSUVSIiwiaWF0IjoxNjc5OTgwNDU1LCJleHAiOjE2Nzk5ODM0NTUsInVpZCI6NDkwMX0.LTh-Qtbewrhl3wwa6GVKztfOwemZQ6wM0RH0x703isU";
        $userIP = Http::withToken($token)->asForm()->post('https://cis.del.ac.id/api/library-api/get-penilaian?nim=' .$nim)->body();
        $jsonIP = json_decode($userIP, true);
        $userIP = $jsonIP['IP'];
        return $jsonIP['IP'];
    }
    
    public function getPerilaku($nim, $token){
        $userIP = Http::withToken($token)->asForm()->post('https://cis.del.ac.id/api/library-api/get-penilaian?nim=' . $nim)->body();
        $jsonIP = json_decode($userIP, true);
        $perilaku = $jsonIP['Nilai Perilaku'];
        $currentPerilaku = $perilaku['2022_2']['nilai_huruf'];
        return $currentPerilaku;
    }

    public function create()
    {
        // Get the user data
        $beasiswa = BeasiswaEksternal::all();
        $user  = User::where('user_id', Auth::user()->user_id)->first();
        $userDetail = UserDetail::where('id_user', Auth::user()->user_id)->first();
        $userIP = $this->getIP($userDetail->nim, $user->remember_token);
        $nilaiPerilaku = $this->getPerilaku($userDetail->nim, $user->remember_token);


        return view(
            'daftarBeasiswa.formDaftar',
            [
                'user' => $user,
                'userDetail' => $userDetail,
                'beasiswa' => $beasiswa,
                'userIP' => $userIP,
                'nilaiPerilaku'=> $nilaiPerilaku
            ]
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipe' => 'required',
            'emailPribadi' => 'required',
            'hp' => 'required',
            'live' => 'required',
        ]);

        // Get the file from the request
        $file1 = $request->hasFile('ktm');
        $file_name = "";
        if ($file1) {
            $newFile = $request->file('ktm');
            $file_name .= $newFile->store('registrar');
        }

        $file2 = $request->hasFile('ktp');
        $file_name = "";
        if ($file2) {
            $newFile = $request->file('ktp');
            $file_name .= $newFile->store('registrar');
        }

        $file3 = $request->hasFile('kks');
        $file_name = "";
        if ($file3) {
            $newFile = $request->file('kks');
            $file_name .= $newFile->store('registrar');
        }

        $file4 = $request->hasFile('sptmb');
        $file_name = "";
        if ($file4) {
            $newFile = $request->file('sptmb');
            $file_name .= $newFile->store('registrar');
        }

        $file5 = $request->hasFile('other');
        $file_name = "";
        if ($file5) {
            $newFile = $request->file('other');
            $file_name .= $newFile->store('registrar');
        }

        Registrar::insert([
            'id_daftar' => rand(1000, 10000),
            'emailMhs' => $request->email,
            'nama' => $request->nama,
            'nim' => $request->nim,
            'prodi' => $request->prodi,
            'tipeBeasiswa' => $request->tipe,
            'emailPribadi' => $request->emailPribadi,
            'noHp' => $request->hp,
            'tanggalLahir' => $request->tgl,
            'ipk' => $request->ipk,
            'tempatTinggal' => $request->live,
            'ktm' => $file1,
            'ktp' => $file2,
            'transkrip' => $file3,
            'suratPernyataan' => $file4,
            'lainnya' => "null",
            'created_at' => now()
        ]);
        // Get all data registrars
        $registrars = Registrar::all();

        Alert::success('Sukses', 'Anda Berhasil Mendaftar.');
        return redirect()->route('seleksi');
    }

    public function show()
    {
        $query = Registrar::query();
        
        if (request()->has('prodi') && request()->query('prodi') != '') {
            $prodi = request()->query('prodi');
            $query = $query->where('prodi', $prodi);
        }

        if (request()->has('jenis') && request()->query('jenis') != '') {
            $jenis = request()->query('jenis');
            $query = $query->where('jenis_Beasiswa', $jenis);
        }

        if (request()->has('status') && request()->query('status') != '') {
            $status = request()->query('status');
            $query = $query->where('status_beasiswa', $status);
        }

        $data = $query->get();
        return view('seleksibeasiswa.seleksi', compact('data'));
    }

    public function detail($nim)
    {
        // dd($nim);
        $beasiswa = Registrar::where('nim', $nim)->first();
        // dd($beasiswa);
        return view('seleksibeasiswa.detail', compact('beasiswa'));
    }

    public function update(Request $request)
    {

        $beasiswa = Registrar::where('nim', $request->nim)->first();

        if ($request->submit == 'diterima') {
            $beasiswa->status_beasiswa = 'diterima';
        } elseif ($request->submit == 'ditolak') {
            $beasiswa->status_beasiswa = 'ditolak';
        }
        
        $beasiswa->save();
        
        return redirect()->route('seleksi');
    }
}
