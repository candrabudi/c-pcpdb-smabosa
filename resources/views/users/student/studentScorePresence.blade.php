<div class="card mb-4">
    <h5 class="card-header">NILAI SISWA</h5>
    <div class="card-body">
        <form id="formAccountSettings" method="POST" action="{{ route('user.store_score_student') }}">
            @csrf
            <h7 style="font-weight:bold">KELAS VII</h7>
            <div class="row">
                <div class="mb-3 col-md-6 form-lable">
                    <label class="form-label" for="seventh_grade_first_semester_grades">
                        Semester 1</label>
                    <div class="input-group input-group-merge">
                        <input class="form-control" type="number" value="{{ !empty($score) ? $score->score_vii_1  : '' }}" name="seventh_grade_first_semester_grades" id="seventh_grade_first_semester_grades"/>
                    </div>
                </div>
                <div class="mb-3 col-md-6 form-lable">
                    <label class="form-label" for="seventh_grade_two_semester_grades">Semseter 2</label>
                    <div class="input-group input-group-merge">
                        <input class="form-control" type="number" value="{{ !empty($score) ? $score->score_vii_2  : '' }}" id="seventh_grade_two_semester_grades" name="seventh_grade_two_semester_grades"/>
                    </div>
                </div>
            </div>
            <h7 style="font-weight:bold">KELAS VIII</h7>
            <div class="row">
                <div class="mb-3 col-md-6 form-lable">
                    <label class="form-label" for="eight_grade_one_semester_grades">
                        Semester 1</label>
                    <div class="input-group input-group-merge">
                        <input class="form-control" type="number" value="{{ !empty($score) ? $score->score_viii_1  : '' }}" name="eight_grade_one_semester_grades" id="eight_grade_one_semester_grades"/>
                    </div>
                </div>
                <div class="mb-3 col-md-6 form-lable">
                    <label class="form-label" for="eight_grade_two_semester_grades">Semester 2</label>
                    <div class="input-group input-group-merge">
                        <input class="form-control" type="number" value="{{ !empty($score) ? $score->score_viii_2  : '' }}" id="eight_grade_two_semester_grades" name="eight_grade_two_semester_grades"/>
                    </div>
                </div>
            </div>
            <h7 style="font-weight:bold">KELAS IX</h7>
            <div class="row">
                <div class="mb-3 col-md-6 form-lable">
                    <label class="form-label" for="nine_grade_one_semester_grades">
                        Semester 1</label>
                    <div class="input-group input-group-merge">
                        <input class="form-control" type="number" value="{{ !empty($score) ? $score->score_ix_1  : '' }}" name="nine_grade_one_semester_grades" id="nine_grade_one_semester_grades"/>
                    </div>
                </div>
                <div class="mb-3 col-md-6 form-lable">
                    <label class="form-label" for="nine_grade_two_semester_grades">Semester 2</label>
                    <div class="input-group input-group-merge">
                        <input class="form-control" type="number" id="nine_grade_two_semester_grades" value="{{ !empty($score) ? $score->score_ix_2  : '' }}" name="nine_grade_two_semester_grades"/>
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
    <form action="{{ route('user.store_presence') }}" method="POST">
        @csrf
        <h5 class="card-header">ABSENSI SISWA</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <h6>Kelas 7 Semster 1</h6>

                        <div class="mb-3 col-md-4 form-lable">
                            <label class="form-label" for="semester_one_sick_grade_seven">
                                Sakit</label>
                            <div class="input-group input-group-merge">
                                <input class="form-control" type="number" value="{{ !empty($presence) ? $presence->s_vii_1 : '' }}" name="semester_one_sick_grade_seven" id="semester_one_sick_grade_seven"/>
    
                            </div>
                        </div>
                        <div class="mb-3 col-md-4 form-lable">
                            <label class="form-label" for="semester_one_permission_grade_seven"> Izin</label>
                            <div class="input-group input-group-merge">
                                <input class="form-control" type="number" id="semester_one_permission_grade_seven" value="{{ !empty($presence) ? $presence->i_vii_1 : '' }}" name="semester_one_permission_grade_seven"/>
    
                            </div>
                        </div>
                        <div class="mb-3 col-md-4 form-lable">
                            <label class="form-label" for="semester_one_alpha_grade_seven">
                                Tanpa Keterangan</label>
                            <div class="input-group input-group-merge">
                                <input class="form-control" type="number" name="semester_one_alpha_grade_seven" value="{{ !empty($presence) ? $presence->tk_vii_1 : '' }}" id="semester_one_alpha_grade_seven"/>
    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h6>Kelas 7 Semester 2</h6>
                    <div class="row">
                        <div class="mb-3 col-md-4 form-lable">
                            <label class="form-label" for="semester_two_sick_grade_seven">
                                Sakit</label>
                            <div class="input-group input-group-merge">
                                <input class="form-control" type="number" name="semester_two_sick_grade_seven" value="{{ !empty($presence) ? $presence->s_vii_2 : '' }}" id="semester_two_sick_grade_seven"/>
    
                            </div>
                        </div>
                        <div class="mb-3 col-md-4 form-lable">
                            <label class="form-label" for="semester_two_permission_grade_seven"> Izin</label>
                            <div class="input-group input-group-merge">
                                <input class="form-control" type="number" id="semester_two_permission_grade_seven" value="{{ !empty($presence) ? $presence->i_vii_2 : '' }}" name="semester_two_permission_grade_seven"/>
    
                            </div>
                        </div>
                        <div class="mb-3 col-md-4 form-lable">
                            <label class="form-label" for="semester_two_alpha_grade_seven">
                                Tanpa Keterangan</label>
                            <div class="input-group input-group-merge">
                                <input class="form-control" type="number" name="semester_two_alpha_grade_seven" value="{{ !empty($presence) ? $presence->tk_vii_2 : '' }}" id="semester_two_alpha_grade_seven"/>
    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <h6>Kelas 8 Semster 1</h6>
                        <div class="mb-3 col-md-4 form-lable">
                            <label class="form-label" for="semester_one_sick_grade_eight">
                                Sakit</label>
                            <div class="input-group input-group-merge">
                                <input class="form-control" type="number" name="semester_one_sick_grade_eight" value="{{ !empty($presence) ? $presence->s_viii_1 : '' }}" id="semester_one_sick_grade_eight"/>
    
                            </div>
                        </div>
                        <div class="mb-3 col-md-4 form-lable">
                            <label class="form-label" for="semester_one_permission_grade_eight"> Izin</label>
                            <div class="input-group input-group-merge">
                                <input class="form-control" type="number" id="semester_one_permission_grade_eight" value="{{ !empty($presence) ? $presence->i_viii_1 : '' }}" name="semester_one_permission_grade_eight"/>
    
                            </div>
                        </div>
                        <div class="mb-3 col-md-4 form-lable">
                            <label class="form-label" for="semester_one_alpha_grade_eight">
                                Tanpa Keterangan</label>
                            <div class="input-group input-group-merge">
                                <input class="form-control" type="number" name="semester_one_alpha_grade_eight" value="{{ !empty($presence) ? $presence->tk_viii_1 : '' }}" id="semester_one_alpha_grade_eight"/>
    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h6>Kelas 8 Semester 2</h6>
                    <div class="row">
                        <div class="mb-3 col-md-4 form-lable">
                            <label class="form-label" for="semester_two_sick_grade_eight">
                                Sakit</label>
                            <div class="input-group input-group-merge">
                                <input class="form-control" type="number" name="semester_two_sick_grade_eight" value="{{ !empty($presence) ? $presence->s_viii_2 : '' }}" id="semester_two_sick_grade_eight"/>
    
                            </div>
                        </div>
                        <div class="mb-3 col-md-4 form-lable">
                            <label class="form-label" for="semester_two_permission_grade_eight"> Izin</label>
                            <div class="input-group input-group-merge">
                                <input class="form-control" type="number" id="semester_two_permission_grade_eight" value="{{ !empty($presence) ? $presence->i_viii_2 : '' }}" name="semester_two_permission_grade_eight"/>
    
                            </div>
                        </div>
                        <div class="mb-3 col-md-4 form-lable">
                            <label class="form-label" for="semester_two_alpha_grade_eight">
                                Tanpa Keterangan</label>
                            <div class="input-group input-group-merge">
                                <input class="form-control" type="number" name="semester_two_alpha_grade_eight" value="{{ !empty($presence) ? $presence->tk_viii_2 : '' }}" id="semester_two_alpha_grade_eight"/>
    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <h6>Kelas 9 Semster 1</h6>
                        <div class="mb-3 col-md-4 form-lable">
                            <label class="form-label" for="semester_one_sick_grade_nine">
                                Sakit</label>
                            <div class="input-group input-group-merge">
                                <input class="form-control" type="number" name="semester_one_sick_grade_nine" value="{{ !empty($presence) ? $presence->s_ix_1 : '' }}" id="semester_one_sick_grade_nine"/>
    
                            </div>
                        </div>
                        <div class="mb-3 col-md-4 form-lable">
                            <label class="form-label" for="semester_two_permission_grade_nine"> Izin</label>
                            <div class="input-group input-group-merge">
                                <input class="form-control" type="number" id="semester_two_permission_grade_nine" value="{{ !empty($presence) ? $presence->i_ix_1 : '' }}" name="semester_two_permission_grade_nine"/>
    
                            </div>
                        </div>
                        <div class="mb-3 col-md-4 form-lable">
                            <label class="form-label" for="semester_one_alpha_grade_nine">
                                Tanpa Keterangan</label>
                            <div class="input-group input-group-merge">
                                <input class="form-control" type="number" name="semester_one_alpha_grade_nine" value="{{ !empty($presence) ? $presence->tk_ix_1 : '' }}" id="semester_one_alpha_grade_nine"/>
    
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <h6>Kelas 9 Semester 2</h6>
                    <div class="row">
                        <div class="mb-3 col-md-4 form-lable">
                            <label class="form-label" for="semester_two_sick_grade_nine">
                                Sakit</label>
                            <div class="input-group input-group-merge">
                                <input class="form-control" type="number" name="semester_two_sick_grade_nine" value="{{ !empty($presence) ? $presence->s_ix_2 : '' }}" id="semester_two_sick_grade_nine"/>
    
                            </div>
                        </div>
                        <div class="mb-3 col-md-4 form-lable">
                            <label class="form-label" for="semester_two_permission_grade_nine"> Izin</label>
                            <div class="input-group input-group-merge">
                                <input class="form-control" type="number" id="semester_two_permission_grade_nine" value="{{ !empty($presence) ? $presence->i_ix_2 : '' }}" name="semester_two_permission_grade_nine"/>
    
                            </div>
                        </div>
                        <div class="mb-3 col-md-4 form-lable">
                            <label class="form-label" for="semester_two_alpha_grade_nine">
                                Tanpa Keterangan</label>
                            <div class="input-group input-group-merge">
                                <input class="form-control" type="number" name="semester_two_alpha_grade_nine" value="{{ !empty($presence) ? $presence->tk_ix_2 : '' }}" id="semester_two_alpha_grade_nine"/>
    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary me-2">Simpan</button>
            </div>
        </div>
    </form>
</div>

