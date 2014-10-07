<aside class="novel-list">
  <h3 class="novel-list__title">Novels</h3>

  @if ($notebook->novels->count())

    <ul class="novel-list__list">
      @foreach($notebook->novels as $novel)
        <li class="novel-list__item">{{ link_to_route('write_novel', $novel->title, [$novel->id, $novel->scenes->first()['id']]) }}</li>
      @endforeach
    </ul>

  @else

    <div class="empty-message--notebook-sidebar">
      <p class="empty-message__text">There aren't any novels here, you can create a new novel below.</p>
    </div>

  @endif

  {{ link_to_route('create_novel', 'ADD NOVEL', null, ['class' => 'novel-list__link']) }}
</aside>