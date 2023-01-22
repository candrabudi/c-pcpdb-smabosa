<div class="card mb-4">
    <h5 class="card-header">BIODATA AYAH</h5>
    <div class="card-body">
        <form id="formAccountSettings" method="POST" action="{{ route('user.store_father') }}">
            @csrf
            <div class="row">
                <div class="mb-3 col-md-6 ">
                    <label class="form-label" for="father_name">NAMA LENGKAP</label>
                    <div class="input-group input-group-merge">
                        <input class="form-control" type="text" value="{{ $father->father_name ?? '' }}" id="father_name" name="father_name" />
                    </div>
                </div>

                <div class="mb-3 col-md-6 form-lable">
                    <label class="form-label" for="education">Pendidikan</label>
                    <div class="input-group input-group-merge">
                        <select class="form-select" name="education" id="education" aria-label="education">
                            @if(!empty($father->education))
                                <option selected value="{{ $father->education }}">{{ $father->education }}</option>
                                <option value="">Pilih Pendidikan</option>
                            @else
                                <option selected value="">Pilih Pendidikan</option>
                            @endif
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA/SMK">SMA/SMK</option>
                            <option value="D1">D1</option>
                            <option value="D2">D2</option>
                            <option value="D3">D3</option>
                            <option value="S1">S1</option>
                        </select>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="mb-3 col-md-6 form-password-toggle">
                    <label class="form-label" for="birth_place_father">Tempat Lahir</label>
                    <div class="input-group input-group-merge">
                        <input class="form-control" type="text" value="{{ $father->birth_place ?? '' }}" name="birth_place_father" id="birth_place_father" />
                    </div>
                </div>

                <div class="mb-3 col-md-6 form-lable">
                    <label class="form-label" for="birth_date_father">Tanggal Lahir</label>
                    <div class="input-group input-group-merge">
                        <input type="text" class="form-control" value="{{ $father->birth_date ?? '' }}" name="birth_date_father" placeholder="YYYY-MM-DD" id="flatpickr-date" />
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="mb-3 col-md-6 form-password-toggle">
                    <label class="form-label" for="religion">Agama</label>
                    <div class="input-group input-group-merge">
                        <select class="form-select" name="religion" id="religion" aria-label="religion">
                            @if(!empty($father->religion))
                                <option selected value="{{ $father->religion }}">{{ $father->religion }}</option>
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
                <div class="mb-3 col-md-6 form-password-toggle">
                    <label class="form-label" for="whatsapp_phone_number">Nomor Whatsapp</label>
                    <div class="input-group input-group-merge">
                        <input class="form-control" type="number" value="{{ $father->whatsapp_phone_number ?? '' }}" name="whatsapp_phone_number" id="whatsapp_phone_number" />
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="mb-3 col-md-6 form-password-toggle">
                    <label class="form-label" for="income">Pendapatan</label>
                    <div class="input-group input-group-merge">
                        <input class="form-control" type="number" value="{{ $father->income ?? '' }}" name="income" id="income" />
                    </div>
                </div>
                <div class="mb-3 col-md-6 form-password-toggle">
                    <label class="form-label" for="profession">Pekerjaan</label>
                    <div class="input-group input-group-merge">
                        <input class="form-control" type="text" value="{{ $father->profession ?? '' }}" name="profession" id="profession" />
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
    <h5 class="card-header">BIODATA IBU</h5>
    <div class="card-body">
        <form id="formAccountSettings" method="POST" action="{{ route('user.store_mother') }}">
            @csrf
            <div class="row">
                <div class="mb-3 col-md-6 ">
                    <label class="form-label" for="mother_name">NAMA LENGKAP</label>
                    <div class="input-group input-group-merge">
                        <input class="form-control" type="text" value="{{ $mother->mother_name ?? '' }}" id="mother_name" name="mother_name" />
                    </div>
                </div>

                <div class="mb-3 col-md-6 form-lable">
                    <label class="form-label" for="education">Pendidikan</label>
                    <div class="input-group input-group-merge">
                        <select class="form-select" name="education" id="education" aria-label="education">
                            @if(!empty($mother->education))
                                <option selected value="{{ $mother->education }}">{{ $mother->education }}</option>
                                <option value="">Pilih Pendidikan</option>
                            @else
                                <option selected value="">Pilih Pendidikan</option>
                            @endif
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA/SMK">SMA/SMK</option>
                            <option value="D1">D1</option>
                            <option value="D2">D2</option>
                            <option value="D3">D3</option>
                            <option value="S1">S1</option>
                        </select>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="mb-3 col-md-6 form-password-toggle">
                    <label class="form-label" for="birth_place_mother">Tempat Lahir</label>
                    <div class="input-group input-group-merge">
                        <input class="form-control" type="text" value="{{ $mother->birth_place ?? '' }}" name="birth_place_mother" id="birth_place_mother" />
                    </div>
                </div>

                <div class="mb-3 col-md-6 form-lable">
                    <label class="form-label" for="birth_date_mother">Tanggal Lahir</label>
                    <div class="input-group input-group-merge">
                        <input type="text" class="form-control" value="{{ $mother->birth_date ?? '' }}" name="birth_date_mother" placeholder="YYYY-MM-DD" id="flatpickr-date-two" />
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="mb-3 col-md-6 form-password-toggle">
                    <label class="form-label" for="religion">Agama</label>
                    <div class="input-group input-group-merge">
                        <select class="form-select" name="religion" id="religion" aria-label="religion">
                            @if(!empty($mother->religion))
                                <option selected value="{{ $mother->religion }}">{{ $mother->religion }}</option>
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
                <div class="mb-3 col-md-6 form-password-toggle">
                    <label class="form-label" for="whatsapp_phone_number">Nomor Whatsapp</label>
                    <div class="input-group input-group-merge">
                        <input class="form-control" type="number" value="{{ $mother->whatsapp_phone_number ?? '' }}" name="whatsapp_phone_number" id="whatsapp_phone_number" />
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="mb-3 col-md-6 form-password-toggle">
                    <label class="form-label" for="income">Pendapatan</label>
                    <div class="input-group input-group-merge">
                        <input class="form-control" type="number" value="{{ $mother->income ?? '' }}" name="income" id="income" />
                    </div>
                </div>
                <div class="mb-3 col-md-6 form-password-toggle">
                    <label class="form-label" for="profession">Pekerjaan</label>
                    <div class="input-group input-group-merge">
                        <input class="form-control" type="text" value="{{ $mother->profession ?? '' }}" name="profession" id="profession" />
                    </div>
                </div>

            </div>

            <div>
                <button type="submit" class="btn btn-primary me-2">Simpan</button>
            </div>
        </form>
    </div>
</div>