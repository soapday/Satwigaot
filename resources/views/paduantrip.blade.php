@php
$articles = [
    [
        'author_avatar' => 'https://miro.medium.com/v2/resize:fill:40:40/1*iH-4P3d6t5-z5nK-7t5ong.png',
        'source' => 'In Data Science Collective',
        'author_name' => 'James Wilkins',
        'title' => 'You\'re using ChatGPT wrong. Here\'s how to prompt like a pro',
        'subtitle' => 'Smarter prompts lead to smarter responses.',
        'date' => 'Jun 5',
        'claps' => '7.8K',
        'comments' => '417',
        'image_url' => 'https://miro.medium.com/v2/resize:fill:224:224/1*DK_2Gv3520n2GL28suep6g.png',
    ],
    [
        'author_avatar' => 'https://miro.medium.com/v2/resize:fill:40:40/1*yG6n8Jb0O392AlA54BNbVA.jpeg',
        'source' => '',
        'author_name' => 'Will Lockett',
        'title' => 'The AI Bubble Is About To Burst, But The Next Bubble Is Already Growing',
        'subtitle' => 'Techbros are preparing their latest bandwagon.',
        'date' => 'Sep 15',
        'claps' => '11.8K',
        'comments' => '386',
        'image_url' => 'https://miro.medium.com/v2/resize:fill:224:224/1*QU_2JdPoJ01aJ3sE54jO3A.png',
    ],
    [
        'author_avatar' => 'https://miro.medium.com/v2/resize:fill:40:40/1*d2f0T2ap2fuxON9ySnmA-g.jpeg',
        'source' => '',
        'author_name' => 'Saurav Mandal',
        'title' => 'Do Hard Things if You Want an Easy Life',
        'subtitle' => 'The one skill that changes everything',
        'date' => 'Jun 14',
        'claps' => '17.7K',
        'comments' => '673',
        'image_url' => 'https://miro.medium.com/v2/resize:fill:224:224/1*t4tK2K9h2bEaRauwj62yFQ.jpeg',
    ],
];
@endphp


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panduan & Tips - Satwiga Tour</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;800&display=swap" rel="stylesheet">

</head>
<body class="bg-gray-50 font-sans">
    @include('components.navbar')

    <div class="max-w-3xl mx-auto p-4 md:p-8 mt-16 pt-16">
        <div class="space-y-10">
            @foreach ($articles as $article)
            <article class="flex items-center justify-between">
                <div class="flex-1 pr-8">
                    <div class="flex items-center space-x-2 text-sm">
                        <img src="{{ $article['author_avatar'] }}" alt="Avatar" class="w-5 h-5 rounded-full object-cover">
                        <span class="font-semibold text-gray-800">{{ $article['author_name'] }}</span>
                        @if ($article['source'])
                            <span class="text-gray-500">{{ $article['source'] }}</span>
                        @endif
                    </div>

                    <a href="#" class="block mt-2">
                        <h2 class="text-xl md:text-2xl font-bold text-gray-900 hover:text-gray-700 transition-colors duration-200">
                            {{ $article['title'] }}
                        </h2>
                        <p class="mt-2 text-gray-600">
                            {{ $article['subtitle'] }}
                        </p>
                    </a>

                    <div class="mt-4 flex items-center justify-between">
                        <div class="flex items-center space-x-4 text-sm text-gray-500">
                            <span class="inline-flex items-center">
                                <svg class="w-4 h-4 mr-1 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                {{ $article['date'] }}
                            </span>
                            <div class="flex items-center">
                                 <span class="mr-1">✨</span> {{ $article['claps'] }}
                            </div>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                                {{ $article['comments'] }}
                            </div>
                        </div>

                        <div class="flex items-center space-x-4">
                            <button class="text-gray-500 hover:text-gray-800">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </button>
                            <button class="text-gray-500 hover:text-gray-800">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path></svg>
                            </button>
                            <button class="text-gray-500 hover:text-gray-800">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path></svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="flex-shrink-0">
                    <img src="{{ $article['image_url'] }}" alt="{{ $article['title'] }}" class="w-28 h-28 md:w-36 md:h-36 object-cover rounded-md">
                </div>
            </article>
            @endforeach
        </div>
    </div>

    @include('components.footer')
</body>
</html>
