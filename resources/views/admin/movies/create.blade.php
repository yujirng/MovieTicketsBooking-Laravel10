@extends('layouts.admin.app')

@section('content')
    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.movies.store') }}">
        @csrf
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" required value="{{ old('title') }}">
        </div>
        <div class="form-group">
            <label for="director_id">Director</label>
            <select class="form-control" id="director_id" name="director_id">
                @foreach ($directors as $director)
                    <option value="{{ $director->id }}" {{ old('director_id') == $director->id ? 'selected' : '' }}>
                        {{ $director->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="release_date">Release Date:</label>
            <input type="date" class="form-control" id="release_date" name="release_date"
                value="{{ old('release_date') }}" required>
        </div>
        <div class="form-group">
            <label for="actors">Actors</label>
            <input id="actorsSearchInput" placeholder="Start typing to search for actors..." class='ml-2'>
            <select multiple class="form-control" id="actors" name="actors[]">
                @foreach ($actors as $actor)
                    <option value="{{ $actor->id }}" {{ in_array($actor->id, old('actors', [])) ? 'selected' : '' }}>
                        {{ $actor->name }}
                    </option>
                @endforeach
            </select>
            <small class="form-text text-muted">Hold down the Ctrl (Windows) or Command (Mac) button to select multiple
                options.</small>
        </div>
        <div class="form-group">
            <label for="genres">Genres</label>
            <input id="genresSearchInput" placeholder="Start typing to search for genres..." class='ml-2'>
            <select multiple class="form-control" id="genres" name="genres[]">
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}" {{ in_array($genre->id, old('genres', [])) ? 'selected' : '' }}>
                        {{ $genre->genre_name }}
                    </option>
                @endforeach
            </select>
            <small class="form-text text-muted">Hold down the Ctrl (Windows) or Command (Mac) button to select multiple
                options.</small>
        </div>
        <div class="form-group">
            <label for="trailer_link">Trailer Link:</label>
            <input type="url" class="form-control" id="trailer_link" name="trailer_link"
                value="{{ old('trailer_link') }}">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>
        <div class="form-group">
            <label for="cens">Movie Cens:</label>
            <select class="form-control" id="cens" name="cens" required>
                @foreach ($censorshipOptions as $option)
                    <option value="{{ $option }}" {{ old('cens') == $option ? 'selected' : '' }}>
                        {{ $option }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" id="status" name="status" required>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>
        <div class="form-group">
            <label for="running">Running:</label>
            <select class="form-control" id="running" name="running" required>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create Movie</button>
    </form>
@endsection

@section('scripts')
    <script>
        $(function() {
            opts = $('#genres').map(function() {
                return [
                    [this.value, $(this).text()]
                ];
            });
            opts1 = $('#actors').map(function() {
                return [
                    [this.value, $(this).text()]
                ];
            });

            $('#genresSearchInput').keyup(function() {

                var rxp = new RegExp($('#someinput').val(), 'i');
                var optlist = $('#genres').empty();
                opts.each(function() {
                    if (rxp.test(this[1])) {
                        optlist.append($('<option/>').attr('value', this[0]).text(this[1]));
                    } else {
                        optlist.append($('<option/>').attr('value', this[0]).text(this[1]).addClass(
                            "hidden"));
                    }
                });
                $(".hidden").toggleOption(false);

            });
            $('#actorsSearchInput').keyup(function() {

                var rxp = new RegExp($('#someinput1').val(), 'i');
                var optlist = $('#actors').empty();
                opts1.each(function() {
                    if (rxp.test(this[1])) {
                        optlist.append($('<option/>').attr('value', this[0]).text(this[1]));
                    } else {
                        optlist.append($('<option/>').attr('value', this[0]).text(this[1]).addClass(
                            "hidden"));
                    }
                });
                $(".hidden").toggleOption(false);

            });
            // $('.select-cities').click(function() {
            //     $('.select-cities option:selected').remove().appendTo('.chosen-cities');
            //     opts = $('#optlist option').map(function() {
            //         return [
            //             [this.value, $(this).text()]
            //         ];
            //     });
            //     opts1 = $('#optlist1 option').map(function() {
            //         return [
            //             [this.value, $(this).text()]
            //         ];
            //     });
            // });

            // $('.chosen-cities').click(function() {
            //     $('.chosen-cities option:selected').remove().appendTo('.select-cities');
            //     opts = $('#optlist option').map(function() {
            //         return [
            //             [this.value, $(this).text()]
            //         ];
            //     });
            //     opts1 = $('#optlist1 option').map(function() {
            //         return [
            //             [this.value, $(this).text()]
            //         ];
            //     });
            // });


        });

        jQuery.fn.toggleOption = function(show) {
            jQuery(this).toggle(show);
            if (show) {
                if (jQuery(this).parent('span.toggleOption').length)
                    jQuery(this).unwrap();
            } else {
                if (jQuery(this).parent('span.toggleOption').length == 0)
                    jQuery(this).wrap('<span class="toggleOption" style="display: none;" />');
            }
        };
    </script>
@endsection
