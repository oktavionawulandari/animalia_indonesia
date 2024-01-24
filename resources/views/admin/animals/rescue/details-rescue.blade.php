<div class="modal fade" id="showModal{{ $rescue->id }}" tabindex="-1" role="dialog" aria-labelledby="showModalLabel{{ $rescue->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <img src="{{ asset($rescue->image) }}" alt="{{ $rescue->image }}" style="width:100px; margin-right:20px;" class="rounded-circle">
                <div class="ms-4">
                    <h5 class="modal-title fw-bold text-secondary" id="detailsModalLabel" style="font-size:25px;">{{$rescue->name_pets}}</h5>
                    <p style="font-size:15px;">{{$rescue->category}}</h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="font-size:13px;">
                <div class="row mb-1">
                    <div class="col-sm-4">
                       Umur Hewan
                    </div>
                    <div class="col-sm-1">
                       :
                     </div>
                     <div class="col-sm-7 text-dark">
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
                    <div class="col-sm-7 text-dark">
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
                    <div class="col-sm-7 text-dark">
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
                    <div class="col-sm-7 text-dark">
                        {{ $rescue->location }}
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-sm-4">
                       Tentang Hewan
                    </div>
                    <div class="col-sm-1">
                       :
                     </div>
                    <div class="col-sm-7 text-dark">
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
                    <div class="col-sm-7 text-dark">
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
                    <div class="col-sm-7 text-dark">
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
                    <div class="col-sm-7 text-dark">
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
