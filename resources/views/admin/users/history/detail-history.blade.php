<div class="modal fade" id="showModalRiwayat{{ $adopt->id }}" tabindex="-1" role="dialog" aria-labelledby="showModalLabel{{ $adopt->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                @if ($adopt->adopter)
                    <img src="{{ asset($adopt->adopter->profile) }}" alt="{{ $adopt->adopter->username }}" style="width:100px; height:100px; margin-right:20px;  object-fit: cover;" class="rounded-circle">
                @endif
                <div class="me-5" style="margin-top:20px;">
                    <h5 class="modal-title fw-bold text-secondary" id="detailsModalLabel" style="font-size:25px;">
                        @if($adopt->adopter)
                            {{ $adopt->adopter->username }}
                        @else
                            -
                        @endif
                    </h5>
                    <p style="font-size:15px;">
                        @if ($adopt->adopter->form->form == 'filled')
                            <span class="badge badge-success text-white">Sudah Diisi</span>
                        @else
                            <span class="badge badge-danger text-white">Belum Diisi</span>
                        @endif
                    </p>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="font-size:13px;">
                <div class="row mb-1">
                    <div class="col-sm-4">
                        Nama Lengkap
                    </div>
                    <div class="col-sm-1">
                        :
                    </div>
                    <div class="col-sm-7 text-dark">
                        {{ $adopt->adopter->detailAdopter->full_name }}
                    </div>
                </div>
                  <div class="row mb-1">
                    <div class="col-sm-4">
                        Nama Lengkap
                    </div>
                    <div class="col-sm-1">
                        :
                    </div>
                    <div class="col-sm-7 text-dark">
                        {{ $adopt->adopter->detailAdopter->nik }}
                    </div>
                </div>
                  <div class="row mb-1">
                    <div class="col-sm-4">
                        Nama Lengkap
                    </div>
                    <div class="col-sm-1">
                        :
                    </div>
                    <div class="col-sm-7 text-dark">
                        {{ $adopt->adopter->detailAdopter->street }}
                    </div>
                </div>
                  <div class="row mb-1">
                    <div class="col-sm-4">
                        Nama Lengkap
                    </div>
                    <div class="col-sm-1">
                        :
                    </div>
                    <div class="col-sm-7 text-dark">
                        {{ $adopt->adopter->detailAdopter->phone }}
                    </div>
                </div>
                    <div class="row mb-1">
                        <div class="col-sm-4">
                            Foto Hewan
                        </div>
                        <div class="col-sm-1">
                            :
                        </div>
                        <div class="col-sm-7 text-dark">
                                <img src="{{ asset($adopt->animal->image) }}" alt="{{ $adopt->animal->name_pets }}" style="max-height: 70px">
                        </div>
                    </div>

                    <div class="row mb-1">
                        <div class="col-sm-4">
                            Nama Hewan
                        </div>
                        <div class="col-sm-1">
                            :
                        </div>
                        <div class="col-sm-7 text-dark">
                            {{ $adopt->animal->name_pets }}
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-sm-4">
                            Kategori Hewan
                        </div>
                        <div class="col-sm-1">
                            :
                        </div>
                        <div class="col-sm-7 text-dark">
                            {{ $adopt->animal->category }}
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-sm-4">
                            History Adopsi
                        </div>
                        <div class="col-sm-1">
                            :
                        </div>
                        <div class="col-sm-7 text-dark">
                            @if ($adopt->adoption == 'Success')
                                <span class="badge badge-success">Berhasil Diadopsi</span>
                            @elseif ($adopt->adoption == 'Failed')
                                <span class="badge badge-danger">Gagal Diadopsi</span>
                            @elseif ($adopt->adoption == 'Pending')
                                <span class="badge badge-primary">Pending</span>
                            @elseif ($adopt->adoption == 'Error')
                                <span class="badge badge-warning">Perbaiki Data</span>
                            @endif
                        </div>
                    </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
