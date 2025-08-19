@extends('layouts.master')

@section('content')
    <h1>Daftar Siswa Kami</h1>
    <hr>
    <a href="/produk/tambah" type="button" class="btn btn-primary mb-3">Tambah siswa</a>
   <div class="alert alert-primary" >
    <b>nama murid : </b> {{$data_murid['nama_murid']}}
    <br>
    <b>kelas :</b> {{$data_murid['kelas_siswa']}}
    <br>
    <b>absen :</b> {{$data_murid['absen_siswa']}}
    <br>
    <b>nisn:</b> {{$data_murid['nisn_siswa']}}
    </div>
    <div class="card">
        <div class="card-header">
            <h2>Daftar Siswa RPL</h2>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Murid</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Absen</th>
                        <th scope="col">NISN</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Rahmat Kipas Angin</td>
                        <td>12 RPL</td>
                        <td>43</td>
                        <td>123456789</td>
                        <td>
                            <button type="button" class="btn btn-danger">Report</button>
                            <button type="button" class="btn btn-warning">Edit</button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Asep Knalpot</td>
                        <td>12 RPL</td>
                        <td>44</td>
                        <td>987654321</td>
                        <td>
                            <button type="button" class="btn btn-danger">Report</button>
                            <button type="button" class="btn btn-warning">Edit</button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Wahyudi Tronton</td>
                        <td>12 RPL</td>
                        <td>45</td>
                        <td>343434343</td>
                        <td>
                            <button type="button" class="btn btn-danger">Report</button>
                            <button type="button" class="btn btn-warning">Edit</button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">-</th>
                        <td colspan="5" class="text-center">End</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
