<div>
    <form action="{{ route('admin.change') }}" method="post">
        @csrf
        @if (session('feedback.success'))
            <p style="color: green">{{ session('feedback.success') }}</p>
        @endif
        <x-element.submit-button>ご利用中を解除</x-element.submit-button>
    </form>
</div>