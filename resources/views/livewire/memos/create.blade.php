<?php

use function Livewire\Volt\{state};
use App\Models\Memo;

state(['title', 'body']);

// メモを保存する関数
$store = function () {
    // フォームからの入力値をデータベースへ保存
    Memo::create([
        'title' => $this->title,
        'body' => $this->body,
    ]);
    // 一覧ページにリダイレクト
    return redirect()->route('memos.index');
};
?>

<div>
    <a href="{{ route('memos.index') }}">戻る</a>
    <h1>新規登録</h1>

    <!-- wire:submit="store"でフォーム送信時にstore関数を呼び出し -->
    <form wire:submit="store">
        <p>
            <label for="title">タイトル</label><br>
            <!-- wire:model="title"で入力値とコンポーネントの状態($this->title)を自動的に同期 -->
            <input type="text" wire:model="title" id="title">
        </p>
        <p>
            <label for="body">本文</label><br>
            <!-- wire:model="body"で入力値とコンポーネントの状態($this->body)を自動的に同期 -->
            <textarea wire:model="body" id="body"></textarea>
        </p>

        <button type="submit">登録</button>
    </form>
</div>
