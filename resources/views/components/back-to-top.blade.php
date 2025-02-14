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
        transition: opacity 0.5s ease-out, visibility 0.3s;
    }
</style>

<button id="backToTop" class="btn btn-primary">
    <i class='bx bx-up-arrow-alt'></i>
</button>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const backToTopButton = document.getElementById("backToTop");

        window.addEventListener("scroll", function() {
            if (window.scrollY > 300) {
                backToTopButton.style.opacity = "1";
                backToTopButton.style.visibility = "visible";
            } else {
                backToTopButton.style.opacity = "0";
                backToTopButton.style.visibility = "hidden";
            }
        });

        backToTopButton.addEventListener("click", function() {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        });
    });
</script>
