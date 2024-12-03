@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">Search :</div>
                    <div class="card-body">
                        <form action="{{route('search')}}" method="GET">
                            {{-- @csrf --}}
                            <div class="input-group mb-3">
                                <input type="text" name="q" class="form-control" placeholder="Search Article Here" aria-label="Search Article Here" aria-describedby="button-addon2" value="{{ old('q', $query) }}">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Find it</button>
                              </div>
                            {{-- <input class="form-control form-control-lg" type="text" placeholder="Search Article Here" name="q"
                                aria-label="Search" {{ old('q', $query) }}>
                                <button type="submit" class="btn btn-primary">Find</button> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


        {{-- <h1>Search Results for "{{ $query }}"</h1>

        @if ($results->count() > 0)
            @foreach ($results as $article)
                <div class="search-result">
                    <h2><a href="{{ $article->url }}">{{ $article->title }}</a></h2>
                    <p>{{ Str::limit($article->body, 250) }}</p>
                    <div class="metadata">
                        @if (!empty($article->categories))
                            <strong>Categories:</strong>
                            {{ implode(', ', $article->categories) }}
                        @endif
                    </div>
                </div>
            @endforeach

            {{ $results->appends(['q' => $query])->links() }}
        @else
            <p>No results found.</p>
        @endif
    </div> --}}
    <div class="container py-4">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-4">Search Results for <span class="text-primary">"{{ $query }}"</span></h1>

                @if($results->count() > 0)
                    <div class="row row-cols-1 g-4">
                        @foreach($results as $article)
                            <div class="col">
                                <div class="card h-100 shadow-sm">
                                    <div class="card-body">
                                        <h2 class="card-title h4">
                                            <a href="{{ $article->url }}" class="text-decoration-none text-dark">
                                                {{ $article->title }}
                                            </a>
                                        </h2>
                                        <p class="card-text text-muted">
                                            {{ Str::limit($article->body, 250) }}
                                        </p>

                                        @if(!empty($article->categories))
                                            <div class="mt-3">
                                                <span class="fw-bold">Categories:</span>
                                                <div class="d-flex flex-wrap gap-2">
                                                    @foreach($article->categories as $category)
                                                        <span class="badge bg-secondary">{{ $category }}</span>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    @if(isset($article->_score))
                                        <div class="card-footer bg-transparent">
                                            <small class="text-muted">
                                                Relevance Score:
                                                <span class="badge bg-info">
                                                    {{ number_format($article->_score, 2) }}
                                                </span>
                                            </small>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        {{ $results->appends(['q' => $query])->links() }}
                        {{-- {{ $results->appends(['q' => $query])->links('pagination::bootstrap-5') }} --}}
                    </div>
                @else
                    <div class="alert alert-warning" role="alert">
                        <i class="bi bi-search"></i> No results found for "{{ $query }}".
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
