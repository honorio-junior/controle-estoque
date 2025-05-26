<x-layouts.main>
   <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
      <a href="{{ Route('stocks.view', $invoice->stock->id) }}"
         class="inline-block text-blue-700 font-medium mb-3">
         ← Voltar
      </a>
      <div class="flex justify-between">
         <h1 class="text-3xl font-bold text-gray-800">{{ $invoice->name }}</h1>
         <button class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded shadow">
            Adicionar produto
         </button>
      </div>
      <h2 class="text-gray-600 mb-4">Data da nota: {{ $invoice->date }}</h2>
      @if($invoice->products->isEmpty())
        <p class="text-gray-600">Nenhum produto encontrado.</p>
     @else
        <div class="overflow-x-auto">
          <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
            <thead class="bg-gray-100">
               <tr>
                 <th class="py-3 px-6 text-left text-sm font-medium text-gray-700">Nome</th>
                 <th class="py-3 px-6 text-left text-sm font-medium text-gray-700">Código</th>
                 <th class="py-3 px-6 text-right text-sm font-medium text-gray-700">Preço (R$)</th>
                 <th class="py-3 px-6 text-right text-sm font-medium text-gray-700">Preço Venda (R$)</th>
                 <th class="py-3 px-6 text-right text-sm font-medium text-gray-700">Quantidade</th>
                 <th class="py-3 px-6 text-right text-sm font-medium text-gray-700">Total (R$)</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($invoice->products as $product)
               <tr class="border-t border-gray-200 hover:bg-gray-50">
                <td class="py-4 px-6 text-sm text-gray-800">{{ $product->name }}</td>
                <td class="py-4 px-6 text-sm text-gray-800">{{ $product->code }}</td>
                <td class="py-4 px-6 text-sm text-right text-gray-800">
                  {{ number_format($product->price / 100, 2, ',', '.') }}
                </td>
                <td class="py-4 px-6 text-sm text-right text-gray-800">
                  {{ $product->sales_price ? number_format($product->sales_price / 100, 2, ',', '.') : '-' }}
                </td>
                <td class="py-4 px-6 text-sm text-right text-gray-800">{{ $product->amount }}</td>
                <td class="py-4 px-6 text-sm text-right font-semibold text-gray-900">
                  {{ number_format(($product->price * $product->amount) / 100, 2, ',', '.') }}
                </td>
               </tr>
            @endforeach
            </tbody>
          </table>
        </div>
     @endif
   </div>
</x-layouts.main>
