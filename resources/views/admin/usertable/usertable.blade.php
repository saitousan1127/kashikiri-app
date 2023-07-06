<x-layout title="貸切風呂予約アプリ（管理画面）/ユーザ管理画面">
    <x-layout.singleAdmin>
        <h2 class="text-center text-red-500 text-4xl font-bold mt-8 mb-8">
            貸切風呂予約アプリ（管理画面）
        </h2>
        @php
            $breadcrumbs = [
                ['href' => route('admin.index'), 'label' => 'TOP'],
                ['href' => '#', 'label' => 'ユーザ管理テーブル']
            ]
        @endphp
        <x-element.breadcrumbs :breadcrumbs="$breadcrumbs">
        </x-element.breadcrumbs>
        <h4 class="text-center text-red-500 font-bold mt-8 mb-8">
            ユーザ管理テーブル
        </h4>
        <table style="border-collapse: separate; border-spacing: 0; border: 1px solid black;">
            <tr>
                <th style="border: 1px solid black;">タグID</th>
                <th style="border: 1px solid black;">氏名</th>
                <th style="border: 1px solid black;">パスワード</th>
                <th style="border: 1px solid black;">　</th>
            <tr>
            @foreach($users as $user)
                <tr>
                    <td style="border: 1px solid black;">{{ $user->id }}</td>
                    <td style="border: 1px solid black;">{{ $user->name }}</td>
                    <td style="border: 1px solid black;">　</td>
                    <td style="border: 1px solid black;">
                        <button
                            class="inline-flex justify-center py-1 px-2 border border-transparent
                            shadow-sm text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2
                            text-white bg-blue-500 hover:bg-blue-600 focus:ring-blue-500">
                        変更
                        </button>
                    </td>
                </tr>
            @endforeach
        </table>
    </x-layout.singleAdmin>
</x-layout>