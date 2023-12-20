<?php
$carlux ='/carlux'
    ?>
<style>
    .site-footer
    {
        background-color:#26272b;
        padding:45px 0 20px;
        font-size:15px;
        line-height:24px;
        color:#737373;
    }
    .site-footer hr
    {
        border-top-color:#bbb;
        opacity:0.5
    }
    .site-footer hr.small
    {
        margin:20px 0
    }
    .site-footer h6
    {
        color:#fff;
        font-size:16px;
        text-transform:uppercase;
        margin-top:5px;
        letter-spacing:2px
    }
    .site-footer a
    {
        color:#737373;
    }
    .site-footer a:hover
    {
        color:#3366cc;
        text-decoration:none;
    }
    .footer-links
    {
        padding-left:0;
        list-style:none
    }
    .footer-links li
    {
        display:block
    }
    .footer-links a
    {
        color:#737373
    }
    .footer-links a:active,.footer-links a:focus,.footer-links a:hover
    {
        color:#3366cc;
        text-decoration:none;
    }
    .footer-links.inline li
    {
        display:inline-block
    }
    .site-footer .social-icons
    {
        text-align:right
    }
    .site-footer .social-icons a
    {
        width:40px;
        height:40px;
        line-height:40px;
        margin-left:6px;
        margin-right:0;
        border-radius:100%;
        background-color:#33353d
    }

    }
</style>
<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h6>A PROPOS DE NOUS     </h6>
                <p>Vous êtes sur Carlux, la révolution de la vente automobile.</p>
            </div>

            <div class="col-xs-6 col-md-3">
                <h6>QUICK LINKS</h6>
                <ul class="footer-links">
                    <li><a href="<?php echo $carlux; ?>/index.php">Accueil</a></li>
                    <li><a href="<?php echo $carlux; ?>/main.php">Véhicules Disponibles</a></li>
                    <li><a href="<?php echo $carlux; ?>/view/achat.php">Commander</a></li>

                </ul>
            </div>
        </div>
        <hr>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-6 col-xs-12">
                <p>
                    30 AVENUE REPUBLIQUE 94800 VILLEJUIF
                </p>
            </div>

        </div>
    </div>
</footer>