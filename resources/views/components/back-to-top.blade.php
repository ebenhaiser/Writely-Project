<style>
    #backToTop {
        position: fixed;
        bottom: 30px;
        right: 30px;
        /* background-color: #007bff;
        color: white; */
        border: none;
        padding: 10px 15px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.3s ease-in-out, visibility 0.3s;
    }
</style>

<button id="backToTop" class="btn btn-primary">
    <i class='bx bx-up-arrow-alt'></i>
</button>

<script>
    $(document).ready(function() {
        const $backToTopButton = $("#backToTop");

        $(window).on("scroll", function() {
            if ($(window).scrollTop() > 300) {
                $backToTopButton.css({
                    "opacity": "1",
                    "visibility": "visible"
                });
            } else {
                $backToTopButton.css({
                    "opacity": "0",
                    "visibility": "hidden"
                });
            }
        });

        $backToTopButton.on("click", function() {
            $("html, body").animate({
                scrollTop: 0
            }, "smooth");
        });
    });
</script>
