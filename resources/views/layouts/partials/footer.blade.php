<!-- Footer Start -->
<footer class="footer mt-auto py-3 text-center">
    <div class="container">
        <span class="text-muted"> {{ __('messages.copyright') }} <span id="year"></span> </span>
    </div>
</footer>
<!-- Footer End -->
<div class="modal fade" id="header-responsive-search" tabindex="-1" aria-labelledby="header-responsive-search"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="input-group">
                    <input type="text" class="form-control border-end-0"
                        placeholder="{{ __('messages.search_anything') }}"
                        aria-label="{{ __('messages.search_anything') }}" aria-describedby="button-addon2">
                    <button class="btn btn-primary" type="button" id="button-addon2"><i
                            class="bi bi-search"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Scroll To Top -->
<div class="scrollToTop">
    <span class="arrow lh-1"><i class="ti ti-arrow-big-up fs-18"></i></span>
</div>
<div id="responsive-overlay"></div>
<!-- Scroll To Top -->
