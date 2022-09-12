<div class="form-group">
    <label for="name">Article Name</label>
    <input name="name" type="text" id="name" class="form-control @error('name') is-invalid @enderror" value="@isset($article){{$article->name}}@endisset">
    @error('name')
    <div class="invalid-feedback is-invalid">{{$message}}</div>
    @enderror
</div>

<div class="form-group mt-3">
    <label for="content">Article content</label>
    <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror">@isset($article) {{$article->content}}@endisset</textarea>
    @error('content')
    <div class="invalid-feedback is-invalid">{{$message}}</div>
    @enderror
</div>

<div class="form-group mt-3">
    <label for="category_id">Article category</label>
    <select name="category_id" id="category_id">
        @foreach($categories as $category)
            <option value="{{$category->id}}"  @isset($article) @if($article->category_id==$category->id) selected @endif  @endisset >{{$category->name}}</option>
        @endforeach
    </select>
    @error('category_id')
    <div class="invalid-feedback is-invalid">{{$message}}</div>
    @enderror
</div>

<div class="form-group mt-3">
    <label for="category_id">Article tags</label>
    <select name="tag[]" id="category_id" class="form-control" multiple>
        @foreach($tags as $tag)
            <option value="{{$tag->id}}" @isset($article) @if( $article->tags->contains($tag->id)) selected @endif  @endisset>{{$tag->name}}</option>
        @endforeach
    </select>

</div>

{{--<div class="form-group">--}}
{{--    <label for="image">Image</label>--}}
{{--    <input name="image" type="file" id="image" class="form-control">--}}
{{--</div>--}}


<div class="input-group">
   <span class="input-group-btn">
     <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
       <i class="fa fa-picture-o"></i> Choose
     </a>
   </span>
    <input id="thumbnail" class="form-control" type="hidden" name="image">
</div>
<div id="holder"></div>


<script>
    var lfm = function(id, type, options) {
        let button = document.getElementById(id);

        button.addEventListener('click', function () {
            var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
            var target_input = document.getElementById(button.getAttribute('data-input'));
            var target_preview = document.getElementById(button.getAttribute('data-preview'));

            window.open(route_prefix + '?type=' + type || 'file', 'FileManager', 'width=900,height=600');
            window.SetUrl = function (items) {
                var file_path = items.map(function (item) {
                    return item.url;
                }).join(',');

                // set the value of the desired input to image url
                target_input.value = file_path;
                target_input.dispatchEvent(new Event('change'));

                // clear previous preview
                target_preview.innerHtml = '';

                // set or change the preview image src
                items.forEach(function (item) {
                    let img = document.createElement('img')
                    img.setAttribute('style', 'height: 5rem')
                    img.setAttribute('src', item.thumb_url)
                    target_preview.appendChild(img);
                });

                // trigger change event
                target_preview.dispatchEvent(new Event('change'));
            };
        });
    };
    var route_prefix = "/laravel-filemanager";
    lfm('lfm', 'image', {prefix: route_prefix});

</script>
