<x-layout title="TOP | 貸切風呂予約アプリ">
    <x-layout.single>
        <h2 class="text-center text-red-500 text-4xl font-bold mt-8 mb-8">
            貸切風呂予約アプリ
        </h2>
        <x-user.u_s :us="$us" :reserves="$reserves"></x-user.u_s>
        <x-user.reserves :reserves="$reserves"></x-user.reserves>
        <x-user.form.reserve></x-user.form.reserve>
    </x-layout.single>
</x-layout>