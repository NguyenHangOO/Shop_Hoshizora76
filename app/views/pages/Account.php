<style>
@media screen and (max-width: 1030px) {
	#chimuc{margin-top:-20px;}
}
@media screen and (max-width: 480px) {
	#chimuc{display: none;}
	#ac-list li a{font-size:12px;line-height:20px;}
	}
</style>
<div id="chimuc">
	<div class="container">
		<h5>Trang chủ <i class="fas fa-chevron-right"></i> Thông tin tài khoản</h5>
	</div>
</div>
<div id="content" class="container">		
<div id="ac">
	<div id="ac-list">
		<ul>
			<?php
				$row= json_decode($data["ttuser"],true);
				foreach ($row as list("img"=>$img,"fullname"=>$username)){ ?>
				<?php 
					if($img !=""){ ?>
						<a href="./Account/Infomation"><img id="ac-ac" src="<?php echo $img ?>"><?php echo $username ?></a>
					<?php }  else {?>
						<a href="./Account/Infomation"><img id="ac-ac" src="./public/images/account/unnamed.png"><?php echo $username ?></a>
					<?php } ?>
			<?php } ?>
			<li style="background: #CDE2CD;"><a href="./Account/Infomation"><i class="fas fa-user-alt"></i> Thông tin tài khoản</a></li>
			<li><a href="./Account/Infor_oder"><i class="fas fa-list-alt"></i></i> Quản lí đơn hàng</a></li>
			<li><a href="Account/Notification"><i class="fas fa-bell"></i> Thông báo của tôi</a></li>
			<li><a href="./Account/ShowAddress"><i class="fas fa-address-card"></i> Sổ địa chỉ</a></li>
			<li><a href="./Account/Avartar"><i class="fas fa-user-circle"></i> Avartar</a></li>
			<li><a href="./Account/Sigout" onclick="return confirm('Bạn có chắc muốn đăng xuất?')"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a></li>
		</ul>
	</div>
	<div id="ac-info">
		<div id="ac-info-tt"> 
			<div id="info-t">
				<h5 style="margin-left: 20px; padding-top: 20px;">Thông tin tài khoản</h5>
			</div>
			<div id="info-b" style="padding-top:5px;">
			<?php 
				if(isset($data["tb"])){
					//echo '<h6 style="color:red;text-align:center;padding-top:10px">'.$data["tb"].'</h6>';
					if($data["tb"]=="Cập nhật thành công"){ ?>
					<div class="alert alert-success alert-dismissible fade show mb-0" role="alert" style="margin:20px;">
						<i class="far fa-check-circle"></i> <?php echo $data["tb"]; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
				<?php } else {?>
					<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert" style="margin:20px;">
                        <i class="fas fa-exclamation"></i> <?php echo $data["tb"]; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
				<?php } }?> 
			<form action="./Account/UpInfo" method="POST">
				<?php
					$row= json_decode($data["ttuser"],true);
					foreach ($row as list("fullname"=>$fullname,"email"=>$email,"gioitinh"=>$gioitinh,"ngaysinh"=>$ngaysinh)){ ?>
					<input type="hidden" name="txtid" value="">
					<div  id="ff"class="form-group">
						<label class="lb" for="txthoten">Họ tên</label>
						<input id="f-ct" class="form-control" type="text" name="hoten" value="<?php echo $fullname?>" required placeholder="Nhập họ tên">
					</div>
					<div class="form-group">
						<label class="lb" for="txtemail">Email</label>
						<input id="f-ct" class="form-control" type="email" name="email" value="<?php echo $email?>" required placeholder="Nhập email">
					</div>
					<div class="form-group">
						<label class="lb" for="rdgioitinh" >Giới tính</label>
						<?php 
							if($gioitinh=="Nữ" || $gioitinh=="nữ" || $gioitinh=="nu" || $gioitinh=="Nu"){ ?>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"  value="Nam" >
								<label class="form-check-label" for="exampleRadios1">
									Nam
								</label>
							</div>&nbsp;&nbsp;
							<div class="form-check">
								<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2"  value="Nữ" checked>
								<label class="form-check-label" for="exampleRadios2">
									Nữ
								</label>
							</div>
						<?php } 
							else { ?>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"  value="Nam" checked>
								<label class="form-check-label" for="exampleRadios1">
									Nam
								</label>
							</div> &nbsp;&nbsp;
							<div class="form-check">
								<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2"  value="Nữ">
								<label class="form-check-label" for="exampleRadios2">
									Nữ
								</label>
							</div>
						<?php  } ?>
					</div>
					<div class="form-group">
						<label class="lb" for="txtngaysinh">Ngày sinh</label>
						<input id="dt-ns"  type="date" name="ngaysinh" value="<?php echo $ngaysinh?>" >
					</div>
				<?php } ?>
					<div class="form-group">
						<input id="chk" name="matkhau"  type="checkbox" value="1">
						<label class="lb2" >Thay đổi mật khẩu</label>
					</div>
					<div id="hien">
						<div class="form-group">
							<label class="lb" for="txtmkcu">Mật khẩu cũ</label>
							<input id="f-ct" class="form-control" type="password" name="mkcu" placeholder="Nhập mật khẩu cũ">
						</div>
						<div class="form-group">
							<label class="lb" for="txtmkmoi">Mật khẩu mới</label>
							<input id="f-ct" class="form-control" type="password" name="mkmoi" placeholder="Nhập mật khẩu mới từ 6 đến 32 ký tự">
						</div>
						<div class="form-group">
							<label class="lb" for="txtnhaplai">Nhập lại</label>
							<input id="f-ct" class="form-control" type="password" name="nhaplai" placeholder="Nhập lại mật khẩu">
						</div>
					</div>
					<input id="btn" name="btnCapnhat" class="btn btn-warning" type="submit" value="Cập nhật">
			</form>
			</div>
		</div>	
	</div>
</div>
<script src="./public/js/script.js">	
</script>