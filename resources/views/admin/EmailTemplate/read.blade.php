@extends('admin/EmailTemplate/r')
@section('title','read')
@section('content')


                    <div class="col-lg-12">
                        <div class="card-box">


                            <div class="table-responsive">
                            <a href="{{url('template-email/create')}}">
                                <button type="button" class="btn btn-purple waves-effect waves-light">
                                    Add Template
                                </button>
                            </a>
                            <P>
                                <table class="table mb-0">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Banner</th>
                                        {{--<th>Description</th>--}}
                                        <th>Voucher</th>
                                        <th>Link</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($data as $data)
                                    <tr>
                                        <td>{{ $data->id}}</td>
                                        <td>{{ $data->title}}</td>

                                        <td width="10%">
                                            <img width="70px" src="{{asset('BannerEmail/'.$data->banner)}}">
                                        </td>
                                       {{-- <td>{{ $data->description}}</td>--}}
                                        <td>{{ $data->voucher}}</td>
                                        <td>{{ $data->link}}</td>
                                        <td width="25%">
                                            <a href="{{url('send/mail/'.$data->id)}}" class="btn btn-success waves-effect waves-light">Broadcast</a>
                                            <a href="{{url('template-email/edit/'.$data->id)}}" class="btn btn-info waves-effect waves-light">Edit</a>
                                            <a href="{{url('template-email/delete/'.$data->id)}}" class="btn btn-danger waves-effect waves-light">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div> <!-- end card-box -->
                    </div> <!-- end col -->

@endsection
