<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public function searchData($filters)
    {
        return Course::when(isset($filters['id']), function ($query) use ($filters) {
            return $query->where('id', $filters['id']);
        })->when(isset($filters['slug']), function ($query) use ($filters) {
            return $query->where('slug', $filters['slug']);
        })->when(isset($filters['category']), function ($query) use ($filters) {
            return $query->where('category', $filters['category']);
        })->when(isset($filters['most_popular']), function ($query) use ($filters) {
            return $query->where('most_popular', $filters['most_popular']);
        });
    }

    public function getCourse(Request $request)
    {
        $filter = $request->all();

        $data = $this->searchData($filter)->get();
        $count = $this->searchData($filter)->count();
        return response([
            'success' => true,
            'data' => $data,
            'total' => $count
        ], 200);
    }

    public function store(Request $request)
    {

        try {
            DB::beginTransaction();

            $payload = $request->all();
            $payload["slug"] = Str::slug($request->title, "-");

            Course::create($payload);

            DB::commit();
            return response([
                'succes' => true
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response([
                'succes' => false,
                'message' => $e->getMessage()
            ], 200);
        }
    }

    public function update(Request $request)
    {
        try {
            DB::beginTransaction();

            $payload = $request->all();
            $payload["slug"] = Str::slug($request->title, "-");

            Course::whereId($request->id)->update($payload);

            DB::commit();
            return response([
                'succes' => true
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response([
                'succes' => false,
                'message' => $e->getMessage()
            ], 200);
        }
    }

    public function destroy(Request $request)
    {
        try {
            DB::beginTransaction();

            Course::whereId($request->id)->delete();

            DB::commit();
            return response([
                'succes' => true
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response([
                'succes' => false,
                'message' => $e->getMessage()
            ], 200);
        }
    }
}
