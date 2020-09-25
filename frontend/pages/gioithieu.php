<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monnie Store - Giới thiệu</title>
    <?php include_once(__DIR__.'/../../backend/layouts/styles.php'); ?>
    <link rel="stylesheet" href="/Du_an_nien_luan/assets/backend/layouts/pages/gioithieu.css" type="text/css "/>

</head>

<body>
    <div class="container-fluid ">
    <?php include_once(__DIR__.'/../../backend/layouts/partials/header.php'); ?>
        <!-- Phan lien he  -->
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 content_trang">
                <div class="row content_tungmuc">
                    <div class="col-md-12">
                        <div class="title_trang">
                            <h3>HƯỚNG DẪN MUA HÀNG</h3>
                        </div>
                        <p> <span> Bước 1:</span> Chọn dòng sản phẩm (Nam/ Nữ/ Sale) rồi chọn chủng loại sản phẩm (áo sơ
                            mi, áo thun, đầm,..) </p>
                        <p><span>Bước 2:</span> Chọn mặt hàng và thêm mặt hàng vào giỏ. Sau đó, quý khách có thể chọn
                            tiếp tục mua sắm hoặc xử lý đơn hàng. </p>
                        <p><span> Bước 3:</span> Nếu muốn xử lý đơn hàng, quý khách có thể thực hiện bằng cách đăng ký
                            hoặc thanh toán với tư cách khách hàng mới.</p>
                        <p><span>Bước 4:</span> Chọn phương thức giao hàng.</p>
                        <p> <span> Bước 5:</span> Chọn phương thức thanh toán. </p>
                        <p> <span>Bước 6:</span> Xác nhận đơn hàng: Quý khách sẽ nhận được email xác nhận đơn hàng.</p>
                        <p>Đơn hàng Online sẽ được xác nhận qua điện thoại trong vòng 48h làm việc.Nếu Moon Store không
                            thể liên hệ được Quý khách, đơn hàng sẽ tự động huỷ trên hệ thống. Moon Store cũng có quyền
                            từ chối hoặc hủy bỏ bất kỳ đơn hàng nào vì
                            bất kỳ lý do gì liên quan đến lỗi kỹ thuật, hệ thống một cách khách quan vào bất kỳ lúc nào.
                        </p>
                    </div>
                </div>
                <div class="row content_tungmuc ">
                    <div class="col-md-12">
                        <div class="title_trang">
                            <h3>CHÍNH SÁCH THANH TOÁN </h3>
                        </div>
                        <p>Có 2 hình thức thanh toán khi mua hàng online </p>
                        <p> <span>1. Hình thức thu tiền tận nơi (COD) :</span> Khách hàng sẽ thanh toán tiền khi nhận
                            hàng và thanh toán tiền hàng và cước phí vận chuyển cho nhân viên chuyển phát </p>
                        <p> <span>2. Thanh toán trực tuyến OnePay qua thẻ ATM nội địa hoặc thẻ quốc tế trực tiếp tại
                                website.</span> </p>

                    </div>
                </div>
                <div class="row content_tungmuc ">
                    <div class="col-md-12">
                        <div class="title_trang">
                            <h3>CHÍNH SÁCH ĐỔI TRẢ </h3>
                        </div>
                        <p><span>1. THỜI GIAN ĐỔI TRẢ</span></p>
                        <p>Trong vòng 15 ngày kể từ ngày mua sản phẩm (theo ngày trên hóa đơn) - Đối với các KH đặt mua
                            ONLINE tính từ ngày KH nhận được sản phẩm. </p>
                        <p><span>2. ĐIỀU KIỆN ĐỔI TRẢ</span></p>
                        <p>- Hàng đổi phải còn nguyên nhãn mác, mã vạch, chưa qua sử dụng và có hóa đơn mua hàng nguyên
                            vẹn kèm theo (bao gồm cả các sản phẩm chất liệu thun/len/thun len, jeans).</p>
                        <p>- Với các trường hợp đổi trả không có hóa đơn, Quý khách vui lòng quay lại showroom đã mua
                            hàng để được hỗ trợ. </p>
                        <p>Sản phẩm chỉ được đổi 01 lần theo đúng quy định.</p>
                        <p>- Giá trị sản phẩm đổi/trả được tính theo đơn giá trên hóa đơn mua hàng.</p>
                        <p>- Moon Store chỉ sử dụng “Biên lai đặt cọc” để hoàn lại tiền thừa sau khi đổi và giá trị hàng
                            trả cho khách, không hoàn tiền mặt trong mọi trường hợp.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>


        <?php include_once(__DIR__.'/../../backend/layouts/partials/footer.php'); ?>

       

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
                                <div class="alert " role="alert" id="help_numberphone"
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
                                <div class="alert " role="alert" id="help_pass" style="color: red; font-size: 12px;">

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
    <!-- end form đăng nhập -->
    <?php include_once(__DIR__.'/../../backend/layouts/scripts.php'); ?>



</body>

</html>