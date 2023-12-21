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
                    <h4 class="card-title">Makale Ekle</h4>

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

                    @if (!empty($post->id))
                        @php
                            $route_link = route('panel.post.update', $post->id)
                        @endphp
                    @else
                        @php
                            $route_link = route('panel.post.store')
                        @endphp
                    @endif
                    <form action="{{ $route_link }}" class="forms-sample" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        @if (!empty($post->id))
                            @method('PUT')
                        @endif

                        @if (!empty($post->image))
                            <div class="form-group">
                                <div class="input-group col-xs-12">
                                    <img width="40%" src="{{asset($post->image)}}">
                                </div>
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="title">Başlık</label>
                            <input type="text" class="form-control" id="title" name="title"
                                   value="{{ $post->title ?? '' }}"
                                   placeholder="Başlık">
                        </div>

                        <div class="form-group">
                            <label for="sub_title">Alt Başlık</label>
                            <input type="text" class="form-control" id="sub_title" name="sub_title"
                                   value="{{ $post->sub_title ?? '' }}"
                                   placeholder="Alt Başlık">
                        </div>

                        <div class="form-group">
                            <label for="monotag">2-3 Kelime</label>
                            <input type="text" class="form-control" id="monotag" name="monotag"
                                   value="{{ $post->monotag ?? '' }}"
                                   placeholder="Etiket gibi">
                        </div>

                        <div class="form-group">
                            <label for="ditag">2-3 Kelime</label>
                            <input type="text" class="form-control" id="ditag" name="ditag"
                                   value="{{ $post->ditag ?? '' }}"
                                   placeholder="Etiket gibi">
                        </div>

                        <div class="form-group">
                            <label for="tritag">2-3 Kelime</label>
                            <input type="text" class="form-control" id="tritag" name="tritag"
                                   value="{{ $post->tritag ?? '' }}"
                                   placeholder="Etiket gibi">
                        </div>

                        <div class="form-group">
                            <label for="slug">Uzantı </label>
                            <input type="text" class="form-control" id="slug" name="slug"
                                   value="{{ $post->slug ?? '' }}"
                                   placeholder="/kibrista-kiralik-dag-evleri gibi">
                        </div>

                        {{--                        <div class="form-group">--}}
                        {{--                            <label for="category_id">Kategori</label>--}}
                        {{--                            <select class="form-control" id="" name="category_id">--}}
                        {{--                                <option value="">Kategori Seç</option>--}}
                        {{--                                @if($categories)--}}
                        {{--                                    @foreach($categories as $sub_category)--}}
                        {{--                                        <option--}}
                        {{--                                            value="{{ $sub_category->id }}" {{ isset($post) && $post->category_id == $sub_category->id ? 'selected' : '' }} >{{ $sub_category->name }}</option>--}}
                        {{--                                    @endforeach--}}
                        {{--                                @endif--}}
                        {{--                            </select>--}}
                        {{--                        </div>--}}

                        <div class="form-group">
                            <label for="description">Kısa Bilgi</label>
                            <input type="text" class="form-control" id="description" name="description"
                                   value="{{ $post->description ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="full_text">Açıklama</label>
                            <textarea class="form-control" id="editor" name="full_text"
                                      rows="5">{!! $post->full_text ?? '' !!}
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
