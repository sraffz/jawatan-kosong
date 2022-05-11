@extends('layouts.app', ['page' => 'Tetapan', 'title' =>'Jawatan Kosong | Pejabat Setiausaha Kerajaan Negeri'])

@section('content')
    <div class="card" id="password">
        <div class="card-header">
            <h5>Tukar Kata laluan</h5>
        </div>
        <div class="card-body pt-0">
            <div class="input-group input-group-outline">
                <label class="form-label">Kata Laluan Terkini</label>
                <input type="password" class="form-control">
            </div>
            <div class="input-group input-group-outline my-4">
                <label class="form-label">Kata laluan baru</label>
                <input type="password" class="form-control">
            </div>
            <div class="input-group input-group-outline">
                <label class="form-label">Sahkan Kata laluan baru</label>
                <input type="password" class="form-control">
            </div>
            <h5 class="mt-5">Keperluan kata laluan</h5>
            <p class="text-muted mb-2">
                Sila ikut panduan ini bagi mencipta kata laluan yang kukuh:
            </p>
            <ul class="text-muted ps-4 mb-0 float-start">
                <li>
                    <span class="text-sm">Satu simbol</span>
                </li>
                <li>
                    <span class="text-sm">Minimum 8 aksara</span>
                </li>
                <li>
                    <span class="text-sm">Satu nombor (2 Nombor sangat dicadangkan)</span>
                </li>
                <li>
                    <span class="text-sm">Kerap Tukar</span>
                </li>
            </ul>
            <button class="btn bg-gradient-dark btn-sm float-end mt-6 mb-0">Kemaskini Kata laluan</button>
        </div>
    </div>
@endsection

@section('script')
@endsection
