<?php

namespace App\Http\Controllers;

use App\members;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MembersController extends Controller
{
    // Hiển thị danh sách members
    public function index()
    {
        try {
            $members = DB::select("SELECT
                                        mem.id AS member_id,
                                        mem.images,
                                        mem.name AS member_name,
                                        COUNT(res.id) AS match_count,
                                        SUM(res.point) AS total_points,
                                        COUNT(res.result_win) AS result_win,
                                        COUNT(res.result_lose) AS result_lose
                                    FROM
                                        members mem
                                    INNER JOIN
                                        results res ON res.id_member = mem.id
                                    GROUP BY
                                        mem.id");
        dd($members);die;
        } catch (\Throwable $th) {
            $members = "0";
            die($members);
        }
        return view('members.index', compact('members'));
    }

    // Hiển thị danh sách members
    public function list()
    {
        try {
            $members = DB::select('SELECT * FROM members ORDER BY name');
        } catch (\Throwable $th) {
            abort(404, '404');
        }

        return view('members.list', compact('members'));
    }

    // Hiển thị form tạo mới members
    public function create()
    {
        return view('members.create');
    }

    // Lưu members mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        $members = new members();
        $members->name = $request->input('name');
        $members->note = $request->input('note');
        $members->images = $request->input('images');

        // thêm ảnh
        // if($request->hasfile('images'))
        // {
        //     $file = $request->file('images');
        //     $extention = $file->getClientOriginalExtension();
        //     $filename = time().'.'.$extention;
        //     $file->move('uploads/members/', $filename);
        //     $members->images = $filename;
        // }
        $members->save();

        return redirect()->route('members.create')->with('success', 'Add successfully.');
    }

    // Hiển thị form chỉnh sửa members
    public function edit($id)
    {
        $edit_members = members::find($id);
        return view('members.edit', compact('edit_members'));
    }

    // Cập nhật thông tin members vào cơ sở dữ liệu
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'images' => 'required',
            'note' => 'nullable',
        ]);

        $member = members::find($id);
        $member->name = $request->input('name');
        $member->images = $request->input('images');
        // thêm ảnh
        // if($request->hasfile('images'))
        // {
        //     $file = $request->file('images');
        //     $extention = $file->getClientOriginalExtension();
        //     $filename = time().'.'.$extention;
        //     $file->move('uploads/members/', $filename);
        //     $member->images = $filename;
        // }
        $member->note = $request->input('note');
        $member->save();
        return redirect()->route('members.list')->with('success', 'Updated successfully.');
    }

    // Xóa một members khỏi cơ sở dữ liệu
    public function destroy($id)
    {
        DB::table('members')->where('id', $id)->update(["delete_flg" => 1]);
        return redirect()->route('members.list')->with('success', 'Deleted successfully.');
    }

    public function delete($id)
    {
        DB::table('members')->where('id', $id)->delete();
        return redirect()->route('members.list')->with('success', 'Deleted successfully.');
    }
}