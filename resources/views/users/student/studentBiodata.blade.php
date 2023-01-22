<div class="card mb-4">
    <h5 class="card-header">BIODATA SISWA</h5>
    <div class="card-body">
        <form id="formAccountSettings" action="{{ route('user.store_biodata') }}" method="POST">
            @csrf
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="nisn">
                        NISN</label>
                    <div class="input-group input-group-merge">
                        <input class="form-control" type="number" value="{{ !empty($student) ? $student->nisn : '' }}" name="nisn" id="nisn" />
                    </div>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="full-name">NAMA LENGKAP</label>
                    <div class="input-group input-group-merge">
                        <input class="form-control" type="text" value="{{ $user->full_name }}" id="fullName" name="full_name" />
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="mb-3 col-md-4 form-lable">
                    <label class="form-label" for="gender">Jenis Kelamin</label>
                    <div class="input-group input-group-merge">
                        <select class="form-select" name="gender" id="gender" aria-label="gender">
                            @if(!empty($student->gender))
                                <option selected value="{{ $student->gender }}">{{ $student->gender }}</option>
                                <option value="">Pilih Jenis Kelamin</option>
                            @else
                                <option selected value="">Pilih Jenis Kelamin</option>
                            @endif
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 col-md-4 form-lable">
                    <label class="form-label" for="place_birth">Tempat Lahir</label>
                    <div class="input-group input-group-merge">
                        <input class="form-control" type="text" value="{{ !empty($student) ? $student->place_birth : '' }}" name="place_birth" id="place_birth" />
                    </div>
                </div>
                <div class="mb-3 col-md-4 form-lable">
                    <label class="form-label" for="date_birth">Tanggal Lahir</label>
                    <div class="input-group input-group-merge">
                        <input type="text" class="form-control" value="{{ !empty($student) ? $student->date_birth : '' }}" name="date_birth" placeholder="YYYY-MM-DD" id="flatpickr-date" />
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="mb-3 col-md-4 form-lable">
                    <label class="form-label" for="email_student">Email Aktif Calon Peserta Didik</label>
                    <div class="input-group input-group-merge">
                        <input class="form-control" value="{{ $user->email }}" type="email" name="email_student" id="email_student" />
                    </div>
                </div>
                <div class="mb-3 col-md-4 form-lable">
                    <label class="form-label" for="phone_number_student">No Telp Calon Peserta Didik</label>
                    <div class="input-group input-group-merge">
                        <input class="form-control" type="number" value="{{ !empty($student) ? $student->phone_number : '' }}" name="phone_number_student" id="phone_number_student" />
                    </div>
                </div>
                <div class="mb-3 col-md-4 form-lable">
                    <label class="form-label" for="whatsapp_phone_number_student">No WA Calon Peserta Didik</label>
                    <div class="input-group input-group-merge">
                        <input class="form-control" type="number" value="{{ !empty($student) ? $student->whatsapp_phone_number : '' }}" name="whatsapp_phone_number_student" id="whatsapp_phone_number_student" />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-md-6 form-lable">
                    <label class="form-label" for="confirmPassword">Agama</label>
                    <div class="input-group input-group-merge">
                        <select class="form-select" name="religion" id="religion" aria-label="religion">
                            @if(!empty($student->religion))
                                <option selected value="{{ $student->religion }}">{{ $student->religion }}</option>
                                <option value="">Pilih Agama</option>
                            @else
                                <option selected value="">Pilih Agama</option>
                            @endif
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindur</option>
                            <option value="Budha">Budha</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 col-md-6 form-lable">
                    <label class="form-label" for="address_student">Alamat</label>
                    <div class="input-group input-group-merge">
                        <textarea name="address_student" id="address_student" class="form-control" cols="30" rows="4">{{ !empty($student) ? $student->address : '' }}</textarea>
                    </div>
                </div>
            </div>


            <div>
                <button type="submit" class="btn btn-primary me-2">Simpan</button>
            </div>
        </form>
    </div>
</div>

<div class="card mb-4">
    <h5 class="card-header">DATA SEKOLAH ASAL</h5>
    <div class="card-body">
        <form action="{{ route('user.store_school_origin') }}" method="POST">
            @csrf
            <div class="row">
                <div class="mb-3 col-md-6 form-lable">
                    <label class="form-label" for="school_name_origin">Nama Sekolah</label>
                    <div class="input-group input-group-merge">
                        <input class="form-control" type="text" value="{{ !empty($school) ? $school->school_name : '' }}" name="school_name_origin" id="school_name_origin" required/>
                    </div>
                </div>
                <div class="mb-3 col-md-6 form-lable">
                    <label class="form-label" for="phone_number_school">No Telepon Sekolah</label>
                    <div class="input-group input-group-merge">
                        <input class="form-control" type="text" name="phone_number_school" value="{{ !empty($school) ? $school->phone_number : '' }}" id="phone_number_school" required />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-md-12">
                    <div class="mb-3 col-md-12 form-lable">
                        <label class="form-label" for="school_address_origin">Alamat Sekolah</label>
                        <div class="input-group input-group-merge">
                            <textarea name="school_address_origin" class="form-control" id="school_address_origin" cols="30" rows="4" required>{{ !empty($school) ? $school->school_address : '' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary me-2">Simpan</button>
            </div>
        </form>
    </div>
</div>