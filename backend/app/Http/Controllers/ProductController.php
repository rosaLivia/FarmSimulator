<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_code' => 'required|string|max:8',
            'name' => 'required|string|max:40',
            'mark' => 'required|string|max:20',
            'description' => 'sometimes|string|max:100',
            'price' => 'required|numeric',
            'instructions' => 'sometimes|string|max:100',
            'stock' => 'required|integer'
        ]);

        return Product::create($request->all());
    }

    public function show($id)
    {
        return Product::find($id);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $request->validate([
            'product_code' => 'required|varchar(10)',
            'name' => 'required',
            'mark' => 'required',
            'description' => 'sometimes|varchar(100)',
            'price' => 'required|numeric',
            'instructions' => 'sometimes|varchar(100)',
            'stock' => 'required|integer'
        ]);

        $product->update($request->all());

        return $product;
    }

    public function destroy($id)
    {
        return Product::destroy($id);
    }
}

/*
Exemplo de funções de autenticação usando o sanctum:

<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller; -->Necessário para configurar a classe
use App\Http\Resources\V1\InvoiceResource; -->Necessário para formatar a saída de dados
use App\Models\Invoice; --> Necessário para formatar a entrada de dados
use App\Traits\HttpResponses; --> Necessário para formatar as respostas http (100, 200, 300, 404)
use Illuminate\Http\Request; --> Necessário para se comunicar com o banco
use Illuminate\Support\Facades\Validator; --> 

class InvoiceController extends Controller
{
  use HttpResponses;

  public function __construct()
  {
    $this->middleware(['auth:sanctum', 'abilities:invoice-store,user-update'])->only(['store', 'update']);
  }
  public function store(Request $request)
  {

    if (!auth()->user()->tokenCan('invoice-store')) {
      return $this->error('Unauthorized', 403);
    }

    $validator = Validator::make($request->all(), [
      'user_id' => 'required',
      'type' => 'required|max:1',
      'paid' => 'required|numeric|between:0,1',
      'payment_date' => 'nullable',
      'value' => 'required|numeric|between:1,9999.99'
    ]);

    if ($validator->fails()) {
      return $this->error('Data Invalid', 422, $validator->errors());
    }

    $created = Invoice::create($validator->validated());

    if ($created) {
      return $this->response('Invoice created', 200, new InvoiceResource($created->load('user')));
    }

    return $this->error('Invoice not created', 400);
  }

  public function update(Request $request, Invoice $invoice)
  {
    $validator = Validator::make($request->all(), [
      'user_id' => 'required',
      'type' => 'required|max:1|in:' . implode(',', ['B', 'C', 'P']),
      'paid' => 'required|numeric|between:0,1',
      'value' => 'required|numeric',
      'payment_date' => 'nullable|date_format:Y-m-d H:i:s'
    ]);

    if ($validator->fails()) {
      return $this->error('Validation failed', 422, $validator->errors());
    }

    $validated = $validator->validated();

    $updated = $invoice->update([
      'user_id' => $validated['user_id'],
      'type' => $validated['type'],
      'paid' => $validated['paid'],
      'value' => $validated['value'],
      'payment_date' => $validated['paid'] ? $validated['payment_date'] : null
    ]);

    if ($updated) {
      return $this->response('Invoice updated', 200, new InvoiceResource($invoice->load('user')));
    }

    return $this->error('Invoice not updated', 400);
  }
}
*/
