@extends('layouts.app')
@section('body_class', 'index')

{{-- Page Header --}}
@section('header')
  <div class="pageHeader">
    <!-- Page Title -->
    <h2 class="pageTitle">Post Categories</h2>


    <!-- Page Buttons -->
    <ul class="pageButtons">
      <li>{{ link_to_route('create_postCategory', 'NEW', null, ['class' => 'button secondary']) }}</li>
    </ul>
  </div>
@stop

{{-- Page Content --}}
@section('content')

  @if ($categories->count())
    <table>
      <thead>
        <th>name</th>
        <th></th>
      </thead>

      <tbody>
      @foreach($categories as $category)
        <tr>
          <td>{{ $category->name }}</td>
          <th>
            {{ link_to_route('delete_postCategory', 'DELETE', $category->id, ['class' => 'button secondary']) }}
            {{ link_to_route('edit_postCategory', 'EDIT', $category->id, ['class' => 'button primary']) }}
          </th>
        </tr>
      @endforeach
      </tbody>
    </table>

  @else

    {{-- Empty Message --}}
    <div class="emptyMessage">
      <h2 class="title">There's nothing here.</h2>
    </div>

  @endif
@stop