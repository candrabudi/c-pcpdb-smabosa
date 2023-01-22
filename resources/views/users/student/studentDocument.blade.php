<div class="card mb-4">
    <h5 class="card-header">DATA BERKAS</h5>
    <div class="card-body">
        <form id="formAccountSettings" method="POST" action="{{ route('user.store_document') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="mb-3 col-md-12 ">
                    <label class="form-label" for="sd_certificate">IJAZAH SD</label>
                    <div class="input-group input-group-merge">
                        <input class="form-control" type="file"  id="sd_certificate" name="sd_certificate" {{ empty($document) ? required : '' }}/>
                    </div>
                    <label for="" class="mt-3">Nama Berkas : {{ $document->sd_certificate ?? '' }}</label>
                </div>
                <div class="mb-3 col-md-12 ">
                    <label class="form-label" for="birth_certificate">AKTA KELAHIRAN</label>
                    <div class="input-group input-group-merge">
                        <input class="form-control" type="file"  id="birth_certificate" name="birth_certificate" {{ empty($document) ? required : '' }}/>
                    </div>
                    <label for="" class="mt-3">Nama Berkas : {{ $document->birth_certificate ?? '' }}</label>
                </div>
                <div class="mb-3 col-md-12 ">
                    <label class="form-label" for="pas_photo">PAS FOTO</label>
                    <div class="input-group input-group-merge">
                        <input class="form-control" type="file"  id="pas_photo" name="pas_photo" {{ empty($document) ? required : '' }}/>
                    </div>
                    <label for="" class="mt-3">Nama Berkas : {{ $document->pas_photo ?? '' }}</label>
                </div>
                <div class="mb-3 col-md-12 ">
                    <label class="form-label" for="family_card">KARTU KELUARGA</label>
                    <div class="input-group input-group-merge">
                        <input class="form-control" type="file"  id="family_card" name="family_card" {{ empty($document) ? required : '' }}/>
                    </div>
                    <label for="" class="mt-3">Nama Berkas : {{ $document->family_card ?? '' }}</label>
                </div>
                <div class="mb-3 col-md-12 ">
                    <label class="form-label" for="jhs_raport">RAPORT SMP</label>
                    <div class="input-group input-group-merge">
                        <input class="form-control" type="file"  id="jhs_raport" name="jhs_raport" {{ empty($document) ? required : '' }}/>
                    </div>
                    <label for="" class="mt-3">Nama Berkas : {{ $document->jhs_raport ?? '' }}</label>
                </div>
                <div class="mb-3 col-md-12 ">
                    <label class="form-label" for="signature">TANDA TANGAN</label>
                    <div class="input-group input-group-merge">
                        <input class="form-control" type="file"  id="signature" name="signature" {{ empty($document) ? required : '' }}/>
                    </div>
                    <label for="" class="mt-3">Nama Berkas : {{ $document->signature ?? '' }}</label>
                </div>
            </div>

            <div>
                <button type="submit" class="btn btn-primary me-2">Simpan</button>
            </div>
        </form>
    </div>
</div>