<x-layouts.main>
   <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
      <a href="{{ Route('stocks.all') }}" class="inline-block text-blue-700 font-medium mb-3">
         ← Voltar
      </a>
      <h2 class="text-2xl font-bold mb-6 text-gray-800">Cadastrar Estoque</h2>

      <form action="{{ route('stocks.new') }}" method="POST" class="space-y-6">
         @csrf

         <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Nome do Estoque (Opcional)</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
            @error('name')
            <p class="text-sm text-red-600 mt-1">* {{ $message }}</p>
         @enderror
         </div>

         <div>
            <label for="date" class="block text-sm font-medium text-gray-700">Data</label>
            <input type="date" name="date" id="date" value="{{ old('date') }}"
               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
            @error('date')
            <p class="text-sm text-red-600 mt-1">* {{ $message }}</p>
         @enderror
         </div>

         <div class="flex justify-end">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded">
               Abrir novo
            </button>
         </div>
      </form>
   </div>
</x-layouts.main>