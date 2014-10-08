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
      <p class="empty-message__text">You don't have any novels  yet.</p>
    </div>

  @endif

  {{ link_to_route('create_novel', 'ADD NOVEL', null, ['class' => 'novel-list__link']) }}
</aside>