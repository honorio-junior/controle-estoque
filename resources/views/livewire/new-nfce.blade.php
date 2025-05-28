<div>
   <button wire:click="
   $set('showModal', true);
   $set('errorMessage', null);" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
      Nova NFC-e
   </button>

   @if ($showModal)
      <div class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md relative">
          <button wire:click="$set('showModal', false)"
            class="absolute top-2 right-2 text-gray-500 hover:text-gray-800">✕</button>
          @if ($errorMessage)
           <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
            {{ $errorMessage }}
           </div>
         @endif
          <h2 class="text-xl font-semibold mb-4">Importar XML</h2>

          <form wire:submit.prevent="saveNfce">
            <input type="file" wire:model="xmlFile" accept=".xml"
               class="block w-full text-sm text-gray-700 border border-gray-300 rounded p-2 mb-4" />

            <div wire:loading wire:target="xmlFile"
               class="flex items-center gap-2 mt-3 text-blue-600 text-sm font-medium">
               <svg class="animate-spin h-5 w-5 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24">
                 <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                 <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
               </svg>
               Enviando arquivo...
            </div>

            @error('xmlFile') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

            <div class="flex justify-end space-x-2">
               <button type="button" wire:click="$set('showModal', false)"
                 class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Cancelar</button>
               <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Enviar</button>
            </div>
          </form>
        </div>
      </div>
   @endif
</div>
