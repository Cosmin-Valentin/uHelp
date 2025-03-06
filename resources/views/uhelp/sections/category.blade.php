@extends('layouts.app')


@section('main')
    @include('uhelp.partials.agent-aside')

    <div class="agent-main">
        <div class="agent-main-container">
            <div class="side-app">
                <div class="app-header">
                    <div class="bg-white w-full">
                        @include('layouts.navigation')
                    </div>
                </div>
                @include('uhelp.partials.agent-header', ['title' => 'Category'])
                <div class="agent-dashboard">
                    <div class="row">
                        <div>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">
                                        Category
                                    </h4>
                                    <button class="btn-ticket" id="add-category">Add Category</button>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <div>
                                            <div class="row">
                                                <div>
                                                    <table class="table-format categories-table">
                                                        <thead>
                                                            <tr>
                                                                <th>No.</th>
                                                                <th class="remove-column">
                                                                    <input type="checkbox" id="checkAll" autocomplete="off">
                                                                    <label for="checkAll"></label>
                                                                </th>
                                                                <th class="sorting">Category Name</th>
                                                                <th class="sorting">Status</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($categories as $category)
                                                                <tr>
                                                                    <td>{{ $loop->index + 1 }}</td>
                                                                    <td class="remove-column-data">
                                                                        <input type="checkbox" autocomplete="off">
                                                                    </td>
                                                                    <td data-category-id="{{ $category->id }}">
                                                                        {{ ucwords($category->name) }}
                                                                    </td>
                                                                    <td data-category-status="{{ $category->status }}">{{ $category->status ? 'Enabled' : 'Disabled' }}</td>
                                                                    <td>
                                                                        <div class="actions">
                                                                            <button class="action-view" data-tooltip="View Category">
                                                                                <i class="fa fa-eye"></i>
                                                                            </button>
                                                                            <button class="action-delete" data-tooltip="Delete Category">
                                                                                <i class="fa fa-trash-o"></i>
                                                                            </button>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('uhelp.partials.footer')
@endsection

@include('uhelp.modals.add-category')
@include('uhelp.modals.edit-category')
@include('uhelp.modals.delete', ['formType' => 'category'])