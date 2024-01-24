<!-- Modal -->
<style>
    .link-button {
        background: none;
        border: none;
        color: #007bff;
        cursor: pointer;
        text-decoration: underline;
        font-size: inherit;
        font-family: inherit;
        margin-left: -5px;
    }

    .link-button:hover {
        text-decoration: none;
    }
</style>
<div class="modal fade" id="modal-rescue{{ $rescue->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-detail-label{{ $rescue->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <img src="{{ asset($rescue->image) }}" alt="{{ $rescue->image }}" style="width:100px" class="rounded-circle">
                <div class="ms-4">
                    <h5 class="modal-title fw-bold" id="detailsModalLabel" style="font-size:25px;">{{$rescue->name_pets}}</h5>
                    <p style="font-size:15px;">{{$rescue->category}}</h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="font-size:15px;">
                <div class="row mb-1">
                    <div class="col-sm-4">
                       Umur Hewan
                    </div>
                    <div class="col-sm-1">
                       :
                     </div>
                    <div class="col-sm-7 text-secondary">
                        @if ($rescue->age)
                            @php
                                $birthDate = new DateTime($rescue->age);
                                $currentDate = new DateTime();
                                $age = $birthDate->diff($currentDate);
                            @endphp
                                {{ $age->y }} Tahun, ({{ $age->m }} bulan)
                        @endif
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-sm-4">
                       Jenis Kelamin
                    </div>
                    <div class="col-sm-1">
                       :
                     </div>
                    <div class="col-sm-7 text-secondary">
                        @if ($rescue->gender == 'Female')
                            Betina
                        @else
                            Jantan
                        @endif
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-sm-4">
                       Tanggal Hilang
                    </div>
                    <div class="col-sm-1">
                       :
                     </div>
                    <div class="col-sm-7 text-secondary">
                        {{ $rescue->date }}
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-sm-4">
                       Lokasi Terakhir
                    </div>
                    <div class="col-sm-1">
                       :
                     </div>
                    <div class="col-sm-7">
                        <button class="link-button" onclick="location.href='{{ $rescue->location }}'" target="_blank" >Klik disini</button>
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-sm-4">
                       Tentang Hewan
                    </div>
                    <div class="col-sm-1">
                       :
                     </div>
                    <div class="col-sm-7 text-secondary">
                        {{ $rescue->information }}
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-sm-4">
                       Status
                    </div>
                    <div class="col-sm-1">
                       :
                     </div>
                    <div class="col-sm-7 text-secondary">
                        @if ($rescue->status == 'lost')
                        Hilang
                        @elseif ($rescue->status == 'found')
                        Ditemukan
                        @endif
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-sm-4">
                       Informasi Kontak
                    </div>
                    <div class="col-sm-1">
                       :
                     </div>
                    <div class="col-sm-7 text-secondary">
                        {{ $rescue->detailRescue->phone }}
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-sm-4">
                       Nama Kontak
                    </div>
                    <div class="col-sm-1">
                       :
                     </div>
                    <div class="col-sm-7 text-secondary">
                        {{ $rescue->detailRescue->name_contact }}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
