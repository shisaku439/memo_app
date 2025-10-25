<?php

use function Livewire\Volt\{state, rules};
use App\Models\Memo;

state(['title', 'body', 'priority' => 1]);

rules([
    'title' => 'required|string|max:50',
    'body' => 'required|string|max:2000',
    'priority' => 'required|integer|min:1|max:3',
]);

// メモを保存する関数
$store = function () {
    $this->validate(); //バリデーションチェック
    // フォームからの入力値をデータベースへ保存
    // Memo::create([
    //     'title' => $this->title,
    //     'body' => $this->body,
    // ]);
    Memo::create($this->all());

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
            <label for="title">タイトル</label>
            @error('title')
                <span class='error'>({{ $message }})</span>
            @enderror
            <br>
            <!-- wire:model="title"で入力値とコンポーネントの状態($this->title)を自動的に同期 -->
            <input type="text" wire:model="title" id="title">
        </p>
        <p>
            <label for="body">本文</label>
            @error('body')
                <span class="error">({{ $message }})</span>
            @enderror
            <br>
            <!-- wire:model="body"で入力値とコンポーネントの状態($this->body)を自動的に同期 -->
            <textarea wire:model="body" id="body"></textarea>
        </p>
        <p>
            <label for="priority">優先度</label>
            @error('priority')
                <span class="error">({{ $message }})</span>
            @enderror
            <br>
            <select wire:model="priority" id="priority">
                <option value="1">低</option>
                <option value="2">中</option>
                <option value="3">高</option>
            </select>
        </p>
        <button type="submit">登録</button>
    </form>
</div>
