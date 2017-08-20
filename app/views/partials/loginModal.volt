<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h2 class="modal-title text-center" id="exampleModalLabel">Logowanie</h2>
                <hr>
            </div>
            <div class="modal-body">
                <form id="login-modal-form">
                    <div class="form-group"><input type="email" id="login-email" class="form-control" placeholder="E-mail" title="E-mail"></div>
                    <div class="form-group"><input type="password" id="login-password" class="form-control" placeholder="Hasło" title="Hasło"></div>
                    <div id="login-response" class="error"></div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-xl page-scroll" data-dismiss="modal">Zamknij</button>
                <button id="modal-log-in" type="button" class="btn btn-primary btn-xl page-scroll spin">Zaloguj<i class="fa fa-refresh spinner fa-spin" id="lock-refresh"></i></button>
            </div>
        </div>
    </div>
</div>