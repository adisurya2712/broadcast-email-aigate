@extends('admin/EmailTemplate/r')
@section('title','read')
@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Form Create Email Template</h4>
                {{--<p class="text-muted font-13">
                    Kolom yang bertanda (<code class="highlighter-rouge">*</code>) wajib diisi. Koreksi kembali kolom yang telah diisi agar tidak ada kesalahan
                </p>--}}

                <form name="formcreate" action="{{url('/template-email/store')}}" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputEmail4" class="col-form-label">Title <a style="color: red">*</a></label>
                            <input name="title" id="title" type="text" class="form-control" placeholder="Email Title">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputEmail4" class="col-form-label">Banner <a style="color: red">*</a></label>
                            <img src="" style="margin-bottom: 30px" id="gambar_nodin" width="300"/>
                            <input type="file" name="file_banner" id="file_banner" class="form-control-file">                                               </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputEmail4" class="col-form-label">Voucher Code <a style="color: red">*</a></label>
                            <input name="voucher" id="voucher" type="text" class="form-control" placeholder="Voucher Code">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputEmail4" class="col-form-label">Promo Link <a style="color: red">*</a></label>
                            <input name="link" id="link" type="text" class="form-control" placeholder="Promo Link">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="inputEmail4" class="col-form-label">Description</label>
                            <textarea name="description" id="summernote-editor">

                                                </textarea>
                        </div><!-- end col -->
                    </div>



                    {{--alert--}}
                    <div id="alertFormFileSize" class="alert alert-danger alert-dismissible fade show" style="display: none" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        Perhatian! file tidak boleh melebihi 1MB.
                    </div>
                    {{--end allert--}}

                    {{--alert--}}
                    <div id="alertFormInput" class="alert alert-danger alert-dismissible fade show" style="display: none" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        Perhatian! kolom bertanda (<a style="color: red">*</a>) harus diisi.
                    </div>
                    {{--end allert--}}

                    {{--alert--}}
                    <div id="alertFormFileType" class="alert alert-danger alert-dismissible fade show" style="display: none" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        Perhatian! file yang bisa diupload hanya berjenis .jpg, .jpeg, .png dan .svg.
                    </div>
                    {{--end allert--}}

                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                </form>

            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end col -->

@endsection
