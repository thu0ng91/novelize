<div class="table-of-contents__toolbar">
  <button class="js-expandScenes">EXPAND</button> | <button class="js-collapseScenes">COLLAPSE</button> | <button class="js-currentScene">CURRENT</button>
</div>

<ul class="table-of-contents">
  @foreach($chapters as $chapter)
    <li class="table-of-contents__item">
      <p class="table-of-contents__chapter-title js-chapter">
        <span class="icon--accordion-triangle js-toggleTriangle"></span>
        Chapter {{ $chapter->chapter_order }}
      </p>

      <div class="table-of-contents__scenes js-scene">
        @foreach($chapter->scenes as $scene)
          @if($scene->id === $currentScene->id)
            <a href="{{ route('write_novel', [$novel->id, $scene->id] ) }}" class="table-of-contents__scene-title active js-current">
          @else
            <a href="{{ route('write_novel', [$novel->id, $scene->id] ) }}" class="table-of-contents__scene-title">
          @endif
            <small>Sc. {{ $scene->scene_order }}</small>
            @if( $scene->title )
              {{ $scene->title }}
            @else
              Scene {{ $scene->scene_order }}
            @endif
          </a>
        @endforeach

        {{ link_to_route('create_scene', 'NEW SCENE', [$novel->id, $chapter->id], ['class' => 'table-of-contents__button']) }}
      </div>
    </li>
  @endforeach
</ul>

<div class="table-of-contents__toolbar">
  <button class="js-expandScenes">EXPAND</button> | <button class="js-collapseScenes">COLLAPSE</button> | <button class="js-currentScene">CURRENT</button>
</div>