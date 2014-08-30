@extends('layouts.app')
@section('body_class', 'index')

{{-- Page Header --}}
@section('header')
  <div class="pageHeader">
    <!-- Page Title -->
    <h2 class="pageTitle">Blog Posts</h2>


    <!-- Page Buttons -->
    <ul class="pageButtons">
      <li>{{ link_to_route('create_post', 'NEW', null, ['class' => 'button secondary']) }}</li>
    </ul>
  </div>
@stop

{{-- Page Content --}}
@section('content')

  @if ($posts->count())

    <div class="indexControls">
      <ul class="types">
        @if($type == 'trashed')
          <li>{{ link_with_query('type', 'active', 'view_posts', 'ALL', ['class' => 'link secondary'])}} ({{ $allCount }})</li>
          <li>{{ link_with_query('type', 'trashed', 'view_posts', 'TRASHED', ['class' => 'link secondary active'])}} ({{ $trashCount }})</li>
        @else
          <li>{{ link_with_query('type', 'active', 'view_posts', 'ALL', ['class' => 'link secondary active'])}} ({{ $allCount }})</li>
          <li>{{ link_with_query('type', 'trashed', 'view_posts', 'TRASHED', ['class' => 'link secondary'])}} ({{ $trashCount }})</li>
        @endif
      </ul>

      <div class="controlsGroup">
        <div class="pages">
          {{ $posts->appends(Request::except('page'))->links() }}
        </div>
      </div>
    </div>

    <table>
      <thead>
        <th>title</th>
        <th></th>
      </thead>

      <tbody>
      @foreach($posts as $post)
        <tr>
          <td>{{ $post->title }}</td>
          <th>
            @if( $type == 'trashed')
            {{ link_to_route('destroy_post', 'DESTROY', $post->id, ['class' => 'button secondary']) }}
            {{ link_to_route('restore_post', 'RESTORE', $post->id, ['class' => 'button primary']) }}
            @else
            {{ link_to_route('trash_post', 'TRASH', $post->id, ['class' => 'button secondary']) }}
            {{ link_to_route('edit_post', 'EDIT', $post->id, ['class' => 'button primary']) }}
            @endif
          </th>
        </tr>
      @endforeach
      </tbody>
    </table>

    <div class="indexControls">
      <div class="controlsGroup">
        <div class="pages">
          {{ $posts->appends(Request::except('page'))->links() }}
        </div>
      </div>
    </div>

  @else

    {{-- Empty Message --}}
    <div class="indexControls">
      <ul class="types">
        @if($type == 'trashed')
          <li>{{ link_with_query('type', 'active', 'view_posts', 'ALL', ['class' => 'link secondary'])}} ({{ $allCount }})</li>
          <li>{{ link_with_query('type', 'trashed', 'view_posts', 'TRASHED', ['class' => 'link secondary active'])}} ({{ $trashCount }})</li>
        @else
          <li>{{ link_with_query('type', 'active', 'view_posts', 'ALL', ['class' => 'link secondary active'])}} ({{ $allCount }})</li>
          <li>{{ link_with_query('type', 'trashed', 'view_posts', 'TRASHED', ['class' => 'link secondary'])}} ({{ $trashCount }})</li>
        @endif
      </ul>

      <div class="controlsGroup">
        <div class="pages">
          {{ $posts->appends(Request::except('page'))->links() }}
        </div>
      </div>
    </div>

    <div class="emptyMessage">
      <h2 class="title">There's nothing here.</h2>
    </div>

    <div class="indexControls">
      <div class="controlsGroup">
        <div class="pages">
          {{ $posts->appends(Request::except('page'))->links() }}
        </div>
      </div>
    </div>

  @endif
@stop