<?php
//Aqui foi importado os elementos que serão usados ao longo do controller.
namespace App\Http\Controllers;
use App\Models\Suppliers;
use Illuminate\Http\Request;


//Aqui foi definido a classe Suppliers Controller como uma extão da classe Controllers, creio que ela erdou as caracteristicas dessa classe.
class SuppliersController extends Controller
{
    //Aqui é declarado a função index que irá retornar todoso os fornecedores do banco usando o Eloquent ORM
    public function index()
    {
        return Suppliers::all(); //Vai no banco de dados e retorna todos as linhas.
    }

    //Aqui é declarado a função store que irá armazenar o novo fornecedor e caso seja bem sucedido irá retornar um json com o código 201
    public function store(Request $request)
    {
        //Aqui é feito uma validação dos dados recebidos para garantir que eles estarão nos parâmetros adequados.
        $request->validate([
            'name' => 'required|string|max:255', //O campo 'name' é obrigatorio, será uma string e deverá ter no máximo 255 caracteres
            'email' => 'required|string|email|max:255|unique:suppliers', //O campo email também deve ser obrigatório, uma string e com 255, mas com a diferença que ele deve ser único na tabela.
            'phone' => 'required|string|max:20', //Aqui é uma validação do telefone, que como os parâmetros anteriores será uma string obrigatório, porém agora com 20 caracteres.
            'address' => 'nullable|string', //Aqui é campo do tipo string opcional.
        ]);

        $supplier = Suppliers::create($request->all());  //Faz uso de um OCR para registrar o novo fornecedor na tabela supplier

        return response()->json($supplier, 201); //Retorna o fornecedor registrado e um código para indicar que o registro foi realizado.
    }

    //Aqui foi declarado o método show que irá exibir dados de um fornecedor específico
    public function show($id) //O método show aceita como parâmtro o id do usuário que queremos buscar
    {
        $supplier = Suppliers::find($id); //Aqui é feito uso da função find do Eloquent que tenta localizar um fornecedor pelo id e salvar as informações dele em $suppliers

        //Abertura do bloco condicional
        if (is_null($supplier)) { //Se a variável supliers estiver nula, ou seja, não foi encontrado nenhum fornecedor com o id informado:
            return response()->json(['message' => 'Supplier not found'], 404); //Cria uma resposta http para informar que o fornecedor não foi encontrado.
        }

        return response()->json($supplier); //Se o fornecedor for encontrado, retorna os dados dele em formato json.
    }

    //Aqui ele atualiza os dados de algum fornecedor previamente cadastrado.
    public function update(Request $request, $id) //Recebe um parâmetro chamado request contendo os novos dados e o parâmetro id referente a quem aqueles novos dados vão pertencer.
    {
        $supplier = Suppliers::find($id); //Cria uma variável chamada supplier e coloca nela o usuário dono daquele id

        //Abertuda de bloco condicional
        if (is_null($supplier)) { //Se esse id não tiver todo:
            return response()->json(['message' => 'Supplier not found'], 404); //Retorne que não foi possível encontrar esse usuário.
        }

        $request->validate([//Validação dos novos dados.
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:suppliers,email,' . $supplier->id,
            'phone' => 'sometimes|required|string|max:20',
            'address' => 'nullable|string',
        ]);

        $supplier->update($request->all()); //Faz as modificações e salva as alterações no banco de dados.

        return response()->json($supplier); //Retorna o usuário cadastrado em formato json e um código 200 para indicar que tudo deu certo.
    }

    //Aqui ele deleta um fornecedor já cadastrado.
    public function destroy($id) //Recebe como parâmetro o id do fornecedor
    {
        $supplier = Suppliers::find($id); //Procura o fornecedor daquele respectivo id e o salva na variável supplier

        //Abertura de bloco condicional.
        if (is_null($supplier)) { //Se não existir fornecedor com aquele id:
            return response()->json(['message' => 'Supplier not found'], 404); //Retorna uma mensagem e um código.
        }

        $supplier->delete(); //Deleta o fornecedor

        return response()->json(['message' => 'Supplier deleted successfully']); //Retorna uma mensagem dizendo que o fornecedor foi deletado com sucesso.
    }
}
