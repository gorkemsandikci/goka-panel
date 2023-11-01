@extends('panel.layout.app')

@section('customcss')
    <style>
        .ck-content {
            height: 300px !important;
        }
    </style>
@endsection

@section('content')

    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Proje Ekle</h4>

                    @if($errors)
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif

                    @if (session()->get('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif

                    @if (!empty($project->id))
                        @php
                            $route_link = route('panel.project.update', $project->id)
                        @endphp
                    @else
                        @php
                            $route_link = route('panel.project.store')
                        @endphp
                    @endif
                    <form action="{{ $route_link }}" class="forms-sample" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        @if (!empty($project->id))
                            @method('PUT')
                        @endif

                        @if (!empty($roject->image))
                            <div class="form-group">
                                <div class="input-group col-xs-12">
                                    <img width="40%" src="{{asset($project->image)}}">
                                </div>
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="baslik">Başlık</label>
                            <input type="text" class="form-control" id="baslik" name="name"
                                   value="{{ $project->name ?? '' }}"
                                   placeholder="Başlık">
                        </div>

                        <div class="form-group">
                            <label for="category_id">Kategori</label>
                            <select class="form-control" id="" name="category_id">
                                <option value="">Kategori Seç</option>
                                @if($categories)
                                    @foreach($categories as $sub_category)
                                        <option
                                            value="{{ $sub_category->id }}" {{ isset($project) && $project->category_id == $sub_category->id ? 'selected' : '' }} >{{ $sub_category->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="size">Beden</label>
                            <select class="form-control" name="size" id="size">
                                <option value="">Beden Seçiniz</option>
                                <option
                                    value="XS" {{ isset($project->size) && $project->size == 'XS' ? 'selected' : '' }}>
                                    XS
                                </option>
                                <option
                                    value="S" {{ isset($project->size) && $project->size == 'S' ? 'selected' : '' }}>S
                                </option>
                                <option
                                    value="M" {{ isset($project->size) && $project->size == 'M' ? 'selected' : '' }}>M
                                </option>
                                <option
                                    value="L" {{ isset($project->size) && $project->size == 'L' ? 'selected' : '' }}>L
                                </option>
                                <option
                                    value="XL" {{ isset($project->size) && $project->size == 'XL' ? 'selected' : '' }}>
                                    XL
                                </option>
                                <option
                                    value="XXL" {{ isset($project->size) && $project->size == 'XXL' ? 'selected' : '' }}>
                                    XXL
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="color">Renk</label>
                            <input type="text" class="form-control" id="color" name="color"
                                   value="{{ $project->color ?? '' }}"
                                   placeholder="Renk">
                        </div>

                        <div class="form-group">
                            <label for="short_text">Kısa bilgi</label>
                            <input type="text" class="form-control" id="short_text" name="short_text"
                                   value="{{ $roject->short_text ?? '' }}"
                                   placeholder="Kısa bilgi">
                        </div>

                        <div class="form-group">
                            <label for="price">Fiyat</label>
                            <input type="text" class="form-control" id="price" name="price"
                                   value="{{ $project->price ?? '' }}"
                                   placeholder="Fiyat">
                        </div>

                        <div class="form-group">
                            <label for="kdv">KDV</label>
                            <input type="text" class="form-control" id="kdv" name="kdv"
                                   value="{{ $project->kdv ?? '' }}"
                                   placeholder="KDV">
                        </div>

                        <div class="form-group">
                            <label for="aciklama">Açıklama</label>
                            <textarea class="form-control" id="editor" name="description" placeholder="Açıklama"
                                      rows="3">{!! $project->content ?? '' !!}
                            </textarea>
                        </div>

                        <div class="form-group">
                            <label>Görsel Yükle</label>
                            <input type="file" name="image" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled
                                       placeholder="Görsel Yükle">
                                <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Yükle</button>
                        </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="durum">Durum</label>
                            @php
                                $status = $project->status ?? '1';
                            @endphp
                            <select class="form-control" id="durum" name="status">
                                <option value="1" {{$status == '1' ? 'selected' : ''}}>Aktif</option>
                                <option value="0" {{$status == '0' ? 'selected' : ''}}>Pasif</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Kaydet</button>
                        <button class="btn btn-light">İptal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('customjs')
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/translations/tr.js"></script>
    <script>
        const option = {
            language: 'tr',
            heading: {
                options: [
                    {model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph'},
                    {model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1'},
                    {model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2'},
                    {model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3'},
                    {model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4'},
                    {model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5'},
                    {model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6'}
                ]
            }
        };

        ClassicEditor
            .create(document.querySelector('#editor'), option)
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
