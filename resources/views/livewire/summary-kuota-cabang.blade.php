<div>
    <h5 class="my-4">Data Kuota Pedaftaran {{ $cabang->nama }}</h5>
    @foreach ($cabang->programPendidikan as $prodi)    
    <div class="card card-info card-outline">
        <div class="card-header">
            <h5 class="card-title">
                Prodi {{ $prodi->nama }}
            </h5>
            <div class="card-tools">
            </div>
        </div>
        <div class="card-body">
            <div
                class=""
            >
            {{-- bad Query Implementation --}}
            Total Kuota {{ $prodi->limit_kuota }} , <span class="badge bg-primary ">Kuota Tersedia: {{ $prodi->limit_kuota - \App\Models\PendaftaranSantri::where('cabang_idn_id',$cabang->id)->where('program_pendidikan',$prodi->id)->count() }}</span>
            </div>
        </div>
    </div>
    @endforeach
</div>