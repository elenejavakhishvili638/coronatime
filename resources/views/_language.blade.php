<div class="w-58 mr-18">
    <form action="{{ route('setLanguage') }}" method="POST">
        @csrf
        <select class="flex w-full outline-none" name="locale" onchange="this.form.submit()">
            <option value="en" @if (app()->getLocale() == 'en') selected @endif>{{ __('language.english') }}
            </option>
            <option value="ka" @if (app()->getLocale() == 'ka') selected @endif>{{ __('language.georgian') }}
            </option>
        </select>
    </form>
</div>
