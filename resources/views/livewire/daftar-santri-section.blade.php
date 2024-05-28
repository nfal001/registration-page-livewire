<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Form Pendaftaran Santri Baru</h3>
    </div>

    <form wire:submit="daftarSantriSubmit">
        @if (session('error'))
        <div class="form-group mx-3 my-4" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)">
            <h3>{{ session('error') }}</h3>
        </div>
        @endif
        @error('daftarSantriSubmit')
        aldkjSAdlkjsadlkasjdlkadsjlaskdjlkj
        {{ $message }}
        @enderror
        <div class="card-body">
            <div class="form-group">
                <label for="email"
                    >Email address</label
                >
                <input
                    type="email"
                    class='form-control @error('formDaftarSantri.email') is-invalid @enderror'
                    id="email"
                    placeholder="Enter email"
                    wire:model.blur="formDaftarSantri.email"
                />
            </div>
            @error('formDaftarSantri.email')
            <div class="mb-3">
                 <span class="text-danger">{{ $message }}</span>
            </div>
            @enderror
            <div class="form-group">
                <label for="password"
                    >Password</label
                >
                <input
                    type="password"
                    id="password"
                    placeholder="Password"
                    wire:model.blur="formDaftarSantri.password"
                    class='form-control @error('formDaftarSantri.password') is-invalid @enderror'
                />
            </div>
            @error('formDaftarSantri.password')
            <div class="mb-3">
                 <span class="text-danger">{{ $message }}</span>
            </div>
            @enderror
            <div class="form-group">
                <label for="nama-santri"
                    >Nama Santri</label
                >
                <input
                    type="text"
                    class="form-control"
                    id=""
                    name="nama-santri"
                    placeholder="nama santri"
                    wire:model.blur="formDaftarSantri.namaSantri"
                    class='form-control @error('formDaftarSantri.namaSantri') is-invalid @enderror'
                />
            </div>
            @error('formDaftarSantri.namaSantri')
            <div class="mb-3">
                 <span class="text-danger">{{ $message }}</span>
            </div>
            @enderror
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <div class="form-check">
                    <input
                        class="form-check-input"
                        type="radio"
                        value="Ikhwan"
                        name="gender"
                        id="gender-ikhwan"
                        wire:model.blur="formDaftarSantri.jenisKelamin"
                    />
                    <label class="form-check-label" for="gender-ikhwan"
                        >Ikhwan</label
                    >
                </div>
                <div class="form-check">
                    <input
                        class="form-check-input"
                        type="radio"
                        value="Akhwat"
                        name="gender"
                        id="gender-akhwat"
                        wire:model.blur="formDaftarSantri.jenisKelamin"
                    />
                    <label class="form-check-label" for="gender-akhwat"
                        >Akhwat</label
                    >
                </div>
            </div>
            @error('formDaftarSantri.jenisKelamin')
            <div class="mb-3">
                 <span class="text-danger">{{ $message }}</span>
            </div>
            @enderror
            <div class="form-group">
                <label>Cabang IDN</label>
                <select class="custom-select @error('formDaftarSantri.cabangIdnId') is-invalid @enderror"  wire:model.change="formDaftarSantri.cabangIdnId">
                    <option value="" selected>pilih cabang idn</option>
                    @foreach (\App\Models\CabangIdn::all() as $cabangIdn)
                        <option value="{{ $cabangIdn->id }}">{{ $cabangIdn->nama }}</option>
                    @endforeach
                </select>
            </div>
            @error('formDaftarSantri.cabangIdnId')
            <div class="mb-3">
                 <span class="text-danger">{{ $message }}</span>
            </div>
            @enderror
            {{-- Ada cara biar hilang saat fetch? --}}
            @if ($formDaftarSantri->cabangIdnId)
            <div class="form-group" wire:model.blur="formDaftarSantri.programIdnId" wire:key="{{ $formDaftarSantri->cabangIdnId }}">
                <label>Program Pendidikan</label>
                <select class="custom-select @error('formDaftarSantri.programIdnId') is-invalid @enderror">
                    <option value="" selected>pilih prodi</option>
                    @foreach (\App\Models\ProgramPendidikan::where('cabang_idn_id',$formDaftarSantri->cabangIdnId)->get() as $prodi)
                  <option value="{{ $prodi->id }}">{{ $prodi->nama }} : Tersedia {{ $prodi->limit_kuota - \App\Models\PendaftaranSantri::where('cabang_idn_id',$formDaftarSantri->cabangIdnId)->where('program_pendidikan',$prodi->id)->count() }}</option>
                    @endforeach
                </select>
            </div>
            @error('formDaftarSantri.programIdnId')
            <div class="mb-3">
                 <span class="text-danger">{{ $message }}</span>
            </div>
            @enderror
            @endif
            <div class="form-group"
            x-data="{ uploading: false, progress: 0 }"
            x-on:livewire-upload-start="uploading = true; progress = 0"
            x-on:livewire-upload-finish="uploading = false"
            x-on:livewire-upload-cancel="uploading = false"
            x-on:livewire-upload-error="uploading = false"
            x-on:livewire-upload-progress="progress = $event.detail.progress"
            >
                <label for="buktiTransferBayar"
                    >Lampiran Bukti Pendaftaran</label
                >

                <div class="input-group">
                    <div class="custom-file @error('formDaftarSantri.buktiTransferImage') is-invalid @enderror">
                        <input
                            type="file"
                            class="custom-file-input"
                            id="buktiTransferBayar"
                            wire:model.blur="formDaftarSantri.buktiTransferImage"
                        />
                        <label
                            class="custom-file-label"
                            for="buktiTransferBayar"
                            >
                            @error('formDaftarSantri.buktiTransferImage')
                            Failed Upload File
                                @else
                                @if($formDaftarSantri->buktiTransferImage) {{ $formDaftarSantri->buktiTransferImage->getClientOriginalName() }} @else Choose File @endif
                            @enderror </label
                        >
                    </div>
                </div>

                <div class="progress my-3" x-show="uploading">
                    <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" aria-valuemin="0" aria-valuemax="100" :style="{ width: `${progress}%` }">
                    </div>
                </div>

                @error('formDaftarSantri.buktiTransferImage')
                <div class="my-3">
                    <span class="text-danger">{{ $message }}</span>
                </div>
                @else
                @if($formDaftarSantri->buktiTransferImage)
                <div class="form-group my-3">
                    <h5 class="mb-3">preview image</h5>
                    <img class="img-fluid" name="pic" src="{{ $formDaftarSantri->buktiTransferImage->temporaryUrl() }}" alt="temporaryImage">
                </div>
                @endif
                @enderror
            </div>
        </div>

        <div class="card-footer">
            <button
                type="submit"
                class="btn btn-primary"
                @if (session('error'))
                    disabled
                @endif
            >
                Submit
            </button>
            {{-- Dasar Fitur Flash --}}
            @if(session('daftar-santri-ok'))
            <div class="my-5" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 10000)">
               <p>Anda telah berhasil daftar menjadi calon santri IDN, berikut detail data pendaftaran anda :</p>
               <p>
                   Nama : {{  $formDaftarSantri->namaSantri }}
               </p>
               <p>
                   Cabang : {{  \App\Models\CabangIdn::find($formDaftarSantri->cabangIdnId)->nama }}
               </p>
               <p>
                   Program: {{  \App\Models\ProgramPendidikan::find($formDaftarSantri->programIdnId)->nama }}
               </p>
               <p>
                   Untuk melanjutkan proses penerimaan santri baru, silahkan login ke aplikasi.
               </p>
               <button href="/interview" class="btn btn-success" wire:navigate>Login Disini</button>
            </div>
            @endif
        </div>
    </form>
</div>
