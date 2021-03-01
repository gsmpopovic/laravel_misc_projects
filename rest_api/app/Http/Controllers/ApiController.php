<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;

class ApiController extends Controller
{

    public function createStudent(Request $request){
        // Instantiate a Model which will interact with our students table
        // Instantiate request object in method, from which we will
        // obtain values to populate our student table

        $student = new Student();
        $student->name = $request->name; 
        $student->course = $request->course; 

        // Save these to our database
        $student->save();

        //Return response to user
        return response()->json([
            "message"
            =>"Student record was created."

        ], 201);


    }

    public function getAllStudents(){

        //Access the Student class and call its method get
        //Which will return all students

        //The value of JSON_PRETTY_PRINT is 128
        //toJSON will complain if you pass it a string? 
        $students = Student::get()->toJson(128);

        // return this to user 

         return response($students, 200);
    }

    public function getStudent($id){

        // if(Student::where("id", $id)->exists()){
            
        //     $student=Student::where("id", $id)->get()->toJson(128);
        //     return response($student, 200);
        // }else{
        //     return response()->json(["message"=>"Student not found."],404);
        // }

        if (Student::where('id', $id)->exists()){
            $student = Student::whereId($id)->get()->toJson(128);

            return response($student, 200); 
        }
        else{
            return response()->json([
                "message"=>"Student not found."
            ], 404);
        }
    }
    public function updateStudent(Request $request, $id){

        if(Student::where('id', $id)->exists()){

            $student=Student::find($id);

            // if(is_null($request->name)){
            //     $student->name=$student->name; 
            // } else{
            //     $student->name=$request->name;
            // }

            // if(is_null($request->course)){
            //     $student->course=$student->course;
            // }else{
            //     $student->course=$request->course;
            // }

            $student->name=is_null($request->name) ? $student->name : $request->name;
            $student->course=is_null($request->course) ? $student->course:$request->course;
            $student->save();

            return response()->json(["message"=>"Student updated success."], 200);
        }else{
            return response()->json(["message"=>"Student could not updated/. Not found."],404 );
        }
    }

    public function deleteStudent($id){

        if(Student::where("id", $id)->exists()){

            $student=Student::find($id);
            $student->delete();

            return response()->json(["message"=>"Record deleted"], 201);

        }else{
            return response()->json(["message"=>"Record not found."], 404);
        }
    }

    public function deleteAllStudents(){

        $students = Student::get();

        foreach($students as $student){
            $student->delete();
        }
        
        return response()->json(["message"=>"All records deleted"]);
    }
}
