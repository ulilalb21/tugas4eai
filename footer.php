<!-- Footer -->
    <footer id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <h4><strong>Muhammad Ulil Albab (1206246585) | Nitto Sahadi (1501234567)</strong>
                    </h4>
                    <p>Fakultas Ilmu Komputer<br>Universitas Indonesia</p>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-envelope-o fa-fw"></i>  <a href="mailto:muhammad.ulil21@ui.ac.id">muhammad.ulil21@ui.ac.id</a>
                        </li>
                        <li><i class="fa fa-envelope-o fa-fw"></i>  <a href="mailto:nitto.sahadi@ui.ac.id">nitto.sahadi@ui.ac.id</a>
                        </li>
                    </ul>
                    <hr class="small">
                    <p class="text-muted">Web services provided by <a href="http://webservicex.net">Webservicex.net</a></p>
                    <p class="text-muted">Copyright &copy; Kelompok 02 EAI 2016</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script>
    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Scrolls to the selected menu item on the page
    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    </script>