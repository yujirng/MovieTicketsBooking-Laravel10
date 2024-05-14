@extends('layouts.app.user.user-layout')
@section('section')
    <div class="row">
        <div class="col-11">
            <div class="card border-0 shadow-lg mb-4 rounded-0">
                <div class="card-body">
                    <form action="update_user_info.php" method="post" id="updateForm">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="name">Họ và tên:</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $user->name }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="birthday">Ngày sinh:</label>
                                <input type="date" class="form-control" id="birthday" name="birthday"
                                    value="{{ $user->birthday }}" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $user->email }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="phone">Số điện thoại:</label>
                                <input type="tel" class="form-control" id="phone" name="phone"
                                    value="{{ $user->phone }}" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>Gender:</label>
                                <div class="form-group my-1">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="male"
                                            value="0" {{ $user->gender === 0 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="male">Nam</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="female"
                                            value="1" {{ $user->gender === 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="female">Nữ</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="password">Mật khẩu:</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="********" disabled>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" data-toggle="modal"
                                            data-target="#changePasswordModal">Thay đổi
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-primary float-right" id="updateBtn">Cập
                                    nhật</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('article')
    <!-- Change Password Modal -->
    <div class="modal fade p-3 mx-auto" id="changePasswordModal" tabindex="-1" role="dialog"
        aria-labelledby="changePasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changePasswordModalLabel">Thay đổi mật khẩu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="change_password.php" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="currentPassword">Mật khẩu cũ:</label>
                            <input type="password" class="form-control" id="currentPassword" name="currentPassword"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="newPassword">Mật khẩu mới:</label>
                            <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary" style="margin-top: .25rem;">Lưu thay đổi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('updateBtn').addEventListener('click', function() {
            let confirmUpdate = confirm("Bạn có chắc chắn muốn cập nhật thông tin?");

            if (confirmUpdate) {
                document.getElementById('updateForm').submit();
            }
        });
    </script>
@endsection
