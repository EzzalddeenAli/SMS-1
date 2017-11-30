@extends('dashboard.layouts.master')
@section('title', 'Admin Dashboard')
@section('sidebar')
    @include('dashboard.admin.inc.sidebar')
@endsection

@section('content-header')
    <section class="content-header">
        <h1>
            Dashboard
            <small>1.7</small>
        </h1>
@include('dashboard.inc.breadcrumbs')
    </section>
@endsection

@section('content-main')

    <div id="teachers-table">
        @if($images !== null)
            <div class="row">
            @foreach($images as $img)
            <div class="col-md-4">
                <div class="thumbnail">
                    <a href="#" v-on:click="showEditModal('/resource/image?path=', '{{ urlencode($img->path ) }}')">
                        <img src="{{ asset($img->full_path) }}" alt="Lights" style="width:100%">
                        <div class="caption">
                            <p>{{ $img->title }}</p>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
            </div>
        @endif
    </div>

    <div>
        <!--edit modal-->
        <div class="modal fade" id="edit-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Edit Image</h4>
                    </div>
                    <form action="{{ route('update.teacher') }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('patch') }}
                        <div class="modal-body">

                            <div id="edit-modal-body">
                                <modal-edit-form v-for="(item, key, index) in responses" :key="index" :form-name="key" :form-data="item" :is-id="checkIfId(key)"></modal-edit-form>
                                <modal-select-form :user-type="'teacher'"></modal-select-form>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /. edit modal -->

        <!-- add modal -->
        <div class="modal fade" id="add-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add Teacher</h4>
                    </div>
                    <form action="{{ route('add.teacher') }}" method="post">
                        {{ csrf_field() }}
                        <div class="modal-body">

                            <div id="add-modal-body">
                                <modal-add-form v-for="(type, field, index) in fields" :key="index" :form-name="field" :form-type="type"></modal-add-form>
                                <modal-select-form :user-type="'teacher'"></modal-select-form>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /. add modal -->

        <!-- delete modal -->
        <div class="modal fade" id="delete-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Delete Teacher</h4>
                    </div>

                    <div id="delete-modal-body">
                        <form :action="deleteLink" method="post">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <div class="modal-body" v-text="username">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div><!-- /. delete modal -->

    </div>
@endsection

@section('sidebar-control')
    @include('dashboard.admin.inc.sidebar-control')
@endsection