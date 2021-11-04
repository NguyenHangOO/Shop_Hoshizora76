		<div id="chimuc">
			<div class="container">
				<h5>Trang chủ <i class="fas fa-chevron-right"></i> Thêm địa chỉ</h5>
			</div>
		</div>
		<div id="content" class="container">		
			<div id="ac">
				<div id="ac-list">
					<ul>
						<?php
							$row= json_decode($data["ttuser"],true);
							foreach ($row as list("img"=>$img,"username"=>$username)){ ?>
							<?php 
								if($img !=""){ ?>
									<a href="./Account/Infomation"><img id="ac-ac" src="<?php echo $img ?>"><?php echo $username ?></a>
								<?php }  else {?>
									<a href="./Account/Infomation"><img id="ac-ac" src="./public/images/account/unnamed.png"><?php echo $username ?></a>
								<?php } ?>
						<?php } ?>
						<li><a href="./Account/Infomation"><i class="fas fa-user-alt"></i> Thông tin tài khoản</a></li>
						<li><a href="./Account/Infor_oder"><i class="fas fa-list-alt"></i></i> Quản lí đơn hàng</a></li>
						<li><a href="Account/Notification"><i class="fas fa-bell"></i> Thông báo của tôi</a></li>
						<li style="background: #CDE2CD;"><a href="./Account/ShowAddress"><i class="fas fa-address-card"></i> Sổ địa chỉ</a></li>
						<li><a href="./Account/Avartar"><i class="fas fa-user-circle"></i> Avartar</a></li>
						<li><a href="./Account/Sigout"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a></li>
					</ul>
				</div>
				<div id="ac-info">
					<div id="ac-info-tt"> 
						<div id="info-t">
							<h5 style="margin-left: 20px; padding-top: 20px;">Sổ địa chỉ</h5>
						</div>
						<div id="info-b" style="padding-top:5px;">
								<?php if(isset($data["dchi"])) {
									$row= json_decode($data["dchi"],true);
									foreach ($row as list("id"=>$id,"hoten"=>$hoten,"sdt"=>$sdt,"diachi"=>$diachi,"macdinh"=>$macdinh,"xa"=>$xa,"huyen"=>$huyen,"tinh"=>$tinh)){?>
										<?php
											$row= json_decode($data["ttuser"],true);
											foreach ($row as list("id"=>$iduser)){ ?>
											<form action="./Account/EditAddress/<?php echo $iduser ?>/<?php echo $id ?>" method="POST">
										<?php } ?>
										<?php if(isset($data["updc"])) { ?>
										<?php
											if($data["updc"] =="kosdt"){ $error =  "Số điện thoại không đúng"; }
											else { $error =  "Cập nhật không thành công";}
										?>
										<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert" style="margin:20px;">
											<i class="fas fa-exclamation"></i> <?php echo $error; ?>
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<?php } ?>
										<div  id="ff"class="form-group">
											<label class="lb" for="">Họ tên:</label>
											<input id="f-ct" class="form-control" type="text" name="hoten" value="<?php echo $hoten; ?>" required placeholder="Nhập họ tên">
										</div>
										<div class="form-group">
											<label class="lb" for="">Số điện thoại:</label>
											<input id="f-ct" class="form-control" type="text" name="sdt" value="<?php echo $sdt; ?>" required placeholder="Nhập số điện thoại">
										</div>
										<div class="form-group">
											<label class="lb" for="">Tỉnh/Thành phố:</label>
											<input id="f-ct" class="form-control" type="text" name="tinh" value="<?php echo $tinh; ?>" required placeholder="Nhập tỉnh/thành phố">
										</div>
										<div class="form-group">
											<label class="lb" for="">Quận huyện:</label>
											<input id="f-ct" class="form-control" type="text" name="huyen" value="<?php echo $huyen; ?>" required placeholder="Nhập quận huyện">
										</div>
										<div class="form-group">
											<label class="lb" for="">Phường xã:</label>
											<input id="f-ct" class="form-control" type="text" name="xa" value="<?php echo $xa; ?>" required placeholder="Nhập phường xã">
										</div>
										<div class="form-group">
											<label class="lb" for="">Địa chỉ:</label>
											<textarea id="f-ct" class="form-control" name="diachi" value="" required placeholder="Nhập địa chỉ"><?php echo $diachi; ?></textarea>
										</div>
										<div class="form-group">
										<label class="lb" for=""></label>
										<?php if($macdinh==1) { ?>
											<input type="checkbox" value="" name="macdinh" checked>&nbsp;Đặt làm mặc định
										<?php } else{ ?>
											<input type="checkbox" value="" name="macdinh" >&nbsp;Đặt làm mặc định
										<?php } ?>
										</div>
										<input id="btn" name="btnUpDC" class="btn btn-warning" type="submit" value="Cập nhật">
								<?php } } else{ ?>
									<?php
								$row= json_decode($data["ttuser"],true);
								foreach ($row as list("id"=>$id)){ ?>
								<form action="./Account/Address/<?php echo $id ?>" method="POST">
								<?php } ?>
								<?php if(isset($data["result"])) { ?>
								<h5 style="color:red;text-align:center"><?php
									if($data["result"] =="true"){
										echo "Thêm thành công thành công.";
									}
									else { echo "Thêm không thành công";}
								?></h5>
								<?php } ?>
								<div  id="ff"class="form-group">
									<label class="lb" for="">Họ tên:</label>
									<input id="f-ct" class="form-control" type="text" name="hoten" value="" required placeholder="Nhập họ tên">
								</div>
								<div class="form-group">
									<label class="lb" for="">Số điện thoại:</label>
									<input id="f-ct" class="form-control" type="text" name="sdt" value="" required placeholder="Nhập số điện thoại">
								</div>
								<div class="form-group">
									<label class="lb" for="">Tỉnh/Thành phố:</label>
									<input id="f-ct" class="form-control" type="text" name="tinh" value="" required placeholder="Nhập tỉnh/thành phố">
								</div>
								<div class="form-group">
									<label class="lb" for="">Quận huyện:</label>
									<input id="f-ct" class="form-control" type="text" name="huyen" value="" required placeholder="Nhập quận huyện">
								</div>
								<div class="form-group">
									<label class="lb" for="">Phường xã:</label>
									<input id="f-ct" class="form-control" type="text" name="xa" value="" required placeholder="Nhập phường xã">
								</div>
                                <div class="form-group">
									<label class="lb" for="">Địa chỉ:</label>
									<textarea id="f-ct" class="form-control" name="diachi" value="" required placeholder="Nhập địa chỉ"></textarea>
								</div>
                                <div class="form-group">
                                <label class="lb" for=""></label>
									<input type="checkbox" value="" name="macdinh" >&nbsp;Đặt làm mặc định
								</div>
								<input id="btn" name="btnAddDC" class="btn btn-warning" type="submit" value="Thêm mới">
								<?php } ?>
							</form>
						</div>
					</div>	
				</div>
			</div>
		</div>