<?php
use function Livewire\Volt\{state};
use App\Models\Memo;

// ルートモデルバインディング
state(['memo' => fn(Memo $memo) => $memo]);

?>

<div>
    <h1>{{ $memo->title }}</h1>
    {{-- laravelでは、{{}}で自動的にエスケープされる --}}
    {{-- {{!! !!}}でエスケープを無効化 --}}
    <p>{!! nl2br(e($memo->body)) !!}</p>
</div>
