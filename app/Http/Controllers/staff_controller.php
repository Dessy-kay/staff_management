<?php

namespace App\Http\Controllers;

use App\Models\staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class staff_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staffs=staff::all();

        return view ("index", ["staffs" => $staffs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ("create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            "name" => "string",
            "email" => "required|email|unique:staff,email",
            "position" => "string",
            "phone_no" => "string",
            "twitter_username" => "nullable|string",
            "linkedin_username" => "nullable|string",
            "image" => "required|image|mimes: jpg,jpeg,png|max: 2048",
        ]);

        $data["image"]= $request->file("image")->store("staff_images", "public");
        Staff::create($data);
        return to_route("index")->with("message","staff created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(staff $staff)
    {
        return "show";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $staff = Staff::findOrFail($id);
        return view("edit", ["staff" => $staff]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $staff = Staff::findOrFail($id);
        $data = $request->validate([
            "name" => "string",
            "email" => "required|email",
            "position" => "string",
            "phone_no" => "string",
            "twitter_username" => "nullable|string",
            "linkedin_username" => "nullable|string",
            "image" => "nullable|image|mimes: jpg,jpeg,png|max: 2048",
        ]);
        if ($request->hasFile('image')) {
            Storage::disk("public")->delete($staff->image);
            $data["image"]= $request->file("image")->store("staff_images", "public");
        }
        $staff->update($data);
        return to_route("index")->with("message","staff updated successfully");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $staff = staff::findOrFail($id);
        $staff->delete();

        return to_route("index")->with("message","staff deleted successfully");
    }
}
