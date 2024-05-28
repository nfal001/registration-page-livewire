<div class="card h-100 d-inline-block w-100">
    <div class="card-header">
        <h5 class="m-0">Cek Kuota Santri Cabang IDN</h5>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>Pilih Cabang IDN</label>
            <select class="custom-select" wire:model.change="cabangId">
                @forelse ($cabangList as $cabang)
                <option value="{{ $cabang->id }}" :key="$cabang->id">{{ $cabang->nama }}</option>
                @empty
                <option value="" selected>maaf, tidak ada cabang tersedia</option>
                @endforelse
            </select>
        </div>
        @if ($cabangId)
            <livewire:summary-kuota-cabang :cabangId="$cabangId"></livewire:summary-kuota-cabang>
            @else
        <h4 class="my-4">Pilih cabang dahulu untuk cek masing masing kuota</h4>
        @endif
    </div>
</div>
