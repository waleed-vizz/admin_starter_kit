@extends('layouts.new')

@section('title', 'Dashboard')
    {{-- {{ GoogleTranslate::trans('Dashboard Page - Admin Panel', app()->getLocale()) }}
@endsection --}}


@section('admin-content')

    <div class="main-content-inner" style="padding: 13px;">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-md-6 mt-5 mb-3">
                        <div class="card">
                            <div class="seo-fact sbg1">
                                <a href="{{ route('admin.roles') }}">
                                    <div class="p-4 d-flex justify-content-between align-items-center">
                                        <div class="seofct-icon"><i
                                                class="fa fa-users"></i>{{ GoogleTranslate::trans('Roles', app()->getLocale()) }}
                                        </div>
                                        <h2>{{ $total_roles }}</h2>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-md-5 mb-3">
                        <div class="card">
                            <div class="seo-fact sbg2">
                                <a href="{{ route('admin.users') }}">
                                    <div class="p-4 d-flex justify-content-between align-items-center">
                                        <div class="seofct-icon"><i
                                                class="fa fa-user"></i>{{ GoogleTranslate::trans('Admins', app()->getLocale()) }}
                                        </div>
                                        <h2>{{ $total_admins }}</h2>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3 mb-lg-0">
                        <div class="card">
                            <div class="seo-fact sbg3">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon">{{ GoogleTranslate::trans('Permissions', app()->getLocale()) }}
                                    </div>
                                    <h2>{{ $total_permissions }}</h2>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-primary btn-rounded position-fixed bottom-1"
        style="bottom: 115px; margin-left:95%;padding: 21px 17px!important;" data-toggle="modal" data-target="#exampleModal"
        data-whatever="">{{ GoogleTranslate::trans('Chat', app()->getLocale()) }}</button>
@endsection
