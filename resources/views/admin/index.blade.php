<x-layout title="TOP | 貸切風呂予約アプリ（管理画面）">
    <x-layout.singleAdmin>
        <h2 class="text-center text-red-500 text-4xl font-bold mt-8 mb-8">
            貸切風呂予約アプリ（管理画面）
        </h2>
        <x-user.u_s :us="$us" :reserves="$reserves"></x-user.u_s>
        <x-user.reserves :reserves="$reserves"></x-user.reserves>
        <x-admin.form.change></x-admin.form.change>
        <x-element.a-button :herf="route('admin.usertable')">ユーザ管理テーブルへ移動</x-elementa-button>
    </x-layout.singleAdmin>
</x-layout>