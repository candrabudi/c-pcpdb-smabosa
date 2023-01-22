<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\SchoolOrigin;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StudentDocument;
use App\Models\StudentFather;
use App\Models\StudentMother;
use App\Models\StudentPresence;
use App\Models\StudentScore;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('users.dashboard');
    }

    public function studentForm(Request $request)
    {
        $check_navigation = "BIODATA SISWA";
        $user = $request->user();
        $student = Student::where('user_id', $user->id)->first();
        $school = SchoolOrigin::where('user_id', $user->id)->first();
        return view('users.studentForm', [
            'check_navigation'  => $check_navigation,
            'user'              => $user,
            'student'           => $student,
            'school'            => $school
        ]);
    }

    public function studentBiodata(Request $request)
    {

        $check_navigation = "BIODATA SISWA";
        $user = $request->user();
        $student = Student::where('user_id', $user->id)->first();
        $school = SchoolOrigin::where('user_id', $user->id)->first();
        return view('users.studentForm', [
            'check_navigation'  => $check_navigation,
            'user'              => $user,
            'student'           => $student,
            'school'            => $school
        ]);
    }

    public function studentScorePresence(Request $request)
    {
        $user = $request->user();
        $check_navigation = "NILAI DAN ABSENSI";
        $score = StudentScore::where('user_id', $user->id)->first();
        $presence = StudentPresence::where('user_id', $user->id)->first();
        return view('users.studentForm', [
                    'check_navigation'  => $check_navigation,
                    'score'             => $score,
                    'presence'          => $presence,
                ]
        );
    }

    public function studentBiodataParent(Request $request)
    {
        $user = $request->user();
        $check_navigation = "BIODATA ORANG TUA";
        $father = StudentFather::where('user_id', $user->id)->first();
        $mother = StudentMother::where('user_id', $user->id)->first();
        return view('users.studentForm', [
            'check_navigation'  => $check_navigation,
            'father'            => $father,
            'mother'            => $mother,
        ]);
    }
    
    public function studentDocument(Request $request)
    {
        $user = $request->user();
        $check_navigation = "DOKUMEN SISWA";
        $document = StudentDocument::where('user_id', $user->id)->first();
        return view('users.studentForm', [
            'check_navigation'  => $check_navigation,
            'document'  => $document,
        ]);
    }

    public function storeOrUpdateDocument(Request $request)
    {
        $user = $request->user();
        $request->validate([
            'sd_certificate'    => 'mimes:png,jpg,jpeg,pdf|max:2048',
            'pas_photo'         => 'mimes:png,jpg,jpeg|max:2048',
            'birth_certificate' => 'mimes:png,jpg,jpeg|max:2048',
        ]);

        $check = StudentDocument::where('user_id', $user->id)->first();

        $user_full_name = str_replace(' ', '_', $user->full_name);
        if(!empty($check)){

            $file_name_pas_photo = !empty($request->pas_photo) ? $user_full_name.'_pas_photo'.'.'.$request->pas_photo->extension() : $check->pas_photo;  
            $file_name_sd_certificate = !empty($request->sd_certificate) ? $user_full_name.'_sd_certificate'.'.'.$request->sd_certificate->extension() : $check->sd_certificate;
            $file_name_birth_certificate = !empty($request->birth_certificate) ? $user_full_name.'_birth_certificate'.'.'.$request->birth_certificate->extension() : $check->birth_certificate;
            $file_name_family_card = !empty($request->family_card) ? $user_full_name.'_family_card'.'.'.$request->family_card->extension() : $check->family_card;
            
            $pas_photo_move = !empty($request->pas_photo) ? $request->pas_photo->move(public_path('pas_photo'), $file_name_pas_photo) : '';
            $sd_certificate = !empty($request->sd_certificate) ? $request->pas_photo->move(public_path('sd_certificate'), $file_name_sd_certificate) : '';
            $birth_certificate = !empty($request->birth_certificate) ? $request->birth_certificate->move(public_path('birth_certificate'), $file_name_birth_certificate) : '';

            $check->pas_photo  =  $file_name_pas_photo;
            $check->sd_certificate  = $file_name_sd_certificate;
            $check->birth_certificate  = $file_name_birth_certificate;
            $check->family_card  = $file_name_family_card;
            $check->save();
        }else{

            $file_name_pas_photo = $user_full_name.'_pas_photo'.'.'.$request->pas_photo->extension();  
            $file_name_sd_certificate = $user_full_name.'_sd_certificate'.'.'.$request->sd_certificate->extension();  
            $file_name_birth_certificate = $user_full_name.'_birth_certificate'.'.'.$request->birth_certificate->extension();  
         
            $request->pas_photo->move(public_path('pas_photo'), $file_name_pas_photo);
            $request->sd_certificate->move(public_path('sd_certificate'), $file_name_sd_certificate);
            $request->birth_certificate->move(public_path('birth_certificate'), $file_name_birth_certificate);
    
            $document = new StudentDocument();
            $document->user_id = $user->id;
            $document->pas_photo   = 'pas_photo/'.$file_name_pas_photo;
            $document->sd_certificate   = 'pas_photo/'.$file_name_sd_certificate;
            $document->birth_certificate   = 'pas_photo/'.$file_name_sd_certificate;
            $document->save();
        }
        

    }

    public function storeOrUpdateStudent(Request $request)
    {

        $user = $request->user();

        $check = Student::where('user_id', $user->id)->first();
        if (!empty($check)) {

            $check->nisn                      = $request->nisn ?? $check->nisn;
            $check->phone_number              = $request->phone_number_student ?? $check->phone_number;
            $check->whatsapp_phone_number     = $request->whatsapp_phone_number_student ?? $check->whatsapp_phone_number;
            $check->gender                    = $request->gender ?? $check->gender;
            $check->religion                  = $request->religion ?? $check->religion;
            $check->address                   = $request->address_student ?? $check->address;
            $check->place_birth               = $request->place_birth ?? $check->place_birth;
            $check->date_birth                = $request->date_birth ?? $check->date_birth;

            $check->save();
        } else {
            $student                            = new Student();
            $student->user_id                   = $user->id;
            $student->nisn                      = $request->nisn;
            $student->phone_number              = $request->phone_number_student;
            $student->whatsapp_phone_number     = $request->whatsapp_phone_number_student;
            $student->gender                    = $request->gender;
            $student->religion                  = $request->religion;
            $student->address                   = $request->address_student;
            $student->place_birth               = $request->place_birth;
            $student->date_birth                = $request->date_birth;

            $student->save();
        }

        return redirect()->route('user.student.student_biodata');
    }

    public function storeOrUpdateStudentSchool(Request $request)
    {

        $user = $request->user();
        $check = SchoolOrigin::where('user_id', $user->id)->first();

        if(!empty($check)){

            $check->school_name         = $request->school_name_origin ?? $check->school_name;
            $check->school_address      = $request->school_address_origin ?? $check->school_address;
            $check->phone_number        = $request->phone_number_school ?? $check->phone_number;

            $check->save();

        }else{

            $school                     = new SchoolOrigin();
            $school->user_id            = $user->id;
            $school->school_name        = $request->school_name_origin;
            $school->school_address     = $request->school_address_origin;
            $school->phone_number       = $request->phone_number_school;

            $school->save();

        }

        return redirect()->route('user.student.student_biodata');

    }

    public function storeOrUpdateScoreStudent(Request $request)
    {

        $user = $request->user();
        $check = StudentScore::where('user_id', $user->id)->first();

        if(!empty($check)){

            $score_vii_1    = $request->seventh_grade_first_semester_grades ?? $check->score_vii_1;
            $score_vii_2    = $request->seventh_grade_two_semester_grades ?? $check->score_vii_2;
            $score_viii_1   = $request->eight_grade_one_semester_grades ?? $check->score_viii_1;
            $score_viii_2   = $request->eight_grade_two_semester_grades ?? $check->score_viii_2;
            $score_ix_1     = $request->nine_grade_one_semester_grades ?? $check->score_ix_1;
            $score_ix_2     = $request->nine_grade_two_semester_grades ?? $check->score_ix_2;

            $total          = $score_vii_1 + $score_vii_2 + $score_viii_1 + $score_viii_2 + $score_ix_1 + $score_ix_2; 

            $check->score_vii_1         = $score_vii_1;
            $check->score_vii_2         = $score_vii_2;
            $check->score_viii_1        = $score_viii_1;
            $check->score_viii_2        = $score_viii_2;
            $check->score_ix_1          = $score_ix_1;
            $check->score_ix_2          = $score_ix_2;
            $check->total_score         = $total;

            $check->save();

        }else{

            $score_vii_1    = $request->seventh_grade_first_semester_grades;
            $score_vii_2    = $request->seventh_grade_two_semester_grades;
            $score_viii_1   = $request->eight_grade_one_semester_grades;
            $score_viii_2   = $request->eight_grade_two_semester_grades;
            $score_ix_1     = $request->nine_grade_one_semester_grades;
            $score_ix_2     = $request->nine_grade_one_semester_grades;

            $total          = $score_vii_1 + $score_vii_2 + $score_viii_1 + $score_viii_2 + $score_ix_1 + $score_ix_2; 

            $score                   = new StudentScore();
            $score->user_id          = $user->id;
            $score->score_vii_1      = $request->seventh_grade_first_semester_grades;
            $score->score_vii_2      = $request->seventh_grade_two_semester_grades;
            $score->score_viii_1     = $request->eight_grade_one_semester_grades;
            $score->score_viii_2     = $request->eight_grade_two_semester_grades;
            $score->score_ix_1       = $request->nine_grade_one_semester_grades;
            $score->score_ix_2       = $request->nine_grade_two_semester_grades;
            $score->total_score      = $total;

            $score->save();

        }

        return redirect()->route('user.student.student_score_presence');

    }

    public function storeOrUpdatePresence(Request $request)
    {   

        $user = $request->user();
        $check = StudentPresence::where('user_id', $user->id)->first();
        if(!empty($check)){

            $sick_vii_1          = $request->semester_one_sick_grade_seven ?? $check->s_vii_1;
            $permission_vii_1    = $request->semester_one_permission_grade_seven ?? $check->i_vii_1;
            $alpha_vii_1         = $request->semester_one_alpha_grade_seven ?? $check->tk_vii_1;
            $sick_vii_2          = $request->semester_two_sick_grade_seven ?? $check->s_vii_2;
            $permission_vii_2    = $request->semester_two_permission_grade_seven ?? $check->i_vii_2;
            $alpha_vii_2         = $request->semester_two_alpha_grade_seven ?? $check->tk_vii_2;
            $sick_viii_1         = $request->semester_one_sick_grade_eight ?? $check->s_viii_1;
            $permission_viii_1   = $request->semester_one_permission_grade_eight ?? $check->i_viii_1;
            $alpha_viii_1        = $request->semester_one_alpha_grade_eight ?? $check->tk_viii_1;
            $sick_viii_2         = $request->semester_two_sick_grade_eight ?? $check->s_viii_2;
            $permission_viii_2   = $request->semester_two_permission_grade_eight ?? $check->i_viii_2;
            $alpha_viii_2        = $request->semester_two_alpha_grade_eight ?? $check->tk_viii_2;
            $sick_ix_1           = $request->semester_one_sick_grade_nine ?? $check->s_ix_1;
            $permission_ix_1     = $request->semester_two_permission_grade_nine ?? $check->i_ix_1;
            $alpha_ix_1          = $request->semester_one_alpha_grade_nine ?? $check->tk_ix_1;
            $sick_ix_2           = $request->semester_two_sick_grade_nine ?? $check->i_ix_2;
            $permission_ix_2     = $request->semester_two_permission_grade_nine ?? $check->i_ix_2;
            $alpha_ix_2          = $request->semester_two_alpha_grade_nine ?? $check->tk_ix_2;

            $total_sick          = $sick_vii_1 + $sick_vii_2 + $sick_viii_1 + $sick_viii_2 + $sick_ix_1 + $sick_ix_2;
            $total_permission    = $permission_vii_1 + $permission_vii_2 + $permission_viii_1 + $permission_viii_2 + $permission_ix_1 + $permission_ix_2;
            $total_alpha         = $alpha_vii_1 + $alpha_vii_2 + $alpha_viii_1 + $alpha_viii_2 + $alpha_ix_1 + $alpha_ix_2;

            $check->s_vii_1              = $sick_vii_1; 
            $check->i_vii_1              = $permission_vii_1; 
            $check->tk_vii_1             = $alpha_vii_1; 
            $check->s_vii_2              = $sick_vii_2; 
            $check->i_vii_2              = $permission_vii_2; 
            $check->tk_vii_2             = $alpha_vii_2; 
            $check->s_viii_1             = $sick_viii_1; 
            $check->i_viii_1             = $permission_viii_1; 
            $check->tk_viii_1            = $alpha_viii_1; 
            $check->s_viii_2             = $sick_viii_2; 
            $check->i_viii_2             = $permission_viii_2; 
            $check->tk_viii_2            = $alpha_viii_2; 
            $check->s_ix_1               = $sick_ix_1; 
            $check->i_ix_1               = $permission_ix_1; 
            $check->tk_ix_1              = $alpha_ix_1; 
            $check->s_ix_2               = $sick_ix_2; 
            $check->i_ix_2               = $permission_ix_2; 
            $check->tk_ix_2              = $alpha_ix_2;
            $check->total_sick           = $total_sick;
            $check->total_permission     = $total_permission;
            $check->total_alpha          = $total_alpha;

            $check->save();

        }else{

            $sick_vii_1          = $request->semester_one_sick_grade_seven;
            $permission_vii_1    = $request->semester_one_permission_grade_seven;
            $alpha_vii_1         = $request->semester_two_sick_grade_seven;
            $sick_vii_2          = $request->semester_two_permission_grade_seven;
            $permission_vii_2    = $request->semester_two_alpha_grade_seven;
            $alpha_vii_2         = $request->semester_one_sick_grade_eight;
            $sick_viii_1         = $request->semester_one_permission_grade_eight;
            $permission_viii_1   = $request->semester_one_alpha_grade_eight;
            $alpha_viii_1        = $request->semester_one_alpha_grade_eight;
            $sick_viii_2         = $request->semester_two_sick_grade_eight;
            $permission_viii_2   = $request->semester_two_permission_grade_eight;
            $alpha_viii_2        = $request->semester_two_alpha_grade_eight;
            $sick_ix_1           = $request->semester_one_sick_grade_nine;
            $permission_ix_1     = $request->semester_two_permission_grade_nine;
            $alpha_ix_1          = $request->semester_one_alpha_grade_nine;
            $sick_ix_2           = $request->semester_two_sick_grade_nine;
            $permission_ix_2     = $request->semester_two_permission_grade_nine;
            $alpha_ix_2          = $request->semester_two_alpha_grade_nine;
            
            $total_sick          = $sick_vii_1 + $sick_vii_2 + $sick_viii_1 + $sick_viii_2 + $sick_ix_1 + $sick_ix_2;
            $total_permission    = $permission_vii_1 + $permission_vii_2 + $permission_viii_1 + $permission_viii_2 + $permission_ix_1 + $permission_ix_2;
            $total_alpha         = $alpha_vii_1 + $alpha_vii_2 + $alpha_viii_1 + $alpha_viii_2 + $alpha_ix_1 + $alpha_ix_2;

            $presence                       = new StudentPresence();
            $presence->user_id              = $user->id;
            $presence->s_vii_1              = $sick_vii_1; 
            $presence->i_vii_1              = $permission_vii_1; 
            $presence->tk_vii_1             = $alpha_vii_1; 
            $presence->s_vii_2              = $sick_vii_2; 
            $presence->i_vii_2              = $permission_vii_2; 
            $presence->tk_vii_2             = $alpha_vii_2; 
            $presence->s_viii_1             = $sick_viii_1; 
            $presence->i_viii_1             = $permission_viii_1; 
            $presence->tk_viii_1            = $alpha_viii_1; 
            $presence->s_viii_2             = $sick_viii_2; 
            $presence->i_viii_2             = $permission_viii_2; 
            $presence->tk_viii_2            = $alpha_viii_2; 
            $presence->s_ix_1               = $sick_ix_1; 
            $presence->i_ix_1               = $permission_ix_1; 
            $presence->tk_ix_1              = $alpha_ix_1; 
            $presence->s_ix_2               = $sick_ix_2; 
            $presence->i_ix_2               = $permission_ix_2; 
            $presence->tk_ix_2              = $alpha_ix_2;
            $presence->total_sick           = $total_sick;
            $presence->total_permission     = $total_permission;
            $presence->total_alpha          = $total_alpha;

            $presence->save();

        }

        return redirect()->route('user.student.student_score_presence');

    }

    public function storeOrUpdateFatherStudent(Request $request)
    {

        $user = $request->user();
        $check = StudentFather::where('user_id', $user->id)->first();
        if(!empty($check)){

            $check->father_name                = $request->father_name ?? $check->father_name ;
            $check->birth_place                = $request->birth_place_father ?? $check->birth_place;
            $check->birth_date                 = $request->birth_date_father ?? $check->birth_date;
            $check->religion                   = $request->religion ?? $check->religion;
            $check->education                  = $request->education ?? $check->education;
            $check->profession                 = $request->profession ?? $check->profession;
            $check->income                     = $request->income ?? $check->income;
            $check->whatsapp_phone_number      = $request->whatsapp_phone_number ?? $check->whatsapp_phone_number;

            $check->save();

        }else{

            $father                             = new StudentFather();
            $father->user_id                    = $user->id;
            $father->father_name                = $request->father_name;
            $father->birth_place                = $request->birth_place_father;
            $father->birth_date                 = $request->birth_date_father;
            $father->religion                   = $request->religion;
            $father->education                  = $request->education;
            $father->profession                 = $request->profession;
            $father->income                     = $request->income;
            $father->whatsapp_phone_number      = $request->whatsapp_phone_number;

            $father->save();

        }

        return redirect()->route('user.student.biodata_parent');

    }
    
    public function storeOrUpdateMotherStudent(Request $request)
    {

        $user = $request->user();
        $check = StudentMother::where('user_id', $user->id)->first();
        if(!empty($check)){

            $check->mother_name                = $request->mother_name ?? $check->mother_name ;
            $check->birth_place                = $request->birth_place_mother ?? $check->birth_place;
            $check->birth_date                 = $request->birth_date_mother ?? $check->birth_date;
            $check->religion                   = $request->religion ?? $check->religion;
            $check->education                  = $request->education ?? $check->education;
            $check->profession                 = $request->profession ?? $check->profession;
            $check->income                     = $request->income ?? $check->income;
            $check->whatsapp_phone_number      = $request->whatsapp_phone_number ?? $check->whatsapp_phone_number;

            $check->save();

        }else{

            $mother                             = new StudentMother();
            $mother->user_id                    = $user->id;
            $mother->mother_name                = $request->mother_name;
            $mother->birth_place                = $request->birth_place_mother;
            $mother->birth_date                 = $request->birth_date_mother;
            $mother->religion                   = $request->religion;
            $mother->education                  = $request->education;
            $mother->profession                 = $request->profession;
            $mother->income                     = $request->income;
            $mother->whatsapp_phone_number      = $request->whatsapp_phone_number;

            $mother->save();

        }

        return redirect()->route('user.student.biodata_parent');

    }
}
