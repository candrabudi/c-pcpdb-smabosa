@extends('layouts.user.app')

@section('title')
Dashboard | SMABOSA YOGYAKARTA
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User /</span>
        Formulir Pendaftaran</h4>

    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-4">
                <li class="nav-item">
                    <a class="nav-link @if($check_navigation == 'BIODATA SISWA') active @endif" href="{{ route('user.student.student_biodata') }}"><i class="ti-xs ti ti-users me-1"></i> Biodata Siswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if($check_navigation == 'NILAI DAN ABSENSI') active @endif" href="{{ route('user.student.student_score_presence') }}"><i class="ti-xs ti ti-file-description me-1"></i> Nilai dan Absensi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if($check_navigation == 'BIODATA ORANG TUA') active @endif " href="{{ route('user.student.biodata_parent') }}"><i class="ti-xs ti ti-users me-1"></i> Biodata Ortu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link @if($check_navigation == 'DOKUMEN SISWA') active @endif" href="{{route('user.student.student_document')}}"><i class="ti-xs ti ti-file-description me-1"></i> Berkas</a>
                </li>
            </ul>

            @if($check_navigation == "BIODATA SISWA")
                @include('users.student.studentBiodata')
            @elseif($check_navigation == "NILAI DAN ABSENSI")
                @include('users.student.studentScorePresence')
            @elseif($check_navigation == "BIODATA ORANG TUA")
                @include('users.student.studentParent')
            @elseif($check_navigation == "DOKUMEN SISWA")
                @include('users.student.studentDocument')
            @else
                @include('users.student.studentBiodata')
            @endif

        </div>
    </div>
</div>
@endsection