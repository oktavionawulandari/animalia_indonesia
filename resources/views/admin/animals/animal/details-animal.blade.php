<div class="modal fade" id="showModal{{ $animal->id }}" tabindex="-1" role="dialog" aria-labelledby="showModalLabel{{ $animal->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <img src="{{ asset($animal->image) }}" alt="{{ $animal->image }}" style="width:100px; margin-right:20px;" class="rounded-circle">
                <div class="me-5" style="margin-top:20px;">
                    <h5 class="modal-title fw-bold text-secondary" id="detailsModalLabel" style="font-size:25px;">{{$animal->name_pets}}</h5>
                    <p style="font-size:15px;">{{$animal->category}}</h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="font-size:13px;">
                <div class="row mb-1">
                    <div class="col-sm-12">
                        <video controls muted id="videoPreview" width="100%" height="250">
                            <source src="{{ $animal->video }}" type="video/mp4">
                        </video>
                        <button type="button" id="playButton">Play</button>
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-sm-4">
                       Umur Hewan
                    </div>
                    <div class="col-sm-1">
                       :
                     </div>
                    <div class="col-sm-7 text-dark">
                        @if ($animal->age)
                            @php
                                $birthDate = new DateTime($animal->age);
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
                        @if ($animal->gender == 'Female')
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
                        {{ $animal->ras }}
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
                        {{ $animal->vaccine }}
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-sm-4">
                       Riwayat Sakit
                    </div>
                    <div class="col-sm-1">
                       :
                     </div>
                    <div class="col-sm-7 text-dark">
                        {{ $animal->information }}
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
                        {{ $animal->description }}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const videoPreview = document.getElementById("videoPreview");
        const playButton = document.getElementById("playButton");

        playButton.addEventListener("click", function() {
            videoPreview.play();
        });
    });
</script>
