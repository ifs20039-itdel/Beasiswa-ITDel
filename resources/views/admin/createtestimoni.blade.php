@extends('layouts.appAdmin')
@section('title','Dashboard')
@section('background', 'bg-white')
@section('konten')

 <div class="flex justify-between" >
        <h1 class="font-bold text-xl" style="font-size: 2rem; padding: 0 0 40px"  >Tambah Testimoni</h1>
    </div>
  <form class="mx-8 py-2" action="{{route('create-testimoni')}}" method="POST">
        @csrf
        <div class="grid grid-cols-2 gap
        <div class="grid grid-cols-2 gap-5">
            <div class="mb-6">
                <label for="nama" class="block pr-24 mb-2 text-md font-medium text-gray-900 dark:text-black">Nama<span style="color:red">*</span></label>
                <input autocomplete="off" type="text" id="nama" name="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Silahkan Isi Nama">

            </div>

             <div class="mb-6">
                <label for="nama" class="block pr-24 mb-2 text-md font-medium text-gray-900 dark:text-black">Isi Testimoni<span style="color:red">*</span></label>
                <textarea autocomplete="off" type="text" id="isi" name="isi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Silahkan Isi Nama" >
                </textarea>
             </div>

              <div class="mb-6">
                <label for="nama" class="block pr-24 mb-2 text-md font-medium text-gray-900 dark:text-black">Author<span style="color:red">*</span></label>
                <input autocomplete="off" type="text" id="author" name="author" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Silahkan Isi Nama">
              </div>
        </div>
               <div class="mb-6">
                <label for="nama" class="block pr-24 mb-2 text-md font-medium text-gray-900 dark:text-black">Berkas<span style="color:red">*</span></label>
                <input autocomplete="off" type="file" id="foto" name="foto" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Silahkan Isi Nama">
              </div>

              <button type="submit" class="bg-green-600 rounded-md px-7 py-2 text-white font-bold hover:shadow-slate-400 hover:bg-green-700 hover:shadow-md focus:ring-4 focus:outline-none focus:ring-green-500" style="margin-left: 870px; background-color:rgba(0, 118, 125, 1)">Tambah </a>
  </form>
@endsection

