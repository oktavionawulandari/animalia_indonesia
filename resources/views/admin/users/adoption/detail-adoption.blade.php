<div class="modal fade" id="showModalAdoption{{ $adopter->id }}" tabindex="-1" role="dialog" aria-labelledby="showModalLabel{{ $adopter->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <img src="{{ asset($adopter->profile) }}" alt="{{ $adopter->username }}" style="width:100px; height:100px; margin-right:20px;  object-fit: cover;" class="rounded-circle">
                <div class="me-5" style="margin-top:20px;">
                    <h5 class="modal-title fw-bold text-secondary" id="detailsModalLabel" style="font-size:25px;">{{ $adopter->detailAdopter->full_name }}</h5>
                        <p style="font-size:15px;">
                            @if ($adopter->form->form == 'filled')
                                <span class="badge badge-success text-white">Sudah Diisi</span>
                            @else
                                <span class="badge badge-danger text-white">Belum Diisi</span>
                            @endif
                        </p>
                    </h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="font-size:13px;">
                <div class="row mb-1">
                    <div class="col-sm-4">
                       Username
                    </div>
                    <div class="col-sm-1">
                       :
                     </div>
                    <div class="col-sm-7 text-dark">
                        {{ $adopter->username }}
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-sm-4">
                       Email
                    </div>
                    <div class="col-sm-1">
                       :
                     </div>
                    <div class="col-sm-7 text-dark">
                        {{ $adopter->email }}
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-sm-4">
                       NIK
                    </div>
                    <div class="col-sm-1">
                       :
                     </div>
                    <div class="col-sm-7 text-dark">
                        {{ $adopter->detailAdopter->nik }}
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
                        @if ($adopter->detailAdopter->gender == 'Female')
                            Perempuan
                        @else
                            Laki - Laki
                        @endif
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-sm-4">
                       Tanggal Lahir
                    </div>
                    <div class="col-sm-1">
                       :
                     </div>
                    <div class="col-sm-7 text-dark">
                        {{ $adopter->detailAdopter->birthday }}
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-sm-4">
                       Kode Pos
                    </div>
                    <div class="col-sm-1">
                       :
                     </div>
                    <div class="col-sm-7 text-dark">
                        {{ $adopter->detailAdopter->zip_code }}
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-sm-4">
                       Kabupaten
                    </div>
                    <div class="col-sm-1">
                       :
                     </div>
                    <div class="col-sm-7 text-dark">
                        {{ $adopter->detailAdopter->regency->name }}
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-sm-4">
                       Kecamatan
                    </div>
                    <div class="col-sm-1">
                       :
                     </div>
                    <div class="col-sm-7 text-dark">
                        {{ $adopter->detailAdopter->subDistrict->name }}
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-sm-4">
                       Alamat Adopter
                    </div>
                    <div class="col-sm-1">
                       :
                     </div>
                    <div class="col-sm-7 text-dark">
                        {{ $adopter->detailAdopter->street }}
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-sm-4">
                      Maps Lokasi
                    </div>
                    <div class="col-sm-1">
                       :
                     </div>
                    <div class="col-sm-7 text-dark">
                        {{ $adopter->detailAdopter->maps }}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
