<style>
	#deatail{
		text-decoration: none;
	}
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
		<h5>Trang chủ <i class="fas fa-chevron-right"></i> Quản lý đơn hàng</h5>
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
				if($img !="" && file_exists($img)){ ?>
					<a href="./Account/Infomation"><img id="ac-ac" src="<?php echo $img ?>"><?php echo $username ?></a>
				<?php }  else {?>
					<a href="./Account/Infomation"><img id="ac-ac" src="./public/images/account/unnamed.png"><?php echo $username ?></a>
				<?php } ?>
		<?php } ?>
		<li><a href="./Account/Infomation"><i class="fas fa-user-alt"></i> Thông tin tài khoản</a></li>
		<li style="background: #CDE2CD;"><a href="./Account/Infor_oder"><i class="fas fa-list-alt"></i></i> Quản lí đơn hàng</a></li>
		<li><a href="Account/Notification"><i class="fas fa-bell"></i> Thông báo của tôi</a></li>
		<li><a href="./Account/ShowAddress"><i class="fas fa-address-card"></i> Sổ địa chỉ</a></li>
		<li><a href="./Account/Avartar"><i class="fas fa-user-circle"></i> Avartar</a></li>
		<li><a href="./Account/Sigout" onclick="return confirm('Bạn có chắc muốn đăng xuất?')"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a></li>
	</ul>
</div>
<div id="ac-info">
	<div id="ac-info-tt"> 
		<div id="info-t" >
			<h5 style="margin-left: 20px; padding-top: 20px;">Đơn hàng của tôi</h5>
		</div>
		<div id="info-b2">
			<div class="tab">
				<button class="tablinks active">Tất cả</button>
				<button class="tablinks">Chờ xác nhận</button>
				<button class="tablinks">Đã xác nhận</button>
				<button class="tablinks">Đang giao</button>
				<button class="tablinks">Đã giao</button>
				<button class="tablinks">Đã hủy</button>
				</div>
				
				<div id="Tất cả" class="tabcontent">
					<table class="table table-hover" style="font-size:13px;text-align:center;" >
						<tr><th>STT</th><th>Mã đơn hàng</th><th>Ngày mua</th><th style="text-align:right;">Tổng tiền</th><th>Trạng thái</th><th>Chi tiết</th></tr>
						<?php 
								$row= json_decode($data["dsdonhang"],true);
								$stt=0;
								foreach ($row as list("id"=>$id,"ngay"=>$ngay,"tongtien"=>$tongtien,"tinhtrang"=>$trangthai)){ $stt++;?>
						<tbody>
							<tr>
								<td><?php echo $stt;?></td>
								<td><?php echo $id;?></td>
								<td><?php echo $ngay;?></td>
								<td style="text-align:right;"><?php echo number_format($tongtien);?>đ</td>
								<td><?php echo $trangthai;?></td>
								<?php 
									if($trangthai=="Đã giao"){ ?>
										<td><a href="./Order/DetailOrder/<?php echo $id;?>" id="detail">Đánh giá/chi tiết</a></td>
									<?php }else{ ?>
										<td><a href="./Order/DetailOrder/<?php echo $id;?>" id="detail">Xem chi tiết</a></td>
								<?php } ?>
							</tr>
						</tbody>
						<?php } ?>
					</table>
				</div>

				<div id="Chờ xác nhận" class="tabcontent">
					<table class="table table-hover" style="font-size:13px;text-align:center;">
						<tr><th>STT</th><th>Mã đơn hàng</th><th>Ngày mua</th><th style="text-align:right;">Tổng tiền</th><th>Chi tiết</th></tr>
						<?php 
                                $row= json_decode($data["dsdonhangcxn"],true);
								$stt=0;
                                foreach ($row as list("id"=>$id,"ngay"=>$ngay,"tongtien"=>$tongtien,"tinhtrang"=>$trangthai)){ $stt++;?>
						<tr>
							<td><?php echo $stt;?></td>
							<td><?php echo $id;?></td>
							<td><?php echo $ngay;?></td>
							<td style="text-align:right;"><?php echo number_format($tongtien);?>đ</td>
							<td><a href="./Order/DetailOrder/<?php echo $id;?>" id="detail">Xem chi tiết</a></td>
						</tr>
						<?php } ?>
					</table>
				</div>
				
				<div id="Đã xác nhận" class="tabcontent">
					<table class="table table-hover" style="font-size:13px;text-align:center;">
						<tr><th>STT</th><th>Mã đơn hàng</th><th>Ngày mua</th><th style="text-align:right;">Tổng tiền</th><th>Chi tiết</th></tr>
						<?php 
                                $row= json_decode($data["dsdonhangxn"],true);
								$stt=0;
                                foreach ($row as list("id"=>$id,"ngay"=>$ngay,"tongtien"=>$tongtien,"tinhtrang"=>$trangthai)){ $stt++;?>
						<tr>
							<td><?php echo $stt;?></td>
							<td><?php echo $id;?></td>
							<td><?php echo $ngay;?></td>
							<td style="text-align:right;"><?php echo number_format($tongtien);?>đ</td>
							<td><a href="./Order/DetailOrder/<?php echo $id;?>" id="detail">Xem chi tiết</a></td>
						</tr>
						<?php } ?>
					</table>
				</div>
				
				<div id="Đang giao" class="tabcontent">
					<table class="table table-hover" style="font-size:13px;text-align:center;">
					<thead><tr><th>STT</th><th>Mã đơn hàng</th><th>Ngày mua</th><th style="text-align:right;">Tổng tiền</th><th>Chi tiết</th></tr></thead>
						<?php 
                                $row= json_decode($data["dsdonhangdag"],true);
								$stt=0;
                                foreach ($row as list("id"=>$id,"ngay"=>$ngay,"tongtien"=>$tongtien,"tinhtrang"=>$trangthai)){ $stt++;?>
						<tr>
							<td><?php echo $stt;?></td>
							<td><?php echo $id;?></td>
							<td><?php echo $ngay;?></td>
							<td style="text-align:right;"><?php echo number_format($tongtien);?>đ</td>
							<td><a href="./Order/DetailOrder/<?php echo $id;?>" id="detail">Xem chi tiết</a></td>
						</tr>
						<?php } ?>
					</table>
				</div>

				<div id="Đã giao" class="tabcontent">
					<table class="table table-hover" style="font-size:13px;text-align:center;">
						<tr><th>STT</th><th>Mã đơn hàng</th><th>Ngày mua</th><th style="text-align:right;">Tổng tiền</th><th>Chi tiết</th></tr>
						<?php 
                                $row= json_decode($data["dsdonhangdg"],true);
								$stt=0;
                                foreach ($row as list("id"=>$id,"ngay"=>$ngay,"tongtien"=>$tongtien,"tinhtrang"=>$trangthai)){ $stt++;?>
						<tr>
							<td><?php echo $stt;?></td>
							<td><?php echo $id;?></td>
							<td><?php echo $ngay;?></td>
							<td style="text-align:right;"><?php echo number_format($tongtien);?>đ</td>
							<td><a href="./Order/DetailOrder/<?php echo $id;?>" id="detail">Đánh giá/chi tiết</a></td>
						</tr>
						<?php } ?>
					</table>
				</div>

				<div id="Đã hủy" class="tabcontent">
					<table class="table table-hover" style="font-size:13px;text-align:center;">
						<tr><th>STT</th><th>Mã đơn hàng</th><th>Ngày mua</th><th style="text-align:right;">Tổng tiền</th><th>Chi tiết</th></tr>
						<?php 
                                $row= json_decode($data["dsdonhanghuy"],true);
								$stt=0;
                                foreach ($row as list("id"=>$id,"ngay"=>$ngay,"tongtien"=>$tongtien,"tinhtrang"=>$trangthai)){ $stt++;?>
						<tr>
							<td><?php echo $stt;?></td>
							<td><?php echo $id;?></td>
							<td><?php echo $ngay;?></td>
							<td style="text-align:right;"><?php echo number_format($tongtien);?>đ</td>
							<td><a href="./Order/DetailOrder/<?php echo $id;?>" id="detail">Xem chi tiết</a></td>
						</tr>
						<?php } ?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="./public/js/tab.js"></script>
