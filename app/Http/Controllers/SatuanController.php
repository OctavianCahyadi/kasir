<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\unit;

class SatuanController extends Controller
{
    public function index()
    {
        $units = unit::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.satuan', compact('units'));
    }
    public function store(Request $request)
    {
        //validasi form
        $this->validate($request, [
            'name' => 'required|string|max:50',
            'description' => 'nullable|string'
        ]);
        try {
            $units = unit::firstOrCreate(
                ['name' => $request->name],
                ['description' => $request->description]
            );
            return redirect()->back()->with(['success' => 'Satuan: ' . $units->name . ' Ditambahkan']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    public function destroy($id)
    {
        $units = unit::findOrFail($id);
        $units->delete();
        return redirect()->back()->with(['success' => 'Satuan: ' . $units->name . ' Telah Dihapus']);
    }
    public function edit($id)
    {
        $units = unit::findOrFail($id);
        return view('admin.edit_satuan', compact('units'));
    }
    public function update(Request $request, $id)
    {
        //validasi form
        $this->validate($request, [
            'name' => 'required|string|max:50',
            'description' => 'nullable|string'
        ]);

        try {
            //select data berdasarkan id
            $units = unit::findOrFail($id);
            //update data
            $units->update([
                'name' => $request->name,
                'description' => $request->description
            ]);
            //redirect ke route satuan.index
            return redirect(route('satuan.index'))->with(['success' => 'satuan: ' . $units->name . ' Diubah']);
        } catch (\Exception $e) {
            //jika gagal, redirect ke form yang sama lalu membuat flash message error
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
