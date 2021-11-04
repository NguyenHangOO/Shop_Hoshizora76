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
		<h5>Trang chủ <i class="fas fa-chevron-right"></i> Thông báo của tôi</h5>
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
				<li><a href="./Account/Infomation"><i class="fas fa-user-alt"></i> Thông tin tài khoản</a></li>
				<li><a href="./Account/Infor_oder"><i class="fas fa-list-alt"></i></i> Quản lí đơn hàng</a></li>
				<li style="background: #CDE2CD;"><a href="Account/Notification"><i class="fas fa-bell"></i> Thông báo của tôi</a></li>
				<li><a href="./Account/ShowAddress"><i class="fas fa-address-card"></i> Sổ địa chỉ</a></li>
				<li><a href="./Account/Avartar"><i class="fas fa-user-circle"></i> Avartar</a></li>
				<li><a href="./Account/Sigout" onclick="return confirm('Bạn có chắc muốn đăng xuất?')"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a></li>
			</ul>
		</div>
		<div id="ac-info">
			<div id="ac-info-tt"> 
				<div id="info-t">
					<h5 style="margin-left: 20px; padding-top: 20px;">Thông báo của tôi</h5>
				</div>
				<div id="info-b">
					<table class="table table-hover" style="font-size:13px;">
					<tr><th class="td1">Ngày</th><th class="td2" >Nội dung</th><th class="td3" >Thao tác</th></tr>
					<?php
						$row= json_decode($data["tbnd"],true);
						foreach ($row as list("id"=>$id,"noidung"=>$noidung,"ngaytb"=>$ngaytb,"trangthai"=>$trangthai)){ ?>
						<?php 
							if($trangthai=="Chưa xem"){ ?>
							<tr style="background: rgb(240,240,240);">
								<td class="td1"><?php echo $ngaytb ?></td>
								<td class="td2"><?php echo $noidung ?></td>
								<td class="td3" >
									<a class="" href="./Account/Notifi/<?php echo $id ?>">Đánh dấu đã đọc</a> | <a class="" href="./Account/NotifiDel/<?php echo $id ?>" onclick="return confirm('Bạn có chắc muốn xóa?')" style="color:red" ><i class="fas fa-trash"></i>Xóa</a>
								</td>	
							</tr>		
						<?php	} else { ?>
							<tr >
								<td class="td1"><?php echo $ngaytb ?></td>
								<td class="td2"><?php echo $noidung ?></td>
								<td class="td3" >
								<a class="" href="./Account/NotifiDel/<?php echo $id ?>" onclick="return confirm('Bạn có chắc muốn xóa?')" style="color:red"><i class="fas fa-trash"></i>Xóa</a>
								</td>	
							</tr>
						<?php } ?>	
					<?php } ?>
					</table>
				</div>
			</div>	
		</div>
	</div>
</div>