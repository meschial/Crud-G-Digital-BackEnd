<?php
namespace App\Http\Controllers;

use App\Models\Modelos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModelosController extends Controller
{
    private $modelos;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Modelos $modelos)
    {
        $this->modelos = $modelos;
    }

    public function index()
    {
        $modelos = DB::table('modelos')
        ->join('marcas', 'marcas.id', '=', 'modelos.marca_id')
        ->select('modelos.*', 'marcas.name as nomemarcas')
        ->orderBy('id','DESC')
        ->paginate(5);
        return response()->json($modelos);
    }

    public function show($id)
    {
        return $this->modelos->find($id);
    }
    
    public function store(Request $request)
    {
        $this->modelos->create($request->all());
        return response()->json(['data' => ['message' => 'Modelo foi criado com sucesso!']]);
    }

    public function update($id, Request $request)
    {
        $modelos = $this->modelos->find($id);
        $modelos->update($request->all());
        return response()->json(['data' => ['message' => 'Modelo foi atualizado com sucesso!']]);
    }

    public function destroy($id)
    {
        $modelos = $this->modelos->find($id);
        $modelos->delete();
        return response()->json(['data' => ['message' => 'Modelos foi deletado com sucesso!']]);
    }
}
