@extends('backend.layout.base')

@section('content')
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0" style="font-size: 40px">{{ $title }}</h5>
                </div>
                <div class="card-body">
                    <form action="/proses_addPosts" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="nama_barang">Nama Barang</label>
                                    <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                                        placeholder="Masukan Nama Barang" />
                                </div>
                            </div>

                            {{-- <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="keyword">Category</label>
                                    <select id="multicol-country" name="category_id" class="select2 form-select"
                                        data-allow-clear="true">
                                        <option selected="selected">
                                            Pilih Category
                                        </option>
                                        @foreach ($category as $a)
                                            <option value="{{ $a->id }}">
                                                {{ $a->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="keyword">Image</label>
                                    <input type="file" class="form-control" id="image" name="image"
                                        placeholder="Thumbnail" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="jenis">Jenis</label>
                                    <input type="text" class="form-control" id="jenis" name="jenis"
                                        placeholder="Masukan Jenis" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="stok">Stok</label>
                                    <input type="text" class="form-control" id="stok" name="stok"
                                        placeholder="Masukan Jenis" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <textarea name="content" id="editor1" cols="30" rows="10"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="//cdn.ckeditor.com/4.20.1/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor1', {
            height: '500',
            // Ensure that the Magic Line plugin, which is required for this sample, is loaded.
            extraPlugins: 'magicline',
            // Magic Line does not require any additional ACF settings.
            // We set config.extraAllowedContent because HTML code in this sample contains
            // a <div> element with custom styles that we would like to allow.
            extraAllowedContent: 'div{border,background,text-align}',
            removeButtons: 'PasteFromWord'

        });
    </script>
@endsection
