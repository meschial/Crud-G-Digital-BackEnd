<?php
namespace App\Http\Controllers;

use App\Models\Marcas;
use Illuminate\Http\Request;

class MarcasController extends Controller
{
    private $marcas;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Marcas $marcas)
    {
        $this->marcas = $marcas;
    }

    public function index()
    {
        $marcas = Marcas::orderBy('id','DESC')->paginate(5);
        return response()->json($marcas);
    }

    public function show()
    {
        $marcas['data'] = Marcas::all();
        return response()->json($marcas);
    }

    public function all($id)
    {
        return $this->marcas->find($id);
    }

    public function store(Request $request)
    {
        $marcas = $this->marcas->create($request->all());
        return response()->json($marcas);
    }

    public function update($id, Request $request)
    {
        $marcas = $this->marcas->find($id);
        $marcas->update($request->all());
        return response()->json($marcas);
    }

    public function destroy($id)
    {
        $marcas = $this->marcas->find($id);
        $marcas->delete();
        return response()->json(null);
    }
}
