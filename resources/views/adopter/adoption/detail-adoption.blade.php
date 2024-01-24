<!-- Modal -->
<div class="modal fade" id="detailsModal{{ $animal->id }}" tabindex="-1" role="dialog" aria-labelledby="detailsModalLabel{{ $animal->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <img src="{{ asset($animal->image) }}" alt="{{ $animal->image }}" style="width:100px" class="rounded-circle">
                <div class="ms-4">
                    <h5 class="modal-title fw-bold" id="detailsModalLabel" style="font-size:25px;">{{$animal->name_pets}}</h5>
                    <p style="font-size:15px;">{{$animal->category}}</h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="font-size:15px;">
                <div class="row mb-1">
                    <div class="col-sm-12">
                        {{-- <iframe width="100%" height="315" src="{{ asset($animal->video) }}" frameborder="0" allowfullscreen></iframe> --}}
                        <video controls muted id="videoPreview" width="100%" height="250">
                            <source src="{{ asset($animal->video) }}" type="video/mp4">
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
                    <div class="col-sm-7 text-secondary">
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
                    <div class="col-sm-7 text-secondary">
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
                    <div class="col-sm-7 text-secondary">
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
                    <div class="col-sm-7 text-secondary">
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
                    <div class="col-sm-7 text-secondary">
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
                    <div class="col-sm-7 text-secondary">
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
