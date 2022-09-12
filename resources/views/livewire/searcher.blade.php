
<div>
    <input wire:model="search" type="text" placeholder="Search articles..."/>

    <ul>
        @foreach($articles as $article)
            <li>{{ $article->name }}</li>
        @endforeach
    </ul>
</div>
