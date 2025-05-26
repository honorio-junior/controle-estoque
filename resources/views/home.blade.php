<x-layouts.main>
   <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
      <!-- Título e descrição -->
      <div class="text-center mb-12">
         <h1 class="text-4xl font-bold text-gray-800 mb-4">📦 Sistema de Gestão de Estoques, Saídas e Financeiro</h1>
         <p class="text-gray-600 text-lg max-w-2xl mx-auto">
            Um sistema simples e eficiente para gerenciar estoques, controlar saídas de produtos e acompanhar a visão
            financeira da sua empresa.
         </p>
      </div>

      <!-- Ações principais -->
      <div class="flex flex-col sm:flex-row justify-center gap-4 mb-16">
         <a href="{{ route('stocks.all') }}"
            class="flex items-center justify-center gap-2 bg-blue-600 text-white px-6 py-3 rounded-lg text-lg font-semibold hover:bg-blue-700 shadow transition">
            📋 Estoques
         </a>
         <a href="#"
            class="flex items-center justify-center gap-2 bg-green-600 text-white px-6 py-3 rounded-lg text-lg font-semibold hover:bg-green-700 shadow transition">
            📊 Financeiro
         </a>
         <a href="#"
            class="flex items-center justify-center gap-2 bg-indigo-600 text-white px-6 py-3 rounded-lg text-lg font-semibold hover:bg-indigo-700 shadow transition">
            📦 Controle de Saídas
         </a>
      </div>

      <!-- Aprimoramentos futuros -->
      <div class="bg-gray-50 border border-gray-200 rounded-lg p-6">
         <h2 class="text-2xl font-bold mb-4 text-gray-800">📚 Aprimoramentos futuros</h2>
         <ul class="list-disc list-inside text-gray-700 space-y-2">
            <li>📊 Relatórios de estoque e financeiro</li>
            <li>💻 Interface web com dashboards e gráficos</li>
            <li>🔐 Autenticação de usuários e permissões</li>
         </ul>
      </div>
   </div>
</x-layouts.main>
