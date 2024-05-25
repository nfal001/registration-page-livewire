<div>
    <h2>Kelipatan Satu</h2>
    <h3>
        Hasil: {{ $count }}
    </h3>
    @if ($count > 0)
        <x-button wire:click="dec(1)" color="danger" class="btn-sm">KURANG (-)</x-button>
        @else
        <x-button wire:click="dec(1)" color="danger" class="btn-sm" disabled>KURANG (-)</x-button>
    @endif
    <x-button wire:click="inc(1)" color="success" class="btn-sm">TAMBAH (+)</x-button>
    
    <h2 class="my-3">Kelipatan Dua</h2>
    <h3>
        Hasil double: {{ $count }}
    </h3>
    <x-button wire:click="dec(2)" color="danger" class="btn-sm" disabled>KURANG (-)</x-button>
    <x-button wire:click="inc(2)" color="success" class="btn-sm">TAMBAH (+)</x-button>

</div>