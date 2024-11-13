<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Response;

class CourseController extends Controller
{
    //
    public function show(Course $course)
    {
         //eager loading

        $course->load(['unit', 'students']);
        $studentCount = $course->studentCount();
        return view('course', [
            'course'=>$course,
            'students'=>$course->students,
            'studentCount'=> $studentCount
        ]);
    }

    public function create()
    {
        $units=Unit::all()->where('is_active', 1);
        return view('course.create', ['units'=> $units]);
    }

    public function edit(Course $course)
    {
        $units=Unit::all()->where('is_active', 1);
        return view('course.edit', ['course'=> $course, 'units'=>$units]);
    }


    public function insert(Request $request)
    {
        //check authorization
        if(!Gate::allows('insert-course')){
            abort(403);
        }

        $request->validate([
            'course_code'=>'required|unique:courses|size:6',
            'curriculum_year'=>'required',
            'course_name'=>'required|string|max:255',
            'course_name_en'=>'required|string|max:255',
            'credit_unit'=>'required',
            'unit_id'=>'required',
        ],[
            'course_code.required'=>'Course code wajib diisi',
            'course_code.unique'=>'Course code sudah pernah dipakai',
            'course_code.size'=>'Course code wajib 6 char',
            'curriculum_year.required'=>'Curriculum year wajib diisi',
            'course_name.required'=>'Course name wajib diisi',
            'course_name_en.required'=>'Course name (EN) wajib diisi',
            'credit_unit.required'=>'Credit unit wajib diisi',
            'unit_id.required'=>'Unit wajib diisi',
        ]);

        $course = new Course;

        $course->course_code = $request->course_code;
        $course->curriculum_year = $request->curriculum_year;
        $course->course_name = $request->course_name;
        $course->course_name_en = $request->course_name_en;
        $course->credit_unit = $request->credit_unit;
        $course->unit_id = $request->unit_id;

        $course->save();

        return redirect('/courses')->with('success','Course berhasil di input');
    }

    public function update(Request $request, Course $course)
    {
        //check authorization
        if(!Gate::allows('update-course')){
            abort(403);
        }
        $request->validate([
            'course_code'=>'required|unique:courses|size:6',
            'curriculum_year'=>'required',
            'course_name'=>'required|string|max:255',
            'course_name_en'=>'required|string|max:255',
            'credit_unit'=>'required',
            'unit_id'=>'required',
        ],[
            'course_code.required'=>'Course code wajib diisi',
            'course_code.unique'=>'Course code sudah pernah dipakai',
            'course_code.size'=>'Course code wajib 6 char',
            'curriculum_year.required'=>'Curriculum year wajib diisi',
            'course_name.required'=>'Course name wajib diisi',
            'course_name_en.required'=>'Course name (EN) wajib diisi',
            'credit_unit.required'=>'Credit unit wajib diisi',
            'unit_id.required'=>'Unit wajib diisi',
        ]);

        $course->update([
            'course_code'=>$request->course_code,
            'curriculum_year'=>$request->curriculum_year,
            'course_name'=>$request->course_name,
            'course_name_en'=>$request->course_name_en,
            'credit_unit'=>$request->credit_unit,
            'unit_id'=>$request->unit_id,
        ]);       

        //Cara2
        // $course->course_code = $request->course_code;
        // $course->curriculum_year = $request->curriculum_year;
        // $course->course_name = $request->course_name;
        // $course->course_name_en = $request->course_name_en;
        // $course->credit_unit = $request->credit_unit;
        // $course->unit_id = $request->unit_id;

        // $course->save();

        return redirect('/courses')->with('success','Course berhasil diupdate');
    }

    public function delete(Course $course) {
        //check authorization
        if(!Gate::allows('delete-course')){
            abort(403);
        }

        $course->delete();
        return redirect('/courses')->with('success', 'Course deleted successfully!');
    }

    public function api_get_courses(Request $request) {
        //get all field on spesific course id
        // $data = Course::find($request->id);

        //spesifi: field
        $data = Course::select(['course_code','course_name'])->find($request->id);

        if(isset($data)) {
            //jika ada data
            return Response::json(['data'=>$data], 200);
        }
        //jika data tidak ditemukan
        return Response::json(['message'=>'Course not found'], 404);
        // abort(404);
    }

    public function request_api_to_course(Request $request) {
        $response = Http::get('http://wfd1.test:8080/api/get/courses/'.$request->id);
        
        $data = $response->json();
        $status = $response->status();
        if(isset($data['data'])) {
            return Response::json(['data'=>$data['data']],$status);
        }

        return Response::json(['message'=>$data['message']],$status);
    }

    public function api_get_token(Request $request){
        if(Auth::attempt(['email' => 'user@user.com', 'password' => 'user'])){
            $auth=Auth::user();
            $data['token']=$auth->createToken('auth_token')->plainTextToken;

            return Response::json(['data'=>$data],200);
        }
    }
}
