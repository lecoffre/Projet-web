<?php
/* Smarty version 3.1.39, created on 2021-04-01 00:38:46
  from 'C:\xampp\htdocs\projet-web-frontend\tpl\footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6064f9f6c461f6_55473419',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '552a74fcd86123552c17a5a338169d20d1ef0550' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projet-web-frontend\\tpl\\footer.tpl',
      1 => 1617230322,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6064f9f6c461f6_55473419 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Footer -->
</div>
<div class="row">
    <div class="col-12 multicolor"></div>
</div>
<footer class="sticky-footer bg-black" style="padding: 0px">
            
    <div class="card-footer bg-black">
        <div class="row">
                
            <div class="col-md-4 col-sm-8 col-xs-8">
                <div class="footer-text pull-left">
                    <div class="social mt-2 mb-3">
                    <img src="img/cesi-blanc.svg" alt="" style="height: 40px" />
                    </div>
                    <p class="card-text">GROUPE 1</p>
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-4"></div>

            <div class="col-md-2 col-sm-4 col-xs-4">
                <h6 style="margin-bottom: 1px; font-size: 14px" class="heading">
                  FRONT|BACK
                </h6>
                <ul class="card-text">
                    <li>
                        <i class="fa fa-cog" aria-hidden="true"></i> HTML/CSS/JS
                    </li>
                    <li><i class="fa fa-cog" aria-hidden="true"></i> MySQL</li>
                    <li><i class="fa fa-cog" aria-hidden="true"></i> PHP</li>
                </ul>
            </div>

            <div class="col-md-2 col-sm-4 col-xs-4">
                <h6 style="margin-bottom: 1px; font-size: 14px" class="heading">
                  ADDONS
                </h6>
                <ul>
                    <li>
                        <i class="fa fa-puzzle-piece" aria-hidden="true"></i>
                        Bootstrap
                    </li>
                    <li>
                        <i class="fa fa-puzzle-piece" aria-hidden="true"></i>
                        fontawesome
                    </li>
                    <li>
                        <i class="fa fa-puzzle-piece" aria-hidden="true"></i> SB
                        admin
                    </li>
                </ul>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-4">
                <h6 style="margin-bottom: 1px; font-size: 14px" class="heading">
                  ADDONS
                </h6>
                <ul class="card-text">
                    <li>
                        <i class="fa fa-puzzle-piece" aria-hidden="true"></i> jquery
                    </li>
                    <li>
                        <i class="fa fa-puzzle-piece" aria-hidden="true"></i> Popper
                    </li>
                    <li>-</li>
                </ul>
            </div>
        </div>
        <div class="divider-footer"></div>
        <div class="row" style="font-size: 10px">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="pull-left">
                    <div
                        class="copyright text-center my-auto row"
                        style="text-align: center; display: block"
                    >
                        <p style="font-size: 10px; padding: 0; margin: 0">
                            <span>Copyright &copy; 2021 Projet web CESI | Kamil Boudani -
                            Noah attia - Thomas Desgranges - Frédéric Nguyen
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End of Footer -->
</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div
    class="modal fade"
    id="logoutModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button
                    class="close"
                    type="button"
                    data-dismiss="modal"
                    aria-label="Close"
                >
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Select "Logout" below if you are ready to end your current session.
            </div>
            <div class="modal-footer">
                <button
                class="btn btn-secondary"
                type="button"
                data-dismiss="modal"
                >
                Cancel
                </button>
                <button class="btn btn-primary" id="logout">Logout</button>
            </div>
        </div>
    </div>
</div>


<!-- Bootstrap core JavaScript-->
<?php echo '<script'; ?>
 src="vendor/jquery/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="vendor/bootstrap/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>

<!-- Core plugin JavaScript-->
<?php echo '<script'; ?>
 src="vendor/jquery-easing/jquery.easing.min.js"><?php echo '</script'; ?>
>

<!-- Custom scripts for all pages-->
<?php echo '<script'; ?>
 src="js/sb-admin-2.min.js"><?php echo '</script'; ?>
>


<!--script de la page-->
<?php echo '<script'; ?>
 src="js/main.js"><?php echo '</script'; ?>
>
<!--ajout plugin car flemme de le faire-->
<?php echo '<script'; ?>
 src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006273/BBBootstrap/choices.min.js?version=7.0.0"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="js/cookies.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="js/info.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    if(Token_by_cookie != "" /* && Token_by_cookie != "undefined" && typeof(Token_by_cookie) === "undefined"*/){
        document.getElementById("roleNavBar").innerHTML=Role_by_cookie;
        document.getElementById("loginNavBar").innerHTML=Login_by_cookie;
    }
    else {  document.getElementById("roleNavBar").style.visibility = "hidden";
            document.getElementById("loginNavBar").style.visibility = "hidden";}
<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="js/session.js"><?php echo '</script'; ?>
>
<?php }
}
