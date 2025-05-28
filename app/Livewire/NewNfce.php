<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Services\InventoryService;
use App\Services\InvoiceService;

class NewNfce extends Component
{
   use WithFileUploads;

   public int $stock_id;
   public $showModal = false;
   public $xmlFile;
   public $errorMessage = null;


   public function mount($stock_id)
   {
      $this->stock_id = $stock_id;
   }

   public function saveNfce()
   {
      $this->validate([
         'xmlFile' => 'required|file|mimes:xml',
      ]);

      $xml = file_get_contents($this->xmlFile->getRealPath());

      try {

         $invoice = new InvoiceService();
         $data = $invoice->read($xml);
         $inventory = new InventoryService();
         $inventory->saveInvoice($this->stock_id, $data);

         $this->reset(['xmlFile', 'showModal']);
         $this->dispatch('reloadPage');

      } catch (\Exception $e) {
         $this->errorMessage = 'XML Inválido: ' . $e->getMessage();
      }
   }

   public function render()
   {
      return view('livewire.new-nfce');
   }
}
