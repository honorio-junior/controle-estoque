<x-layouts.main>
   <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
      <a href="{{ Route('stocks.all') }}" class="inline-block text-blue-700 font-medium mb-3">
         ← Voltar
      </a>
      <h1 class="text-2xl font-bold mb-4">Visão Geral do Estoque</h1>

      <div class="bg-white shadow-md rounded-lg p-6 mb-6">
         <div class="flex justify-between">
            <p class="text-xl font-semibold">{{ $stock->date }}</p>
            <a href="{{ Route('stocks.invoice.new', $stock->id) }}"
               class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
               Nova Nota Fiscal
            </a>
         </div>
         <p class="text-gray-600">{{ $stock->name ?? 'Sem nome' }}</p>
      </div>
      <div class="space-y-8">
         <h2 class="text-lg font-bold mb-2">Notas fiscais</h2>
         @foreach ($stock->invoices as $invoice)
          <div class="bg-gray-100 rounded-lg p-4 shadow">
            <div class="flex justify-between">
               <h3 class="text-lg font-bold mb-2">{{ $invoice->name }}</h3>
               <a href="{{ Route('stocks.invoice.view', [$invoice->id]) }}"
                 class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                 Abrir
               </a>
            </div>
            <p class="text-gray-600">Data: {{ $invoice->date }}</p>
          </div>
       @endforeach
      </div>
   </div>
</x-layouts.main>
