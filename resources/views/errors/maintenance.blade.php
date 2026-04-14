<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance Mode - {{ getSetting('website_name', 'BD-Expertzone') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/css/tabler.min.css">
    <style>
        body { background-color: #f4f7fa; }
        .empty { margin-top: 100px; }
    </style>
</head>
<body class=" d-flex flex-column">
    <div class="page page-center">
      <div class="container-tight py-4">
        <div class="empty">
          <div class="empty-img">
              @if(getSetting('loading_gif'))
                <img src="{{ asset(getSetting('loading_gif')) }}" height="128" alt="">
              @endif
          </div>
          <p class="empty-title">We are currently undergoing maintenance</p>
          <p class="empty-subtitle text-muted">
            We're sorry for the inconvenience, but we're performing some maintenance. We'll be back online shortly!
          </p>
          <div class="empty-action">
            <a href="mailto:{{ getSetting('email') }}" class="btn btn-primary">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" /><path d="M3 7l9 6l9 -6" /></svg>
              Contact Support
            </a>
          </div>
        </div>
      </div>
    </div>
</body>
</html>
