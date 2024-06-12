@extends('layouts.app.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3 left rounded">
                <div class="card border-1 ml-3 rounded">
                    <form id="filter-form">
                        <div class="list-group px-3 py-1">
                            <h3 class="part-line">Search</h3>
                            <div class="input-group mb-3">
                                <input type="text" name="search" id="search" class="form-control"
                                    placeholder="Enter keywords..." aria-label="Search" aria-describedby="search-icon">
                            </div>
                        </div>

                        <div class="list-group px-3 py-1">
                            <h3 class="part-line">Status</h3>
                            <div class="card border-0">
                                <div class="list-group-item">
                                    <input id="running" type="checkbox" class="common_selector running checkbox__input"
                                        value="running">
                                    <label for="running" class="ml-2">
                                        <span class="checkbox__label"></span>
                                        Running
                                    </label>
                                </div>
                                <div class="list-group-item">
                                    <input id="upcomming" type="checkbox" class="common_selector upcomming checkbox__input"
                                        value="upcomming">
                                    <label for="upcomming" class="ml-2">
                                        <span class="checkbox__label"></span>
                                        Upcomming
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="list-group px-3 py-1">
                            <h3 class="part-line">Category</h3>
                            <div class="card border-0">
                                @foreach ($genres as $genreId => $genreName)
                                    <div class="list-group-item">
                                        <input id="genre_id_{{ $genreId }}" type="checkbox"
                                            class="common_selector genre checkbox__input" value="{{ $genreId }}">
                                        <label for="genre_id_{{ $genreId }}" class="ml-2">
                                            <span class="checkbox__label"></span>
                                            {{ $genreName }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        {{-- <div class="list-group px-3 py-1 mb-3">
                            <h3 class="part-line">Language</h3>
                            <div class="card border-0">
                                @foreach ($languages as $language)
                                    <div class="list-group-item">
                                        <input id="language_{{ Str::slug($language) }}" type="checkbox"
                                            class="common_selector language checkbox__input" value="{{ $language }}">
                                        <label for="language_{{ Str::slug($language) }}" class="ml-2">
                                            <span class="checkbox__label"></span>
                                            {{ $language }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div> --}}
                    </form>
                </div>
            </div>

            <div class="col-md-9">
                <div class="card border-1 ml-3 rounded">
                    <div class="card-body">
                        <div class="row filter_data"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            filter_data();

            function filter_data() {
                $('.filter_data').html('<div id="loading" style=""></div>');
                var action = 'fetch_data';
                var search = $('#search').val();
                var genre_id = get_filter('genre');
                // var language = get_filter('language');
                var running = get_filter('running');
                var upcomming = get_filter('upcomming');
                $.ajax({
                    url: "{{ route('movies.fetch') }}",
                    method: "GET",
                    data: {
                        action: action,
                        search: search,
                        genre_id: genre_id,
                        // language: language,
                        running: running,
                        upcomming: upcomming,
                    },
                    success: function(data) {
                        $('.filter_data').html(data);
                    },
                    error: function(xhr, status, error) {
                        // console.log(xhr.responseText);
                    }
                });
            }

            function get_filter(class_name) {
                var filter = [];
                $('.' + class_name + ':checked').each(function() {
                    filter.push($(this).val());
                });
                return filter;
            }

            var delayTimer;

            $('#search').keyup(function() {
                clearTimeout(delayTimer);
                delayTimer = setTimeout(function() {
                    filter_data();
                }, 500);
            });

            $('.common_selector').click(function() {
                filter_data();
            });

        });
    </script>
@endsection
