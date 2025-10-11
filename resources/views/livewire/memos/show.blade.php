<?php
use function Livewire\Volt\{state};
use App\Models\Memo;

// ルートモデルバインディング
state(['memo' => fn(Memo $memo) => $memo]);

?>

<div>
    <a href="{{ route('memos.index') }}">戻る</a>
    <h1>{{ $memo->title }}</h1>
    {{-- laravelでは、{{}}で自動的にエスケープされる --}}
    {{-- {{!! !!}}でエスケープを無効化 --}}
    <p>{!! nl2br(e($memo->body)) !!}</p>
</div>
