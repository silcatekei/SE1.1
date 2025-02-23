<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EnrollmentController extends Controller
{
    public function index()
    {
        return response()->json(Enrollment::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'student_uuid' => 'nullable|exists:students,uuid',
            'academic_year' => 'nullable|string',
            'semester' => 'nullable|string',
            'date_enrolled' => 'nullable|date',
            'status' => 'nullable|in:Enrolled,Pending,Dropped',
        ]);

        $data['uuid'] = Str::uuid();
        $enrollment = Enrollment::create($data);

        return response()->json($enrollment, 201);
    }

    public function show($uuid)
    {
        return response()->json(Enrollment::where('uuid', $uuid)->firstOrFail());
    }

    public function update(Request $request, $uuid)
    {
        $enrollment = Enrollment::where('uuid', $uuid)->firstOrFail();

        $data = $request->validate([
            'academic_year' => 'sometimes|string',
            'semester' => 'sometimes|string',
            'date_enrolled' => 'sometimes|date',
            'status' => 'sometimes|in:Enrolled,Pending,Dropped',
        ]);

        $enrollment->update($data);
        return response()->json($enrollment);
    }

    public function destroy($uuid)
    {
        $enrollment = Enrollment::where('uuid', $uuid)->firstOrFail();
        $enrollment->delete();
        return response()->json(null, 204);
    }
}