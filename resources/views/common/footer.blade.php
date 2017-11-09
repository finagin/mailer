<footer class="footer">
    <div class="container text-center">
        <span class="text-muted">
            @if (rand(1,100) > 95)
                Made with rum and even more rum <i class="fa fa-fw fa-lg fa-spin fa-smile-o" aria-hidden="true"></i>
            @else
                Made with <i class="fa fa-fw fa-lg fa-heart-o" style="color:red" aria-hidden="true"></i> by
                <a href="mailto:Igor@Finag.in?subject=Mailer%20{{ url('/') }}" target="_blank">
                    Igor<i class="fa fa-at" aria-hidden="true"></i>Finag.in
                </a>
                <i class="fa fa-copyright" aria-hidden="true"></i>
                2017
                @if(\Carbon\Carbon::now()->year != 2017)
                    - {{ \Carbon\Carbon::now()->year }}
                @endif
            @endif
        </span>
    </div>
</footer>
