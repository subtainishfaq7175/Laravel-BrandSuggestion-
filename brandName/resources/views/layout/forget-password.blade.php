<div id="forget-password" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Reset Password</h4>
            </div>
                <form>
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="Email">E-mail</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="submit" value="Submit" class="form-control btn btn-block btn-primary">
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>






