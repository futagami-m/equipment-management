<div class="wrapper m-4" >
        <div class="post-search-form col-md-6">
        <form class="form-inline" action="{{ route('index') }}" method="get" style = "text-align:right;">
            <div class="form-group d-flex">
                <select name="type" class="form-select text-muted w-25 bg-light" aria-label="Default select example">
                    <option value="" selected>種別を選択</option>
                    @foreach(config('pref') as $key => $score)
                    <option value="{{$key}}">{{ $score }}</option>
                    @endforeach
                </select>
                <input type="text" name="keyword"  class="form-control" placeholder="キーワードを入力">
                <input type="submit" value="検索" class="btn btn-primary">
            </div>
        </form>
        </div>