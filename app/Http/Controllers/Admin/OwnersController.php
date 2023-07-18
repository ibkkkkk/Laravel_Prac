<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Owner; // Eloquent エロクアント
use Illuminate\Support\Facades\DB; // QueryBuilder
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\Shop;
use Illuminate\Support\Facades\Log;
use Throwable;

class OwnersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        // $date_now = Carbon::now();
        // $date_parse = Carbon::parse(now());
        // echo $date_now;
        // echo $date_parse;

        // $e_all = Owner::all();
        // $q_get = DB::table('owners')->select('name', 'created_at')->get();

        // $q_first = DB::table('owners')->select('name')->first();

        // $c_test = collect([
        //     'name' => "テスト"
        // ]);

        // var_dump($q_first);
        // dd($e_all, $q_get, $q_first, $c_test);


        $owners = Owner::select('id', 'name', 'email', 'created_at')->paginate(4);

        return view('admin.owners.index', compact('owners'));
    }

    public function create()
    {
        return view('admin.owners.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:owners'],
            'password' => ['required', 'string', 'confirmed', 'min:8'],
        ]);

        try {
            DB::transaction(function () use ($request) {
                $owner = Owner::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);

                Shop::create([
                    'owner_id' => $owner->id,
                    'name' => "店名を入力",
                    'information' => '',
                    'filename' => '',
                    'is_selling' => true

                ]);
            }, 3);
        } catch (Throwable $e) {
            Log::error($e);
            throw $e;
        };



        return redirect()
            ->route('admin.owners.index')
            ->with('message', 'success');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $owner = Owner::findOrFail($id);
        return view('admin.owners.edit', compact('owner'));
    }


    public function update(Request $request, $id)
    {
        $owner = Owner::findOrFail($id);

        $owner->name = $request->name;
        $owner->email = $request->email;
        $owner->password = Hash::make($request->password);
        $owner->save();

        return redirect()
            ->route('admin.owners.index')
            ->with('message', '更新されました。');
    }


    public function destroy($id)
    {
        Owner::findOrFail($id)->delete(); //SoftDeletes
        return redirect()
            ->route('admin.owners.index')
            ->with('message', '削除しました。');
    }
}
