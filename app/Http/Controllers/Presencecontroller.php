<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presence;
use App\Models\Student;
use App\Models\Schedule;
use Illuminate\Support\Facades\DB;


class PresenceController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get presences
        $presences = Presence::latest()->paginate(5);

        //render view with presences
        return view('presences.index', compact('presences'));
    }

    public function show($id)
    {
        $schedule = Schedule::find($id);
        // $scheduleId = $schedule->id;
        $result = DB::table('schedules')
            ->join('groups', 'schedules.group_id', '=', 'groups.id')
            ->join('users', 'schedules.user_id', '=', 'users.id')
            ->select('schedules.*', 'groups.name as group_name', 'users.name as user_name')
            ->where('schedules.id', $id)
            ->first();

        $group_id = $result->group_id;
        $count = DB::table('members')->where('group_id', $group_id)->count();

        $presence = DB::table('members')->select('members.*')->where('group_id', $group_id)->get();

        return view('presences.action', compact('schedule', 'result', 'count', 'presence'));
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        $presence = Presence::All();
        $schedule = Schedule::All();
        $student = Student::All();
        return view('presences.create', compact('presence', 'schedule', 'student'));
    }

    public function store(Request $request)
    {


        //validate form
        $request->validate([
            'schedule' => 'required',
            'status' => 'required',
 
        ]);

        //create post
        foreach ($request->status as $name => $status) {
            Presence::create([
                'schedule_id' => $request->schedule,
                'student_id' => $name,
                'presence' => $status,
                'note' => $request->note[$name],
            ]);
        }
 

        //redirect to index
        return redirect()->route('presences.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * edit
     * 
     * @param  mixed $presence
     * @return void
     */
    public function edit($id)
    {
        $presence = Presence::find($id);
        $schedule = Schedule::All();
        $student = Student::All();

        $selectedScheduleId = DB::table('presences')->select('schedule_id')->where('id', $id)->value('schedule_id');
        $selectedStudentId = DB::table('presences')->select('student_id')->where('id', $id)->value('student_id');
        return view('presences.edit', compact('presence', 'schedule', 'student', 'selectedScheduleId', 'selectedStudentId'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $presence
     * @return void
     */
    public function update(Request $request, Presence $presence)
    {
        //validate form
        $request->validate([
            'schedule_id' => 'required',
            'student_id' => 'required',
            'presence' => 'required',
            'note' => 'required',
        ]);

        //update Group
        $presence->update([
            'schedule_id' => $request->schedule_id,
            'student_id' => $request->student_id,
            'presence' => $request->presence,
            'note' => $request->note
        ]);


        //redirect to index
        return redirect()->route('presences.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(Presence $presence)
    {
        $presence->delete();

        //redirect to index
        return redirect()->route('presences.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}