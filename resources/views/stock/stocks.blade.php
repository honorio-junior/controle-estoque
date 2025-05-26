<x-layouts.main>
   <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
      <a href="{{ Route('home') }}" class="inline-block text-blue-700 font-medium mb-3">
         ← Voltar
      </a>
      <div class="flex justify-between mb-6">
         <h1 class="text-2xl font-bold">Todos os Estoques</h1>
         <a class="bg-green-600 hover:bg-green-500 text-white  p-2 rounded-lg" href="{{ Route('stocks.new') }}">Novo</a>
      </div>

      @forelse ($stocks as $stock)
        <div class="bg-white shadow rounded-lg p-6 mb-6">
          <div class="flex justify-between items-center mb-4">
            <div>
               <h2 class="text-xl font-semibold">{{ \Carbon\Carbon::parse($stock['date'])->format('d/m/Y') }}
               </h2>
               <p class="text-gray-600 text-sm">{{ $stock['name'] ?? 'Sem nome' }}</p>
            </div>
            <a href="{{ route('stocks.view', $stock['id']) }}"
               class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
               Ver Estoque
            </a>
          </div>
          <p class="text-gray-500 italic">{{ count($stock['invoices']) }} notas</p>
        </div>
     @empty
        <p class="text-gray-500">Nenhum estoque encontrado.</p>
     @endforelse
   </div>
</x-layouts.main>
