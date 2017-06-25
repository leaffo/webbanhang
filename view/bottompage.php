<?php



?>
<footer class="footerss" style="list-style:none;">
    <div class="container-fluid">
        <div class="col-md-2">
            <ul>

                <div class="headfooter">
                    Head
                </div>
                <li><a href="#">footer</a></li>
                <li><a href="#">footer</a></li>
                <li><a href="#">footer</a></li>
                <li><a href="#">footer</a></li>
                <li><a href="#">footer</a></li>
                <li><a href="#">footer</a></li>
            </ul>
        </div>
        <div class="col-md-2">
            <ul>

                <div class="headfooter">
                    Head
                </div>
                <li><a href="#">footer</a></li>
                <li><a href="#">footer</a></li>
                <li><a href="#">footer</a></li>
                <li><a href="#">footer</a></li>
                <li><a href="#">footer</a></li>
                <li><a href="#">footer</a></li>
            </ul>
        </div>
        <div class="col-md-2">
            <ul>

                <div class="headfooter">
                    Head
                </div>
                <li><a href="#">footer</a></li>
                <li><a href="#">footer</a></li>
                <li><a href="#">footer</a></li>
                <li><a href="#">footer</a></li>
                <li><a href="#">footer</a></li>
                <li><a href="#">footer</a></li>
            </ul>
        </div>
        <div class="col-md-6">
            <div class="headfooter">
                Head
            </div>

        </div>
    </div>


</footer>
<script src="../lib/js/footer-reveal.min.js"></script>

<script>
    $(function () {
        $('#footerss').footerReveal();
    });
    $(function () {
        $('section.about a').click(function () {
            $('html, body').animate({scrollTop: $(document).height()}, 2000);
            return false;
        });
    });
</script>
</body>

</html>