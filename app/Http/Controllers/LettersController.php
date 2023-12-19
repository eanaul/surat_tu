<?php

namespace App\Http\Controllers;

use App\Models\Letters;
use App\Models\LetterTypes;
use App\Models\User;
use Illuminate\Http\Request;

class LettersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $letters = Letters::all();

        return view('surat.index', compact('letters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $letter = LetterTypes::all();

        $user = User::where('role', 'guru')->get();

        return view('surat.create', compact('letter', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // $request->validate([
    //     'letter_perihal' => 'required',
    //     'letter_type_id' => 'required',
    //     'content' => 'required',
    //     'recipients' => 'required|array',
    //     'attachment' => 'nullable',
    //     'notulis' => 'required'
    // ]);

    // $attachment = $request->hasFile('attachment') ? $request->file('attachment')->store('attachments') : null;
    
    $arrayDistinct = array_count_values($request->recipients);
        $arrayAssoc = [];
        foreach($arrayDistinct as $id => $count){
            $users = User::where('id', $id)->first();

            $arrayItem = [
                "id" => $id,
                "name" => $users->name,

            ];

            array_push($arrayAssoc, $arrayItem);
        }
        $request['recipients'] = $arrayAssoc;

    // Letters::create([
    //     'letter_perihal' => $request->letter_perihal,
    //     'letter_type_id' => $request->letter_type_id,
    //     'content' => $request->content,
    //     'recipients' => $request->recipients,
    //     'attachment' => $request->attachment,
    //     'notulis' => $request->notulis
    // ]);

        Letters::create($request->all());

    return redirect()->back()->with('success', 'Berhasil Menambah Data');   
}

    /**
     * Display the specified resource.
     */
    public function show(Letters $letters)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Letters $letters)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Letters $letters)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Letters $letters)
    {
        //
    }
}
