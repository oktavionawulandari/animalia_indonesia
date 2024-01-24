<div class="modal fade" id="showModalValidation{{ $validation->id }}" tabindex="-1" role="dialog" aria-labelledby="showModalLabel{{ $validation->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                @if ($validation->adopter)
                    <img src="{{ asset($validation->adopter->profile) }}" alt="{{ $validation->adopter->username }}" style="width:100px; height:100px; margin-right:20px;  object-fit: cover;" class="rounded-circle">
                @endif
                <div class="me-5" style="margin-top:20px;">
                    <h5 class="modal-title fw-bold text-secondary" id="detailsModalLabel" style="font-size:25px;">
                        @if ($validation->adopter->detailAdopter)
                            {{ $validation->adopter->detailAdopter->full_name }}
                        @endif
                    </h5>
                    <p style="font-size:15px;">
                        @if ($validation->adopter->form->form == 'filled')
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
                @if ($validation->animal)
                    <div class="row mb-1">
                        <div class="col-sm-4">
                            Foto Hewan
                        </div>
                        <div class="col-sm-1">
                            :
                        </div>
                        <div class="col-sm-7 text-dark">
                            <img src="{{ asset($validation->animal->image) }}" alt="{{ $validation->animal->name_pets }}" style="max-height: 70px">
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
                            {{ $validation->animal->name_pets }}
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
                            {{ $validation->animal->category }}
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
                            @if ($validation->animal->gender == 'Female')
                                Betina
                            @else
                                Jantan
                            @endif
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-sm-4">
                            Ras Hewan
                        </div>
                        <div class="col-sm-1">
                            :
                        </div>
                        <div class="col-sm-7 text-dark">
                            {{ $validation->animal->ras }}
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-sm-4">
                            Vaksin
                        </div>
                        <div class="col-sm-1">
                            :
                        </div>
                        <div class="col-sm-7 text-dark">
                            {{ $validation->animal->vaccine }}
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-sm-4">
                            Informasi Hewan
                        </div>
                        <div class="col-sm-1">
                            :
                        </div>
                        <div class="col-sm-7 text-dark">
                            {{ $validation->animal->information }}
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-sm-4">
                            Deskripsi
                        </div>
                        <div class="col-sm-1">
                            :
                        </div>
                        <div class="col-sm-7 text-dark">
                            {{ $validation->animal->description }}
                        </div>
                    </div>
                @endif
                @if ($validation->detailAdopter)
                    <div class="row mb-1">
                        <div class="col-sm-4">
                            Alamat Adopter
                        </div>
                        <div class="col-sm-1">
                            :
                        </div>
                        <div class="col-sm-7 text-dark">
                            {{ $validation->detailAdopter->street }}
                        </div>
                    </div>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
