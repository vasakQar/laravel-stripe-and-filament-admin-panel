<header class="w-full container mx-auto">
    <div class="flex flex-col items-center py-12">
        <a class="font-bold text-gray-800 uppercase hover:text-gray-700 text-5xl" href="{{ route('home') }}">
            {{ \App\Models\TextWidget::getTitle('header') }}
        </a>
        <p class="text-lg text-gray-600">
            {{ \App\Models\TextWidget::getContent('header') }}
        </p>
    </div>
</header>