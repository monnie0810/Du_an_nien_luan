    <!-- form đăng nhập -->
    <div id="app1">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form name="FormContact" id="FormContact" action="" method="POST" onsubmit="return check_Submit()">

                        <div class="modal-header">
                            <h5 class="modal-title title-dangnhap" id="exampleModalLabel">Đăng nhập vào MoonStore.com
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- start form dang nhap -->
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Số điện thoại:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-mobile" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="Phonenumber-user"
                                        name="Phonenumber-user" placeholder="phone number">
                                </div>
                                <div class="alert hotro_form" role="alert" id="help_numberphone"
                                    style="color: red; font-size: 12px;">

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Mật khẩu:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <input type="password" class="form-control" id="Password-user" name="Password-user"
                                        placeholder="Password">
                                </div>
                                <div class="alert hotro_form" role="alert" id="help_pass"
                                    style="color: red; font-size: 12px;">

                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="autoSizingCheck2">
                                <label class="form-check-label" for="autoSizingCheck2">
                                    Remember me
                                </label>
                            </div>
                            <button type="submit" class="btn btn-outline-primary">Đăng nhập</button>
                            <a class="btn btn-outline-success" href="dang_ky.html" role="button">Đăng ký</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end form đăng nhập -->