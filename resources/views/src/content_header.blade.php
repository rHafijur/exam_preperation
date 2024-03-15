@php
    function urlToTitle($url)
    {
        // Remove the base URL and any trailing slashes
        $url = str_replace(url('/'), '', rtrim($url, '/'));

        // Replace any remaining slashes with spaces
        $title = str_replace('/', ' ', $url);
        $title = str_replace('-', ' ', $title);
        $title = str_replace('_', ' ', $title);

        // Split the title into words
        $words = explode(' ', $title);

        // Remove any words that are numeric
        $words = array_filter($words, function($word) {
            return !is_numeric($word);
        });

        // Capitalize the first letter of each word
        $words = array_map('ucwords', $words);

        // Join the words back together with spaces
        $title = implode(' ', $words);

        return $title;
    }

    function urlToBreadcrumb($url)
    {
        // Remove the base URL and any trailing slashes
        $url = str_replace(url('/'), '', rtrim($url, '/'));

        // Split the URL into segments
        $segments = explode('/', $url);

        // Create an empty array to store the breadcrumbs
        $breadcrumbs = [];

        // Add a home breadcrumb
        $breadcrumbs[] = ['url' => url('/'), 'text' => 'Home'];

        // Loop through the segments and add a breadcrumb for each one
        $currentUrl = url('/');
        foreach ($segments as $segment) {
            if (!empty($segment)) {
                $currentUrl .= '/'.$segment;
                $breadcrumbs[] = ['url' => $currentUrl, 'text' => ucwords(str_replace('-', ' ', $segment))];
            }
        }

        return $breadcrumbs;
    }

@endphp
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{ urlToTitle(request()->url()) }}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            @foreach (urlToBreadcrumb(request()->url()) as $breadcrumb)
                <li class="breadcrumb-item"><a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['text'] }}</a></li>
            @endforeach
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>