<style>
    #imgspp{height:80px;width:90px;}
    #tieude{font-size:15px;}
    #td3{width:10%;line-height: 80px;}
    #td33{width:10%;}
    .tb{
        background-color: rgb(255, 255, 251);border: 1px solid rgb(253, 216, 53);color: rgb(223, 189, 21);padding: 16px 24px;display: flex;
    }
    .khungtb{
        width: 100%;padding: 16px 24px;font-size: 15px;margin-bottom: 24px;
    }
    .is-form{padding-top:5px;color:#111}
    @media screen and (max-width: 1030px) {
	#chimuc{margin-top:-20px;}
    }
    @media screen and (max-width:700px) {
        #imgspp{height:50px;width:50px;margin-top:25px;}
        .is-form,#input-qty{width: 20px;}
        .tenten{font-size:12px;}
    }
    @media screen and (max-width:480px) {
        #chimuc{display:none;}
        #imgspp{height:40px;width:40px;margin-top:25px;}
        .is-form,#input-qty{width: 16px; height:22px;font-size:10px;}
        .tenten{font-size:10px;}
        #dongia,#thanhtien,#del{font-size:10px;}
        #tieude{font-size:12px;}
    }
    @media screen and (max-width:380px) {
        #imgspp{height:25px;width:25px;margin-top:25px;}
        .is-form,#input-qty{width: 12px; height:18px;font-size:7px;}
        .tenten{font-size:7px;}
        #dongia,#thanhtien,#del{font-size:7px;}
        #tieude{font-size:10px;}
    }
    @media screen and (max-width:330px) {#tdchk{display:none;}}
</style>
<div id="chimuc">
    <div class="container">
        <h5 >Trang chủ <i class="fas fa-chevron-right"></i> Giỏ hàng</h5>
    </div>
</div>
<div class="container" >
    <?php $row= json_decode($data["spcart"],true);
          $tg=count($row);
          if($tg==0){ ?>
              <dv class="khungtb">
                    <div class="tb">
                        <i class="fas fa-exclamation-circle"></i> &nbsp; Giỏ hàng hiện không có sản phẩm.
                    </div>
                </dv> 
         <?php  }
          else{ ?>
    <div id="info-b" style ="margin-top:20px;">
        <div class="row">
           <div class="col col-sm-12" style="position: unset;">
            <table class="table table-hover" style="font-size:13px;">
                <tr id="tieude"><th class="td1" id="tdchk" style="width:3%;"><input type="checkbox" id="chckall"></th><th class="td1" style="width:11%;">Sản phẩm</th><th class="td1" style="width:32%;"></th><th class="td2" style="width:15%;" >Đơn giá</th><th class="td2" style="width:15%;">Số lượng</th><th class="td2" style="width:15%;" >Số tiền</th><th class="td3" id="td33" >Thao tác</th></tr>
                <?php
                    $row= json_decode($data["spcart"],true);
                    foreach ($row as list("id"=>$id,"idgh"=>$idgh,"tensp"=>$tensp,"slg"=>$slg,"giaban"=>$giaban,"hinhanh"=>$hinhanh,"slgton"=>$slton,"ttban"=>$ttban)){
                        if($slton<1){ ?>
                        <tr style="background-color:#F5F5F5">
                            <td class="td1" id="tdchk" style="width:3%;line-height: 80px;"></td>
                            <td class="td1"style="width:11%;" ><img src="<?php echo $hinhanh; ?>" alt="" id="imgspp"></td>
                            <td class="td1"style="max-width:32%;"><span class="tenten"><?php echo $tensp; ?></span><span style="color:red">Sản phẩm hiện đang hết hàng </span></td>
                            <td class="td2"style="width:14%;line-height: 80px;"><span style="color:red" id="dongia"><?php echo number_format($giaban); ?>đ</span></td>
                            <td class="td2"style="width:14%;">
                                <div class="buttons_added"style="text-align:center;margin-top:20px">
                                    <a class="is-form" style="text-decoration: none;"disabled >-</a>
                                    <input aria-label="quantity" id="input-qty" max="99" min="1" name="slg" type="number" value="<?php echo $slg; ?>" disabled>
                                    <a  class="is-form" style="text-decoration: none;" disabled >+</a>   
                                </div>
                            </td>
                            <td class="td2"style="width:14%;line-height: 80px;"><span style="color:red" id="thanhtien"><?php echo number_format($thanhtien=$giaban*$slg); ?>đ</span></td>
                            <td class="td3" id="td3"><a style="color:red" id="del" href="#"><i class="fas fa-trash"></i></a></td>
                        </tr>
                      <?php  } else 
                          if($ttban==0){ ?>
                          <tr style="background-color:#F5F5F5">
                            <td class="td1" id="tdchk" style="width:3%;line-height: 80px;"></td>
                            <td class="td1"style="width:11%;" ><img src="<?php echo $hinhanh; ?>" alt="" id="imgspp"></td>
                            <td class="td1"style="max-width:32%;"><span class="tenten"><?php echo $tensp; ?></span><span style="color:red">Sản phẩm  đã ngừng bán </span></td>
                            <td class="td2"style="width:14%;line-height: 80px;"><span style="color:red" id="dongia"><?php echo number_format($giaban); ?>đ</span></td>
                            <td class="td2"style="width:14%;">
                                <div class="buttons_added"style="text-align:center;margin-top:20px">
                                    <a class="is-form" style="text-decoration: none;"disabled >-</a>
                                    <input aria-label="quantity" id="input-qty" max="99" min="1" name="slg" type="number" value="<?php echo $slg; ?>" disabled>
                                    <a  class="is-form" style="text-decoration: none;" disabled >+</a>   
                                </div>
                            </td>
                            <td class="td2"style="width:14%;line-height: 80px;"><span style="color:red" id="thanhtien"><?php echo number_format($thanhtien=$giaban*$slg); ?>đ</span></td>
                            <td class="td3" id="td3"><a style="color:red" id="del" href="#"><i class="fas fa-trash"></i></a></td>
                        </tr>
                        <?php } else { ?>
                    <tr>
                        <td class="td1" id="tdchk" style="width:3%;line-height: 80px;"><input type="checkbox" id="chcksp"></td>
                        <td class="td1"style="width:11%;" ><img src="<?php echo $hinhanh; ?>" alt="" id="imgspp"></td>
                        <td class="td1"style="max-width:32%;"><span class="tenten"><?php echo $tensp; ?></span></td>
                        <td class="td2"style="width:14%;line-height: 80px;"><span style="color:red" id="dongia"><?php echo number_format($giaban); ?>đ</span></td>
                        <td class="td2"style="width:14%;">
                            <div class="buttons_added"style="text-align:center;margin-top:20px">
                                <?php if($slg==1){ ?>
                                <a class="is-form" style="text-decoration: none;"disabled >-</a>
                                <?php  } else { ?>
                                <a href="./Order/UpGiamCartId/<?php echo $id; ?>/<?php echo $idgh; ?>" class="is-form" style="text-decoration: none;" >-</a>
                                <?php } ?>
                                <input aria-label="quantity" id="input-qty" max="99" min="1" name="slg" type="number" value="<?php echo $slg; ?>" disabled>
                                <?php if($slg<=98){ ?>
                                <a href="./Order/UpTangCartId/<?php echo $id; ?>/<?php echo $idgh; ?>" class="is-form"   style="text-decoration: none;">+</a>
                                <?php  } else { ?>
                                <a  class="is-form" style="text-decoration: none;" >+</a>
                                <?php } ?>   
                            </div>
                        </td>
                        <td class="td2"style="width:14%;line-height: 80px;"><span style="color:red" id="thanhtien"><?php echo number_format($thanhtien=$giaban*$slg); ?>đ</span></td>
                        <td class="td3" id="td3"><a style="color:red" id="del" href="#"><i class="fas fa-trash"></i></a></td>
                    </tr>
                     <?php   } } ?>
                </table>
           </div>
        </div>
    </div>
    <div class="thanhtoan" style="margin-top: 15px; background-color: white;">
        <div class="tongtien">
        <?php $row= json_decode($data["spcart"],true);
          $tg=count($row);
          $komua=0;
          $tongtien=0;
          foreach ($row as list("id"=>$id,"slgton"=>$slton,"slg"=>$slg,"ttban"=>$ttban,"giaban"=>$giaban)){
                if($slton<1 || $ttban==0)
                {
                    $komua++; 
                }
                else{
                    $tongtien=$tongtien + ($slg*$giaban);
                }
          }
          $tgh=$tg-$komua;
          ?>
            <span style="text-align:left;display:block"><input type="checkbox" id= "chckall">&nbsp;<span>Tất cả (<?php echo $tgh; ?> )</span></span>
            <span style="text-align:left;display:block"><a href="" style="color:red;text-decoration: none;"><i class="fas fa-trash"></i>&nbsp;Xóa tất cả sản phẩm</a> </span>
            <span>Tổng sản phẩm thanh toán (<?php echo $tgh; ?>):</span>&nbsp;<span style="font-size:22px;color:red"><?php echo number_format($tongtien); ?>đ</span>&nbsp;&nbsp;
            <button type="submit" class="btnMua" >Mua hàng</button>
        </div>   
    </div>
<?php } ?>
</div> 