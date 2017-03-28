<div id="logoutModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Logout</h4>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <a href="{{ route('logout') }}">
                            <input type="submit" name="submit" value="Logout" class="form-control btn btn-block btn-primary">
                        </a>
                    </div>
            </div>
        </div>

    </div>
</div>






