<?php

namespace App\Http\Controllers;

use App\members;
use App\results;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResultsController extends Controller
{
    // Hiển thị danh sách results
    public function list()
    {
        $results = DB::select('SELECT * FROM results ORDER BY id_member ASC');

        // Get name
        foreach ($results as $result) {
            $member = members::find($result->id_member);
            $result->member_name = $member->name;
        }

        return view('results.list', compact('results'));
    }

    /*
    | Hiển thị form tạo mới results
    */
    public function create()
    {
        $name_member = DB::select("SELECT id, name FROM members");

        // 9 vòng đấu
        $round_matches = array('1', '2', '3', '4', '5', '6', '7', '8', '9');
        
        // 1: win | 0:lost
        $result = array('1', '0');

        return view('results.create', compact('name_member', 'round_matches', 'result'));
    }

    // Lưu result mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        $results = new results();
        $results->id_member = $request->input('id_member');
        $results->round_matches = $request->input('round_matches');
        $results->number_matches = 1;
        $results->point = $request->input('point');
        $results->result_win = $request->input('result_win');
        $results->result_lose = $request->input('result_lose');
        $results->note = $request->input('note');

        $results->save();
        return redirect()->route('results.create')->with('success', 'Add successfully.');
    }

    // Hiển thị form chỉnh sửa results
    public function edit($id)
    {
        $edit_result = results::find($id);
        $edit_results = results::all();

        // Get name
        $member = members::find($edit_result->id_member);
        $edit_result->member_name = $member->name;

        return view('results.edit', compact('edit_results', 'edit_result'));
    }

    // Cập nhật thông tin results vào cơ sở dữ liệu
    public function update(Request $request, $id)
    {
        $result = results::find($id);
        $result->id_member = $request->input('id_member');
        $result->round_matches = $request->input('round_matches');
        $result->point = $request->input('point');
        $result->result_win = $request->input('result_win');
        $result->result_lose = $request->input('result_lose');
        $result->note = $request->input('note');
        $result->save();
        return redirect()->route('results.list')->with('success', 'Updated successfully.');
    }

    // Xóa một result khỏi cơ sở dữ liệu
    public function destroy($id)
    {
        DB::table('results')->where('id', $id)->delete();
        return redirect()->route('results.list')->with('success', 'Deleted successfully.');
    }
}
