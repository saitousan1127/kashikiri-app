<x-layout title="管理者ログインページ">
    <h2 class="text-center text-red-500 text-4xl font-bold mt-8 mb-8">
        貸切風呂予約アプリ
    </h2>
    <h4 class="text-center text-red-500 font-bold mt-8 mb-8">
        管理者ログイン画面
    </h4>
        @if ($errors->any())  {{--  エラーがあれば出力する --}}
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        @endif

        <form method="POST" action="{{ route('admin.login') }}">
            @csrf
            <div class="text-center">
                <div>
                    <label for="username">ユーザネーム：</label>
                    <input type="text" id="username" name="username">
                </div>
                <div>
                    <label for="password">パスワード：</label>
                    <input type="password" id="password" name="password">
                </div>
                <x-element.submit-button>ログイン</x-element.submit-button>
            </div>
        </form>
</x-layout>
