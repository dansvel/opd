<footer class="footer bg-theme-light/50">
  <div class="container">
    <div class="row gx-5 pb-10 pt-[52px]">
      <div class="col-12 mt-12 md:col-6 lg:col-3">
        <a href="{{ url('') }}" class="flex gap-3 items-center">
          <img src="{{ asset($appData->icon) }}" height="200" width="250" alt="logo" style="object-fit: cover;"/>
          {{-- <span class="text-bold font-bold text-xl text-orange-600">{{ $appData->app_name }}</span> --}}
        </a>
        <p class="mt-6">{{ $appData->description }}</p>
      </div>
      <div class="col-12 mt-12 md:col-6 lg:col-3">
        <h6 class="text-orange-600">Socials</h6>
        <p>diskominfo@indramayukab.go.id</p>
        <ul class="social-icons mt-4 lg:mt-6">
          <li>
            <a href="{{ $appData->facebook }}" target="_blank">
              <svg
                width="19"
                height="21"
                viewBox="0 0 20 21"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M19.1056 10.4495C19.1056 5.09642 15 0.759277 9.9327 0.759277C4.86539 0.759277 0.759766 5.09642 0.759766 10.4495C0.759766 15.2946 4.08865 19.3191 8.49018 20.0224V13.2627H6.15996V10.4495H8.49018V8.33951C8.49018 5.91696 9.85872 4.54939 11.93 4.54939C12.9657 4.54939 14.0013 4.74476 14.0013 4.74476V7.12823H12.8547C11.7081 7.12823 11.3382 7.87063 11.3382 8.65209V10.4495H13.8904L13.4835 13.2627H11.3382V20.0224C15.7398 19.3191 19.1056 15.2946 19.1056 10.4495Z"
                  fill="#222222"
                />
              </svg>
            </a>
          </li>
          <li>
            <a href="{{ $appData->x }}" target="_blank">
              <svg
                width="19"
                height="15"
                viewBox="0 0 19 15"
                xmlns="http://www.w3.org/2000/svg"
                fill="black"
                class="bi bi-twitter-x"
              >
              <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/>
                />
              </svg>
            </a>
          </li>
          <li>
            <a href="{{ $appData->youtube }}" target="_blank">
              <svg
                width="19"
                height="16"
                viewBox="0 0 19 16"
                xmlns="http://www.w3.org/2000/svg"
                fill="black"
                class="bi bi-youtube"
              >
              <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.01 2.01 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.01 2.01 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31 31 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.01 2.01 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A100 100 0 0 1 7.858 2zM6.4 5.209v4.818l4.157-2.408z"/>
              </svg>
            </a>
          </li>
          <li>
            <a href="{{ $appData->instagram }}" target="_blank">
              <svg
                width="19"
                height="18"
                viewBox="0 0 17 18"
                xmlns="http://www.w3.org/2000/svg"
                fill="black"
                class="bi bi-instagram"
              >
              <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
              </svg>
            </a>
          </li>
        </ul>
      </div>
      <div class="col-12 mt-12 md:col-6 lg:col-3">
        <h6 class="text-orange-600">Links</h6>
        <ul>
            @foreach ($menus as $menu)
            <li>
                <a href="{{ $menu->url }}">{{ $menu->title }}</a>
            </li>
            @endforeach
        </ul>
      </div>
      <div class="col-12 mt-12 md:col-6 lg:col-3">
        <h6 class="text-orange-600">Lokasi</h6>
        <p>Jl. R.A. Kartini No. 01 Indramayu, Jawa Barat 45211</p>
        {{-- <p>(704) 555-0127</p> --}}
      </div>
    </div>
  </div>
  <div class="container max-w-[1440px]">
    <div
      class="footer-copyright mx-auto border-t border-border pb-10 pt-7 text-center"
    >
      {{-- <p>Designed And Developed by <a href="https://themefisher.com" target="_blank">Themefisher</a></p> --}}
      <p>Designed And Developed by Team 10 JDA</p>
    </div>
  </div>
</footer>
