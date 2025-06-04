<h1>{{ $article->title }}</h1>
<p>{{ $article->content }}</p>
<a href="{{ route('actualites.show', $article->id) }}">Lire l'article complet</a>
